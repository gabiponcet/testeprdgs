<?php

namespace App;

use\Illuminate\Database\Eloquent\Model;

class Usuarios extends Model{
    public $timestamps = false;
    public $fillable = ['nome', 'sobrenome', 'email', 'descricao', 'foto'];
}