@extends('layouts.app')

@section('content')
<main class="container">
  <h2>Panel de Indicadores</h2>

  <ul>
    <li>📌 Total de estudiantes registrados</li>
    <li>📊 Porcentaje de estudiantes sin internet</li>
    <li>⚠️ Alertas activas por zona</li>
  </ul>

  <p>Para configurar estos indicadores, haz clic en el siguiente botón:</p>
  <a href="{{ url('/configuracion') }}"><button>🔧 Configurar Indicadores</button></a>
</main>
@endsection
