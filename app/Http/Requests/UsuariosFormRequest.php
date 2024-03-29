<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=> 'required|min:2',
            'sobrenome'=> 'required',
            'email'=> 'required',
            'descricao'=> 'required',
            'foto'=> 'required|mimes:png,jpeg,gif,jpg'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome precisa possuir 2 caracteres ou mais'
        ];
    }
}
