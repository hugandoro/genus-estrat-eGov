<table>
  <thead>
    <tr>
      <th>Tarea ID</th>
      <th>Fecha reporte</th>

      <th>Dependencia</th>
      <th>N° de la Actividad Plan Desarrollo</th>
      <th>Vigencia del reporte</th>

      <th>Accion ID</th>
      <th>Accion inscrita</th>
      <th>Tarea reportada</th>
      <th>Fecha realizacion</th>

      <th>Tipo de zona</th>
      <th>Comuna</th>
      <th>Corregimiento</th>
      <th>Grupo Poblacional</th>
      <th>Poblacion impactada</th>
      <th>Genero</th>

      <th>Impacto al KPI</th>

      <th>Fuente N° 1 - Fuente</th>
      <th>Fuente N° 1 - Valor</th>
      <th>Fuente N° 2 - Fuente</th>
      <th>Fuente N° 2 - Valor</th>
      <th>Fuente N° 3 - Fuente</th>
      <th>Fuente N° 3 - Valor</th>
      <th>Enlace que reporta</th>
    </tr>
  </thead>

  <tbody>
    <!-- Listado de las tareas reportadas -->
    @foreach ($tarea as $registro)
      <tr>
        <td>{{$registro->id}}</td>
        <td>{{$registro->created_at}}</td>

        <td>{{$registro->accion->planIndicativo->indicador->Nivel4->entidadOficina->nombre}}</td> 
        <td>{{$registro->accion->planIndicativo->indicador->Nivel4->numeral}}</td>
        <td>{{$registro->accion->planIndicativo->vigencia->nombre}}</td>

        <td>{{$registro->accion->id}}</td>
        <td>{{$registro->accion->descripcion}}</td>

        <td>{{$registro->descripcion}}</td>
        <td>{{$registro->fecha_realizacion}}</td>

        <td>{{$registro->zona->nombre}}</td>
        <td>{{$registro->comuna->nombre}}</td>
        <td>{{$registro->corregimiento->nombre}}</td>
        <td>{{$registro->poblacionR->nombre}}</td>
        <td>{{$registro->poblacion}}</td>
        <td>{{$registro->sexo->nombre}}</td>

        <td>{{$registro->impacto_kpi}}</td>

        <td>{{$registro->fuente1->nombre}}</td>
        <td>{{$registro->valor_fuente1}}</td>
        <td>{{$registro->fuente2->nombre}}</td>
        <td>{{$registro->valor_fuente2}}</td>
        <td>{{$registro->fuente3->nombre}}</td>
        <td>{{$registro->valor_fuente3}}</td>

        <td>{{$registro->user->name}}</td>
      </tr>
    @endforeach
    <!-- Fin listado tareas reportadas -->
  </tbody>
</table>
 