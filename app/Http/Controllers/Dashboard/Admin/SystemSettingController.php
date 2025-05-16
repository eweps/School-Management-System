<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function edit()
    {
        return view('dashboard.admin.settings.edit', [
            'settings' => Setting::all()
        ]);
    }

    /*  public function update(Request $request) {
        $settings = Setting::all();

        foreach($settings as $setting) {
            $request->validate([
                $setting->name => 'required',
            ]);
        }

        dd($request->all());
        
       
        // return back()->with(['status' => 'setting-updated']);
    } */

    public function update(Request $request)
    {
        // dd($request);

        $settings = Setting::all();

        $rules = [];
        $messages = [];

        foreach ($settings as $setting) {
            // if($setting->type === 'boolean') {
            //     $rules[$setting->name] = '';
            //     // $messages["{$setting->name}.boolean"] = 'This field must either be true or false.';
            // }
            if($setting->type !== 'boolean') {
                $rules[$setting->name] = 'required';    
                $messages["{$setting->name}.required"] = 'This field is required.';
            }
        }

        // dd($rules);

        $request->validate($rules, $messages);

        // dd($request->all());

        
        foreach ($settings as $setting) {
            $value = $request->all($setting->name)[$setting->name];
            Setting::where('name', $setting->name)->update(['value' => $value]);
        }

        return back()->with(['status' => 'settings-updated']);
    }
}
