<?php

use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\viewController;
use App\Http\Controllers\landingController;
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

// Route::get('/', function () {
//     return view('welcome');
// }); 


Route::get('/', [landingController::class, 'index'])->name('index');

Route::get('/administrator', [viewController::class, 'administrator'])->name('administrator');
Route::get('/admin/banner', [viewController::class, 'banner'])->name('banner');
Route::get('/admin/gallery-project', [viewController::class, 'gallery_project'])->name('gallery_project');
Route::get('/admin/blog', [viewController::class, 'blog'])->name('blog');
Route::get('/admin/testimoni', [viewController::class, 'testimoni'])->name('testimoni');