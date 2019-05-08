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
           'user_id',
           'status',
           'solucao',
           'dataencerramento'
             
            
      ];


      public function equipamentos()
      {
          return $this->hasOne('App\Models\Equipamentos', 'id', 'fkequipamentos');
      }
      
      public function reservas()
      {
          return $this->hasOne('App\Models\Reservas', 'id', 'fkreservas');
      }
           

      public function user(){
       return $this->BelongsTo(User::class);
      }



    }

