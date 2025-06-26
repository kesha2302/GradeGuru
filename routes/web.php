<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminClassNameController;
use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminClassPriceController;
use App\Http\Controllers\AdminRegularQueController;
use App\Http\Controllers\AdminSuperQueController;
use App\Http\Controllers\AdminTestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Admin', [AdminPanelController::class, 'index']);
Route::get('/Admin/Userdetail', [AdminPanelController::class, 'userdetail']);
Route::get('/Admin/Result', [AdminPanelController::class, 'resultdetail']);
Route::get('/Admin/Booking', [AdminPanelController::class, 'bookingdetail']);


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



Route::get('/Admin/Aboutus', [AdminAboutController::class, 'aboutus'])->name('admin.aboutus');
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

Route::get('/Admin/SuperQuestions', [AdminSuperQueController::class, 'index']);
Route::get('/Admin/SuperQueform', [AdminSuperQueController::class, 'superqueform']);
Route::post('/Admin/SuperQueform2', [AdminSuperQueController::class, 'superqueform2']);
Route::get('/Admin/SuperQue/edit/{id}', [AdminSuperQueController::class, 'superqueedit'])->name('superque.edit');
Route::post('/Admin/SuperQue/update/{id}', [AdminSuperQueController::class, 'superqueupdate'])->name('superque.update');
Route::get('/Admin/SuperQue/delete/{id}', [AdminSuperQueController::class, 'superquedelete'])->name('superque.delete');


Route::get('/Admin/RegularQuestions', [AdminRegularQueController::class, 'index']);
Route::get('/Admin/RegularQue/add', [AdminRegularQueController::class, 'addRegularQueForm'])->name('admin.regularque.add');
Route::post('/Admin/RegularQue/store', [AdminRegularQueController::class, 'storeRegularQue'])->name('admin.regularque.store');
Route::get('/Admin/RegularQue/edit/{id}', [AdminRegularQueController::class, 'editRegularQueForm'])->name('admin.regularque.edit');
Route::post('/Admin/RegularQue/update/{id}', [AdminRegularQueController::class, 'updateRegularQue'])->name('admin.regularque.update');
Route::get('/Admin/RegularQue/delete/{id}', [AdminRegularQueController::class, 'deleteRegularQue'])->name('admin.regularque.delete');

Route::get('/AdminRegister', [AdminAuthController::class, 'register']);
Route::get('/AdminLogin', [AdminAuthController::class, 'login']);
Route::post('/Admin/Register/store', [AdminAuthController::class, 'storeRegister'])->name('admin.register.store');
Route::post('/Adminlogindata', [AdminAuthController::class, 'loginstore']);
Route::post('/Adminlogout', [AdminAuthController::class, 'logout'])->name('adminlogout');

Route::post('/Admin/Test', [AdminTestController::class, 'index']);
