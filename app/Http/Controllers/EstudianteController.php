<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EstudianteController extends Controller
{


public function index()
{
    $estudiantes = Estudiante::all();

    // Exclusión por zona
    $rural = $estudiantes->where('zona', 'Rural');
    $urbana = $estudiantes->where('zona', 'Urbana');

    $ruralPorcentaje = $rural->count() > 0 ? round($rural->where('internet', 0)->count() / $rural->count() * 100, 1) : 0;
    $urbanaPorcentaje = $urbana->count() > 0 ? round($urbana->where('internet', 0)->count() / $urbana->count() * 100, 1) : 0;

    // Evolución mensual (últimos 6 meses)
    $evolucion = [];

    for ($i = 5; $i >= 0; $i--) {
        $mes = Carbon::now()->subMonths($i)->format('Y-m');
        $totalMes = Estudiante::whereMonth('created_at', Carbon::now()->subMonths($i)->month)->count();
        $excluidosMes = Estudiante::whereMonth('created_at', Carbon::now()->subMonths($i)->month)
            ->where('internet', 0)
            ->count();
        $porcentaje = $totalMes > 0 ? round(($excluidosMes / $totalMes) * 100, 1) : 0;

        $evolucion[] = [
            'mes' => Carbon::now()->subMonths($i)->format('M'),
            'porcentaje' => $porcentaje,
        ];
    }

    return view('estudiantes.index', compact('estudiantes', 'ruralPorcentaje', 'urbanaPorcentaje', 'evolucion'));
}



    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:estudiantes',
            'nombre' => 'required|string',
            'edad' => 'required|integer|min:5|max:99',
            'zona' => 'required|in:Rural,Urbana',
            'internet' => 'required|boolean',
            'nivel_socioeconomico' => 'required|string'
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado correctamente');
    }
}

