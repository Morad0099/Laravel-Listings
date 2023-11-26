<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
COMMON RESOURCE ROUTES
index - show all listings
show - show single listing
create - show form to create new listing
store - store new listing
edit - show form to edit listing
update - update listing
destroy - delete listing
*/
//ALL LISTINGS
Route::get('/', [ListingController::class,'index']);

//Show create form
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//Update listings
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete listings
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//SINGLE LISTINGS
Route::get('/listings/{listing}', [ListingController::class,'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class,'store']);

//Log User Out
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

//Show Login Form
Route::get('login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class,'authenticate']);























// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
