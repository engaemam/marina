<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Auth::routes();





Route::group([ 'middleware' => ['checkadmin']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //create_ admins and accountants
    Route::get('create/user', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('create/user', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    //create Clients
    Route::get('/create/client', [App\Http\Controllers\AdminController::class, 'showCreateClient'])->name('create_client');
    Route::post('/create/client', [App\Http\Controllers\AdminController::class, 'createClient']);


    //create Boats
    Route::get('/list/boats', [App\Http\Controllers\BoatsController::class, 'index']);
    Route::get('/create/boat', [App\Http\Controllers\AdminController::class, 'showCreateBoat'])->name('create_boat');
    Route::post('/create/boat', [App\Http\Controllers\AdminController::class, 'createBoat']);

    Route::get('/edit/boat/{boat_id}', [App\Http\Controllers\BoatsController::class, 'edit']);
    Route::post('/edit/boat', [App\Http\Controllers\BoatsController::class, 'editBoat'])->name('edit_boat');
    //create  Package

    Route::get('/create/package', [App\Http\Controllers\AdminController::class, 'showCreatePackage'])->name('create_package');
    Route::post('/create/package', [App\Http\Controllers\AdminController::class, 'createPackage']);


    //create Invoice

    Route::get('/create/invoice', [App\Http\Controllers\AdminController::class, 'showCreateInvoice'])->name('create_invoice');
    Route::post('/create/invoice', [App\Http\Controllers\AdminController::class, 'createInvoice']);


    Route::get('/pay/invoice', [App\Http\Controllers\AdminController::class, 'showPayInvoice'])->name('pay_invoice');
    Route::post('/pay/invoice', [App\Http\Controllers\AdminController::class, 'payInvoice']);


    Route::get('/get/invoice/{invoice_id}', [App\Http\Controllers\AdminController::class, 'getInvoice'])->name('get_invoice');
});