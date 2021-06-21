<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Details;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Members; //Load class Members 
use App\Http\Livewire\Games;
use App\Http\Livewire\Home;

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
    return view('landingpage');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'accessrole']], function() {
    Route::get('/dashboard', function() {
        return view('dashboard2');
    })->name('dashboard');

    // Route::get('index',[HomeController::class,'index']);    
    Route::get('home', Home::class)->name('home');
    Route::get('member', Members::class)->name('member'); //Tambahkan routing ini
    Route::get('game', Games::class)->name('game');
    Route::get('detail', Details::class)->name('detail');
});