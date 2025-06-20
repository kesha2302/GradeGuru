<?php

use App\Http\Controllers\AdminClassNameController;
use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBannerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin', [AdminPanelController::class, 'index']);


Route::get('/Admin/banner', [AdminBannerController::class, 'banner'])->name('admin.banner');
Route::get('/Admin/banner/add', [AdminBannerController::class, 'addBannerForm'])->name('admin.banner.add');
Route::post('/Admin/banner/store', [AdminBannerController::class, 'storeBanner'])->name('admin.banner.store');
Route::get('/admin/banner/trash', [AdminBannerController::class, 'trash'])->name('admin.banner.trash');
Route::get('/admin/banner/trashSoft/{id}', [AdminBannerController::class, 'trashSoft'])->name('admin.banner.trashSoft');
Route::get('/admin/banner/restore/{id}', [AdminBannerController::class, 'restore'])->name('admin.banner.restore');
Route::get('/admin/banner/delete/{id}', [AdminBannerController::class, 'delete'])->name('admin.banner.delete');
Route::get('/admin/banner/edit/{id}', [AdminBannerController::class, 'edit'])->name('admin.banner.edit');
Route::post('/admin/banner/update/{id}', [AdminBannerController::class, 'update'])->name('admin.banner.update');


Route::get('/ClassNameData', [AdminClassNameController::class, 'index']);
Route::get('/Classnameform', [AdminClassNameController::class, 'classnameform']);
Route::post('/Classnameform2', [AdminClassNameController::class, 'classnameform2']);
Route::get('/ClassnameTrashdata', [AdminClassNameController::class, 'classnametrash']);
Route::get('/Classname/edit/{id}', [AdminClassNameController::class, 'classnameedit'])->name('classnames.edit');
Route::post('/Classname/update/{id}', [AdminClassNameController::class, 'classnameupdate'])->name('classnames.update');
Route::get('/Classname/delete/{id}', [AdminClassNameController::class, 'classnamedelete'])->name('classnames.delete');
Route::get('/Classname/frocedelete/{id}', [AdminClassNameController::class, 'classnameforcedelete'])->name('classnames.forcedelete');
Route::get('/Classname/restore/{id}', [AdminClassNameController::class, 'classnamerestore'])->name('classnames.restore');


// Change Controller names and method but kepp the route name same for main page, I have set this route names in header file.
// Make other curd operations routes that will be ok.
Route::get('/Aboutus', [AdminBannerController::class, 'aboutus'])->name('admin.aboutus');
Route::get('/Admin/ClassPrice', [AdminClassNameController::class, 'index']);
Route::get('/Admin/RegularQuestions', [AdminClassNameController::class, 'index']);
Route::get('/Admin/SuperQuestions', [AdminClassNameController::class, 'index']);
Route::get('/Admin/Result', [AdminClassNameController::class, 'index']);
