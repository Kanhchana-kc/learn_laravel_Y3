<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;

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
// Show list of books
Route::get('/books', [BookController::class, 'index'])->name('books.list');

// Show details of a specific book
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::resource('/product',ProductController::class);

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

/////


// TO-DO List Routes
Route::get('/todos', [TodoController::class, 'index'])->name("todos.list");

Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');

Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.delete');

Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todos.show');

Route::get('/',[FrontendController::class,'index']);
Route::get('/cart', [FrontendController::class, 'index'])->name('cart');
Route::get('/list',[FrontendController::class,'list']);
Route::get('/show/{id}',[FrontendController::class,'show']);
Route::get('/frontend/{category?}', [FrontendController::class,'getByCategory']);
Route::get('/search', [FrontendController::class,'getBySearch']);