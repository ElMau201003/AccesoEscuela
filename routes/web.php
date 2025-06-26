<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EvaluacionController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');

Route::get('/ver-reporte', [App\Http\Controllers\ReporteController::class, 'index'])->name('ver.reporte');
Route::get('/ver-reporte/pdf', [ReporteController::class, 'exportarPDF'])->name('ver.reporte.pdf');

Route::view('/configuracion', 'configuracion')->name('configuracion');
Route::view('/indicadores', 'indicadores')->name('indicadores');

Route::get('/evaluacion', fn() => view('evaluacion'))->name('evaluacion.form');
Route::post('/evaluacion', [EvaluacionController::class, 'evaluar'])->name('evaluar.brecha');
