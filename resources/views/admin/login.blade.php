

@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        @if(session('passwordResetSuccess'))
                        <div class="alert alert-success" role="alert">
                            {{ session('passwordResetSuccess') }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="form-group">
                                <label for="remember">Remember me</label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>
                        </form>
                        <div> New here? please <a class = "btn btn-link" href="{{ route('admin.register') }}">register</a></div>

                        @if (Route::has('forget.password.get'))
                        <a class="btn btn-click" href="{{ route('forget.password.get') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
Login
@endsection

@push('login-style')
    <!-- Add this line to include the CSS file -->
    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
@endpush
