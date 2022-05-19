<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [MainController::class, 'acMain']);

Route::get('/blog', [MainController::class, 'acBlog']);

Route::get('/infocats', [MainController::class, 'acBlog']);

Route::get('/infocats/porodicats', [MainController::class, 'acPorodi']);

Route::get('/infocats/allaboutcat', [MainController::class, 'acAllprocats']);

Route::get('/dogi', [MainController::class, 'acDogs']);

Route::get('/aqua', [MainController::class, 'acAquarium']);

Route::get('/terrka', [MainController::class, 'acTerrarium']);

Route::get('/popugaiki', [MainController::class, 'acBirds']);

Route::get('/inter/funanimals', [MainController::class, 'acInteractivePhoto']);

Route::get('/inter', [MainController::class, 'acInteractive']);

Route::get('/absite', [MainController::class, 'acAboutsites']);

Route::get ('/console', [AdminController::class, "acConsole"]);

Route::get ('/console/update/{id}', [AdminController::class, "acConsoleFormUpdate"]);

Route::post ('/console/addpage', [AdminController::class, "acAddPage"]);

Route::post ('/console/add', [AdminController::class, "acConsoleFormAdd"]);

Route::post ('/console/addSection', [AdminController::class, "acSection"]);

Route::post ('/admin/modification',  [AdminController::class, "acDataModification"]);

Route::get ('/admin/delete/{id}',  [AdminController::class, "acDataDelete"]);

Route::get ('/{newPage}/{razdel}',  [MainController::class, "acNewRazdel"]);

Route::get ('/{newPage}',  [MainController::class, "acNewPage"]);



