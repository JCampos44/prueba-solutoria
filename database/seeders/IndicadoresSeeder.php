<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class IndicadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withOptions([
            'verify' => false
        ])->post('https://postulaciones.solutoria.cl/api/acceso', [
            'username' => 'jcamposva3ng5_i28@indeedemail.com',
            'flagJson' => true
        ])->json();

        $token = $response['token'];

        $data = Http::withOptions([
            'verify' => false
        ])->withToken($token)->get('https://postulaciones.solutoria.cl/api/indicadores')
            ->json();

        DB::table('indicadores')->insert($data);
    }
}
