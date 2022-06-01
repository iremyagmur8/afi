<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;




Route::get('/',[HomepageController::class,'index'])->name('index')->defaults('page', 3);
Route::get('/about-us/{id}.html',[HomepageController::class,'about'])->name('about')->defaults('page', 4);
Route::get('/certificates',[HomepageController::class,'certificates'])->name('certificates')->defaults('page', 6);
Route::get('/references',[HomepageController::class,'references'])->name('references')->defaults('page', 8);
Route::get('/contact',[HomepageController::class,'contact'])->name('contact')->defaults('page', 11);
Route::get('/technical/{id}.html',[HomepageController::class,'technical'])->name('technical')->defaults('page', 10);
Route::get('/catalogues/{id}.html',[HomepageController::class,'category'])->name('category')->defaults('page', 7);
Route::get('/partners/{id}.html',[HomepageController::class,'category'])->name('category')->defaults('page', 9);
Route::get('/products/{id}.html',[HomepageController::class,'products'])->name('products')->defaults('page', 5);
Route::get('/products/product/{id}.html',[HomepageController::class,'productDetail'])->name('productDetail')->defaults('page', 5);



require __DIR__.'/auth.php';
require __DIR__.'/solaris.php';
