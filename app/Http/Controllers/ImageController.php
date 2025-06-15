<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Menampilkan form upload gambar.
     */
    public function create()
    {
        return view('upload', ['image' => null]);
    }

    /**
     * Menyimpan gambar yang diunggah ke storage dan database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file gambar ke dalam folder 'public/images'
        $imagePath = $request->file('image')->store('irfan3.jpg', 'public');

        // Simpan data ke database
        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        // Redirect dengan data gambar dan pesan sukses
        return view('upload', ['image' => $image])
            ->with('success', 'Gambar berhasil diunggah!');
    }

    /**
     * Menghapus gambar dari storage dan database.
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file gambar dari storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Hapus data dari database
        $image->delete();

        // Redirect kembali ke form upload dengan pesan sukses
        return redirect()->route('image.create')->with('success', 'Gambar berhasil dihapus!');
    }
}
