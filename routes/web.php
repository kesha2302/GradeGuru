<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminClassNameController;
use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminClassPriceController;

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


Route::get('/Admin/ClassNameData', [AdminClassNameController::class, 'index']);
Route::get('/Admin/Classnameform', [AdminClassNameController::class, 'classnameform']);
Route::post('/Admin/Classnameform2', [AdminClassNameController::class, 'classnameform2']);
Route::get('/Admin/ClassnameTrashdata', [AdminClassNameController::class, 'classnametrash']);
Route::get('/Admin/Classname/edit/{id}', [AdminClassNameController::class, 'classnameedit'])->name('classnames.edit');
Route::post('/Admin/Classname/update/{id}', [AdminClassNameController::class, 'classnameupdate'])->name('classnames.update');
Route::get('/Admin/Classname/delete/{id}', [AdminClassNameController::class, 'classnamedelete'])->name('classnames.delete');
Route::get('/Admin/Classname/frocedelete/{id}', [AdminClassNameController::class, 'classnameforcedelete'])->name('classnames.forcedelete');
Route::get('/Admin/Classname/restore/{id}', [AdminClassNameController::class, 'classnamerestore'])->name('classnames.restore');



Route::get('/Aboutus', [AdminBannerController::class, 'aboutus'])->name('admin.aboutus');
Route::get('/Admin/aboutus/add', [AdminAboutController::class, 'addAboutForm'])->name('admin.about.add');
Route::post('/Admin/aboutus/store', [AdminAboutController::class, 'storeAbout'])->name('admin.banner.store');
Route::get('/Admin/aboutus/edit/{id}', [AdminAboutController::class, 'editAboutForm'])->name('admin.aboutus.edit');
Route::post('/Admin/aboutus/update/{id}', [AdminAboutController::class, 'updateAbout'])->name('admin.aboutus.update');
Route::get('/Admin/aboutus/delete/{id}', [AdminAboutController::class, 'deleteAbout'])->name('admin.aboutus.delete');



Route::get('/Admin/ClassPrice', [AdminClassPriceController::class, 'index']);
Route::get('/Admin/Classpriceform', [AdminClassPriceController::class, 'classpriceform']);
Route::post('/Admin/Classpriceform2', [AdminClassPriceController::class, 'classpriceform2']);
Route::get('/Admin/ClasspriceTrashdata', [AdminClassPriceController::class, 'classpricetrash']);
Route::get('/Admin/Classprice/edit/{id}', [AdminClassPriceController::class, 'classpriceedit'])->name('classprice.edit');
Route::post('/Admin/Classprice/update/{id}', [AdminClassPriceController::class, 'classpriceupdate'])->name('classprice.update');
Route::get('/Admin/Classprice/delete/{id}', [AdminClassPriceController::class, 'classpricedelete'])->name('classprice.delete');
Route::get('/Admin/Classprice/frocedelete/{id}', [AdminClassPriceController::class, 'classpriceforcedelete'])->name('classprice.forcedelete');
Route::get('/Admin/Classprice/restore/{id}', [AdminClassPriceController::class, 'classpricerestore'])->name('classprice.restore');


// Change Controller names and method but kepp the route name same for main page, I have set this route names in header file.
// Make other curd operations routes that will be ok.
Route::get('/Admin/RegularQuestions', [AdminClassNameController::class, 'index']);
Route::get('/Admin/SuperQuestions', [AdminClassNameController::class, 'index']);
Route::get('/Admin/Result', [AdminClassNameController::class, 'index']);
