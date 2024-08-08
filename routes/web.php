<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', [TravelWebController::class,'index']) ->middleware(['auth',
            'verified'])->name('dashboard');

// Route::post('/dashboard/createnew', [TravelWebController::class,'store']) ->middleware(['auth',
//             'verified'])->name('dashboard');

            // routes/web.php
// Route::get('/createnew', function () {return view('createnew'); // 返回 'resources/views/createnew.blade.php' 文件
//             })->name('create.new');


// Route::get('/dashboard', [TravelWebController::class,'categories']) ->middleware(['auth',
//             'verified'])->name('dashboard');

Route::put('/dashboard/travelWebs/{travelWeb?}', [TravelWebController::class, 'update'])
            ->middleware(['auth', 'verified'])
            ->name('dashboard.update');

Route::delete('/dashboard/travelWebs/{travelWeb?}', [TravelWebController::class,'destroy']) ->middleware(['auth',
            'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
