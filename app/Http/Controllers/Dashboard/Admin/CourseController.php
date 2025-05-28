<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResourceDeleteService;
use App\Exceptions\CannotDeleteUsedResourceException;

class CourseController extends Controller
{
   
    public function index()
    {
        return view('dashboard.admin.courses.index',[
            'courses' => Course::orderByDesc('id')->get()
        ]);
    }

    
    public function create()
    {
       return view('dashboard.admin.courses.create', [
            'semesters' => Semester::orderByDesc('id')->get()
       ]);
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required',
            'credit' => ['required', 'integer'],
            'semester' => 'required'
        ]);

        Course::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'description' => $validated['description'],
            'credit_value' => $validated['credit'],
            'semester_id' => $validated['semester']
        ]);

        return back()->with(['status' => 'course-created']);
    }

    
    public function edit(int $id)
    {
        return view('dashboard.admin.courses.edit', [
            'course' => Course::findOrFail($id),
            'semesters' => Semester::orderByDesc('id')->get()
        ]);
    }

   
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required',
            'credit' => ['required', 'integer'],
            'semester' => 'required'
        ]);

        $course = Course::findOrFail($id);

        $course->update([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'description' => $validated['description'],
            'credit_value' => $validated['credit'],
            'semester_id' => $validated['semester']
        ]);

        return back()->with(['status' => 'course-updated']);
    }

    
    public function destroy(Request $request, ResourceDeleteService $deleteWorker)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $course = Course::findOrFail($validated['id']);
            $deleteWorker->checkAndDeleteCourse($course);
            return back()->with(['status' => 'course-deleted']);
        } 
        catch (CannotDeleteUsedResourceException $e) {
            return back()->with('error', $e->getMessage());
        }
        catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
