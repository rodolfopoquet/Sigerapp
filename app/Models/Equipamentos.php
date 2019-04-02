<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipamentos
 * @package App\Models
 */
class Equipamentos extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = [
        'eqdescricao',
        'marca',
        'modelo',
        'status',
        'codidentificacao',
        'dt_aquisicao',
       
    ];
    /**
     * @var string
     */
    protected $table ='equipamentos';
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */
    public function scopeDisponivel($query, $status=true)
    {
        return $query->where('status', $status ? 'Disponível' : 'Indisponível');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reserva()
    {
        return $this->hasOne(Reservas::class,'fkequipamentos', 'id');
    }

}
