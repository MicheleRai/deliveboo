@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            <li>Ordine numero: {{$order->id}}</li>
            <li>Nome utente: {{$order->name_user}}</li>
            <li>Email utente: {{$order->email_user}}</li>
            <li>Indirizzo utente: {{$order->address}}</li>
            <li>Note: {{$order->note}}</li>
            <li>Prezzo ordine: {{$order->tot_price}}&euro; </li>
            <li>Effettuato il: {{$order->created_at}}</li>
            <li>
                @if ($order->dishes)
                    Piatti:
                    @foreach ($order->dishes as $item)
                        {{ $item->name }}{{ $loop->last ? '' : ', '}}
                    @endforeach
                @endif
            </li>
        </ul>
    </div>
@endsection
