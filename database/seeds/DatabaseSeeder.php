
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
		$this->call(JornadasTableSeeder::class);
		$this->call(GradosTableSeeder::class);
		$this->call(EtniaTableSeeder::class);
		$this->call(EpsTableSeeder::class);
		$this->call(PrepagadaTableSeeder::class);
		$this->call(ReligionTableSeeder::class);
		$this->call(AseguradoraTableSeeder::class);
		$this->call(SedesTableSeeder::class);
    }
}