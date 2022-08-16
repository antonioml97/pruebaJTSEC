<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\ProyectosUsuariosController;
use App\Http\Controllers\ActividadesUsuarioController;
use App\Http\Controllers\IncidenciasUsuarioController;
use App\Http\Controllers\ProyectoActividadesController;
use App\Http\Controllers\ActividadesIncidenciasController;
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



//Proyectos
Route::post('/proyectos/crearProyecto', [ProyectosController::class, 'crearProyecto' ])->name("crearProyecto");
Route::post('/proyecto_actividades/crearProyectoActividades', [ProyectoActividadesController::class, 'crearProyectoActividades' ])->name("crearProyectoActividades");
Route::post('/proyecto_usuario/crearProyectosUsuarios', [ProyectosUsuariosController::class, 'crearProyectosUsuarios' ])->name("crearProyectosUsuarios");
Route::post('/proyecto_usuarios/listarProyectos', [ProyectosUsuariosController::class, 'listarProyectosUsuario' ])->name("listarProyectosUsuario");

//Activides
Route::post('/actividades/crearActividades', [ActividadesController::class, 'crearActividades' ])->name("crearActividades");
Route::post('/actividades_usuario/crearActividadesUsuario', [ActividadesUsuarioController::class, 'crearActividadesUsuario' ])->name("crearActividadesUsuario");
Route::post('/actividades_usuario/esPosibleCrear_ActividadesUsuario', [ActividadesUsuarioController::class, 'esPosibleCrear_ActividadesUsuario' ])->name("esPosibleCrear_ActividadesUsuario");

Route::post('/actividades_usuario/listarActividades', [ActividadesUsuarioController::class, 'listarActividadesUsuario' ])->name("listarActividadesUsuario");

//Incidencias
Route::post('/actividades_incidencias/crearActividadesIncidencias', [ActividadesIncidenciasController::class, 'crearActividadesIncidencias' ])->name("crearActividadesIncidencias");
Route::post('/incidencias_usuario/crearIncidenciasUsuario', [IncidenciasUsuarioController::class, 'crearIncidenciasUsuario' ])->name("crearIncidenciasUsuario");

Route::post('/incidencias_usuario/listarIncidencias', [IncidenciasUsuarioController::class, 'listarIncidenciasUsuario' ])->name("listarIncidenciasUsuario");

