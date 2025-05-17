<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.applications.index', [
            'applications' => Application::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('dashboard.admin.applications.show', [
            'application' => Application::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
