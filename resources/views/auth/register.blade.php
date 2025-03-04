{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                        <h1 class="display-5 fw-bold" style="color: #FF6B35;">Crear nueva cuenta</h1>
                        <p class="text-muted">Regístrate para comenzar</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label" style="color: #FF6B35;">Nombre completo</label>
                            <input id="name" type="text" 
                                class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus
                                placeholder="Ej: Juan Pérez"
                                style="border-radius: 10px; border: 2px solid #FFE5D3;">
                            
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label" style="color: #FF6B35;">Correo electrónico</label>
                            <input id="email" type="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email"
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
                                name="password" required autocomplete="new-password"
                                placeholder="••••••••"
                                style="border-radius: 10px; border: 2px solid #FFE5D3;">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label" style="color: #FF6B35;">Confirmar contraseña</label>
                            <input id="password-confirm" type="password" 
                                class="form-control form-control-lg" 
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="••••••••"
                                style="border-radius: 10px; border: 2px solid #FFE5D3;">
                        </div>

                        <button type="submit" class="btn w-100 py-3 text-white fw-bold mb-3" 
                            style="background: #FF6B35; border-radius: 10px; border: none;">
                            Registrar
                        </button>

                        <div class="text-center mt-4 text-secondary">
                            ¿Ya tienes cuenta? 
                            <a href="{{ route('login') }}" class="text-decoration-none" style="color: #FF6B35;">
                                Iniciar sesión
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