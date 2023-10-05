<?php


use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\MovileController;
use Illuminate\Support\Facades\Route;

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
    return view('solicitudes.index');
});

Route::get('/solicitude', [SolicitudeController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitude/registro', [SolicitudeController::class, 'registro'])->name('solicitudes.registro');
Route::GET('solicitude/consulta', [SolicitudeController::class, 'consulta'])->name('solicitudes.consulta');
Route::get('/solicitude/definiciones', [SolicitudeController::class, 'definiciones'])->name('solicitudes.definiciones');
Route::get('/solicitude/movil', [SolicitudeController::class, 'movil'])->name('solicitudes.movil');
Route::get('/solicitude/valla', [SolicitudeController::class, 'valla'])->name('solicitudes.valla');
Route::get('/solicitude/comerciales', [SolicitudeController::class, 'comerciales'])->name('solicitudes.comerciales');
Route::get('/solicitude/inmobiliarios', [SolicitudeController::class, 'inmobiliarios'])->name('solicitudes.inmobiliarios');
Route::get('/solicitude/tipocolombina', [SolicitudeController::class, 'tipocolombina'])->name('solicitudes.tipocolombina');
Route::get('/solicitude/pendones', [SolicitudeController::class, 'pendones'])->name('solicitudes.pendones');
Route::get('/solicitude/murales', [SolicitudeController::class, 'murales'])->name('solicitudes.murales');
Route::get('/solicitude/Pasacalles', [SolicitudeController::class, 'Pasacalles'])->name('solicitudes.Pasacalles');
Route::get('/solicitude/aerea', [SolicitudeController::class, 'aerea'])->name('solicitudes.aerea');
Route::post('/solicitudes', [SolicitudeController::class, 'store'])->name('solicitudes.store');
Route::post('/moviles', [MovileController::class, 'store'])->name('moviles.store');
Route::post('/guardar-comentario', [SolicitudeController::class,'guardarComentario'])->name('solicitudes.guardarComentario');


