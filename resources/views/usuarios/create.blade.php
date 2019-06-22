@extends('layout')

@section('cabecalho')
Adicionar usuário
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="" method="post" enctype="multipart/form-data">
    @csrf <!-- token de verificação -->
        <div class="form-group">
            <label for="nome">Nome:</label><input type="text" class="form-control" name="nome" >
            <label for="sobrenome">Sobrenome:</label><input type="text" class="form-control" name="sobrenome">
            <label for="email">Email:</label><input type="email" class="form-control" name="email" placeholder="email@email.com">
            <label for="descricao">Descreva suas habilidades profissionais:</label><input type="text" class="form-control" name="descricao">
            <label for="foto">Foto:</label><input type="file" name="foto" class="form-control" accept=".gif,.jpg,.png" data-toggle="tooltip" data-placement="top" required>
            <br>
            <button class="btn btn-primary">Adicionar</button>
        </div>
    </form>
@endsection