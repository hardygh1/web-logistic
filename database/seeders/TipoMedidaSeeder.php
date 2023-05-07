<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_medida')->insert([
            'name' => 'Pulgadas',
            'abreviatura' => 'in',
            'status'=>1
        ]);
        DB::table('tipo_medida')->insert([
            'name' => 'Centímetros',
            'abreviatura' => 'cm',
            'status'=>1
        ]);
    }
}
