@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Numero ordine</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $order->order_id }}</th>
                <td>
                    <a href="{{ route('admin.orders.show', ['order' => $order->order_id ])}}" class="btn btn-primary">Dettagli ordine</a>
                </td>
            </tr>
        @endforeach
</div>
@endsection
