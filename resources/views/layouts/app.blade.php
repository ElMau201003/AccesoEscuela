<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso Educativo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      background-color: #73020C;
      color: white;
      width: 220px;
      padding: 20px;
      position: fixed;
      height: 100vh;
      transition: transform 0.3s ease-in-out;
    }

    .sidebar h2 {
      font-size: 1.3em;
      margin-bottom: 20px;
    }

    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      padding: 10px 0;
      border-bottom: 1px solid #8C4303;
    }

    .sidebar a:hover {
      background-color: #8C4303;
    }

    .main-content {
      margin-left: 220px;
      padding: 30px;
      flex-grow: 1;
      transition: margin-left 0.3s ease-in-out;
    }

    .toggle-btn {
      display: none;
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 28px;
      cursor: pointer;
      color: #73020C;
      background: none;
      border: none;
      z-index: 1000;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
        z-index: 100;
      }

      .main-content {
        margin-left: 0;
        padding-top: 80px;
      }

      .toggle-btn {
        display: block;
      }
    }
  </style>
</head>
<body>

  <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

  <div class="sidebar" id="sidebar">
    <h2>📚 Sistema de Evaluación de Acceso</h2>
    <a href="{{ url('/') }}">🏠 Inicio</a>
    <a href="{{ route('estudiantes.create') }}">📝 Recolección</a>
    <a href="{{ route('estudiantes.index') }}">📊 Resultados</a>
    <a href="{{ route('ver.reporte') }}">🧾 Ver Reporte</a>
    <a href="{{ route('indicadores') }}">📈 Indicadores</a>
    <a href="{{ route('configuracion') }}">⚙️ Configuración</a>
  </div>

  <div class="main-content">
    @yield('content')
  </div>

  

  @yield('scripts')

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('active');
    }
  </script>
</body>
</html>
