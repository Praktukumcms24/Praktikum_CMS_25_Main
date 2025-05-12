@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <h2>Detail Pelanggan</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p><strong>No. Telepon:</strong> {{ $pelanggan->no_telepon }}</p>
            <p><strong>Email:</strong> {{ $pelanggan->email }}</p>
        </div>
    </div>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
