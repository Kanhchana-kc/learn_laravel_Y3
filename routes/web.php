<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/user/{name}', [UserController::class, 'showProfile']);

Route::get('/hello123', [HelloController::class, 'showMessage']);
Route::get('/welcome', function () {
    return "Welcome to Laravel!";
});
Route::get('/user/{name}', function ($name) {
    return "Hello, " . $name;
});

Route::get('/profile', function () {
    return "User Profile";
})->name('profile');
// Generating URL 
$url = URL('profile');

Route::get('/greeting', function () {
    return view('greet', ['name' => 'John']);
});

Route::get('/basic', function () {
    return view('basic', ['role' => 'admin']);
});

Route::get('/profile', function () {
    return view('profile', ['name' => 'John', 'age' => 25]);
});

Route::get('/dashboard', function () {
    $username = 'Alice';
    return view('dashboard', compact('username'));
});

Route::get('/settings', function () {
    return view('settings')->with('theme', 'dark mode');
});

Route::get('home', function () {
    return view('home');
});
Route::get('/category', [CategoryController::class, 'index'])->name("category.list");

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");
// Book routes


Route::get('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/create', [BookController::class, 'create'])->name("books.create");
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::resource('books', BookController::class);
// Route::delete("/books/{booksId}", [CategoryController::class, 'destroy'])->name('books.delete');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');