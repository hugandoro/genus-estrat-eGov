<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaDepartamento;

class geografica_departamentos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //REGION AMAZONAS

        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Amazonas',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Guania',
        ]);
        
        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Guaviare',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Vaupes',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Caqueta',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '1',
            'nombre'    	=> 'Putumayo',
        ]);
        
        //REGION ANDINA

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Bogota',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Boyaca',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Caldas',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Cundinamarca',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Huila',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Norte de Santander',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Quindio',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Risaralda',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Santander',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Tolima',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Antioquia',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '2',
            'nombre'    	=> 'Cauca',
        ]);

        //REGION CARIBE

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Atlantico',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Bolivar',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Cordoba',
        ]);
        
        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'La Guajira',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Magdalena',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Sucre',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '3',
            'nombre'    	=> 'Cesar',
        ]);

        //REGION INSULAR

        GeograficaDepartamento::create([
            'region_id'    	=> '4',
            'nombre'    	=> 'San Andres y Providencia',
        ]);

        //REGION ORINOQUIA

        GeograficaDepartamento::create([
            'region_id'    	=> '5',
            'nombre'    	=> 'Arauca',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '5',
            'nombre'    	=> 'Casanare',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '5',
            'nombre'    	=> 'Vichada',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '5',
            'nombre'    	=> 'Meta',
        ]);

        //REGION PACIFICO

        GeograficaDepartamento::create([
            'region_id'    	=> '6',
            'nombre'    	=> 'Nariño',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '6',
            'nombre'    	=> 'Valle del Cauca',
        ]);

        GeograficaDepartamento::create([
            'region_id'    	=> '6',
            'nombre'    	=> 'Choco',
        ]);

    }
}
