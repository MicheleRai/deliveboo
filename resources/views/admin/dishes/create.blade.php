@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.dishes.store') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                <div class="invalid-feedback">
                    @error('name')
                        <ul>
                            @foreach ($errors->get('name') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo:</label>
                <input type="number" step="any" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                <div class="invalid-feedback">
                    @error('price')
                        <ul>
                            @foreach ($errors->get('price') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione piatto</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    @error('description')
                        <ul>
                            @foreach ($errors->get('description') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL immagine</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                <div class="invalid-feedback">
                    @error('image')
                        <ul>
                            @foreach ($errors->get('image') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div>
            {{-- <div class="mb-3">
                <label for="uploaded_img" class="form-label">Immagine</label>
                <input class="form-control @error('uploaded_img') is-invalid @enderror" type="file" id="uploaded_img" name="uploaded_img">
                <div class="invalid-feedback">
                    @error('uploaded_img')
                        <ul>
                            @foreach ($errors->get('uploaded_img') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
            </div> --}}
            <div class="mb-3 form-check">
                <label class="form-check-label" for="visible">Rendi piatto disponibile</label>
                <input type="checkbox" class="form-check-input" id="visible" name="visible" value="{{ isset($dish) }}"/>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Aggiungi piatto</button>
            </div>
        </form>
    </div>
@endsection
