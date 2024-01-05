<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\B_DashboardController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactPagesController;
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
    return view('auth.login');
});
// Route::get('/index', function () {
//     return view('pages.index');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/index', [PagesController::class,'index'])->name('index');
Route::get('/b_master', [B_DashboardController::class,'master'])->name('b_master');


Route::get('/b_about', [B_DashboardController::class,'about'])->name('b_about');
Route::get('/b_contact', [B_DashboardController::class,'contact'])->name('b_contact');

Route::get('/b_main', [MainPagesController::class,'main'])->name('b_main');
Route::post('/b_main_update', [MainPagesController::class,'main_update'])->name('b_main_update');

// Service option
Route::get('/b_service',[ServicePagesController::class,'create'])->name('b_service_create');
Route::post('/b_service_store',[ServicePagesController::class,'store'])->name('b_service_store');
Route::get('/b_service_list',[ServicePagesController::class,'list'])->name('b_service_list');
Route::get('/b_service_edit/{id}',[ServicePagesController::class,'edit'])->name('b_service_edit');
Route::post('/b_service_update/{id}',[ServicePagesController::class,'update'])->name('b_service_update');
Route::get('/b_service_delete/{id}',[ServicePagesController::class,'delete'])->name('b_service_delete');

// portfolio option
Route::get('/b_portfolio',[PortfolioPagesController::class,'create'])->name('b_portfolio_create');
Route::post('/b_portfolio_store',[PortfolioPagesController::class,'store'])->name('b_portfolio_store');
Route::get('/b_portfolio_list',[PortfolioPagesController::class,'list'])->name('b_portfolio_list');
Route::get('/b_portfolio_edit/{id}',[PortfolioPagesController::class,'edit'])->name('b_portfolio_edit');
Route::post('/b_portfolio_update/{id}',[PortfolioPagesController::class,'update'])->name('b_portfolio_update');
Route::get('/b_portfolio_delete/{id}',[PortfolioPagesController::class,'delete'])->name('b_portfolio_delete');


// about option
Route::get('/b_about',[AboutPagesController::class,'create'])->name('b_about_create');
Route::post('/b_about_store',[AboutPagesController::class,'store'])->name('b_about_store');
Route::get('/b_about_list',[AboutPagesController::class,'list'])->name('b_about_list');
Route::get('/b_about_edit/{id}',[AboutPagesController::class,'edit'])->name('b_about_edit');
Route::post('/b_about_update/{id}',[AboutPagesController::class,'update'])->name('b_about_update');
Route::get('/b_about_delete/{id}',[AboutPagesController::class,'delete'])->name('b_about_delete');

Route::post('/b_contact_store',[ContactPagesController::class,'store'])->name('b_contact_store');