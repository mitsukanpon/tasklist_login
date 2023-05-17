<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(["auth", "verified"])->group(function(){
    Route::get("/dashboard", [TaskController::class, "show"])->name("dashboard");
    Route::get("task/create", [TaskController::class, "create"])->name("task.create");
    Route::get("task/edit/{id}", [TaskController::class, "edit"])->name("task.edit");
    Route::post("task/store", [TaskController::class, "store"])->name("task.store");
    Route::get("task/update/{id}", [TaskController::class, "update"])->name("task.update");
    Route::put("task/update/{id}", [TaskController::class, "update"])->name("task.update");
    Route::get("task/delete/{id}", [TaskController::class, "delete"])->name("task.delete");
    Route::delete("task/delete/{id}", [TaskController::class, "delete"])->name("task.delete");
});

// Route::get("/task/create", [TaskController::class, "create"])->middleware(["auth", "verified"])->name("task.create");
// Route::post("/task/store", [TaskController::class, "store"])->middleware(["auth", "verified"])->name("task.store");
// Route::get("/dashboard", [TaskController::class, "show"])->middleware(["auth", "verified"])->name("dashboard");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
