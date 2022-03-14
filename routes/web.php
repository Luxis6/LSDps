<?php

use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use App\Models\Post;
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
Route::get('/', function () {
    $posts = Post::all();
    $categories = Category::all();
    return view('home.index',
        [
            'posts' => $posts,
            'categories' => $categories
        ]);
})->name('home');
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        //Categories management
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.store');
        Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    //Posts
    Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class,'store'])->name('posts.store');
    Route::get('/posts/index', [PostController::class,'index'])->name('posts.index');
    Route::get('/posts/show/{slug}', [PostController::class,'show'])->name('posts.show');
    Route::delete('/posts/destroy/{slug}', [PostController::class,'destroy'])->name('posts.destroy');
    Route::get('/posts/edit/{slug}', [PostController::class,'edit'])->name('posts.edit');
    Route::patch('/posts/update/{slug}', [PostController::class,'update'])->name('posts.update');
    //Votes
    Route::get('vote/remove/{id}', [RatingController::class,'remove'])->name('vote.remove');
    Route::post('vote/{id}', [RatingController::class,'vote'])->name('vote');
    Route::post('sort', [RatingController::class,'sort'])->name('sort');
    //Orders
    Route::get('orders', [OrderController::class,'index'])->name('orders');
    Route::get('order/{id}', [OrderController::class,'create'])->name('order');
    Route::get('order/view/{id}', [OrderController::class,'view'])->name('orders.view');
    Route::post('order/submit/{id}', [OrderController::class,'store'])->name('orders.store');
});


require __DIR__.'/auth.php';
