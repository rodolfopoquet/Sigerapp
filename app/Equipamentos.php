<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable = [
        'eqdescricao',
        'marca',
        'modelo',
        'status',
        'codidentificacao',
        'dt_aquisicao',
       
    ];
    protected $table ='equipamentos';


  

    

   
    





}
