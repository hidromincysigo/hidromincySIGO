<?php

// use App\Http\Controllers\AcueductoController;
use App\Http\Controllers\AuditsController;
// use App\Http\Controllers\DiqueTomaController;
use App\Http\Controllers\DireccionController;
// use App\Http\Controllers\EmbalseController;
use App\Http\Controllers\OrganizacionesController;
// use App\Http\Controllers\PlantaController;
// use App\Http\Controllers\PozoProfundoController;
// use App\Http\Controllers\TomaRioController;
use App\Http\Controllers\UsuariosControllers;
use App\Http\Controllers\InfraestructuraController;
use App\Http\Controllers\DetallesTecnicoController;
use App\Http\Controllers\BombaController;
use App\Http\Controllers\ManifoldController;
use App\Http\Controllers\MotoresController;
use App\Http\Controllers\TablerosController;
use App\Http\Controllers\TuberiasController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\RolesControllers;
use App\Http\Controllers\ValvulaController;
use App\Http\Controllers\EstacionBombeoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AsignacionGrupoController;
use App\Http\Controllers\MantenimientoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// bloqueamos el registro por ruta register
Auth::routes(['register' => false]);

//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'usuarios' => UsuariosControllers::class,
        'roles' => RolesControllers::class,
        // 'acueducto' => AcueductoController::class,
        // 'dique_toma' => DiqueTomaController::class,
        // 'embalses' => EmbalseController::class,
        // 'pozo_profundos' => PozoProfundoController::class,
        // 'toma_rio' => TomaRioController::class,
        'valvulas' => ValvulasController::class,
        'fabricantes' => FabricanteController::class,
        'organizaciones' => OrganizacionesController::class,
        // 'plantas' => PlantaController::class,
        // 'estacion_bombeo' => EstacionBombeoController::class,
        'detalles_tecnicos' => DetallesTecnicoController::class,
        'bombas' => BombaController::class,
        'valvulas' => ValvulaController::class,
        'manifold' => ManifoldController::class,
        'motores' => MotoresController::class,
        'tableros' => TablerosController::class,
        'tuberias' => TuberiasController::class,
        'infraestructura' => InfraestructuraController::class,
        'equipos' => EquipoController::class,
        'grupos' => AsignacionGrupoController::class,
        'mantenimiento' => MantenimientoController::class,
    ]);

    Route::post('usuarios/{id}/restore', [UsuariosControllers::class, 'restore'])->name('usuarios.restore');
    Route::get('/auditar', [AuditsController::class, 'index'])->name('auditar.index');
});



Route::post('/llenarMunicipios', [DireccionController::class, 'llenarMunicipios']);
Route::post('/llenarParroquias', [DireccionController::class, 'llenarParroquias']);
Route::post('/llenarSectores', [DireccionController::class, 'llenarSector']);
Route::post('/tipoProceso',[DireccionController::class, 'tipoProceso']);
Route::post('/tipoSistema',[AsignacionGrupoController::class,'equipo']);