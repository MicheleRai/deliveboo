@extends('layouts.app')

@section('content')

<div class="container row row-cols-3 m-auto">
    @foreach ($dishes as $dish)
        <div class="card">
            <img src="{{ $dish->image }}" alt="img">
            <h2>{{ $dish->name }}</h2>
            <div>{{ $dish->price }}</div>
            <a class="btn btn-primary" href="{{ route('admin.dishes.show', ['dish'=>$dish]) }}">Visualizza</a>
            <a class="btn btn-warning" href="{{ route('admin.dishes.edit', ['dish'=>$dish]) }}">Modifica</a>
            <form action="{{ route('admin.dishes.destroy', ['dish'=>$dish])}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" data-id="{{ $dish->id }}">Elimina</button>
            </form>
        </div>
    @endforeach

</div>
@endsection
