<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function edit() {
        return view('dashboard.admin.settings.edit', [
            'settings' => Setting::all()
        ]);
    }
}
