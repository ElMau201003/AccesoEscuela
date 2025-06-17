<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $zona = $request->input('zona', 'todos');
        $nivel = $request->input('nivel', 'todos');
        $fecha = $request->input('fecha'); // formato YYYY-MM

        $query = Estudiante::query();

        if ($zona !== 'todos') {
            $query->where('zona', $zona);
        }

        if ($nivel !== 'todos') {
            $query->where('nivel_socioeconomico', $nivel);
        }

        if ($fecha) {
            [$anio, $mes] = explode('-', $fecha);
            $query->whereYear('created_at', $anio)->whereMonth('created_at', $mes);
        }

        $estudiantes = $query->get();

        $totalRural = $estudiantes->where('zona', 'Rural')->count();
        $totalUrbana = $estudiantes->where('zona', 'Urbana')->count();

        $ruralExcluidos = $estudiantes->where('zona', 'Rural')->where('internet', 0)->count();
        $urbanaExcluidos = $estudiantes->where('zona', 'Urbana')->where('internet', 0)->count();

        $porcentajeRural = $totalRural > 0 ? round(($ruralExcluidos / $totalRural) * 100, 1) : 0;
        $porcentajeUrbana = $totalUrbana > 0 ? round(($urbanaExcluidos / $totalUrbana) * 100, 1) : 0;

        return view('ver_reporte', compact(
            'totalRural', 'totalUrbana',
            'ruralExcluidos', 'urbanaExcluidos',
            'porcentajeRural', 'porcentajeUrbana',
            'zona', 'nivel', 'fecha'
        ));
    }

}

