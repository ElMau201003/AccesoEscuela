@extends('layouts.app')

@section('content')
<main class="container">
  <h2>🧠 Resultado de la Evaluación</h2>

  <p><strong>Zona:</strong> {{ $input['Zona'] }}</p>
  <p><strong>Conectividad:</strong> {{ $input['Conectividad'] }}</p>
  <p><strong>Condición:</strong> {{ $input['Condicion_Vulnerabilidad'] }}</p>
  <p><strong>Indicadores:</strong> {{ $input['Indicadores'] }}</p>

  <hr>

  <p><strong>Clase Predicha:</strong> {{ $clase == 1 ? '⚠️ Riesgo detectado' : '✅ Sin riesgo' }}</p>
  <p><strong>Probabilidad de brecha:</strong> {{ $probabilidad * 100 }}%</p>

  <a href="{{ route('evaluacion.form') }}"><button>🔁 Evaluar otro</button></a>
</main>
@endsection
