<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Business_HomeController;
use App\Http\Controllers\Business_PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/business', [Business_HomeController::class, 'index'])->name('business_home');
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        //Categories management
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.store');
        Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        //AdminController
        Route::get('/admin/users', [AdminController::class,'index'])->name('admin.users');
        Route::get('/admin/verify/user/{id}', [AdminController::class,'verifyUser'])->name('admin.verify.user');
    });
    Route::middleware(['client'])->group(function () {
        //Posts
        Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
        Route::post('/posts/store', [PostController::class,'store'])->name('posts.store');
        Route::delete('/posts/destroy/{slug}', [PostController::class,'destroy'])->name('posts.destroy');
        Route::get('/posts/edit/{slug}', [PostController::class,'edit'])->name('posts.edit');
        Route::patch('/posts/update/{slug}', [PostController::class,'update'])->name('posts.update');
        //BusinessPosts
        Route::get('/business_posts/create', [Business_PostController::class,'create'])->name('business_posts.create');
        Route::post('/business_posts/store', [Business_PostController::class,'store'])->name('business_posts.store');
        Route::delete('/business_posts/destroy/{slug}', [Business_PostController::class,'destroy'])->name('business_posts.destroy');
        Route::get('/business_posts/edit/{slug}', [Business_PostController::class,'edit'])->name('business_posts.edit');
        Route::patch('/business_posts/update/{slug}', [Business_PostController::class,'update'])->name('business_posts.update');
        //Votes
        Route::get('vote/remove/{id}', [RatingController::class,'remove'])->name('vote.remove');
        Route::post('vote/{id}', [RatingController::class,'vote'])->name('vote');
        Route::post('sort', [RatingController::class,'sort'])->name('sort');
        //Orders
        Route::get('orders', [OrderController::class,'index'])->name('orders');
        Route::get('order/{slug}', [OrderController::class,'create'])->name('order');
        Route::get('order/view/{id}', [OrderController::class,'view'])->name('orders.view');
        Route::post('order/store/{slug}', [OrderController::class,'store'])->name('orders.store');
        //Applications
        Route::get('application/{id}', [ApplicationController::class,'create'])->name('application');
        Route::post('applications/store/{id}', [ApplicationController::class,'store'])->name('applications.store');
    });
    //Categories
    Route::get('/categories/{slug}', [CategoryController::class, 'indexSub'])->name('subCategory');
    //Posts
    Route::get('/posts', [PostController::class,'index'])->name('posts.index');
    Route::get('/posts/{slug}', [PostController::class,'show'])->name('posts.show');
    Route::get('/categories/{main_slug}/{slug}', [PostController::class,'indexByCategory'])->name('category.posts.index');
    //Business Posts
    Route::get('/business_posts', [Business_PostController::class,'index'])->name('business_posts.index');
    Route::get('/business_posts/{slug}', [Business_PostController::class,'show'])->name('business_posts.show');
    Route::get('/business_posts/categories/{slug}', [Business_PostController::class,'indexByCategory'])->name('category.business_posts.index');
});


require __DIR__.'/auth.php';
