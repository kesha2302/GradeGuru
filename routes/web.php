<?php

use App\Http\Controllers\AdminClassNameController;
use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/Admin', [AdminPanelController::class, 'index']);


 Route::get('/ClassNameData', [AdminClassNameController::class, 'index']);
 Route::get('/Classnameform', [AdminClassNameController::class, 'classnameform']);
 Route::post('/Classnameform2', [AdminClassNameController::class, 'classnameform2']);
 Route::get('/ClassnameTrashdata', [AdminClassNameController::class, 'classnametrash']);
 Route::get('/Classname/edit/{id}', [AdminClassNameController::class, 'classnameedit'])->name('classnames.edit');
 Route::post('/Classname/update/{id}', [AdminClassNameController::class, 'classnameupdate'])->name('classnames.update');
 Route::get('/Classname/delete/{id}', [AdminClassNameController::class, 'classnamedelete'])->name('classnames.delete');
 Route::get('/Classname/frocedelete/{id}', [AdminClassNameController::class, 'classnameforcedelete'])->name('classnames.forcedelete');
 Route::get('/Classname/restore/{id}', [AdminClassNameController::class, 'classnamerestore'])->name('classnames.restore');
