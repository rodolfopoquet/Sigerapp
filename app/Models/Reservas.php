<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Reservas extends Model
{
    protected $fillable = [
        'fkequipamentos',
        'user_id',
        'dtagendamento',
        'horario'
       

    ];
    protected $table ='reservas';

    public function equipamentos()
    {
        return $this->hasOne('App\Models\Equipamentos', 'id', 'fkequipamentos');
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
