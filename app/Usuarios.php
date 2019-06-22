<?php

namespace App;
use Illuminate\App\Request;
use Storage;
use DB;

use\Illuminate\Database\Eloquent\Model;

class Usuarios extends Model{
    public $timestamps = false;
    public $fillable = ['nome', 'sobrenome', 'email', 'descricao', 'foto'];
}