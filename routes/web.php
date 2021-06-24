<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ClientController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect('welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/test', [TestController::class, 'test'])->middleware(['auth', 'verified'])->name('test');
Route::get('/test3', [TestController::class, 'test3'])->middleware(['auth', 'verified'])->name('test3');
Route::get('/store', [TestController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/upload', [TestController::class, 'upload'])->middleware(['auth', 'verified'])->name('upload');

Route::get('/test2', function () {
    return Inertia::render('Test2');
})->middleware(['auth', 'verified'])->name('test2');


//Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    //->middleware(['auth', 'verified'])->name('ckfinder_connector');

//Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    //->middleware(['auth', 'verified'])->name('ckfinder_browser');

//Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->middleware(['auth', 'verified'])->name('ckeditor.upload');

Route::resource('page', PageController::class)->middleware(['auth', 'verified']);
Route::resource('client', ClientController::class)->middleware(['auth', 'verified']);

Route::get('/payment/{id}', [ClientController::class,'order'])->name('order');
Route::get('/welcome', [ClientController::class,'welcome'])->name('welcome');
Route::post('/iyzicocallback', [ClientController::class,'iyzicocallback'])->name('iyzicocallback');

require __DIR__ . '/auth.php';
