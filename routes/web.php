<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;

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
    $articles = Article::all();

    return view('home', ['articles' => $articles]);
});

Route::get('articles/{id}', function ($id) {
    $article = Article::find($id);

    if (!$article) {
        return redirect('/');
    }

    return view('item', ['article' => $article]);
})->name('articles');

Route::redirect('/articles', '/');

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin', function () {
    $items = [
        (object) ['name' => 'Manage categories', 'link' => route('admin.categories.index')],
        (object) ['name' => 'Manage tags', 'link' => route('admin.tags.index')],
        (object) ['name' => 'Manage articles', 'link' => route('admin.articles.index')]
    ];

    return view('dashboard', ['items' => $items, 'header' => 'Dashboard']);
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('admin/categories', CategoriesController::class)->names('admin.categories');

Route::resource('admin/tags', TagsController::class)->names('admin.tags');

Route::resource('admin/articles', ArticlesController::class)->names('admin.articles');

require __DIR__.'/auth.php';
