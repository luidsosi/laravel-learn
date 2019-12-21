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
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
