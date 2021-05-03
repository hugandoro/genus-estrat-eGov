<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario con permisos de edicion GENERAL - MODO DIOS
        $role = new Role();
        $role->nombre = 'super';
        $role->descripcion = 'Super Administrador';
        $role->save();

        //Usuario con permisos de consulta COMPLETA GENERAL
        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrador';
        $role->save();

        //Usuario con permisos de reporte y edicion SECRETARIA
        $role = new Role();
        $role->nombre = 'editor';
        $role->descripcion = 'Enlace de reporte por Secretaria o Dependencia';
        $role->save();

        //Usuario con permisos de consulta SECRETARIA
        $role = new Role();
        $role->nombre = 'supervisor';
        $role->descripcion = 'Enlace de consulta por Secretaria o Dependencia';
        $role->save();

        //Usuario externo para consulta BASICA GENERAL
        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'Usuario externo para consulta basica general';
        $role->save();

        //Usuario MIPG con permisos de reporte y edicion SECRETARIA
        $role = new Role();
        $role->nombre = 'editorMipg';
        $role->descripcion = 'Enlace de reporte MIPG por Secretaria o Dependencia';
        $role->save();

        //Usuario MIPG con permisos de consulta COMPLETA GENERAL
        $role = new Role();
        $role->nombre = 'adminMipg';
        $role->descripcion = 'Administrador modulo MIPG';
        $role->save();
    }
}
