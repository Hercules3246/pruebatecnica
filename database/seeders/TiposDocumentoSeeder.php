<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TiposDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposdocumentos')->insert(['id' => 1, 'tipodocumento' => 'Cedula de Ciudadania']);
        DB::table('tiposdocumentos')->insert(['id' => 2, 'tipodocumento' => 'Cedula de Extranjeria']);
        DB::table('tiposdocumentos')->insert(['id' => 3, 'tipodocumento' => 'Tarjeta de Identidad']);
        DB::table('tiposdocumentos')->insert(['id' => 4, 'tipodocumento' => 'Pasaporte']);
    }
}
