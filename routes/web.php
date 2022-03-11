<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuoteController;

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

Route::get('',[QuoteController::class, 'home']);

Route::get('/quote/random', [QuoteController::class, 'getRandomQuote']);
Route::get('/quote/customize/show', [QuoteController::class, 'showCustomQuote']);
Route::get('/quote/customize', [QuoteController::class, 'getCustomQuote']);

Route::get('/quote/category/list', [QuoteController::class, 'showCategories']);
Route::get('/quote/category', [QuoteController::class, 'getQuoteByCategory']);

