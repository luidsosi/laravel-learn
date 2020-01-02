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
                {{ $order->id }}
{{--                <span class="d-flex">--}}
{{--                <a href="/client/{{ $order->id }}/order" class="btn btn-info btn-sm mr-1">Editar</a>--}}
{{--                <form method="post" action="/client/{{ $order->id }}"--}}
{{--                      onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($order->name) }}?')">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button class="btn btn-danger btn-sm">Excluir</button>--}}
{{--                </form>--}}
{{--                </span>--}}
            </li>
        @endforeach
    </ul>
@endsection
