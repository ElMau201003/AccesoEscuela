<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EvaluacionController extends Controller
{
    public function evaluar(Request $request)
    {
        $data = [
            'Zona' => $request->zona,
            'Conectividad' => $request->conectividad,
            'Condicion_Vulnerabilidad' => $request->condicion,
            'Indicadores' => $request->indicadores,
        ];

        try {
            $response = Http::post('http://localhost:5000/predict', $data);

            if ($response->successful()) {
                $resultado = $response->json();

                return view('evaluacion_resultado', [
                    'clase' => $resultado['Clase_predicha'],
                    'probabilidad' => $resultado['Probabilidad_brecha_baja'],
                    'input' => $data
                ]);
            } else {
                return back()->with('error', 'Error al obtener predicción');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo conectar al modelo: ' . $e->getMessage());
        }
    }
}
