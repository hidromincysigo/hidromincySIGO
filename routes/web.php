<?php

use App\Http\Controllers\AcueductoController;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\CaptacionController;
use App\Http\Controllers\DiqueTomaController;
use App\Http\Controllers\EmbalseController;
use App\Http\Controllers\PozoProfundoController;
use App\Http\Controllers\RolesControllers;
use App\Http\Controllers\TomaRioController;
use App\Http\Controllers\UsuariosControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// bloqueamos el registro por ruto register
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function () {
    Route::post('usuarios/{id}/restore', [UsuariosControllers::class, 'restore'])->name('usuarios.restore');
    Route::resource('roles', RolesControllers::class);
    Route::resource('/usuarios', UsuariosControllers::class);

    Route::get('/auditar', [AuditsController::class, 'index'])->name('auditar.index');
});
//// rutas que se deben optimizar ////
// REGISTRO //
Route::resource('captacion', CaptacionController::class);
Route::resource('acueducto', AcueductoController::class);
Route::resource('embalses', EmbalseController::class);
Route::resource('diquetoma', DiqueTomaController::class);
Route::resource('tomarios', TomaRioController::class);
Route::resource('pozoprofundos', PozoProfundoController::class);

// Route::get('/Procesos_Hidricos/Captacion/Embalses',
// [RegistroController::class,'ListarEmbalses'])->name('Captacion.Embalses');
// Route::get('/Procesos_Hidricos/Aduccion/Estacion_Bombeo',
// [RegistroController::class,'aduccionEB'])->name('aduccion.nuevaEB');
// Route::post('/Procesos_Hidricos/Aduccion/Guardar_EB',
// [RegistroController::class,'guardarEB'])->name('aduccion.guardarEB');
// Route::get('/Procesos_Hidricos/Captacion/Dique_Toma',
// [RegistroController::class,'ListarDiqueToma'])->name('lista.dique');
// Route::get('/Procesos_Hidricos/Potabilizacion/Plantas_de_Filtracion',
// [RegistroController::class,'potabilizacionFiltracion'])->name('pot.filtracion');
// Route::post('/Procesos_Hidricos/Potabilizacion/Guardar_Plantas_de_Filtración',
// [RegistroController::class,'guardarFiltracion'])->name('guardarFiltracion');
// Route::get('/Procesos_Hidricos/Potabilizacion/Plantas_Deszanilizadoras',
// [RegistroController::class,'potabilizacionDeszanilizadoras'])->name('pot.deszanilizadoras');
// Route::post('/Procesos_Hidricos/Potabilizacion/Guardar_Plantas_Deszanilizadoras',
// [RegistroController::class,'guardarDeszanilizadoras'])->name('guardar.deszanilizadoras');
// Route::get('/Procesos_Hidricos/Potabilizacion/Plantas_Potabilizadoras',
// [RegistroController::class,'potabilizacionPotabilizadoras'])->name('pot.potabilizadoras');
// Route::post('/Procesos_Hidricos/Potabilizacion/Guardar_Plantas_Potabilizadoras',
// [RegistroController::class,'guardarPotabilizadoras'])->name('guardar.Potabilizadoras');
// Route::get('/Procesos_Hidricos/Potabilizacion/Plantas_Portatiles',
// [RegistroController::class,'potabilizacionPortatiles'])->name('pot.Portatiles');
// Route::post('/Procesos_Hidricos/Potabilizacion/Guardar_Plantas_Portatiles',
// [RegistroController::class,'guardarPortatiles'])->name('guardar.Portatiles');
