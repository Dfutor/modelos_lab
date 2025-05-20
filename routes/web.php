<?php

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
