@extends('layouts.app')

@section('content')
{{-- @if ($dishes->user_id === Auth::user()->id) --}}
{{-- (Auth::has('id', $user_id)) --}}

<div class="container row row-cols-3 m-auto">
    @foreach ($dishes as $dish)
        <div class="card">
            <img src="{{ $dish->image }}" alt="img">
            <h2>{{ $dish->name }}</h2>
            <div>{{ $dish->price }}</div>
            @if ($dish->visible == 1)
                piatto disponibile
                @else
                piatto non disponibile
            @endif
            <a class="btn btn-primary" href="{{ route('admin.dishes.show', ['dish'=>$dish]) }}">Visualizza</a>
            <a class="btn btn-warning" href="{{ route('admin.dishes.edit', ['dish'=>$dish]) }}">Modifica</a>
            <form action="{{ route('admin.dishes.destroy', ['dish'=>$dish])}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger col-12" data-id="{{ $dish->id }}">Elimina</button>
            </form>
        </div>
    @endforeach

</div>
{{-- @else --}}
    <div class="div">
        <h1>Non hai accesso a questa sezione!</h1>
    </div>
{{-- @endif --}}
@endsection
