<?php

namespace App\Http\Controllers\Dashboard\Student;

use Exception;
use Illuminate\Http\Request;
use App\Models\LearningResource;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


/**
 * Learning Resource Controller
 */
class ResourceController extends Controller
{
    public function index()
    {
        $resources = Auth::user()->student->availableCourses()->with('learningResources')->get()->flatMap->learningResources;

        return view('dashboard.student.resources', ['resources' => $resources]);
    }


    public function download($resourceId)
    {
        $learningResource = LearningResource::findOrFail($resourceId);

        try {
            return Storage::disk('public')->download($learningResource->path);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return redirect()->back()->with(['error' => 'Download Failed']);
    }
}
