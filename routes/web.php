<?php

use Illuminate\Support\Facades\Route;

Route::view('/tasks/create', 'tasks.create')->name('tasks.create');
Route::view('/tasks/index', 'tasks.index')->name('tasks.index');
Route::view('/tasks/update/{id}', 'tasks.update')->name('tasks.update');