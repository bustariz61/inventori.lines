<?php

use App\Http\Controllers\BamsController;
use App\Http\Controllers\ComunicacionInternaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EntregaBamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\RetirosController;
use App\Http\Controllers\EntregaLineasController;
use App\Http\Controllers\EntregaPuntosVentasController;
use App\Http\Controllers\EntregaTelefonosController;

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

//Route::get('/', [HomeController::class, 'raiz']);
//Route::get('saludos', [HomeController::class, 'second']);


//Login
Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'login')->name('login');
    Route::post('dashboard', 'recibirDatosLogin')->name('dashboard.recibirDatosLogin');
    Route::post('register', 'registrar')->name('register.registrar');
    Route::get('register', 'vistaRegistro')->name('register.vistaRegistro');
    Route::get('password', 'contraseñaOlvidada')->name('password.contraseñaOlvidada');
    Route::get('dashboard', 'mostrarDashboard')->name('dashboard.mostrarDashboard');

});

//departamentos

Route::controller(DepartamentoController::class)->group(function(){
    Route::get('departamentos', 'mostrarDepartamentos')->name('departamentos.mostrarDepartamentos');
    Route::get('registrarDepartamento', 'crearDepartamento')->name('registrarDepartamento.crearDepartamento');
    Route::post('registrarDepartamento', 'guardarDepartamento')->name('registrarDepartamento.guardarDepartamento');



});

Route::controller(LineasController::class)->group(function(){
    Route::get('lineas', 'mostrarLineas')->name('lineas.mostrarLineas');
    Route::get('registrarLinea', 'registrarLinea')->name('registrarLinea.registrarLinea');
    Route::post('registrarLinea', 'guardarLinea')->name('registrarLinea.guardarLinea');

    Route::get('editarLinea/{id}', 'edit')->name('editarLinea.edit');
    Route::post('editarLinea/{id}', 'update')->name('editarLinea.update');

});

//Personas
Route::controller(PersonasController::class)->group(function(){
    Route::get('personas', 'mostrarPersonas')->name('personas.mostrarPersonas');
    Route::get('crearPersona', 'crearPersona')->name('crearPersona.crearPersona');
    Route::post('crearPersona', 'guardarPersona')->name('crearPersona.guardarPersona');

    Route::get('editarPersona/{id}', 'edit')->name('editarPersona.edit');
    Route::post('editarPersona{id}', 'update')->name('editarPersona.update');


});

//Entrega Lineas

Route::controller(EntregaLineasController::class)->group(function(){
    Route::get('entregaLineas', 'mostrarEntregaLineas')->name('entregaLineas.mostrarEntregaLineas');

    Route::get('registroEntregaLinea', 'registrarEntregaLinea')->name('registroEntregaLinea.registrarEntregaLinea');
    Route::post('registroEntregaLinea', 'guardarEntregaLinea')->name('registroEntregaLinea.guardarEntregaLinea');

    Route::get('eliminarEntregaLinea/{id}', 'eliminarEntregaLinea')->name('eliminarEntregaLinea.eliminarEntregaLinea');
    
    Route::get('editarEntregaLinea/{id}', 'edit')->name('editarEntregaLinea.edit');
    Route::post('editarEntregaLinea/{id}', 'update')->name('editarEntregaLinea.update');

    Route::get('filtrarEntregaLineas', 'filtrar')->name('filtrarEntregaLineas.filtrar');
    
    Route::get('entregaLineaPdf/{id}', 'mostrarPdf')->name('entregaLineaPdf.mostrarPdf');

    Route::get('entregaLineasExcel', 'generarExcel')->name('entregaLineasExcel.generarExcel');


});

//Retiros telefono
Route::controller(EntregaTelefonosController::class)->group(function(){
    Route::get('entregaTelefonos', 'mostrarEntregaTelefonos')->name('entregaTelefonos.mostrarEntregaTelefonos');

    Route::get('registroEntregaTelefono', 'registrarEntregaTelefono')->name('registroEntregaTelefono.registrarEntregaTelefono');
    Route::post('registroEntregaTelefono', 'guardarEntregaTelefono')->name('registroEntregaTelefono.guardarEntregaTelefono');


   // Route::get('eliminarDetalleTelefono/{id}', 'eliminarDetalleTelefono')->name('eliminarDetalleTelefono.eliminarDetalleTelefono');


    Route::get('editarEntregaTelefono{id}', 'edit')->name('editarEntregaTelefono.edit');
    Route::post('editarEntregaTelefono/{id}', 'update')->name('editarEntregaTelefono.update');

    Route::get('filtrarEntregaTelefonos', 'filtrar')->name('filtrarEntregaTelefonos.filtrar');

    Route::get('entregaTelefonoPdf/{id}', 'mostrarPdf')->name('entregaTelefonoPdf.mostrarPdf');


});

//Retiros Bams
Route::controller(EntregaBamsController::class)->group(function(){
    Route::get('entregaBams', 'mostrar')->name('entregaBams.mostrar');

    Route::get('registroEntregaBams', 'registrar')->name('registroEntregaBams.registrar');
    Route::post('registroEntregaBams', 'guardar')->name('registroEntregaBams.guardar');


   // Route::get('eliminarDetalleTelefono/{id}', 'eliminarDetalleTelefono')->name('eliminarDetalleTelefono.eliminarDetalleTelefono');


    Route::get('editarEntregaBam{id}', 'edit')->name('editarEntregaBam.edit');
    Route::post('editarEntregaBam/{id}', 'update')->name('editarEntregaBam.update');

    Route::get('filtrarEntregaBams', 'filtrar')->name('filtrarEntregaBams.filtrar');

    Route::get('entregaBamPdf/{id}', 'pdf')->name('entregaBamPdf.pdf');


});

//Retiros Puntos de Ventas
Route::controller(EntregaPuntosVentasController::class)->group(function(){
    Route::get('entregaPuntosVentas', 'mostrar')->name('entregaPuntosVentas.mostrar');

    Route::get('registroEntregaPuntosVentas', 'registrar')->name('registroEntregaPuntosVentas.registrar');
    Route::post('registroEntregaPuntosVentas', 'guardar')->name('registroEntregaPuntosVentas.guardar');


   // Route::get('eliminarDetalleTelefono/{id}', 'eliminarDetalleTelefono')->name('eliminarDetalleTelefono.eliminarDetalleTelefono');


    Route::get('editarEntregaPuntoVenta{id}', 'edit')->name('editarEntregaPuntoVenta.edit');
    Route::post('editarEntregaPuntoVenta/{id}', 'update')->name('editarEntregaPuntoVenta.update');

    Route::get('filtrarEntregaPuntosVentas', 'filtrar')->name('filtrarEntregaPuntosVentas.filtrar');

    Route::get('entregaPuntoVentaPdf/{id}', 'pdf')->name('entregaPuntoVentaPdf.pdf');


});

//Comunicacion Interna
Route::controller(ComunicacionInternaController::class)->group(function(){
    Route::get('comunicacionInterna', 'mostrarComunicacionInterna')->name('comunicacionInterna.mostrarComunicacionInterna');

    Route::get('registrarComunicacionInterna', 'registrarComunicacionInterna')->name('registrarComunicacionInterna.registrarComunicacionInterna');
    Route::post('registrarComunicacionInterna', 'guardarComunicacionInterna')->name('registrarComunicacionInterna.guardarComunicacionInterna');

    Route::get('editarComunicacionInterna{id}', 'edit')->name('editarComunicacionInterna.edit');
    Route::post('editarComunicacionInterna/{id}', 'update')->name('editarComunicacionInterna.update');

    Route::get('eliminarComunicacionInterna/{id}', 'eliminarComunicacion')->name('eliminarComunicacionInterna.eliminarComunicacion');

    Route::get('pdf/{id}', 'mostrarPdf')->name('pdf.mostrarPdf');

});


Route::post('/buscarEmpleado', [RetirosController::class,'buscarEmpleado']);
Route::post('/buscarPersona', [RetirosController::class,'buscarPersona']);























