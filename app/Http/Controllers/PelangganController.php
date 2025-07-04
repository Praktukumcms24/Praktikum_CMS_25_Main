<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->q . '%')
                  ->orWhere('email', 'like', '%' . $request->q . '%');
            });
        }

        $pelanggan = $query->latest()->get();

        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'no_telepon'     => 'required|string|max:15',
            'email'          => 'required|email|unique:pelanggan,email',
            'foto_pelanggan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        try {
            $data = $request->only(['nama', 'alamat', 'no_telepon', 'email']);

            if ($request->hasFile('foto_pelanggan')) {
                $file = $request->file('foto_pelanggan');
                $filename = time() . '_' . $file->getClientOriginalName();

                // ✅ Simpan ke folder yang benar di storage/app/public
                $file->storeAs('public/foto_pelanggan', $filename);

                $data['foto_pelanggan'] = $filename;
            }

            Pelanggan::create($data);

            return redirect()->route('pelanggan.index')->with('success', 'Data berhasil disimpan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan data pelanggan', ['error' => $e]);

            return redirect()->route('pelanggan.index')->withErrors('Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->withErrors('Data tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'no_telepon'     => 'required|string|max:15',
            'email'          => "required|email|unique:pelanggan,email,{$id}",
            'foto_pelanggan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $data = $request->only(['nama', 'alamat', 'no_telepon', 'email']);

            if ($request->hasFile('foto_pelanggan')) {
                // ✅ Hapus file lama jika ada
                if ($pelanggan->foto_pelanggan) {
                    $oldPath = storage_path('app/public/foto_pelanggan/' . $pelanggan->foto_pelanggan);
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                $file = $request->file('foto_pelanggan');
                $filename = time() . '_' . $file->getClientOriginalName();

                // ✅ Simpan ke folder yang benar
                $file->storeAs('public/foto_pelanggan', $filename);

                $data['foto_pelanggan'] = $filename;
            }

            $pelanggan->update($data);

            return redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui.');
        } catch (Throwable $e) {
            Log::error('Gagal update pelanggan', ['error' => $e]);

            return redirect()->route('pelanggan.index')->withErrors('Terjadi kesalahan saat update data.');
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            if ($pelanggan->foto_pelanggan) {
                $fotoPath = storage_path('app/public/foto_pelanggan/' . $pelanggan->foto_pelanggan);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }

            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus pelanggan', ['error' => $e]);

            return redirect()->route('pelanggan.index')->withErrors('Terjadi kesalahan saat menghapus data.');
        }
    }
}
