<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TransportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transportes')->insert([
            'name' => 'Aéreo',
            'abreviatura' => 'áreo',
            'status'=>1
        ]);
        DB::table('transportes')->insert([
            'name' => 'Marítimo',
            'abreviatura' => 'maritimo',
            'status'=>1
        ]);
    }
}
