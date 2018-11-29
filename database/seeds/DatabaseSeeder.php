<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
		$this->call(PaisesTableSeeder::class);
    }
}
