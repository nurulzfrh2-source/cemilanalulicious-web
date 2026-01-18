@extends('layouts.auth') @section('content')
<div class="card card-login bg-white">
    
    <div class="login-header">
        <div class="mb-3">
            <i class="bi bi-shop-window" style="font-size: 3rem; color: #d81d7b;"></i>
        </div>
        <h4 class="fw-bold" style="color: #d81d7b;">Cemilan Alulicious</h4>
        <p class="text-muted small">Silakan login untuk mengelola toko</p>
    </div>

    <div class="card-body p-4 pt-2">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-bold small text-secondary">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                    <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                </div>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold small text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                    <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">
                </div>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label small text-secondary" for="remember">
                    Ingat Saya
                </label>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-pink rounded-pill shadow-sm">
                    MASUK SEKARANG
                </button>
            </div>

        </form>
    </div>
</div>
@endsection