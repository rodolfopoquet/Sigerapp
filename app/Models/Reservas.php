<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Reservas
 * @package App\Models
 */
class Reservas extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = [
        'fkequipamentos',
        'user_id',
        'dtagendamento',
        'horario'
       

    ];
    /**
     * @var string
     */
    protected $table ='reservas';
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipamentos()
    {
        return $this->hasOne('App\Models\Equipamentos', 'id', 'fkequipamentos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->BelongsTo(User::class);
    }
}
