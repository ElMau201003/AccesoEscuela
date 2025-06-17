@extends('layouts.app')

@section('content')
<main class="container">
  <h2>Formulario de Estudiante Vulnerable</h2>

  <form method="POST" action="{{ route('estudiantes.store') }}">
    @csrf

    <label>DNI:</label>
    <input type="text" name="dni" required>

    <label>Nombre completo:</label>
    <input type="text" name="nombre" required>

    <label>Edad:</label>
    <input type="number" name="edad" required>

    <label>Zona:</label>
    <select name="zona">
      <option value="Rural">Rural</option>
      <option value="Urbana">Urbana</option>
    </select>

    <label>Acceso a Internet:</label>
    <select name="internet">
      <option value="1">Sí</option>
      <option value="0">No</option>
    </select>

    <label>Nivel Socioeconómico:</label>
    <select name="nivel_socioeconomico">
      <option value="Bajo">Bajo</option>
      <option value="Medio">Medio</option>
      <option value="Alto">Alto</option>
    </select>

    <button type="submit">Guardar Estudiante</button>
  </form>
</main>
@endsection
