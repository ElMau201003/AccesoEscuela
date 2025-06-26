@extends('layouts.app')

@section('content')
<main class="container">
  <h2>📄 Reporte de Exclusión Educativa</h2>

  <form method="GET" action="{{ route('ver.reporte') }}" style="margin-bottom: 20px;">
    <label>Zona:</label>
    <select name="zona">
      <option value="todos" {{ $zona == 'todos' ? 'selected' : '' }}>Todos</option>
      <option value="Rural" {{ $zona == 'Rural' ? 'selected' : '' }}>Rural</option>
      <option value="Urbana" {{ $zona == 'Urbana' ? 'selected' : '' }}>Urbana</option>
    </select>

    <label>Nivel Socioeconómico:</label>
    <select name="nivel">
      <option value="todos" {{ $nivel == 'todos' ? 'selected' : '' }}>Todos</option>
      <option value="Bajo" {{ $nivel == 'Bajo' ? 'selected' : '' }}>Bajo</option>
      <option value="Medio" {{ $nivel == 'Medio' ? 'selected' : '' }}>Medio</option>
      <option value="Alto" {{ $nivel == 'Alto' ? 'selected' : '' }}>Alto</option>
    </select>

    <label>Mes:</label>
    <input type="month" name="fecha" value="{{ $fecha }}">

    <button type="submit">Aplicar Filtros</button>
    
    <a href="{{ route('ver.reporte.pdf', request()->query()) }}" target="_blank">
      <button type="button">📥 Exportar PDF</button>
    </a>

  </form>

  @if($porcentajeRural > 25)
    <div class="alert">⚠️ Exclusión rural crítica: {{ $porcentajeRural }}%</div>
  @else
    <div class="highlight">✅ Exclusión rural aceptable: {{ $porcentajeRural }}%</div>
  @endif

  @if($porcentajeUrbana > 25)
    <div class="alert">⚠️ Exclusión urbana crítica: {{ $porcentajeUrbana }}%</div>
  @else
    <div class="highlight">✅ Exclusión urbana aceptable: {{ $porcentajeUrbana }}%</div>
  @endif

  <br>
  <table>
    <thead>
      <tr>
        <th>Zona</th>
        <th>Total Estudiantes</th>
        <th>Excluidos (sin internet)</th>
        <th>Porcentaje (%)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Rural</td>
        <td>{{ $totalRural }}</td>
        <td>{{ $ruralExcluidos }}</td>
        <td>{{ $porcentajeRural }}%</td>
      </tr>
      <tr>
        <td>Urbana</td>
        <td>{{ $totalUrbana }}</td>
        <td>{{ $urbanaExcluidos }}</td>
        <td>{{ $porcentajeUrbana }}%</td>
      </tr>
    </tbody>
  </table>

  <br>
  <canvas id="graficoReporte"></canvas>
</main>
@endsection

@section('scripts')
<script>
  const ctx = document.getElementById('graficoReporte').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Rural', 'Urbana'],
      datasets: [{
        label: 'Exclusión educativa (%)',
        data: [{{ $porcentajeRural }}, {{ $porcentajeUrbana }}],
        backgroundColor: ['#F20530', '#F2B544']
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true, max: 100 }
      }
    }
  });
</script>
@endsection
