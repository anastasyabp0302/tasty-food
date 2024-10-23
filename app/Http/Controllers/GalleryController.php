<?php 

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    // Menampilkan halaman galeri
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', compact('galleries'));
    }

    // Menampilkan form untuk upload gambar
    public function create()
    {
        return view('gallery.create');
    }

    // Menyimpan gambar ke database
    public function store(Request $request)
    {
        // Validasi file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', // menambahkan batas ukuran file
        ]);

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Nama file unik
            $image->move(public_path('gallery-images'), $imageName); // Pindahkan file ke folder tujuan

            // Simpan data ke database
            Gallery::create([
                'image' => $imageName,
            ]);

            return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diunggah');
        }

        return back()->with('error', 'Gagal mengunggah gambar');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id); // Temukan galeri berdasarkan ID
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Validasi file
    ]);

    $gallery = Gallery::findOrFail($id); // Cari galeri berdasarkan ID

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        $oldImagePath = public_path('gallery-images/' . $gallery->image);
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Upload gambar baru
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Nama file unik
        $image->move(public_path('gallery-images'), $imageName);

        // Update nama file di database
        $gallery->update([
            'image' => $imageName,
        ]);
    }

    return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diupdate');
}


    // Menghapus gambar dari database dan folder
    public function destroy($id)
{

    $gallery = Gallery::findOrFail($id);
    $gallery->delete();
    // Pastikan objek gallery tidak null
    if (!$gallery) {
        return redirect()->route('gallery.index')->with('error', 'Gambar tidak ditemukan');
    }

    $imagePath = public_path('gallery-images/' . $gallery->image);

    // Cek dan hapus file gambar
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }

    // Hapus data dari database
    $gallery->delete();

    return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus');
}

public function showGallery()
{
    $galleries = Gallery::all();
    return view('galeri', compact('galleries'));
}

public function show($id)
{
    $gallery = Gallery::findOrFail($id);
    return view('gallery.show', compact('gallery'));
}

}
