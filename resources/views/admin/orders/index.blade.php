@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($orders as $order)
        <div class="order col-10 rounded-4 m-3 p-3">
            <div class="row">
                <div class="col-3 text-center">
                    <h4>N. ordine</h4>
                    <div>{{ $order->order_id }}</div>
                </div>
                <div class="col-3 text-center">
                    <h4>Indirizzo</h4>
                    <div>{{ $order->address }}</div>
                </div>
                <div class="col-3 text-center">
                    <h4>Orario di Conferma</h4>
                    <div>{{ $order->created_at }}</div>
                </div>
                <div class="col-3 text-center">
                    <h4>N. piatti</h4>
                    <div>{{ $order->numero_piatti }}</div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <a href="{{ route('admin.orders.show', ['order' => $order->order_id ])}}" class="order-button">Dettagli ordine</a>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <h4>Tot Ordine: <span class="euro">&euro; {{ $order->tot_price }}</span></h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
