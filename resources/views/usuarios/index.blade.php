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
    <a href="{{route('form_criar_usuario')}}" class="btn btn-dark mb-2">Adicionar usuário</a>
    <ul class="list-group">
    @foreach ($usuarios as $usuario) 
    <li class="list-group-item d-flex justify-content-between align-itens-center">{{ $usuario->nome .' '. $usuario->sobrenome}}</li>
        <li class="list-group-item d-flex justify-content-between align-itens-center">{{ $usuario->email}}</li>
        <li class="list-group-item d-flex justify-content-between align-itens-center">{{ $usuario->descricao}}</li>
       <img src="{!! asset('storage/app/usuarios'.$usuario->foto) !!}">

       <li>

       <form method = "post" action="/usuarios/editar/{{$usuario->id}}" enctype="multipart/form-data">
            @csrf
            <button class="btn btn-info">Editar</button>
        </form>

        <form method = "post" action="/usuarios/remover/{{$usuario->id}}" onsubmit="return confirm('Tem certeza que deseja excluir o usuário?')" enctype="multipart/form-data">
            @csrf
            <button class="btn btn-danger">Excluir</button>
        </form>
    </li>
    @endforeach
    </ul>
@endsection