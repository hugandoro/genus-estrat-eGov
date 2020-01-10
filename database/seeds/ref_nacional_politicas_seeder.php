<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefNacionalPolitica;

class ref_nacional_politicas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefNacionalPolitica::create([
            'nombre'        => 'Politica nacional de Infancia y adolescencia',
            'descripcion'   => 'La Política Nacional de Infancia y Adolescencia se proyecta en el marco de la materialización de las condiciones humanas, sociales y materiales que permitan el desarrollo integral de las niñas, niños y adolescentes.',
        ]);

        RefNacionalPolitica::create([
            'nombre'        => 'Politica nacional de Habitante de calle',
            'descripcion'   => 'La Política Pública Social para Habitante de la Calle (PPSHC)tiene como objetivo garantizar la promoción, protección y restablecimiento de los derechos de las personas habitantes de la calle en el país, así como su atención integral, rehabilitación e inclusión social.',
        ]);

        RefNacionalPolitica::create([
            'nombre'        => 'Política nacional de Envejecimiento Humano y Vejez',
            'descripcion'   => 'La Política Colombiana de Envejecimiento Humano y Vejez está dirigida a todas las personas residentes en Colombia y en especial, a las personas de 60 años o más. Con énfasis en aquellas en condiciones de desigualdad social, económica, cultural o de género, teniendo presente la referencia permanente al curso de vida. Es una Política Pública, concertada, con el propósito de  visibilizar, movilizar e intervenir la situación del envejecimiento humano y la vejez de las y los colombianos, durante el periodo 2014-2024. ',
        ]);
    }
}
