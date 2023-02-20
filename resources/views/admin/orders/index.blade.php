@extends('layouts.app')

@section('content')
@foreach ($orders as $order)
<div class="card">
    <h2>Ordine numero: {{ $order->id }}</h2>
    <div>{{ $order->tot_price }}</div>
</div>
@endforeach
@endsection
