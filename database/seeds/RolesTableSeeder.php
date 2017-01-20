<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nombre' => 'admin',
            'descripcion' => 'Administrador del sistema',
        ]);
        Role::create([
            'nombre' => 'user',
            'descripcion' => 'Usuario del sistema',
        ]);
        Role::create([
            'nombre' => 'guest',
            'descripcion' => 'Invitado',
        ]);
    }
}
