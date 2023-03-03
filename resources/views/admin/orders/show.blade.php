@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 order-show rounded-4 mt-4">
                <div class="row h-100 p-2">
                    <div class="col-6 lh-lg">
                        <div class="fs-4">Ordine n. : <span class="fs-5 text-secondary">{{$order->id}}</span></div>
                        <div class="fs-4">Da parte di: <span class="fs-5 text-secondary">{{$order->name_user}}</span></div>
                        <div class="fs-4">Email utente: <span class="fs-5 text-secondary">{{$order->email_user}}</span></div>
                        <div class="fs-4">Indirizzo: <span class="fs-5 text-secondary">{{$order->address}}</span></div>
                        <div class="fs-4">Effettuato il: <span class="fs-5 text-secondary">{{$order->created_at}}</span></div>
                    </div>
                    <div class="col-6 lh-base p-2">
                        <h4>Piatti ordinati</h4>
                        @if ($order->dishes)
                            @foreach ($order->dishes as $item)
                                <div class="d-flex align-items-center my-3"><img src="{{ asset($item->image ? 'storage/' . $item->image : 'storage/placeholder.jpeg') }}" alt="piatto" style="width: 50px; height: 50px; object-fit: cover;"><span class="mx-2 fs-5">{{ $item->name }}</span></div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
