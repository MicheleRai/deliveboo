@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $dish->name }}</h2>
        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
        <p>{{ $dish->price }}</p>
        <p>{{ $dish->description }}</p>
    </div>
@endsection
