<?php

use App\Models\Article;
use App\Models\Category;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\CategoriesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::prefix('web')->as('web.')->middleware('auth')->group(function () {

    Route::get('/home', UserHomeController::class)->name('home');

    Route::resource('/articles', ArticlesController::class);

    Route::resource('/categories', CategoriesController::class);

    Route::resource('/comments', CommentController::class);

    Route::resource('/profile', ProfileController::class);
});
Route::get('/', function () {
    $articles = Article::inRandomOrder()->take(10)->get();
    $categories = Category::all();
    return view('web.website.home.index', compact('articles', 'categories'));
})->name('home.index');

Route::post('/notifications/{notification}/read', function ($notificationId) {
    $notification = auth()->user()->notifications()->findOrFail($notificationId);
    $notification->markAsRead();

    return response()->json(['status' => 'success']);
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
