@extends('layout')

@section('title')
    Itens do Pedido {{ $order->id }}
@endsection

@section('body')
    @if(!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <form action="/order/{{ $order->id }}/orderItems/check">
        @csrf
        <ul class="list-group">
            @foreach ($orderItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Item {{ $item->id }}
                    <input type="checkbox" name="orderItems[]" value="{{ $item->id }}"  {{$item->checked ? 'checked' : ''}}>
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection
