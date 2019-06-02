<?php

use Illuminate\Database\Seeder;
use App\Models\Funcoes;
class FuncoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcoes::create(
            [
                'cargo' => 'Administrador',

            ]);
           
            Funcoes::create(  [
                'cargo' => 'Professor',
             
            ]);
            Funcoes::create( 
            [
                'cargo' =>'Recepcionista'
            ]
    );
    }
}
