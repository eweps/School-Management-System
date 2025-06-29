<?php

namespace App\Http\Controllers\Dashboard\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        dd($request);
    }


}
