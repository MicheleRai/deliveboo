@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $dish->name }}</h2>
        <img src="{{ asset($dish->image ? 'storage/' . $dish->image : 'storage/placeholder.jpeg') }}" alt="{{ $dish->name }}">
        <p>{{ $dish->price }}</p>
        <p>{{ $dish->description }}</p>
    </div>
@endsection
