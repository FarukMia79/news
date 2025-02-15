<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\DistricController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\Setting\LivetvController;
use App\Http\Controllers\backend\Setting\NamazController;
use App\Http\Controllers\Backend\Setting\NoticeController;
use App\Http\Controllers\Backend\Setting\SeoController;
use App\Http\Controllers\Backend\Setting\SocialController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\SubdistricController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;


//Route::get('/', function () {
//    return redirect()->Route('frontend.index');
//});


//_____________Route_____________//
            //Backend
//_____________Route_____________//


Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

//__ Categories Route __//
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::get('category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
Route::put('category/update{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
Route::get('category/delete{id}', [CategoryController::class, 'destroy'])->name('category.delete')->middleware('auth');

//__ SubCategories Route __//
Route::get('subcategory/index', [SubcategoryController::class, 'index'])->name('subcategory.index')->middleware('auth');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store')->middleware('auth');
Route::get('subcategory/edit{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit')->middleware('auth');
Route::put('subcategory/update{id}', [SubcategoryController::class, 'update'])->name('subcategory.update')->middleware('auth');
Route::get('subcategory/delete{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete')->middleware('auth');

//__ Division Route __//
Route::get('division/index', [DivisionController::class, 'index'])->name('division.index')->middleware('auth');
Route::post('division/store', [DivisionController::class, 'store'])->name('division.store')->middleware('auth');
Route::get('division/edit{id}', [DivisionController::class, 'edit'])->name('division.edit')->middleware('auth');
Route::put('division/update{id}', [DivisionController::class, 'update'])->name('division.update')->middleware('auth');
Route::get('division/delete{id}', [DivisionController::class, 'destroy'])->name('division.delete')->middleware('auth');

//__ Distric Route __//
Route::get('distric/index', [districController::class, 'index'])->name('distric.index')->middleware('auth');
Route::post('distric/store', [districController::class, 'store'])->name('distric.store')->middleware('auth');
Route::get('distric/edit{id}', [districController::class, 'edit'])->name('distric.edit')->middleware('auth');
Route::put('distric/update{id}', [districController::class, 'update'])->name('distric.update')->middleware('auth');
Route::get('distric/delete{id}', [districController::class, 'destroy'])->name('distric.delete')->middleware('auth');

//__ Posts Route __//
Route::get('post/index', [PostController::class, 'index'])->name('post.index')->middleware('auth');
Route::get('post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('post/store', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('post/edit{id}', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('post/update{id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::get('post/delete{id}', [PostController::class, 'destroy'])->name('post.delete')->middleware('auth');

//__ JSON Data get route __//
Route::get('/get/subcat/{cat_id}', [PostController::class, 'GetSubcate']);
Route::get('/get/distric/{divi_id}', [PostController::class, 'Getdistric']);


//__Setting
//__ Social Setting Route __//
Route::get('social/setting', [SocialController::class, 'edit'])->name('social.setting')->middleware('auth');
Route::put('social/update{id}', [SocialController::class, 'updateSocial'])->name('social.update')->middleware('auth');
//__ SEO Setting Route __//
Route::get('seo/setting', [SeoController::class, 'seo'])->name('seo.setting')->middleware('auth');
Route::put('seo/update{id}', [SeoController::class, 'updateSEO'])->name('seo.update')->middleware('auth');

//__ Namaz Setting Route __//
Route::get('namaz/setting', [NamazController::class, 'namaz'])->name('namaz.setting')->middleware('auth');
Route::put('namaz/update{id}', [NamazController::class, 'updateNamaz'])->name('namaz.update')->middleware('auth');

//__ LiveTv Setting Route __//
Route::get('livetv/setting', [LivetvController::class, 'livetv'])->name('livetv.setting')->middleware('auth');
Route::put('livetv/update{id}', [LivetvController::class, 'updateLiveTv'])->name('livetv.update')->middleware('auth');
Route::get('active/livetv{id}', [LivetvController::class, 'ActiveLiveTv'])->name('active.livetv')->middleware('auth');
Route::get('deactive/livetv{id}', [LivetvController::class, 'DeactiveLiveTv'])->name('deactive.livetv')->middleware('auth');

//__ Notice Setting Route __//
Route::get('notice/setting', [NoticeController::class, 'notice'])->name('notice.setting')->middleware('auth');
Route::put('notice/update{id}', [NoticeController::class, 'UpdateNotice'])->name('notice.update')->middleware('auth');
Route::get('active/notice{id}', [NoticeController::class, 'ActiveNotice'])->name('active.notice')->middleware('auth');
Route::get('deactive/notice{id}', [NoticeController::class, 'DeactiveNotice'])->name('deactive.notice')->middleware('auth');

//__ Photo Gallery Route __//
Route::get('photo/gallery', [GalleryController::class, 'photo'])->name('photo.gallery')->middleware('auth');
Route::post('photo/store', [GalleryController::class, 'store'])->name('photo.store')->middleware('auth');
Route::get('photo/edit{id}', [GalleryController::class, 'edit'])->name('photo.edit')->middleware('auth');
Route::put('photo/update{id}', [GalleryController::class, 'update'])->name('photo.update')->middleware('auth');
Route::get('photo/delete{id}', [GalleryController::class, 'destroy'])->name('photo.delete')->middleware('auth');

//__ Video Gallery Route __//
Route::get('video/gallery', [GalleryController::class, 'video'])->name('video.gallery')->middleware('auth');
Route::post('video/store', [GalleryController::class, 'storeVideo'])->name('video.store')->middleware('auth');
Route::get('video/edit{id}', [GalleryController::class, 'editVideo'])->name('video.edit')->middleware('auth');
Route::put('video/update{id}', [GalleryController::class, 'updateVideo'])->name('video.update')->middleware('auth');
Route::get('video/delete{id}', [GalleryController::class, 'destroyVideo'])->name('video.delete')->middleware('auth');


//_____________Route_____________//
            //Frontend
//_____________Route_____________//

//__frontend index route__//
Route::get('/', [FrontendController::class, 'Frontend'])->name('frontend.index');

//__frontend language route__//
Route::get('language/english', [FrontendController::class, 'english'])->name('language.english');
Route::get('language/bangla', [FrontendController::class, 'bangla'])->name('language.bangla');

//__ JSON Data get route __//
Route::get('/get/distr/{divi_id}', [FrontendController::class, 'Getdistric']);
Route::get('/get/thana/{dist_id}', [FrontendController::class, 'Getthana']);

//Single Post Route
Route::get('view-post/{id}', [FrontendController::class, 'SinglePost'])->name('view-post');

