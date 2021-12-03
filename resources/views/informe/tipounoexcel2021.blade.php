@php set_time_limit(8000) @endphp

<table>
  <thead>
    <tr>
      <th><b>N° Actividad (Meta)</b></th>
      <th><b>Descricion de la actividad (Meta)</b></th>
      <th><b>Dependencia</b></th>
      <th><b>Programada 2021 (Con accion)</b></th>
      <th><b>N° tareas reportadas 2021</b></th>
      <th><b>Objetivo impactado</b></th>
    </tr>
  </thead>

  <tbody>
    <!-- Listado de todas las metas con descripcion, responsable, programada para 2021 (SI/NO), acumulado de tareas reportadas, objetivo 2021 impactado (SI/NO) -->
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
          @if ($tareaR->accion->planIndicativo->vigencia_id == 13) <!-- OJO actualmente solo aplica a la vigencia 2021--> 
            @if ($tareaR->accion->planIndicativo->indicador->Nivel4->id == $n4->id)
              @php $contadorTareas++ @endphp
              @if ($tareaR->impacto_KPI != '0') @php $objetivoImpactado = 'SI' @endphp @endif
            @endif
          @endif
        @endforeach

        <td>{{ $contadorTareas }}</td>
        <td>{{ $objetivoImpactado }}</td>

      </tr>
    @endforeach
    <!-- Fin listado reporte -->
  </tbody>
</table>
 