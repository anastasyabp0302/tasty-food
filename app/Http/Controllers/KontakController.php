<?php
namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        //simpan data ke database
        Kontak::create([
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
