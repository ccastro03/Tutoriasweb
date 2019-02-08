<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin';
        $user->password = bcrypt('secret');
        $user->estado = 1;
		$user->cod_rol = '01';
        $user->save();

        $user = new User();
        $user->name = 'Secretaria';
        $user->email = 'secre';
        $user->password = bcrypt('secret');
        $user->estado = 1;
		$user->cod_rol = '02';
        $user->save();
    }
}
