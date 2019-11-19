<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(geografica_estados_seeder::class);
        $this->call(geografica_regions_seeder::class);
        $this->call(geografica_departamentos_seeder::class);
        $this->call(geografica_categoria_municipals_seeder::class);
        $this->call(geografica_municipios_seeder::class);
        $this->call(geografica_comunas_seeder::class);
        $this->call(geografica_corregimientos_seeder::class);
        $this->call(geografica_barrios_seeder::class);
        $this->call(geografica_veredas_seeder::class);

        $this->call(entidad_ordens_seeder::class);
        $this->call(entidad_tipos_seeder::class);
        $this->call(entidad_tipo_oficinas_seeder::class);
        $this->call(entidad_categorias_seeder::class);
        $this->call(entidad_sectors_seeder::class);
    }
}
