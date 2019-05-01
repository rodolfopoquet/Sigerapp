<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\ManutencoesController;
use App\Models\User;

class Manutencoes extends Model
{
    protected $fillable = [
       
        'descricaoproblema',
           'data',
           'fkequipamentos',
             
            
      ];
}
