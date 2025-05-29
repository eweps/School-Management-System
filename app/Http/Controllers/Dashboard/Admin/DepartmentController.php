<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResourceDeleteService;
use App\Exceptions\CannotDeleteUsedResourceException;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.departments.index', [
            'departments' => Department::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.departments.create');
    }

    public function store(Request $request) 
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Department::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        return back()->with(['status' => 'department-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.departments.edit', [
            'department' => Department::findOrFail($id),
        ]);
    }

     public function update(Request $request , int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $department = Department::findOrFail($id);
        
        $department->update([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        return back()->with(['status' => 'department-updated']);
    }

    public function showCourses(int $id)
    {   
        $department = Department::findOrFail($id);
        $departmentCoursesIds = [];
        $departmentCourses =$department->courses()->get();

        foreach($departmentCourses as $course) {
            array_push($departmentCoursesIds, $course->id);
        }

        return view('dashboard.admin.departments.show-course', [
            'department' => $department,
            'departmentCourses' => $department->courses()->get(),  
            'courses' => Course::whereNotIn('id', $departmentCoursesIds)->get()
        ]);
    }

    public function addCourseToDepartment(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|integer',
            'department' => 'required|integer',
        ]);

        $department = Department::findOrFail($validated['department']);
        $department->courses()->attach($validated['course']);
        
        return back()->with(['status' => 'course-added']);
    }

    public function removeCourseFromDepartment(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|integer',
            'department' => 'required|integer'
        ]);

        $department = Department::findOrFail($validated['department']);
        $department->courses()->detach($validated['course']);

        return back()->with(['status' => 'course-removed']);
    }

    public function destroy(Request $request, ResourceDeleteService $deleteWorker)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $department = Department::findOrFail($validated['id']);
            $deleteWorker->checkAndDeleteDepartment($department);
            return back()->with(['status' => 'department-deleted']);
        } 
        catch (CannotDeleteUsedResourceException $e) {
            return back()->with('error', $e->getMessage());
        }
        catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
