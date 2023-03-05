@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($orders as $order)
        <div class="order col-10 rounded-4 m-3 p-3">
            <div class="row">
                <div class="col-4 text-center order-info">
                    <h4>N. ordine</h4>
                    <div class="fs-2 mt-3">{{ $order->order_id }}</div>
                </div>
                <div class="col-4 text-center order-info">
                    <h4>Indirizzo</h4>
                    <div>{{ $order->address }}</div>
                </div>
                <div class="col-4 text-center order-info">
                    <h4>Orario di Conferma</h4>
                    <div>{{ $order->created_at }}</div>
                </div>
            </div>
            <div class="row justify-content-center mt-2 order-dit">
                <div class="col-11 d-flex align-items-center justify-content-center order-bot">
                    <a href="{{ route('admin.orders.show', ['order' => $order->order_id ])}}" class="order-button">Dettagli ordine</a>
                </div>
                <div class="col-11 d-flex align-items-center justify-content-center order-bot">
                    <h4>Tot Ordine: <span class="euro">&euro; {{ $order->tot_price }}</span></h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
