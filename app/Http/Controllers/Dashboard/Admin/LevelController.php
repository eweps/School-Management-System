<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class LevelController extends Controller
{

    public function index()
    {
        return view("dashboard.admin.levels.index", [
            'levels' => Level::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.levels.create');
    }


    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Level::create($validated);
        return back()->with(['status' => 'level-created']);
    }


    public function edit(int $id)
    {
        return view('dashboard.admin.levels.edit', [
             'level' => Level::findOrFail($id)
        ]);
    }

  
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $semester = Level::findOrFail($id);
        $semester->update($validated);
        return back()->with(['status' => 'level-updated']);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $level = Level::findOrFail($validated['id']);
            $level->delete();

            return back()->with(['status' => 'level-deleted']);
        } 
        catch (QueryException $e) {
            return redirect()->back()->withErrors([
                'delete' => 'Cannot delete: This record is being used in another table.'
            ]);
        }
    }
}
