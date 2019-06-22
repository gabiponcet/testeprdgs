<?php

namespace App\Http\Controllers;
use App\Usuarios;
use Illuminate\Http\Request;  
use App\Http\Requests\UsuariosFormRequest;

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

    public function store(UsuariosFormRequest $request){
        
        $usuario = new Usuarios;
        $usuario->nome=$request->nome;
        $usuario->sobrenome=$request->sobrenome;
        $usuario->email=$request->email;
        $usuario->descricao=$request->descricao;
        $nome=uniqid(date('HisYmd')); 
        $extensao = $request->foto->extension();
        $nomeArquivo = "{$nome}.{$extensao}";
        //upload da img
        $upload = $request->foto->storeAs('usuarios',$nomeArquivo);
        $usuario->foto=$upload;
        //salva td do objeto usuario
        $usuario->save();
        
        // $usuario = Usuarios::create($request->all());
        // $request->session()->flash('mensagem', "Usuário {$usuario->nome} cadastrado com sucesso!");
        return redirect()->route('usuarios.index');
    
    }

    public function destroy(Request $request){
        Usuarios::destroy($request->id);
        $request->session()->flash('mensagem', "Usuário removido com sucesso!");
        return redirect()->route('usuarios.index');
    }

    public function edit($id){
        // $usuario = usuarios::find($id);
        // $titulo = "Editar Usuário: {$usuario->nome}";
        // $campos = ['nome', 'sobrenome', 'email', 'descricao', 'foto'];
        // return view('usuarios.create', compact('usuario', 'titulo', 'campos'));
        
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
        
    }

    public function update(UsuariosFormRequest $request, $id){
        $usuario = Usuarios::findOrFail($id);
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->email = $request->email;
        $usuario->descricao = $request->descricao;
        if($request->hasFile('foto')){
            //Storage::delete($usuario->foto);
            $nome = uniqid(date('HisYmd'));
            $extensao = $request->foto->extension();
            $nomeArquivo = "{$nome}.{$extensao}";
            $upload = $request->foto->storeAs('usuarios', $nomeArquivo);
            $usuario->foto = $upload;
        }
        $usuario->update();
        return redirect()->route('usuarios.index');
        
        //AQUI
        // $dataForm = $request->all();
        // $usuario = $this->usuario->find($id);
        // $update = $usuario->update($dataForm);

       
        // if($update){
        //     return redirect()->route('usuarios.index');
        // }
        // else{
        //     return redirect()->route('usuarios.edit', $id->with(['errors'=> 'Falha ao editar']));
        // }

    }

}

