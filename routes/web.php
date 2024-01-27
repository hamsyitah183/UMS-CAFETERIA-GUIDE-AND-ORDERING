<?php

use App\Models\FoodOption;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserMapController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\OwnerMenuController;
use App\Http\Controllers\AdminOwnerController;
use App\Http\Controllers\FoodOptionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\OwnerGalleryController;
use App\Http\Controllers\OwnerPaymentController;
use App\Http\Controllers\UserFeedbackController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminFoodOptionController;
use App\Http\Controllers\OwnerFoodOptionController;
use App\Http\Controllers\ReviewAndRatingController;
use App\Http\Controllers\adminDashboardAnnouncement;
use App\Http\Controllers\OwnerOpeningHourController;
use App\Http\Controllers\ReviewIndividualController;
use App\Http\Controllers\UserShoppingCartController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\OwnerOrderController;

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



Route::get('/', [HomepageController::class, 'index']);

// search

Route::get('/search', [HomepageController::class, 'search']);

Route::get('/searchs/{foodOption:id}', [FoodOptionController::class, 'search']);

Route::get('/map',[MapController::class, 'index']);


Route::get('/about', function () {
    return view('UMS.about', [
        'active' => 'about',
        'type' => 'About',
        'title' => 'About',
        'style' => ['UMS/wajib', 'UMS/about'],
        'foodPlace' => FoodOption::all(),
        'user' => App\Models\User::all()
    ]);
});



Route::get('/announcement', [AnnouncementController::class, 'index']);

Route::get('/announcement/{announcement:slug}',[AnnouncementController::class,'individual']);

Route::get('/announcement', [AnnouncementController::class, 'index']);

Route::get('/announcement', [AnnouncementController::class, 'index']);

Route::get('/foodOption', [FoodOptionController::class, 'index']);

Route::get('/foodOption', [FoodOptionController::class, 'index']);

Route::get('/foodOption/{placeType:name}', [FoodOptionController::class, 'type']);

Route::get('/individual/{foodOption:id}', [FoodOptionController::class, 'individual']);

Route::get('/individual/{foodOption:id}/menu', [MenuController::class, 'index']);

Route::get('/individual/{foodOption:id}/gallery', [FoodOptionController::class, 'gallery']);

Route::get('/individual/{foodOption:id}/order', [MenuController::class, 'order']);

Route::get('/individual/{foodOption:id}/map', [MapController::class, 'map']);



// Route::resource('/showCart', UserShoppingCartController::class);

Route::resource('/showCart', UserCartController::class);

Route::get('/checkout', [UserCartController::class, 'checkout']);

Route::get('/showCart/delete/{id}', [UserCartController::class, 'deleteCart']);


Route::post('/addCart/{id}', [CartController::class, 'addCart']);

Route::put('/addCartTime/{id}', [CartController::class, 'addCartTime']);

Route::get('/editCart/view/{id}', [CartController::class, 'editCart']);

Route::post('/editCartData/{id}', [CartController::class, 'editCartData']);



Route::put('/order/{id}', [CartController::class, 'order']);

Route::get('/order/detail/{order}', [CartController::class, 'viewInvoice']);
Route::get('/order/detail/{order}/generate', [CartController::class, 'generateInvoice']);


Route::get('/payment', [CartController::class, 'payment']);
Route::post('/payment/confirm', [CartController::class, 'paymentStore']);
Route::get('/UMS/cart/payment/{order}', [CartController::class, 'invoice']);

Route::get('/test', function() {

    return view('test');

});



// Route::get('/showcart', [CartController::class, 'showCart']);

// Route::get('/delete/{id}', [CartController::class, 'deleteCart']);

// Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCart'])->name('cartDelete');



Route::resource('/individual/{foodOption:id}/rating', ReviewIndividualController::class);

// Route::get('/individual/{foodOption:id}/rating', [ReviewAndRatingController::class, 'index']);

// Route::post('/individual/{foodOption:id}/rating', [ReviewAndRatingController::class, 'store'])->name('individual.rating.store');


Route::middleware(['guest'])->group(function() {
    
    Route::get('/register', [RegisterController::class, 'UMSRegister']);
    Route::post('/register', [RegisterController::class, 'UMSStore']);

    Route::get('/login', [LoginController::class, 'UMSLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'UMSAuthenticate']);
});




Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [UserDashboardController::class,'index']);
    Route::resource('/dashboard/announcement', AdminAnnouncementController::class);
    Route::get('/dashboard/announcement/generate', [AdminAnnouncementController::class, 'generate']);
    Route::get('/dashboard/announcement/view', [AdminAnnouncementController::class, 'view']);


    Route::get('/dashboard/menu/home', [UserDashboardController::class,'menu'])->middleware('userAccess:owner');
    Route::resource('/dashboard/profile', UserProfileController::class);
    Route::resource('/dashboard/menu', OwnerMenuController::class)->middleware('userAccess:owner');
    Route::resource('/dashboard/customer', AdminCustomerController::class);
    Route::resource('/dashboard/owner', AdminOwnerController::class);
    Route::resource('/dashboard/payment', OwnerPaymentController::class);

    Route::resource('/dashboard/foodOption', OwnerFoodOptionController::class);
    // Route::resource('/dashboard/foodOption', OwnerFoodOptionController::class);

    Route::resource('/dashboard/gallery', OwnerGalleryController::class)->middleware('userAccess:owner');
    // Route::get('/dashboard/map', [UserMapController::class,'index']);
    // Route::resource('/dashboard/map',UserMapController::class);
    Route::resource('/dashboard/openingHour', OwnerOpeningHourController::class)->middleware('userAccess:owner');

    Route::resource('/dashboard/map', UserMapController::class);

    Route::get('/dashboard/announcement/checkSlug',[AdminAnnouncementController::class,'checkSlug']);
    Route::get('/dashboard/foodOption/checkSlug',[OwnerFoodOptionController::class,'checkSlug']);

    Route::resource('/dashboard/openingHour', OwnerOpeningHourController::class );
    Route::resource('/dashboard/feedback', UserFeedbackController::class);

    
    Route::get('/dashboard/order/list', [OwnerOrderController::class, 'index']);
    Route::post('/dashboard/order/status/{order}', [OwnerOrderController::class, 'acceptOrder']);
    Route::get('/dashboard/order', [OwnerOrderController::class, 'order']);
    Route::post('/dashboard/order/pending/{order}', [OwnerOrderController::class, 'orderPending']);
    Route::post('/dashboard/order/processed/{order}', [OwnerOrderController::class, 'orderProcessed']);
    Route::get('/dashboard/order/{order}', [OwnerOrderController::class, 'show']);

    

    // mesti di bawah ni
    Route::get('/dashboard/{menu:category}', [OwnerMenuController::class, 'category']);
    Route::get('/dashboard/menu/list/{menu:category}', [OwnerMenuController::class, 'list']);



    

    
    
   
    // Route::get('/dashboard/announcement/search', [adminDashboardAnnouncement::class, 'searchAnnouncement']);
    


    Route::get('/logout', [LoginController::class, 'logout']);

});


// admin category first