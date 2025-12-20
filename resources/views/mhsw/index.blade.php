@extends('layouts.app')

@section('content')

    <h2>Mahasiswa</h2>

    <a href="{{ url('mhsw/create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row->mhsw_nim }}</td>
                    <td>{{ $row->mhsw_nama }}</td>
                    <td>{{ $row->mhsw_alamat }}</td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
