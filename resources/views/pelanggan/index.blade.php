@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Daftar Pelanggan</h1>
  <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th><th>Nama</th><th>Email</th><th>Telepon</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pelanggan as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->no_telepon }}</td>
        <td>
          <a href="{{ route('pelanggan.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
          <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
