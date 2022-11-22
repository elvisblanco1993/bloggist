<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\WebsiteController;
use App\Http\Livewire\Admin\Dashboard\Counters;
use App\Http\Livewire\Web\Article\Show as ArticleShow;
use App\Http\Livewire\Web\Article\Search as ArticleSearch;
use App\Http\Livewire\Web\Author\Show as AuthorShow;
use App\Http\Livewire\Web\Category\Show as CategoryShow;
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

Route::middleware('visitor')->group(function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/{article}', ArticleShow::class)->name('article');
    Route::get('/search/{term}', ArticleSearch::class)->name('articles.search');
    Route::get('/author/{author}', AuthorShow::class)->name('author.show');
    Route::get('/category/{category}', CategoryShow::class)->name('category.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    Route::get('/dashboard', Counters::class)->name('dashboard');
    Route::get('/articles', \App\Http\Livewire\Admin\Article\Index::class)->name('admin.articles');
    Route::get('/article/new', \App\Http\Livewire\Admin\Article\Create::class)->name('admin.articles.create');
    Route::get('/categories', \App\Http\Livewire\Admin\Category\Index::class)->name('admin.categories');
    Route::get('/article/{article}/edit', \App\Http\Livewire\Admin\Article\Edit::class)->name('admin.articles.edit');
    Route::get('/subscribers', \App\Http\Livewire\Admin\Subscriber\Index::class)->name('admin.subscribers');
});
