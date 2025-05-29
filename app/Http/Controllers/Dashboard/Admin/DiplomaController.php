<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Diploma;
use App\Models\DiplomaType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResourceDeleteService;
use App\Exceptions\CannotDeleteUsedResourceException;
use App\Models\Department;

class DiplomaController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.diplomas.index', [
            'diplomas' => Diploma::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.diplomas.create', [
            'diplomaTypes' => DiplomaType::orderBy('id', 'DESC')->get(),
            'departments' => Department::orderByDesc('id')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|integer',
            'department' => 'required|integer'
        ]);

        Diploma::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'diploma_type_id' => $validated['type'],
            'department_id' => $validated['department']
        ]);

        return back()->with(['status' => 'diploma-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.diplomas.edit', [
            'diploma' => Diploma::findOrFail($id),
            'diplomaTypes' => DiplomaType::orderBy('id', 'DESC')->get(),
            'departments' => Department::orderByDesc('id')->get()
        ]);
    }

    public function update(Request $request , int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|integer',
            'department' => 'required|integer'
        ]);

        $diploma = Diploma::findOrFail($id);
        $diploma->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'diploma_type_id' => $validated['type'],
            'department_id' => $validated['department']
        ]);

        return back()->with(['status' => 'diploma-updated']);
    }

    public function destroy(Request $request, ResourceDeleteService $deleteWorker)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $diploma = Diploma::findOrFail($validated['id']);
            $deleteWorker->checkAndDeleteDiploma($diploma);
            return back()->with(['status' => 'diploma-deleted']);
        } 
        catch (CannotDeleteUsedResourceException $e) {
                return back()->with('error', $e->getMessage());
        }
        catch (Exception $e) {
                return back()->with('error', $e->getMessage());
        }

    }   
}
