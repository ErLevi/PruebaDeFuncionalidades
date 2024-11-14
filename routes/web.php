<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsManagerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ConektaController;

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

Route::get("pdf/reader", [DocumentsManagerController::class, 'readPdf']);
Route::get("pago/tarjeta", [StripeController::class, 'PagoTarjeta']);
Route::get("conekta/test", [ConektaController::class, 'testingConection']);