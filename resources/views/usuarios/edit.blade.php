@extends('layout')

@section('cabecalho')
Editar cadastro
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
    <form method="post" enctype="multipart/form-data"  action="{{route('usuarios.update', $usuario->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT') }}
        <div class="form-group">
            <label for="nome">Nome:</label><input type="text" class="form-control" name="nome" value="{{$usuario->nome}}">
            <label for="sobrenome">Sobrenome:</label><input type="text" class="form-control" name="sobrenome" value="{{$usuario->sobrenome}}">
            <label for="email">Email:</label><input type="email" class="form-control" name="email" value="{{$usuario->email}}">
            <label for="descricao">Descreva suas habilidades profissionais:</label><textarea class="form-control" name="descricao" rows="10"><?php echo $usuario  ['descricao'];?></textarea>
            <label for="foto">Foto:</label><input type="file" name="foto" class="form-control" accept=".gif,.jpg,.png" data-toggle="tooltip" data-placement="top"  value="{{$usuario->foto}}">
            <br>
            <button class="btn btn-primary">Editar</button>
        </div>
    </form>
@endsection