@extends('layouts.app')

@section('content')
<div>
    <div class="cover-container ">
        <img src="{{ asset('storage/' . Auth::user()->cover_image) }}" alt="img" class="cover">
    </div>
    <div class="logo-box">
        <div class="logo-container">
        <img class="logo" src="{{ asset('storage/' . Auth::user()->logo_image) }}" alt="img">
        </div>
    </div>
    <div class="text-center">
        <h1 class="restaurant-name">{{ Auth::user()->name }}</h1>
        <div class="restaurant-address">{{Auth::user()->address}}</div>
        <div class="restaurant-address">P. IVA: {{Auth::user()->vat_number}}</div>
        <div class="tags-container d-flex justify-content-center">
            @foreach ($categories as $category)
                <div class="tag-restaurant">
                        {{ $category->name }}
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
