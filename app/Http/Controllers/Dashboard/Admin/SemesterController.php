<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class SemesterController extends Controller
{
    
    public function index()
    {
        return view("dashboard.admin.semesters.index", [
            'semesters' => Semester::orderBy('id', 'DESC')->get()
        ]);
    }


    public function create()
    {
        return view('dashboard.admin.semesters.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Semester::create($validated);

        return back()->with(['status' => 'semester-created']);
    }


    public function edit(int $id)
    {
        return view('dashboard.admin.semesters.edit', [
             'semester' => Semester::findOrFail($id)
        ]);
    }


    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($validated);
        return back()->with(['status' => 'semester-updated']);
    }

 
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $semester = Semester::findOrFail($validated['id']);
            $semester->delete();

            return back()->with(['status' => 'semester-deleted']);
        } 
        catch (QueryException $e) {
            return redirect()->back()->withErrors([
                'delete' => 'Cannot delete: This record is being used in another table.'
            ]);
        }
    }
}
