@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<h2>Edit Pelanggan</h2>

<form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $pelanggan->nama) }}" required>
  </div>
  <div class="mb-3">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $pelanggan->alamat) }}" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $pelanggan->email) }}" required>
  </div>
  <div class="mb-3">
    <label>No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $pelanggan->no_telepon) }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
