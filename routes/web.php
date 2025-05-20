<?php

use App\Repository\AulaRepository;
use App\Repository\CiudadRepository;
use App\Repository\PersonaRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/personas'], function () {
    Route::get('/', function () {
        $repository = new PersonaRepository();
        $personas = $repository->index();
        return view('personas.index', ['personas' => $personas]);
    });

    Route::post('/', function (Request $request) {
        $repository = new PersonaRepository();
        $repository->create($request->all());
        return redirect('/personas');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new PersonaRepository();
        $repository->update($id, $request->all());
        return redirect('/personas');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new PersonaRepository();
        $repository->delete($id);
        return redirect('/personas');
    });
});

Route::group(['prefix' => '/aulas'], function () {
    Route::get('/', function () {
        $repository = new AulaRepository();
        $aulas = $repository->index();
        return view('aulas.index', ['aulas' => $aulas]);
    });

    Route::post('/', function (Request $request) {
        $repository = new AulaRepository();
        $repository->create($request->all());
        return redirect('/aulas');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new AulaRepository();
        $repository->update($id, $request->all());
        return redirect('/aulas');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new AulaRepository();
        $repository->delete($id);
        return redirect('/aulas');
    });
});

Route::group(['prefix' => '/ciudades'], function () {
    Route::get('/', function () {
        $repository = new CiudadRepository();
        $ciudades = $repository->index();
        return view('ciudades.index', ['ciudades' => $ciudades]);
    });

    Route::post('/', function (Request $request) {
        $repository = new CiudadRepository();
        $repository->create($request->all());
        return redirect('/ciudades');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new CiudadRepository();
        $repository->update($id, $request->all());
        return redirect('/ciudades');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new CiudadRepository();
        $repository->delete($id);
        return redirect('/ciudades');
    });
});

Route::group(['prefix' => '/clases'], function () {
    Route::get('/', function () {
        $repository = new ClaseRepository();
        $clases = $repository->index();
        return view('clases.index', ['clases' => $clases]);
    });

    Route::post('/', function (Request $request) {
        $repository = new ClaseRepository();
        $repository->create($request->all());
        return redirect('/clases');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new ClaseRepository();
        $repository->update($id, $request->all());
        return redirect('/clases');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new ClaseRepository();
        $repository->delete($id);
        return redirect('/clases');
    });
});

Route::group(['prefix' => '/clases_estudiantes'], function () {
    Route::get('/', function () {
        $repository = new ClaseEstudianteRepository();
        $clases_estudiantes = $repository->index();
        return view('clases_estudiantes.index', ['clases_estudiantes' => $clases_estudiantes]);
    });

    Route::post('/', function (Request $request) {
        $repository = new ClaseEstudianteRepository();
        $repository->create($request->all());
        return redirect('/clases_estudiantes');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new ClaseEstudianteRepository();
        $repository->update($id, $request->all());
        return redirect('/clases_estudiantes');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new ClaseEstudianteRepository();
        $repository->delete($id);
        return redirect('/clases_estudiantes');
    });
});
Route::group(['prefix' => '/clases_horarios'], function () {
    Route::get('/', function () {
        $repository = new ClaseHorarioRepository();
        $clases_horarios = $repository->index();
        return view('clases_horarios.index', ['clases_horarios' => $clases_horarios]);
    });

    Route::post('/', function (Request $request) {
        $repository = new ClaseHorarioRepository();
        $repository->create($request->all());
        return redirect('/clases_horarios');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new ClaseHorarioRepository();
        $repository->update($id, $request->all());
        return redirect('/clases_horarios');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new ClaseHorarioRepository();
        $repository->delete($id);
        return redirect('/clases_horarios');
    });
});
Route::group(['prefix' => '/clases_profesores'], function () {
    Route::get('/', function () {
        $repository = new ClaseProfesorRepository();
        $clases_profesores = $repository->index();
        return view('clases_profesores.index', ['clases_profesores' => $clases_profesores]);
    });

    Route::post('/', function (Request $request) {
        $repository = new ClaseProfesorRepository();
        $repository->create($request->all());
        return redirect('/clases_profesores');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new ClaseProfesorRepository();
        $repository->update($id, $request->all());
        return redirect('/clases_profesores');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new ClaseProfesorRepository();
        $repository->delete($id);
        return redirect('/clases_profesores');
    });
});
Route::group(['prefix' => '/direcciones'], function () {
    Route::get('/', function () {
        $repository = new DireccionRepository();
        $direcciones = $repository->index();
        return view('direcciones.index', ['direcciones' => $direcciones]);
    });

    Route::post('/', function (Request $request) {
        $repository = new DireccionRepository();
        $repository->create($request->all());
        return redirect('/direcciones');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new DireccionRepository();
        $repository->update($id, $request->all());
        return redirect('/direcciones');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new DireccionRepository();
        $repository->delete($id);
        return redirect('/direcciones');
    });
});
Route::group(['prefix' => '/estudiantes'], function () {
    Route::get('/', function () {
        $repository = new EstudianteRepository();
        $estudiantes = $repository->index();
        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    });

    Route::post('/', function (Request $request) {
        $repository = new EstudianteRepository();
        $repository->create($request->all());
        return redirect('/estudiantes');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new EstudianteRepository();
        $repository->update($id, $request->all());
        return redirect('/estudiantes');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new EstudianteRepository();
        $repository->delete($id);
        return redirect('/estudiantes');
    });
});
Route::group(['prefix' => '/grados'], function () {
    Route::get('/', function () {
        $repository = new GradoRepository();
        $grados = $repository->index();
        return view('grados.index', ['grados' => $grados]);
    });

    Route::post('/', function (Request $request) {
        $repository = new GradoRepository();
        $repository->create($request->all());
        return redirect('/grados');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new GradoRepository();
        $repository->update($id, $request->all());
        return redirect('/grados');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new GradoRepository();
        $repository->delete($id);
        return redirect('/grados');
    });
});

Route::group(['prefix' => '/horarios'], function () {
    Route::get('/', function () {
        $repository = new HorarioRepository();
        $horarios = $repository->index();
        return view('horarios.index', ['horarios' => $horarios]);
    });

    Route::post('/', function (Request $request) {
        $repository = new HorarioRepository();
        $repository->create($request->all());
        return redirect('/horarios');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new HorarioRepository();
        $repository->update($id, $request->all());
        return redirect('/horarios');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new HorarioRepository();
        $repository->delete($id);
        return redirect('/horarios');
    });
});

Route::group(['prefix' => '/notas'], function () {
    Route::get('/', function () {
        $repository = new NotaRepository();
        $notas = $repository->index();
        return view('notas.index', ['notas' => $notas]);
    });

    Route::post('/', function (Request $request) {
        $repository = new NotaRepository();
        $repository->create($request->all());
        return redirect('/notas');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new NotaRepository();
        $repository->update($id, $request->all());
        return redirect('/notas');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new NotaRepository();
        $repository->delete($id);
        return redirect('/notas');
    });
});
Route::group(['prefix' => '/paises'], function () {
    Route::get('/', function () {
        $repository = new PaisRepository();
        $paises = $repository->index();
        return view('paises.index', ['paises' => $paises]);
    });

    Route::post('/', function (Request $request) {
        $repository = new PaisRepository();
        $repository->create($request->all());
        return redirect('/paises');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new PaisRepository();
        $repository->update($id, $request->all());
        return redirect('/paises');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new PaisRepository();
        $repository->delete($id);
        return redirect('/paises');
    });
});

Route::group(['prefix' => '/periodos'], function () {
    Route::get('/', function () {
        $repository = new PeriodoRepository();
        $periodos = $repository->index();
        return view('periodos.index', ['periodos' => $periodos]);
    });

    Route::post('/', function (Request $request) {
        $repository = new PeriodoRepository();
        $repository->create($request->all());
        return redirect('/periodos');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new PeriodoRepository();
        $repository->update($id, $request->all());
        return redirect('/periodos');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new PeriodoRepository();
        $repository->delete($id);
        return redirect('/periodos');
    });
});
Route::group(['prefix' => '/profesores'], function () {
    Route::get('/', function () {
        $repository = new ProfesorRepository();
        $profesores = $repository->index();
        return view('profesores.index', ['profesores' => $profesores]);
    });

    Route::post('/', function (Request $request) {
        $repository = new ProfesorRepository();
        $repository->create($request->all());
        return redirect('/profesores');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new ProfesorRepository();
        $repository->update($id, $request->all());
        return redirect('/profesores');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new ProfesorRepository();
        $repository->delete($id);
        return redirect('/profesores');
    });
});
Route::group(['prefix' => '/sedes'], function () {
    Route::get('/', function () {
        $repository = new SedeRepository();
        $sedes = $repository->index();
        return view('sedes.index', ['sedes' => $sedes]);
    });

    Route::post('/', function (Request $request) {
        $repository = new SedeRepository();
        $repository->create($request->all());
        return redirect('/sedes');
    });

    Route::put('/{id}', function (Request $request, $id) {
        $repository = new SedeRepository();
        $repository->update($id, $request->all());
        return redirect('/sedes');
    });

    Route::delete('/{id}', function ($id) {
        $repository = new SedeRepository();
        $repository->delete($id);
        return redirect('/sedes');
    });
});
