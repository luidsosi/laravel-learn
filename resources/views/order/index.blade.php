@extends('layout')

@section('title')
    Pedidos do {{ $client->name }}
@endsection

@section('body')
    @if(!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <a href="/client/create" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach ($orders as $order)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/order/{{ $order->id }}/items">Pedido {{ $order->id }}</a>
                <span class="badge badge-secondary">{{ $order->orderItems->count() }}</span>
            </li>
        @endforeach
    </ul>
@endsection
