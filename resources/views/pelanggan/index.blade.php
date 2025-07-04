@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4 text-primary">📋 Daftar Pelanggan</h2>

  {{-- ✅ Notifikasi --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $errors->first() }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- ✅ Form Tambah & Cari --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('pelanggan.create') }}" class="btn btn-success">
      ➕ Tambah Pelanggan
    </a>

    <form method="GET" action="{{ route('pelanggan.index') }}" class="d-flex" style="max-width: 320px;">
      <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari..." value="{{ request('q') }}">
      <button type="submit" class="btn btn-sm btn-outline-primary">Cari</button>
      @if(request('q'))
        <a href="{{ route('pelanggan.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Reset</a>
      @endif
    </form>
  </div>

  {{-- ✅ Tabel Pelanggan --}}
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle mb-0">
          <thead class="table-dark text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pelanggan as $item)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>

                
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon ?? $item->no_telepon }}</td>

                <td class="text-center">
                  <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="{{ route('pelanggan.show', $item->id) }}" class="btn btn-sm btn-info">
                      👁️ View
                    </a>
                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                      ✏️ Edit
                    </a>
                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger">
                        🗑️ Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-3">
                  @if(request('q'))
                    Tidak ditemukan hasil untuk: <strong>{{ request('q') }}</strong>
                  @else
                    Belum ada data pelanggan.
                  @endif
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
