@extends('layouts.app')

@section('content')
<main class="container">
  <h2>Estudiantes Clasificados por Nivel de Riesgo</h2>

  @if(session('success'))
    <p class="alert">{{ session('success') }}</p>
  @endif

  <table>
    <thead>
      <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Zona</th>
        <th>Internet</th>
        <th>Nivel Socioeconómico</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estudiantes as $e)
      <tr>
        <td>{{ $e->dni }}</td>
        <td>{{ $e->nombre }}</td>
        <td>{{ $e->edad }}</td>
        <td>{{ $e->zona }}</td>
        <td>{{ $e->internet ? 'Sí' : 'No' }}</td>
        <td>{{ $e->nivel_socioeconomico }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <hr>

  <h3>Evolución de Exclusión Educativa (últimos 6 meses)</h3>
  <canvas id="graficoMes" style="margin-top: 20px;"></canvas>
</main>
@endsection

@section('scripts')
<script>


  // Gráfico de evolución mensual
  const evolucionLabels = {!! json_encode(collect($evolucion)->pluck('mes')) !!};
  const evolucionData = {!! json_encode(collect($evolucion)->pluck('porcentaje')) !!};

  const ctxMes = document.getElementById('graficoMes').getContext('2d');
  new Chart(ctxMes, {
    type: 'line',
    data: {
      labels: evolucionLabels,
      datasets: [{
        label: 'Exclusión mensual (%)',
        data: evolucionData,
        borderColor: '#F20530',
        backgroundColor: 'rgba(242, 5, 48, 0.1)',
        fill: true,
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          max: 100
        }
      }
    }
  });
</script>
@endsection
