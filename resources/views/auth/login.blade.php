{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold" style="color: #FF6B35;">Bienvenido de nuevo</h1>
                        <p class="text-muted">Ingresa tus credenciales para continuar</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label" style="color: #FF6B35;">Correo electrónico</label>
                            <input id="email" type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" autofocus
                                placeholder="nombre@ejemplo.com"
                                style="border-radius: 10px; border: 2px solid #FFE5D3;">
                            
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label" style="color: #FF6B35;">Contraseña</label>
                            <input id="password" type="password" 
                                class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password"
                                placeholder="••••••••"
                                style="border-radius: 10px; border: 2px solid #FFE5D3;">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-secondary" for="remember">
                                    Recordar sesión
                                </label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #FF6B35;">
                                    ¿Contraseña olvidada?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn w-100 py-3 text-white fw-bold" 
                            style="background: #FF6B35; border-radius: 10px; border: none;">
                            Iniciar sesión
                        </button>

                        <div class="text-center mt-4 text-secondary">
                            ¿No tienes cuenta? 
                            <a href="{{ route('register') }}" class="text-decoration-none" style="color: #FF6B35;">
                                Crear cuenta
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(45deg, #FFF3EB, #FFE5D3);
    }
    
    .card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
    }
    
    .form-control:focus {
        border-color: #FF6B35;
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 53, 0.25);
    }
    
    .btn:hover {
        background: #FF5A1F !important;
    }
</style>
@endsection