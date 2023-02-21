<?php

use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\blogController;
use App\Http\Controllers\admin\category_blogController;
use App\Http\Controllers\admin\category_projectController;
use App\Http\Controllers\admin\gallery_projectController;
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
Route::get('/admin/category-project', [viewController::class, 'category_project'])->name('category_project');
Route::get('/admin/blog', [viewController::class, 'blog'])->name('blog');
Route::get('/admin/category-blog', [viewController::class, 'category_blog'])->name('category_blog');
Route::get('/admin/testimoni', [viewController::class, 'testimoni'])->name('testimoni');


// -------------------- Start Banner ----------------------- //
Route::get('/admin/banner/add-banner', [bannerController::class, 'add_banner'])->name('add_banner');
Route::post('/admin/banner/insert-banner', [bannerController::class, 'insert_banner'])->name('insert_banner');
Route::get('/admin/banner/edit-banner/{id}', [bannerController::class, 'edit_banner'])->name('edit_banner');
Route::post('/admin/banner/update-banner/{id}', [bannerController::class, 'update_banner'])->name('update_banner');
Route::get('/admin/banner/delete-banner/{id}', [bannerController::class, 'delete_banner'])->name('delete_banner');
// -------------------- End Banner ----------------------- //




// -------------------- Start Gallery Project ----------------------- //
Route::get('/admin/gallery-project/add-gallery-project', [gallery_projectController::class, 'add_gallery_project'])->name('add_gallery_project');
Route::post('/admin/gallery-project/insert-gallery-project', [gallery_projectController::class, 'insert_gallery_project'])->name('insert_gallery_project');
Route::get('/admin/gallery-project/edit-gallery-project/{id}', [gallery_projectController::class, 'edit_gallery_project'])->name('edit_gallery_project');
Route::post('/admin/gallery-project/update-gallery-project/{id}', [gallery_projectController::class, 'update_gallery_project'])->name('update_gallery_project');
Route::get('/admin/gallery-project/delete-gallery-project/{id}', [gallery_projectController::class, 'delete_gallery_project'])->name('delete_gallery_project');
// -------------------- End Gallery Project ----------------------- //




// -------------------- Start Category Project ----------------------- //
Route::get('/admin/category-project/add-category-project', [category_projectController::class, 'add_category_project'])->name('add_category_project');
Route::post('/admin/category-project/insert-category-project', [category_projectController::class, 'insert_category_project'])->name('insert_category_project');
Route::get('/admin/category-project/edit-category-project/{id}', [category_projectController::class, 'edit_category_project'])->name('edit_category_project');
Route::post('/admin/category-project/update-category-project/{id}', [category_projectController::class, 'update_category_project'])->name('update_category_project');
Route::get('/admin/category-project/delete-category-project/{id}', [category_projectController::class, 'delete_category_project'])->name('delete_category_project');
// -------------------- End Category Project ----------------------- //




// -------------------- Start Category Project ----------------------- //
Route::get('/admin/category-blog/add-category-blog', [category_blogController::class, 'add_category_blog'])->name('add_category_blog');
Route::post('/admin/category-blog/insert-category-blog', [category_blogController::class, 'insert_category_blog'])->name('insert_category_blog');
Route::get('/admin/category-blog/edit-category-blog/{id}', [category_blogController::class, 'edit_category_blog'])->name('edit_category_blog');
Route::post('/admin/category-blog/update-category-blog/{id}', [category_blogController::class, 'update_category_blog'])->name('update_category_blog');
Route::get('/admin/category-blog/delete-category-blog/{id}', [category_blogController::class, 'delete_category_blog'])->name('delete_category_blog');
// -------------------- End Category Project ----------------------- //




// -------------------- Start Category Project ----------------------- //
Route::get('/admin/blog/add-blog', [blogController::class, 'add_blog'])->name('add_blog');
Route::post('/admin/blog/insert-blog', [blogController::class, 'insert_blog'])->name('insert_blog');
Route::get('/admin/blog/edit-blog/{id}', [blogController::class, 'edit_blog'])->name('edit_blog');
Route::post('/admin/blog/update-blog/{id}', [blogController::class, 'update_blog'])->name('update_blog');
Route::get('/admin/blog/delete-blog/{id}', [blogController::class, 'delete_blog'])->name('delete_blog');
// -------------------- End Category Project ----------------------- //