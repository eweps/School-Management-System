<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
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
        return view('dashboard.admin.departments.create', [
             'diplomas' => Diploma::orderBy('id', 'DESC')->get()
        ]);
    }

    public function store(Request $request) 
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'diploma' => 'required'
        ]);

        Department::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'diploma_id' => $validated['diploma']
        ]);

        return back()->with(['status' => 'department-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.departments.edit', [
            'department' => Department::findOrFail($id),
            'diplomas' => Diploma::orderBy('id', 'DESC')->get()
        ]);
    }

     public function update(Request $request , int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'diploma' => 'required'
        ]);

        $department = Department::findOrFail($id);
        
        $department->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'diploma_id' => $validated['diploma']
        ]);

        return back()->with(['status' => 'department-updated']);
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
