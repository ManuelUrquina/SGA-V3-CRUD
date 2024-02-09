<?php

use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\CompetenciaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\ResultadoAprendizajeController;
use App\Http\Controllers\VigenciaController;
use App\Models\TblPrograma;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('programas', function () {
    return view('programas');
})->name('programasRuta');

Route::get('regionales', function () {
    return view('Regionales.regionales');
});


//rutas Programas
Route::resource('programas', ProgramaController::class);

//rutas usuarios
Route::resource('usuarios', UsuariosController::class);

//rutas Competencias
Route::resource('competencias', CompetenciaController::class);

// rutas Instructores
Route::resource('instructores', InstructoresController::class);

// rutas Fichas
Route::resource('fichas', FichaController::class);

// Centros
Route::resource('centros', CentroController::class);

// Ambientes
Route::resource('ambientes', AmbienteController::class);

// Vigencias
Route::resource('vigencias', VigenciaController::class);

//Raps
Route::resource('resultadoAprendizaje', ResultadoAprendizajeController::class);
// rura para los select de programa y competencia
Route::get('/optener-competencias/{programaId}', [ResultadoAprendizajeController::class, 'optenerCompetencia']);

// rutas subir archivos
Route::get('/guardar-archivo-index', [ArchivoController::class, 'index']);
Route::post('/guardar-archivo', [ArchivoController::class, 'guardar'])->name('guardar_archivo');
Route::get('/descargar-archivo/{archivoId}', [ArchivoController::class,'descargar'])->name('descargar.archivo');
Route::delete('/guardar-archivo/borrar/{archivoId}', [ArchivoController::class, 'destroy'])->name('eliminar.archivo');


//rutas fullcalendar
Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
Route::get('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
