<table>
  <thead>
    <tr>
      <th><b>N° de la Actividad</b></th>
      <th><b>Descricion de la actividad</b></th>
      <th><b>Dependencia</b></th>
      <th><b>Programada para 2020 (SI/NO)</b></th>
      <th><b>N° de tareas reportadas en 2020</b></th>
      <th><b>Objetivo impactado (SI/NO)</b></th>
    </tr>
  </thead>

  <tbody>
    <!-- Listado de todas las metas con descripcion, responsable, programada para 2020 (SI/NO), acumulado de tareas reportadas, objetivo 2020 impactado (SI/NO) -->
    @foreach ($nivel4 as $n4)
      <tr>
        <td>{{ $n4->numeral }}</td>
        <td>{{ $n4->nombre }}</td>
        <td>{{ $n4->entidadOficina->nombre }}</td>

        @php $programada = 'NO' @endphp
        @foreach ($planIndicativo as $planI)
          @if ($planI->indicador->Nivel4->id == $n4->id)
            @if ($planI->valor != '0') @php $programada = 'SI' @endphp @endif
          @endif
        @endforeach

        <td>{{ $programada }}</td>

        @php $contadorTareas = '0' @endphp
        @php $objetivoImpactado = 'NO' @endphp
        @foreach ($tarea as $tareaR)
          @if ($tareaR->accion->planIndicativo->indicador->Nivel4->id == $n4->id) <!-- OJO actualmente no discrimina vigencia de la tarea reportada--> 
            @php $contadorTareas++ @endphp
            @if ($tareaR->impacto_KPI != '0') @php $objetivoImpactado = 'SI' @endphp @endif
          @endif
        @endforeach

        <td>{{ $contadorTareas }}</td>
        <td>{{ $objetivoImpactado }}</td>

      </tr>
    @endforeach
    <!-- Fin listado reporte -->
  </tbody>
</table>
 