<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\mailHammerController;
use App\Mail\FacturaMailable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth','can:gestion'])->group(function () {
    // Tus rutas que requieren autenticación van aquí
    Route::resource('productos', ProductoController::class);
    Route::resource('users', UserController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('recibos', ReciboController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('recibos', ReciboController::class);

    // ...
});
    Route::middleware(['auth','can:operacion'])->group(function (){
    Route::get('/bascula', [VentaController::class, 'indexBascula'])->name('bascula');
    Route::get('/search', [VentaController::class, 'search'])->name('search');
    Route::get('/autocomplete', [VentaController::class, 'autocomplete'])->name('autocomplete');
    Route::resource('ventas', VentaController::class)->only(['edit','update','store']);
    Route::get('/factura', [mailHammerController::class, 'enviarCorreo'])->name('pdf');    
});
    Route::middleware(['auth','can:porteria'])->group(function (){
        Route::resource('asistencias', AsistenciaController::class);
        Route::get('registroSalida', [AsistenciaController::class, 'indexPorteria'])->name('salidaPorteria');
     

    });
    Route::middleware(['auth','can:gestionPersonal'])->group(function (){
        Route::resource('empleados', EmpleadoController::class);
        Route::resource('horarios', HorarioController::class);
        Route::resource('asistencias', AsistenciaController::class)->only('index');                
    });
    Route::middleware(['auth','can:recibo'])->group(function (){
        Route::resource('recibos',ReciboController::class)->only(['create','store']);;
    });












