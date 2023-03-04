@extends('layouts.app')

@section('content')
<div class="container">
    {{-- parte mia --}}
    <div class="d-flex flex-column align-items-center p-3">
        <div class="col-10 my-5 text-center">
            <h1>Ciao!</h1>
            <h3>Siamo felici di rivederti</h3>
        </div>
        <div class="col-10">
            <div class="tasti d-flex" style="position: relative; left: 1rem;">
                <div class="p-2 rounded-top p-3 w-25" style="background-color: #f5f5f5;">{{ __('Login') }}</div>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="p-2 rounded-top bg-white p-3 w-25 border border-bottom-0 ms-1" style="text-decoration: none; color: black;">{{ __('Register') }}</a>
                @endif
            </div>
            <form method="POST" action="{{ route('login') }}" class="rounded-4 p-5" style="background-color: #f5f5f5;">
                @csrf

                <div class="elemento">
                    <label for="email" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="password" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control bg-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento my-3 d-flex align-items-center">
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary mx-2">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-outline-dark mx-2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
