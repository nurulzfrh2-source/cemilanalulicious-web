@extends('layouts.dashboard')

@section('content')
    <h2>Edit Mahasiswa</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ url('mhsw/' . $row->mhsw_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="mhsw_nim" class="form-label fw-bold">NIM</label>
                    <input type="text" class="form-control" name="mhsw_nim" id="mhsw_nim" value="{{ $row->mhsw_nim }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="mhsw_nama" class="form-label fw-bold">Nama</label>
                    <input type="text" class="form-control" name="mhsw_nama" id="mhsw_nama" value="{{ $row->mhsw_nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="mhsw_alamat" class="form-label fw-bold">Alamat</label>
                    <input type="text" class="form-control" name="mhsw_alamat" id="mhsw_alamat"
                        value="{{ $row->mhsw_alamat }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>
    </div>
@endsection
