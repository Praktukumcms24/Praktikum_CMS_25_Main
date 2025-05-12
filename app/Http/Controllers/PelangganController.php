<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'no_telepon' => 'required|string|max:15',
        'email' => 'required|email|unique:pelanggan,email',
    ]);

    // Simpan data pelanggan
    Pelanggan::create($request->all());

    return redirect()->route('pelanggan.index')->with('success', 'Data berhasil disimpan');
}


    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            // Gunakan pengecualian ID untuk validasi email
            'email' => "required|email|unique:pelanggan,email,{$id}",
        ]);
    
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
    
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
