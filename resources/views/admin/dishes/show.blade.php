@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $dish->name }}</h2>
        <img src="{{ $dish->image }}" alt="cazzo">
        <p>{{ $dish->price }}</p>
        <p>{{ $dish->description }}</p>
    </div>
@endsection
