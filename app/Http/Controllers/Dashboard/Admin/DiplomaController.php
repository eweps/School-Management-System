<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiplomaController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.diplomas.index', [
            'diplomas' => Diploma::all()
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
}
