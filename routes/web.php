<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/articles/show', [ArticleController::class, 'index']);
Route::resource('article', ArticleController::class);

Route::get('/signup', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'registration']);

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/galery/{full_image}', [MainController::class, 'show']);

Route::get('/about', function () {
    return view('components/about');
})->name('about');

Route::get('/contacts', function () {
    $contacts = [
        'address' => 'г. Москва, ул. Новокузнецкая улица, д. 24с1',
        'phone' => '+7 (918) 634-21-56',
        'email' => 'novolentanews@mail.ru',
        'work_time' => 'Пн–Пт: 09:00–18:00',
    ];

    return view('components/contacts', compact('contacts'));
})->name('contacts');
