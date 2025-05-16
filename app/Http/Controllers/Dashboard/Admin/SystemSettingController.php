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

        $booleanFields = [
            'FILL_CA_MARKS',
            'FILL_EXAM_MARKS '
        ];

        foreach ($settings as $setting) {
            if(in_array($setting->name, $booleanFields)) {
                $rules[$setting->name] = 'required|boolean';
                $messages["{$setting->name}.required"] = 'This field is required.';
                $messages["{$setting->name}.boolean"] = 'This field must either be 1 or 0.';
            }
            else {
                $rules[$setting->name] = 'required';    
                $messages["{$setting->name}.required"] = 'This field is required.';
            }
        }

        $validation = $request->validate($rules, $messages);

        dd($validation);
        
        // foreach ($settings as $setting) {
        //     Setting::where('name', $setting->name)->update(['value' => $setting->value]);
        // }

        // return back()->with(['status' => 'settings-updated']);
    }
}
