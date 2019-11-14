<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaRegion;

class geografica_regions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'        => 'Amazonia',
            'descripcion'   => 'La región está enmarcada por la cordillera de los Andes al occidente y se extiende hacia el oriente hasta las fronteras con Brasil, Perú, Ecuador y Venezuela; de norte a sur se extiende desde los ríos Guaviare y Vichada hasta el Putumayo y el Amazonas',            
        ]);

        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'    	=> 'Andina',
            'descripcion'   => 'Esta región debe su nombre a la cordillera de los Andes, los cuales hacia el norte de Suramérica se dividen en los nudos de Pasto y en el Macizo Colombiano en tres cordilleras llamadas Occidental, Central y Oriental',  
        ]);

        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'        => 'Caribe',
            'descripcion'   => 'Está ubicada en la parte Norte de Colombia. Limita al norte con el mar Caribe, al que debe su nombre, al Oriente con Venezuela, al Sur con la región Andina y al Occidente con la región del Pacífico',  
        ]);

        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'    	 => 'Insular',
            'descripcion'   => 'La región insular de Colombia es el conjunto de las islas, cayos e islotes alejadas de las costas continentales, como son el Archipiélago de San Andrés y Providencia en el mar Caribe y las islas Malpelo y Gorgona en el océano Pacífico',  
        ]);

        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'    	 => 'Orinoquia',
            'descripcion'   => 'Está ubicada al este del país, limitando al norte y este con Venezuela, al sur con Amazonia y al oeste con la región andina. Determinada por la cuenca del río Orinoco, es un ecosistema que se caracteriza por ser una planicie. La región se halla entre los ríos Arauca, Guaviare, Orinoco y el Piedemonte llanero',  
        ]);

        GeograficaRegion::create([
            'estado_id'    	=> '1',
            'nombre'    	=> 'Pacifico',
            'descripcion'   => 'Comprende la totalidad del departamento del Chocó, y las zonas costeras de los departamentos del Valle del Cauca, Cauca y Nariño. Está ubicada en la franja oeste del país, limitando al norte con Panamá, al noreste con la región Caribe, al este con la cordillera Occidental que la separa de la región andina, al sur con Ecuador y al oeste con el océano Pacífico, de donde toma su nombre',  
        ]);
    }
}
