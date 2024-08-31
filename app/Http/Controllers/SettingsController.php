<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->latest()->get();
        return view('admin.settings.index',compact('settings'));
    }


    public function edit(Setting $setting)
    {
        return view('admin.settings.edit',compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $request->only([
            'whatsapp','email','mar3roof','bank_account'
        ]);
        if ($request->hasFile('vat')) {
            $image = $request->file('vat');
            $imageName = $image->getClientOriginalName();
            $request->vat->move(public_path('settings-files/'), $imageName);
            $data['vat'] = $imageName;
        }
        if ($request->hasFile('trader_record')) {
            $image = $request->file('trader_record');
            $imageName = $image->getClientOriginalName();
            $request->trader_record->move(public_path('settings-files/'), $imageName);
            $data['trader_record'] = $imageName;
        }
        $setting = $setting->update($data);
        if ($setting)
        {
            return redirect()->route('settings.index')->with('settings-updated');
        }else{
            return redirect()->back();
        }
    }

}
