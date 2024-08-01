<?php

use Illuminate\Support\Facades\Route;
//'App' debe ser escrito con mayúsculas, aunque el nombre de la carpeta sea 'app'
use App\Http\Controllers\EmpleadoController;
use GuzzleHttp\Promise\Create;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleado', function () {
    return view('empleado.index');
});
//cuando el usuario escriba empleado/create, accederemos a la clase empleadoController
//vamos a acceder a una clase, y ponemos al método al que queremos acceder
//route::get('empleado/create',[EmpleadoController::class,'create']);

//Con este comando podré acceder a todas las rutas sin necesidad de especificar el método en el código
//Solo necesitaré escribir en la url la clase y el método al que quiero acceder, ejemplo 'empleado/create'

Route::resource('empleado',EmpleadoController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
