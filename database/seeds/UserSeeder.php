<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Administrador',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'), // admin
        ]);
        $encargado = User::create([
            'name' => 'encargado',
            'email' => 'encargado@encargado.com',
            'password' => bcrypt('encargado'), // encargado
        ]);

        $admin->assignRole('administrador');
        $encargado->assignRole('encargado');
    }
}
