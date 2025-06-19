<?php

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
