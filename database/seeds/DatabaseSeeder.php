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

        $this->call(entidads_seeder::class);
        $this->call(entidad_oficinas_seeder::class);

        $this->call(general_estados_seeder::class);
        $this->call(general_vigencias_seeder::class);
        $this->call(general_sexos_seeder::class);
        $this->call(general_poblacions_seeder::class);
        $this->call(general_zonas_seeder::class);

        $this->call(medicion_tipos_seeder::class);
        $this->call(medicion_medidas_seeder::class);

        $this->call(contable_categoria_conceptos_seeder::class);
        $this->call(contable_conceptos_seeder::class);
        $this->call(contable_fuente_recursos_seeder::class);

        $this->call(ref_ods_objetivos_seeder::class);
        $this->call(ref_nacional_politicas_seeder::class);
        $this->call(ref_departamental_politicas_seeder::class);
        $this->call(ref_municipal_politicas_seeder::class);

        $this->call(fiscal_marcos_seeder::class);
        $this->call(fiscal_marco_conceptos_seeder::class);
    }
}
