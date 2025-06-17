@extends('layouts.app')

@section('content')
<main class="container">
  <h2>Configuración de Indicadores</h2>

  <form method="POST" action="#">
    @csrf
    <label>Umbral de exclusión (%) para alerta:</label>
    <input type="number" name="umbral" value="25" min="0" max="100" required>

    <label>Frecuencia de evaluación:</label>
    <select name="frecuencia">
      <option value="mensual">Mensual</option>
      <option value="trimestral">Trimestral</option>
    </select>

    <button type="submit">Guardar Configuración</button>
  </form>
</main>
@endsection
