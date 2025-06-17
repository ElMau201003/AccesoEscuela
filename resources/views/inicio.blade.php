@extends('layouts.app')

@section('content')
<main class="container">
  <h1>Bienvenido al Sistema de Evaluación del Acceso Educativo</h1>

  <h2>¿Qué es este sistema?</h2>
  <p>Herramienta digital para monitorear el acceso a la educación en zonas vulnerables.</p>

  <h2>Objetivo</h2>
  <p>Detectar estudiantes en riesgo y generar estrategias para mejorar su permanencia escolar.</p>

  <h2>Beneficios</h2>
  <ul>
    <li>Identificación de exclusión educativa</li>
    <li>Reportes automatizados</li>
    <li>Alertas visuales</li>
    <li>Configuración dinámica</li>
  </ul>

  <a href="{{ route('estudiantes.create') }}"><button>🚀 Empezar</button></a>
</main>
@endsection
