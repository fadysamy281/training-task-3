<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ListsController;

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
define('PAGINATION_COUNT',5);
define('lists_path','/images/lists/');
    ######################### Begin Sections Routes ########################
Route::prefix('sections')->name('sections.')->group(function(){
	  Route::get('index'     ,[SectionsController::class, 'index'])->name('index');
	  Route::get('create'    ,[SectionsController::class, 'create'])->name('create');
	  Route::post('store'    ,[SectionsController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[SectionsController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[SectionsController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[SectionsController::class, 'destroy'])->name('destroy');

});

    ######################### End Sections Routes ########################

    ######################### Begin Lists Routes ########################
Route::prefix('lists')->name('lists.')->group(function(){
	  Route::get('index'     ,[ListsController::class, 'index'])->name('index');
	  Route::get('create'    ,[ListsController::class, 'create'])->name('create');
	  Route::post('store'    ,[ListsController::class, 'store'])->name('store');
	  Route::get('{id}/edit' ,[ListsController::class, 'edit'])->name('edit');
	  Route::post('{id}/update',[ListsController::class, 'update'])->name('update');
	  Route::post('destroy/{id}'  ,[ListsController::class, 'destroy'])->name('destroy');

});

    ######################### End lists Routes ########################
