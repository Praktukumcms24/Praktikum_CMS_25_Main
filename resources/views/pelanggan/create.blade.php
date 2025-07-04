@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<h2>Tambah Pelanggan</h2>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
