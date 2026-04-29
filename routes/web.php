<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentsController::class);