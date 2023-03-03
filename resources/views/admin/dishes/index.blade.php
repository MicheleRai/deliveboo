@extends('layouts.app')

@section('content')
{{-- @if ($dishes->user_id === Auth::user()->id) --}}
{{-- (Auth::has('id', $user_id)) --}}

<div class="cards-container">
    @foreach ($dishes as $dish)
        <div class="rounded-4 mycard">
            <div class="dish-img-container rounded-4"><img src="{{ asset($dish->image ? 'storage/' . $dish->image : 'storage/placeholder.jpeg') }}" alt="img" class="rounded-4 dish-img"></div>
            <div class="dish-name">{{ $dish->name }}</div>
            <div class="dish-info">{{ $dish->description }}</div>
            <div class="dish-price"><span style="color: #00ccbb ;">&euro;</span> {{ $dish->price }}</div>
            @if ($dish->visible == 1)
                <div class="available"><span class="yes-av">Piatto disponibile</span></div>
                @else
                <div class="available"><span class="no-av">Piatto non disponibile</span></div>
            @endif
            <div class="dish-button-container">
                <a class="btn dish-button" href="{{ route('admin.dishes.show', ['dish'=>$dish]) }}">Visualizza</a>
                <a class="btn dish-button" href="{{ route('admin.dishes.edit', ['dish'=>$dish]) }}">Modifica</a>
                <form action="{{ route('admin.dishes.destroy', ['dish'=>$dish])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn dish-button delete-button" data-id="{{ $dish->id }}">Elimina</button>
                </form>
            </div>
        </div>
    @endforeach

</div>
@endsection
