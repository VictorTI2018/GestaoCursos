<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {


    protected $fillable = [
        'nome', 'descricao', 'duracao_curso', 'qtd_aulas', 
        'links', 'titulo_link', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}