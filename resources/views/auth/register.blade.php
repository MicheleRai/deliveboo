@extends('layouts.app')

@section('content')
<div class="container">
    {{-- parte mia --}}
    <div class="d-flex flex-column align-items-center p-3">
        <div class="col-10 my-5 text-center">
            <h1>Ciao!</h1>
            <h3>Unisciti alla nostra famiglia</h3>
        </div>
        <div class="col-10">
            <div class="tasti d-flex" style="position: relative; left: 1rem;">
                <a href="{{ route('login') }}" class="rounded-top p-3 w-25 bg-white border border-bottom-0 ms-1" style="text-decoration: none; color: black;">{{ __('Login') }}</a>
                <div class="rounded-top p-3 w-25 ms-1" style="background-color: #f5f5f5;">{{ __('Register') }}</div>
            </div>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="rounded-4 p-5" style="background-color: #f5f5f5;">
                @csrf

                <div class="elemento">
                    <label for="name" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('Nome Ristorante') }}</label>

                    <input id="name" type="text" class="form-control bg-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="address" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('Indirizzo') }}</label>

                    <input id="address" type="text" class="form-control bg-white @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="vat_number" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('P.iva') }}</label>

                    <input id="vat_number" type="text" class="form-control bg-white @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                    @error('vat_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="email" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('E-mail') }}</label>

                    <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="password" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control bg-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="elemento">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right fs-5 fw-bold">{{ __('Conferma Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control bg-white" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="elemento-7 d-flex align-items-center my-3">
                    <div class="d-flex flex-column align-items-center me-5 logo-itm">
                        <label for="logo_image" class="col-form-label text-md-right fs-5 fw-bold">{{ __('Logo') }}</label>

                        <input id="logo_image" type="file" class="form-control bg-white @error('logo_image') is-invalid @enderror" name="logo_image" value="{{ old('logo_image') }}" autocomplete="logo_image">

                        @error('logo_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column align-items-center ms-5 cover-itm">
                        <label for="cover_image" class="col-form-label text-md-right fs-5 fw-bold">{{ __('Immagine di copertina') }}</label>

                        <input id="cover_image" type="file" class="form-control bg-white @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image">

                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="elemento">
                    <div class="cats">
                        <label for="category" class="col-form-label text-md-right fs-5 fw-bold">{{ __('Seleziona categorie') }}</label>

                        <div id="category" class="position-relative">
                            @foreach ($categories as $category)
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                        id="category-{{ $category->name }}" value="{{ $category->id }}" @if (in_array($category->id, old('categories',[]))) checked @endif>
                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                            @if ($errors->has('categories') || $errors->has('categories.*'))
                                <div class="text-danger border border-danger p-1 mt-3">
                                    Errore con le categorie selezionati
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bot my-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrami') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
