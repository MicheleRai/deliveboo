@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $dish->name }}</h1>
        <img src="{{ asset($dish->image ? 'storage/' . $dish->image : 'storage/placeholder.jpeg') }}" alt="{{ $dish->name }}" class="show-dish-img rounded-4">
        <h2>{{ $dish->description }}</h2>
        <h2><span style="color: #00ccbb;">&euro;</span> {{ $dish->price }} </h2>

    </div>
@endsection
