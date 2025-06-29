<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use Exception;
use Illuminate\Http\Request;
use App\Models\LearningResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ResourceDeleteService;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\CannotDeleteUsedResourceException;

/**
 * Learning Resource Controller
 */
class ResourceController extends Controller
{
    public function index()
    {
        return view('dashboard.teacher.resource.index', ['resources' => Auth::user()->teacher->resources()->orderBy('id', 'DESC')->get()]);
    }

    public function create()
    {
        return view('dashboard.teacher.resource.create', [
            'courses' => Auth::user()->teacher->courses
        ]);
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:225',
            'course' => 'required',
            'learningResource' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip,jpg,png|max:6144', // 6MB max
        ]);

        $path = $request->file('learningResource')->store('learning-resources', 'public');

        $resource = LearningResource::create([
            'teacher_id' => Auth::user()->teacher->id,
            'course_id' => $validated['course'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'path' => $path,
         ]);
            
        // return response()->json(['message' => 'Uploaded successfully', 'data' => $resource]);
        
        return redirect()->back()->with(['status' => 'resource-created']); 
    }

    public function download($resourceId)
    {
        $learningResource = LearningResource::findOrFail($resourceId);

        try {
            return Storage::disk('public')->download($learningResource->path);
        }
        catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);  
        }

        

        return redirect()->back()->with(['error' => 'Download Failed']);  
    }

   public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $resource = LearningResource::findOrFail($validated['id']);
            $resource->delete();
            return back()->with(['status' => 'resource-deleted']);
        } 
        catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


}
