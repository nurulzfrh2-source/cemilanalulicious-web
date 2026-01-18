@extends('layouts.auth')

@section('content')
<div class="card card-login bg-white">
    <div class="login-header pb-0">
        <h4 class="fw-bold" style="color: #d81d7b;">Daftar Admin Baru</h4>
    </div>
    <div class="card-body p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Ulangi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-pink rounded-pill">DAFTAR</button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="small text-decoration-none text-muted">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</div>
@endsection