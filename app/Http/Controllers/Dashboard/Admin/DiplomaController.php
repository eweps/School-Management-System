<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.diplomas.index');
    }
}
