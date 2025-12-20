@extends('layouts.app')

@section('content')
    <h2>Tambah Mahasiswa</h2>

    <form action="{{ url('mhsw') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="mhsw_nim" class="form-label fw-bold">NIM</label>
            <input type="text" class="form-control" name="mhsw_nim" id="mhsw_nim" required>
        </div>
        <div class="mb-3">
            <label for="mhsw_nama" class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control" name="mhsw_nama" id="mhsw_nama" required>
        </div>
        <div class="mb-3">
            <label for="mhsw_alamat" class="form-label fw-bold">Alamat</label>
            <input type="text" class="form-control" name="mhsw_alamat" id="mhsw_alamat" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
