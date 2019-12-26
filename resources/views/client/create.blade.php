@extends('layout')

@section('title')
    Clientes
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
        <div class="row">
            <div class="col col-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="col col-3">
                <label for="qtd_pedidos">N° de pedidos</label>
                <input type="text" class="form-control" id="qtd_pedidos" name="qtd_pedidos" placeholder="qtd_pedidos">
            </div>
            <div class="col col-3">
                <label for="qtd_itens_pedido">N° de itens por pedidos</label>
                <input type="text" class="form-control" id="qtd_itens_pedido" name="qtd_itens_pedido" placeholder="qtd_itens_pedido">
            </div>
        </div>
        <button class="btn btn-primary mt-3">Adicionar</button>
    </form>
@endsection
