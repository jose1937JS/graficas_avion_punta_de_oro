<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name'    => 'administrador',
        	'slug'    => 'administrador',
        	'special' => 'all-access'
        ]);
        Role::create([
        	'name'    => 'encargado',
        	'slug'    => 'encargado',
        ]);
    }
}
