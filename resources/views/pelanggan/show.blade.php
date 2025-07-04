@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<h2 class="mb-4">Detail Pelanggan</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
        <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
        <p><strong>No. Telepon:</strong> {{ $pelanggan->no_telepon }}</p>
        <p><strong>Email:</strong> {{ $pelanggan->email }}</p>

        <div class="mt-3">
            <strong>Foto Pelanggan:</strong><br>
            @if($pelanggan->foto || $pelanggan->foto_pelanggan)
                <img src="{{ asset('uploads/foto_pelanggan/' . ($pelanggan->foto ?? $pelanggan->foto_pelanggan)) }}" 
                     alt="Foto Pelanggan" 
                     width="100" 
                     class="img-thumbnail mt-2"
                     style="object-fit: cover; border-radius: 5px;">
            @else
                <p class="text-muted">Belum ada foto</p>
            @endif
        </div>
    </div>
</div>

<a href="{{ route('pelanggan.index') }}" class="btn btn-secondary mt-4">← Kembali</a>
@endsection
