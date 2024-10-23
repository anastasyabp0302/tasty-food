<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Menampilkan halaman edit data
    public function edit ()
    {
        $setting = Setting::first();
        return view('setting.edit', compact('contact'));
    }

    // Menyimpan perubahan data
    public function update()
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
        ]);

        // Update data di database
        $setting = Setting::first();
        $setting->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }
}
