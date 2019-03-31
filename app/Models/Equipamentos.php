<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipamentos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'eqdescricao',
        'marca',
        'modelo',
        'status',
        'codidentificacao',
        'dt_aquisicao',
       
    ];
    protected $table ='equipamentos';
    protected $dates = ['deleted_at'];


  

    

   
    





}
