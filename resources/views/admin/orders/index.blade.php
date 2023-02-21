@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numero ordine</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Orario</th>
                <th scope="col">Prezzo totale</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->order_id }}</th>
                <th scope="row">{{ $order->address }}</th>
                <th scope="row">{{ $order->created_at }}</th>
                <th scope="row">&euro;{{ $order->tot_price }}</th>
                    <td>
                        <a href="{{ route('admin.orders.show', ['order' => $order->order_id ])}}" class="btn btn-primary">Dettagli ordine</a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
