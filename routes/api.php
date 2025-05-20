<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PersonaController;
use App\Http\Controllers\API\AulaController;
use App\Http\Controllers\API\CiudadController;
use App\Http\Controllers\API\ClaseController;
use App\Http\Controllers\API\ClaseEstudianteController;
use App\Http\Controllers\API\ClaseHorarioController;
use App\Http\Controllers\API\ClaseProfesorController;
use App\Http\Controllers\API\DireccionController;
use App\Http\Controllers\API\EstudianteController;
use App\Http\Controllers\API\GradoController;
use App\Http\Controllers\API\HorarioController;
use App\Http\Controllers\API\NotaController;
use App\Http\Controllers\API\PaisController;
use App\Http\Controllers\API\PeriodoController;
use App\Http\Controllers\API\ProfesorController;
use App\Http\Controllers\API\SedeController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('personas', PersonaController::class);

Route::apiResource('aulas', AulaController::class);
Route::apiResource('ciudades', CiudadController::class);
Route::apiResource('clases', ClaseController::class);
Route::apiResource('clases_estudiantes', ClaseEstudianteController::class);
Route::apiResource('clases_horarios', ClaseHorarioController::class);
Route::apiResource('clases_profesores', ClaseProfesorController::class);
Route::apiResource('direcciones', DireccionController::class);
Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('grados', GradoController::class);
Route::apiResource('horarios', HorarioController::class);
Route::apiResource('notas', NotaController::class);
Route::apiResource('paises', PaisController::class);
Route::apiResource('periodos', PeriodoController::class);
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('sedes', SedeController::class);
