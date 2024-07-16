<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QAController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;

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
    if(Auth::user()){
    return redirect(route('admin.dashboard'));
    }
    return view('auth.login');
});

include 'auth.php';

Route::group(['middleware'=>['web','isAdmin']],function(){
    Route::get('lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('language.change');

    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
  //Category Routes
    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::post('/add-category',[CategoryController::class,'store'])->name('category.store');
    Route::get('/get-category-data/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/edit-category',[CategoryController::class,'update'])->name('category.update');
    Route::post('/delete-category',[CategoryController::class,'delete'])->name('category.delete');

    //Inventory Routes
    Route::get('/inventory',[InventoryController::class,'Index'])->name('inventory');
    Route::post('/add-inventory',[InventoryController::class,'store'])->name('inventory.store');
    Route::get('/get-inventory-data/{id}',[InventoryController::class,'edit'])->name('inventory.edit');
    Route::post('/edit-inventory',[InventoryController::class,'update'])->name('inventory.update');
    Route::post('/delete-inventory',[InventoryController::class,'delete'])->name('inventory.delete');

    //Users Routes

     Route::get('/users',[UserController::class,'index'])->name('users')->middleware('can:isAdmin');
     Route::post('/add-user',[UserController::class,'store'])->middleware('can:isAdmin');
     Route::get('/get-user-data/{id}',[UserController::class,'edit'])->middleware('can:isAdmin');
     Route::post('/update-user',[UserController::class,'update'])->middleware('can:isAdmin');
     Route::post('/delete-user',[UserController::class,'delete'])->middleware('can:isAdmin');

});


