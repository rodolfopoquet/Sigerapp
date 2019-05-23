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
           
             
            
      ];


      public function equipamentos()
      {
          return $this->hasOne(Equipamentos::class, 'id', 'fkequipamentos');
      }
      
      public function reservas()
      {
          return $this->hasOne(Reservas::class, 'id', 'fkreservas');
      }
           

      public function user(){
       return $this->BelongsTo(User::class);
      }



    }

