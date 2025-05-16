<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

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
        return view('dashboard.admin.diplomas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Diploma::create($validated);

        return back()->with(['status' => 'diploma-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.diplomas.edit', [
            'diploma' => Diploma::findOrFail($id)
        ]);
    }

    public function update(Request $request , int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $diploma = Diploma::findOrFail($id);
        $diploma->update($validated);
        return back()->with(['status' => 'diploma-updated']);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $diploma = Diploma::findOrFail($validated['id']);
            $diploma->delete();

            return back()->with(['status' => 'diploma-deleted']);
        } 
        catch (QueryException $e) {
            return redirect()->back()->withErrors([
                'delete' => 'Cannot delete: This record is being used in another table.'
            ]);
        }


    }   
}
