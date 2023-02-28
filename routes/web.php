<?php

use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\blogController;
use App\Http\Controllers\admin\category_blogController;
use App\Http\Controllers\admin\category_projectController;
use App\Http\Controllers\admin\comment_projectController;
use App\Http\Controllers\admin\comment_blogController;
use App\Http\Controllers\admin\cvController;
use App\Http\Controllers\admin\gallery_projectController;
use App\Http\Controllers\admin\testimoniController;
use App\Http\Controllers\admin\contactController;
use App\Http\Controllers\admin\viewController;
use App\Http\Controllers\authController;
use App\Http\Controllers\landingController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/ms-admin-ikhsannawawi', function () {
    Artisan::call('migrate:fresh --seed');
    return redirect()->route('index');
});  


Route::get('/', [landingController::class, 'index'])->name('index');



// -------------------- Start Download Cv ----------------------- //
Route::get('/download-cv', [cvController::class, 'cvDownload'])->name('cvDownload');
// -------------------- End Download Cv ----------------------- //



// -------------------- Start Blog Landing ----------------------- //
Route::get('/blog', [landingController::class, 'blog_index'])->name('blog_index');
Route::get('/blog/{slug}', [landingController::class, 'blog_detail'])->name('blog_detail');
Route::get('/blog/category/{slug}', [landingController::class, 'blog_category'])->name('blog_category');
Route::post('/blog/insert-comment/{slug}', [landingController::class, 'insert_comment_blog_detail'])->name('insert_comment_blog_detail');
// -------------------- End Blog Landing ----------------------- //

// -------------------- Start Project Landing ----------------------- //
Route::get('/project', [landingController::class, 'project'])->name('project');
Route::get('/project/{slug}', [landingController::class, 'project_detail'])->name('project_detail');
Route::get('/project/category/{slug}', [landingController::class, 'project_category'])->name('project_category');
Route::post('/project/insert-comment/{slug}', [landingController::class, 'insert_comment_project_detail'])->name('insert_comment_project_detail');
// -------------------- End Project Landing ----------------------- //

Route::get('/administrator', [viewController::class, 'administrator'])->name('administrator')->middleware('auth');
Route::get('/admin/banner', [viewController::class, 'banner'])->name('banner')->middleware('auth');
Route::get('/admin/gallery-project', [viewController::class, 'gallery_project'])->name('gallery_project')->middleware('auth');
Route::get('/admin/category-project', [viewController::class, 'category_project'])->name('category_project')->middleware('auth');
Route::get('/admin/blog', [viewController::class, 'blog'])->name('blog')->middleware('auth');
Route::get('/admin/category-blog', [viewController::class, 'category_blog'])->name('category_blog')->middleware('auth');
Route::get('/admin/testimoni', [viewController::class, 'testimoni'])->name('testimoni');
Route::get('/admin/comment-project', [viewController::class, 'comment_project'])->name('comment_project')->middleware('auth');
Route::get('/admin/comment-blog', [viewController::class, 'comment_blog'])->name('comment_blog')->middleware('auth');
Route::get('/admin/cv', [viewController::class, 'cv'])->name('cv')->middleware('auth');
Route::get('/admin/contact-us', [viewController::class, 'contact_us'])->name('contact_us')->middleware('auth');
Route::get('/admin/user', [authController::class, 'user'])->name('user')->middleware('auth');


// -------------------- Start Banner ----------------------- //
Route::post('/contact-us', [contactController::class, 'storeMessage'])->name('storeMessage');
Route::post('/admin/contact-us/update-read-contact-us/{id}', [contactController::class, 'read'])->name('read')->middleware('auth');
// -------------------- End Banner ----------------------- //




// -------------------- Start Banner ----------------------- //
Route::get('/admin/banner/add-banner', [bannerController::class, 'add_banner'])->name('add_banner')->middleware('auth');
Route::post('/admin/banner/insert-banner', [bannerController::class, 'insert_banner'])->name('insert_banner')->middleware('auth');
Route::get('/admin/banner/edit-banner/{id}', [bannerController::class, 'edit_banner'])->name('edit_banner')->middleware('auth');
Route::post('/admin/banner/update-banner/{id}', [bannerController::class, 'update_banner'])->name('update_banner')->middleware('auth');
Route::get('/admin/banner/delete-banner/{id}', [bannerController::class, 'delete_banner'])->name('delete_banner')->middleware('auth');
// -------------------- End Banner ----------------------- //




// -------------------- Start Gallery Project ----------------------- //
Route::get('/admin/gallery-project/add-gallery-project', [gallery_projectController::class, 'add_gallery_project'])->name('add_gallery_project')->middleware('auth');
Route::post('/admin/gallery-project/insert-gallery-project', [gallery_projectController::class, 'insert_gallery_project'])->name('insert_gallery_project')->middleware('auth');
Route::get('/admin/gallery-project/edit-gallery-project/{id}', [gallery_projectController::class, 'edit_gallery_project'])->name('edit_gallery_project')->middleware('auth');
Route::post('/admin/gallery-project/update-gallery-project/{id}', [gallery_projectController::class, 'update_gallery_project'])->name('update_gallery_project')->middleware('auth');
Route::get('/admin/gallery-project/delete-gallery-project/{id}', [gallery_projectController::class, 'delete_gallery_project'])->name('delete_gallery_project')->middleware('auth');
// -------------------- End Gallery Project ----------------------- //




// -------------------- Start Category Project ----------------------- //
Route::get('/admin/category-project/add-category-project', [category_projectController::class, 'add_category_project'])->name('add_category_project')->middleware('auth');
Route::post('/admin/category-project/insert-category-project', [category_projectController::class, 'insert_category_project'])->name('insert_category_project')->middleware('auth');
Route::get('/admin/category-project/edit-category-project/{id}', [category_projectController::class, 'edit_category_project'])->name('edit_category_project')->middleware('auth');
Route::post('/admin/category-project/update-category-project/{id}', [category_projectController::class, 'update_category_project'])->name('update_category_project')->middleware('auth');
Route::get('/admin/category-project/delete-category-project/{id}', [category_projectController::class, 'delete_category_project'])->name('delete_category_project')->middleware('auth');
// -------------------- End Category Project ----------------------- //




// -------------------- Start Category Blog ----------------------- //
Route::get('/admin/category-blog/add-category-blog', [category_blogController::class, 'add_category_blog'])->name('add_category_blog')->middleware('auth');
Route::post('/admin/category-blog/insert-category-blog', [category_blogController::class, 'insert_category_blog'])->name('insert_category_blog')->middleware('auth');
Route::get('/admin/category-blog/edit-category-blog/{id}', [category_blogController::class, 'edit_category_blog'])->name('edit_category_blog')->middleware('auth');
Route::post('/admin/category-blog/update-category-blog/{id}', [category_blogController::class, 'update_category_blog'])->name('update_category_blog')->middleware('auth');
Route::get('/admin/category-blog/delete-category-blog/{id}', [category_blogController::class, 'delete_category_blog'])->name('delete_category_blog')->middleware('auth');
// -------------------- End Category Blog ----------------------- //




// -------------------- Start Blog ----------------------- //
Route::get('/admin/blog/add-blog', [blogController::class, 'add_blog'])->name('add_blog')->middleware('auth');
Route::post('/admin/blog/insert-blog', [blogController::class, 'insert_blog'])->name('insert_blog')->middleware('auth');
Route::get('/admin/blog/edit-blog/{id}', [blogController::class, 'edit_blog'])->name('edit_blog')->middleware('auth');
Route::post('/admin/blog/update-blog/{id}', [blogController::class, 'update_blog'])->name('update_blog')->middleware('auth');
Route::get('/admin/blog/delete-blog/{id}', [blogController::class, 'delete_blog'])->name('delete_blog')->middleware('auth');
// -------------------- End Blog ----------------------- //




// -------------------- Start Testimoni ----------------------- //
Route::get('/admin/testimoni/add-testimoni', [testimoniController::class, 'add_testimoni'])->name('add_testimoni');
Route::post('/admin/testimoni/insert-testimoni', [testimoniController::class, 'insert_testimoni'])->name('insert_testimoni');
Route::get('/admin/testimoni/edit-testimoni/{id}', [testimoniController::class, 'edit_testimoni'])->name('edit_testimoni')->middleware('auth');
Route::post('/admin/testimoni/update-testimoni/{id}', [testimoniController::class, 'update_testimoni'])->name('update_testimoni')->middleware('auth');
Route::get('/admin/testimoni/delete-testimoni/{id}', [testimoniController::class, 'delete_testimoni'])->name('delete_testimoni')->middleware('auth');
// -------------------- End Testimoni ----------------------- //





// -------------------- Start Comment Project ----------------------- //
Route::get('/admin/comment-project/add-comment-project', [comment_projectController::class, 'add_comment_project'])->name('add_comment_project')->middleware('auth');
Route::post('/admin/comment-project/insert-comment-project', [comment_projectController::class, 'insert_comment_project'])->name('insert_comment_project')->middleware('auth');
Route::get('/admin/comment-project/edit-comment-project/{id}', [comment_projectController::class, 'edit_comment_project'])->name('edit_comment_project')->middleware('auth');
Route::post('/admin/comment-project/update-comment-project/{id}', [comment_projectController::class, 'update_comment_project'])->name('update_comment_project')->middleware('auth');
Route::get('/admin/comment-project/delete-comment-project/{id}', [comment_projectController::class, 'delete_comment_project'])->name('delete_comment_project')->middleware('auth');
// -------------------- End Comment Project ----------------------- //





// -------------------- Start Comment Blog ----------------------- //
Route::get('/admin/comment-blog/add-comment-blog', [comment_blogController::class, 'add_comment_blog'])->name('add_comment_blog')->middleware('auth');
Route::post('/admin/comment-blog/insert-comment-blog', [comment_blogController::class, 'insert_comment_blog'])->name('insert_comment_blog')->middleware('auth');
Route::get('/admin/comment-blog/edit-comment-blog/{id}', [comment_blogController::class, 'edit_comment_blog'])->name('edit_comment_blog')->middleware('auth');
Route::post('/admin/comment-blog/update-comment-blog/{id}', [comment_blogController::class, 'update_comment_blog'])->name('update_comment_blog')->middleware('auth');
Route::get('/admin/comment-blog/delete-comment-blog/{id}', [comment_blogController::class, 'delete_comment_blog'])->name('delete_comment_blog')->middleware('auth');
// -------------------- End Comment Blog ----------------------- //





// -------------------- Start CV ----------------------- //
Route::get('/admin/cv/add-cv', [cvController::class, 'add_cv'])->name('add_cv')->middleware('auth');
Route::post('/admin/cv/insert-cv', [cvController::class, 'insert_cv'])->name('insert_cv')->middleware('auth');
Route::get('/admin/cv/edit-cv/{id}', [cvController::class, 'edit_cv'])->name('edit_cv')->middleware('auth');
Route::post('/admin/cv/update-cv/{id}', [cvController::class, 'update_cv'])->name('update_cv')->middleware('auth');
Route::get('/admin/cv/delete-cv/{id}', [cvController::class, 'delete_cv'])->name('delete_cv')->middleware('auth');
// -------------------- End CV ----------------------- //







// -------------------- Start Authentication ----------------------- //
Route::get('/admin/login', [authController::class, 'login'])->name('login');
Route::post('/admin/login-proses', [authController::class, 'login_proses'])->name('login_proses');
Route::get('/admin/logout', [authController::class, 'logout'])->name('logout');
// -------------------- Start Authentication ----------------------- //



// -------------------- Start User ----------------------- //
Route::get('/admin/user/add-user', [authController::class, 'add_user'])->name('add_user')->middleware('auth');
Route::post('/admin/user/insert-user', [authController::class, 'insert_user'])->name('insert_user')->middleware('auth');
Route::get('/admin/user/edit-user-password/{id}', [authController::class, 'edit_user_password'])->name('edit_user_password')->middleware('auth');
Route::post('/admin/user/update-user-password/{id}', [authController::class, 'update_user_password'])->name('update_user_password')->middleware('auth');
Route::get('/admin/user/edit-user/{id}', [authController::class, 'edit_user'])->name('edit_user')->middleware('auth');
Route::post('/admin/user/update-user/{id}', [authController::class, 'update_user'])->name('update_user')->middleware('auth');
Route::get('/admin/user/delete-user/{id}', [authController::class, 'delete_user'])->name('delete_user')->middleware('auth');
// -------------------- End User ----------------------- //