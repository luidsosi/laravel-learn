@extends('layout')

@section('title')
    Adicionar Pedido
@endsection

@section('body')
    <a href="/client" class="btn btn-dark mb-2">Listagem</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="idClient">ID do Cliente</label>
            <input type="number" class="form-control" id="idClient" name="idClient" placeholder="idClient">
        </div>
        <div class="form-group">
            <label for="valueTotal">Valor total</label>
            <input type="number" class="form-control" id="valueTotal" name="valueTotal" placeholder="valueTotal">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
