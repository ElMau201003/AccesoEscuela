<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte PDF</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 14px; }
    h2 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #444; padding: 8px; text-align: center; }
    .alert { color: red; font-weight: bold; }
    .highlight { color: green; font-weight: bold; }
  </style>
</head>
<body>
  <h2>Reporte de Exclusión Educativa</h2>

  <p><strong>Zona:</strong> {{ $zona }}</p>
  <p><strong>Nivel Socioeconómico:</strong> {{ $nivel }}</p>
  <p><strong>Mes:</strong> {{ $fecha ?? 'Todos' }}</p>

  @if($porcentajeRural > 25)
    <p class="alert">⚠️ Exclusión rural crítica: {{ $porcentajeRural }}%</p>
  @else
    <p class="highlight">✅ Exclusión rural aceptable: {{ $porcentajeRural }}%</p>
  @endif

  @if($porcentajeUrbana > 25)
    <p class="alert">⚠️ Exclusión urbana crítica: {{ $porcentajeUrbana }}%</p>
  @else
    <p class="highlight">✅ Exclusión urbana aceptable: {{ $porcentajeUrbana }}%</p>
  @endif

  <table>
    <thead>
      <tr>
        <th>Zona</th>
        <th>Total Estudiantes</th>
        <th>Excluidos</th>
        <th>Porcentaje</th>
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
</body>
</html>
