<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use App\Models\LiveClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class LiveClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.teacher.live-classes.index', [
            'liveClasses' => LiveClass::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teacher.live-classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'link' => 'required|url',
            'date' => 'required|date',
            'start_time' => 'required'
       ]);

       $validated["user_id"] = auth()->user()->id;
       
       LiveClass::create($validated);
       return back()->with(['status' => 'liveclass-created']);
    }

    
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $id)
    {
        return view('dashboard.teacher.live-classes.edit', [
             'liveClass' => LiveClass::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'link' => 'required|url',
            'date' => 'required|date',
            'start_time' => 'required'
       ]);
       $validated["user_id"] = auth()->user()->id;

        $liveClass = LiveClass::findOrFail($id);
        $liveClass->update($validated);

        return back()->with(['status' => 'liveclass-updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $liveClass = LiveClass::findOrFail($validated['id']);
            $liveClass->delete();

            return back()->with(['status' => 'liveclass-deleted']);
        } 
        catch (QueryException $e) {
            return redirect()->back()->withErrors([
                'delete' => 'Cannot delete: This record is being used in another table.'
            ]);
        }
    }
}
