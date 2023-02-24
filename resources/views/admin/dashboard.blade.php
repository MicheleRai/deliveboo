@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="sfondo col-12 m-auto text-light py-5">IMMAGINE DI COPERTINA!!!!</div>
    <div class="col-10 m-auto">
        <img src="{{ Auth::user()->logo_image }}" alt="img">
        <h2>{{ Auth::user()->name }}</h2>
        <div>{{Auth::user()->address}}</div>
        <div>{{Auth::user()->vat_number}}</div>
        @foreach ($categories as $category)
            <div class>
                    {{ $category->name }}
            </div>
        @endforeach
    </div>

</div>

@endsection
