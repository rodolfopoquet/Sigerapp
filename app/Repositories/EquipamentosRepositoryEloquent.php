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
    
    
    public function  all()
    {
        
        return $this->equipamentos->orderBy('eqdescricao','ASC')->get();
        

    }

    public function delete()
    {
     
        return $this->equipamentos->delete();
     

    }
   
   public function save()
   {
       return $this->save();
   }
}

