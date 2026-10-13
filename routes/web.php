<?php

// Import the ProductController to handle product CRUD actions
use App\Http\Controllers\ProductController;

// Import Laravel's Route facade to define application routes
use Illuminate\Support\Facades\Route;

// Homepage: redirect any visitor to the login page
Route::get('/', function () {
    return redirect('/login');
});

// Group all routes below so only authenticated users can access them
Route::middleware('auth')->group(function () {

    // Dashboard: redirect logged-in users to the product list
    Route::get('/dashboard', function () {
        return redirect('/product');
    })->name('dashboard');

    // ─── Product CRUD Routes ─────────────────────────────────

    // Show the list of all products
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    // Show the form to create a new product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    // Save a newly created product to the database
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');

    // Show the form to edit a specific product (by ID)
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

    // Update a specific product in the database
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');

    // Delete a specific product from the database
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});

// Load Breeze's authentication routes (login, register, logout, password reset)
require __DIR__.'/auth.php';