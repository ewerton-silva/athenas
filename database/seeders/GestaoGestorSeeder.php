<?php

namespace Database\Seeders;

use App\Models\GestaoGestor;
use Illuminate\Database\Seeder;

class GestaoGestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GestaoGestor::create([
            'razao_social'   => 'sistema',
            'email'=>"",
            'password'=>bcrypt(""),
        ]);

    }
}
