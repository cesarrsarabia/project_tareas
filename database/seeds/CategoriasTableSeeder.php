<?php

use Illuminate\Support\Facades\DB;
use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Personal'
        ]);
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Escuela'
        ]);
        /*
        Categoria::create([
            'nombre_categoria' => 'Trabajo'
        ]);*/
        
    }
}
