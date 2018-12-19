
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
		$this->call(RolesTableSeeder::class);
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
		$this->call(GenerosTableSeeder::class);
		$this->call(EspecialidadesTableSeeder::class);
		$this->call(ProfesionesTableSeeder::class);
		$this->call(TipoDocumentosTableSeeder::class);
		$this->call(EstCivilTableSeeder::class);
		$this->call(CiudadesTableSeeder::class);
    }
}