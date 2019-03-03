<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
    protected $fillable = [
        'fkreservas',
        'fk_id',
        'user_id',
        'obs',
        'datadev',
        'horadev',

        
        
    ];
    protected $table ='devolucao';

    public function reservas()
    {
        return $this->hasOne('App\Models\Reservas', 'id', 'fkreservas');
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }

}
