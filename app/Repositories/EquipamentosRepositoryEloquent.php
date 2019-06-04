<?php


namespace App\Repositories;
use App\Models\Equipamentos;
use App\Repositories\Contracts\EquipamentosRepositoryInterface;
use Illuminate\Http\Request;

class EquipamentosRepositoryEloquent implements EquipamentosRepositoryInterface

{
    public  function __construct(Equipamentos $equipamentos)

    {
        $this->equipamentos=$equipamentos;

    }
    
    
    public function  getAll()
    {
        
        return $this->equipamentos->orderBy('eqdescricao','ASC')->get();
        

    }

     public function getById($id)
     {
        return  $this->equipamentos->find($id);

     }
    
     public function create(array $attributes)
     {

        return $this->equipamentos->create($attributes);
     }

     public function update($id, array $attributes)
     {
         $equipamentos=$this->findOrFails($id);
         $equipamentos->update($attributes);
         return $equiapamentos;

     }
     
     public function delete($id)
     {
        $this->getById($id)->delete();
        return true;

     }

     public function getWithStatus($id)
     {
        return $this->equipamentos->whereStatus('Disponível')->find($id);
     }
    
    

        
   
}

