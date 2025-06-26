@extends('layouts.app')

@section('content')
<main class="container">
  <h2>📊 Evaluar riesgo de brecha educativa</h2>

  <form method="POST" action="{{ route('evaluar.brecha') }}">
    @csrf

    <label>Zona:</label>
    <select name="zona" required>
      <option value="Rural">Rural</option>
      <option value="Urbana">Urbana</option>
    </select>

    <label>Conectividad:</label>
    <select name="conectividad" required>
      <option value="Mala">Mala</option>
      <option value="Regular">Regular</option>
      <option value="Buena">Buena</option>
    </select>

    <label>Condición de vulnerabilidad (1-10):</label>
    <input type="number" name="condicion" step="0.1" min="0" max="10" required>

    <label>Indicadores socioeconómicos (0-1):</label>
    <input type="number" name="indicadores" step="0.01" min="0" max="1" required>

    <button type="submit">Evaluar</button>
  </form>
</main>
@endsection
