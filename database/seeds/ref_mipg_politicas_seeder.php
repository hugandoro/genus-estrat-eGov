<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefMipgPolitica;

class ref_mipg_politicas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefMipgPolitica::create([
            'nombre'        => 'Política de Gestión Estratégica del Talento Humano GETH',
            'dimension'     => 'Talento humano',
            'logo'          => 'mipg_dimension_1.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Integridad',
            'dimension'     => 'Talento humano',
            'logo'          => 'mipg_dimension_1.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Planeación Institucional',
            'dimension'     => 'Direccionamiento estratégico y planeacion',
            'logo'          => 'mipg_dimension_2.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Gestion Presupuestal y Eficiencia del Gasto Público',
            'dimension'     => 'Direccionamiento estratégico y planeacion',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política Gobierno Digital',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política Seguridad Digital',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Defensa Juridica',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Servicio al ciudadano',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Racionalizacion de Tramites',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Participacion Ciudadana en la Gestion Publica',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de fortalecimiento organizacional y simplicación de procesos',
            'dimension'     => 'Gestión con valores para resultados',
            'logo'          => 'mipg_dimension_3.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Seguimiento y Evaluación del Desempeño Institucional',
            'dimension'     => 'Evaluación de resultados',
            'logo'          => 'mipg_dimension_4.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Gestión Documental',
            'dimension'     => 'Información y comunicación',
            'logo'          => 'mipg_dimension_5.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Transparencia, acceso a la información pública y lucha contra la corrupción',
            'dimension'     => 'Información y comunicación',
            'logo'          => 'mipg_dimension_5.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Gestión del Conocimiento y la Innovación',
            'dimension'     => 'Gestión del conocimiento y la innovación',
            'logo'          => 'mipg_dimension_6.png',        
        ]);

        RefMipgPolitica::create([
            'nombre'        => 'Política de Control Interno',
            'dimension'     => 'Control interno',
            'logo'          => 'mipg_dimension_7.png',        
        ]);


    }
}
