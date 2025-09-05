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
        $settings = Setting::all();

        $rules = [];
        $messages = [];

        foreach ($settings as $setting) {
            if($setting->type !== 'boolean') {
                $rules[$setting->name] = 'required';    
                $messages["{$setting->name}.required"] = 'This field is required.';
            }
            else{
                $rules[$setting->name] = 'boolean';    
                $messages["{$setting->name}.boolean"] = 'This field must be true or false.';
            }
        }

        $request->validate($rules, $messages);

        if($setting->type !== 'image') {
            foreach ($settings as $setting) {
                 $value = $request->input($setting->name);
                 Setting::where('name', $setting->name)->update(['value' => $value]);
            }
        }
        else {

            if ($request->hasFile($setting->name)) {
                $file = $request->file($setting->name);
                $path = $file->store('settings', 'public');
                Setting::where('name', $setting->name)->update(['value' => $path]);
            }

        }

        return back()->with(['status' => 'settings-updated']);
    }
}
