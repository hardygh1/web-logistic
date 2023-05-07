<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_peso')->insert([
            'name' => 'libra',
            'abreviatura' => 'lb',
            'status'=>1
        ]);
        DB::table('tipo_peso')->insert([
            'name' => 'kilogramo',
            'abreviatura' => 'kg',
            'status'=>1
        ]);
    }
}
