<?php


namespace App\Repositories;
use App\Models\Reservas;
use App\Models\Equipamentos;
use App\Repositories\Contracts\ReservasRepositoryInterface;

use Illuminate\Http\Request;

class ReservasRepositoryEloquent implements ReservasRepositoryInterface

{
     public  function __construct(Reservas $reservas)

    {
        $this->reservas=$reservas;

    }
    
    
     public function  getAll()
   {
        
        return $this->reservas->orderBy('id', 'DESC')->has('equipamentos')->get();
        
   }

     public function  getTodos()
   {
      return $this->reservas->all();
   }

     public function getById($id)
   {
        return  $this->reservas->find($id);

   }
    
     public function create(array $attributes)
     {

        return $this->reservas->create($attributes);
     }

    
     
     public function delete($id)
     {
        $this->getById($id)->delete();
        return true;

     }

     
    

        
   
}

