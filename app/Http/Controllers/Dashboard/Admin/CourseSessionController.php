<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Models\CourseSession;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class CourseSessionController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.course-sessions.index', [
            'courseSessions' => CourseSession::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.course-sessions.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            //  'start_time' => 'required|before:end_time',
            // 'end_time' => 'required|after:start_time',
        ]);

        CourseSession::create($validated);

        return back()->with(['status' => 'course-session-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.course-sessions.edit', [
            'courseSession' => CourseSession::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id) 
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $courseSession = CourseSession::findOrFail($id);
        $courseSession->update($validated);
        return back()->with(['status' => 'course-session-updated']);
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $courseSession = CourseSession::findOrFail($validated['id']);
            $courseSession->delete();

            return back()->with(['status' => 'course-session-deleted']);
        } 
        catch (QueryException $e) {
            return redirect()->back()->withErrors([
                'delete' => 'Cannot delete: This record is being used in another table.'
            ]);
        }
    }
}
