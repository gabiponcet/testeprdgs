@extends('layout')

@section('cabecalho')
Usuários
@endsection

@section('conteudo')
    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
    @endif
    <a href="/usuarios/criar" class="btn btn-dark mb-2">Adicionar usuário</a>
    <ul class="list-group">
    @foreach ($usuarios as $usuario) 
        <li class="list-group-item">{{ $usuario->nome .' '. $usuario->sobrenome}}</li>
        <li class="list-group-item">{{ $usuario->email}}</li>
        <li class="list-group-item">{{ $usuario->descricao}}</li>
        <li class="list-group-item">{{ $usuario->foto}}</li>
        <form method = "post" action="/usuarios/remover/{{$usuario->id}}">
        @csrf
            <button class="btn btn-danger">Excluir</button>
        </form>
    @endforeach
    </ul>
@endsection