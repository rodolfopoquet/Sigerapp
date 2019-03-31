<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservas extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'fkequipamentos',
        'user_id',
        'dtagendamento',
        'horario'
       

    ];
    protected $table ='reservas';
    protected $dates = ['deleted_at'];

    public function equipamentos()
    {
        return $this->hasOne('App\Models\Equipamentos', 'id', 'fkequipamentos');
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
