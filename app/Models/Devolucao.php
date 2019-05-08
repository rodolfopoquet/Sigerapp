<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucao extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'fkreservas',
        'fk_id',
        'user_id',
        'obs',
        'datadev',
        'horadev',
      ];
    protected $table ='devolucao';
    protected $dates = ['deleted_at'];
    public function reservas()
    {
        return $this->hasOne('App\Models\Reservas', 'id', 'fkreservas');
    }
    public function equipamentos()
    {
        return $this->hasOne('App\Models\Equipamentos', 'id', 'fkequipamentos');
    }
    

    public function user(){
        return $this->BelongsTo(User::class);
    }
    
}
