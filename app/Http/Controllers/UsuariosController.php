<?php

namespace App\Http\Controllers;
use App\Usuarios;
use Illuminate\Http\Request; 

class UsuariosController extends Controller
{
    public function index(Request $request){
        $usuarios = Usuarios::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        
        return view('usuarios.index', compact('usuarios', 'mensagem'));
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        $usuario = Usuarios::create($request->all());
        $request->session()->flash('mensagem', "Usuário {$usuario->nome} cadastrado com sucesso!");
        return redirect()->route('usuarios.index');
    }

    public function destroy(Request $request){
        Usuarios::destroy($request->id);
        $request->session()->flash('mensagem', "Usuário removido com sucesso!");
        return redirect()->route('usuarios.index');
    }
}

