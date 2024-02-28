<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])
->middleware('auth')->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])
->middleware('auth')->name('dashboard');

//Charts
Route::get('/home', [HomeController::class, 'showChart'])
->middleware('auth')->name('home');

// Booking Tourist Form - Visitor View
Route::get('/bookTourist', [BookingController::class, 'bookingTourist'])->name('bookTourist');
Route::post('/bookTourist', [BookingController::class, 'bookingTouristPost'])->name('bookTourist.bookingTouristPost');
Route::get('/bookTourist', [BookingController::class, 'viewTouristBook'])->name('bookTourist.viewTouristBook');
Route::get('/bookTourist', [BookingController::class, 'viewTouristBook'])->name('bookTourist.viewTouristBook');
Route::get('/get-availability/{date}', [BookingController::class, 'getAvailability']);

// Payment View
Route::post('/sendPayment', [BookingController::class, 'sendPayment'])->name('sendPayment');
Route::get('/payment.viewPayment/{booking}', [BookingController::class, 'viewPaymentProof']);

Route::post('/search', [BookingController::class, 'search']);

// Booking Tourist Form - Staff View
Route::get('/bookingStaff', [BookingController::class, 'bookingStaffget'])->name('bookingStaff');
Route::get('/edit{booking}', [BookingController::class, 'editBook'])->name('edit'); //show edit page
Route::put('/edit{booking}', [BookingController::class, 'updateBooking']);
Route::delete('/delete/{booking}', [BookingController::class, 'deletePost']);

//Invoice View and Download - Booking Tourist
Route::get('/invoice.invoicePage/{booking}', [BookingController::class, 'viewInvoice']);
Route::get('/invoice.invoicePage/{booking}/generate', [BookingController::class, 'generateInvoice']);

//Search Bar - Booking Staff
Route::get('/search', [BookingController::class, 'searchBooking']);

Route::get('/confirm-booking/{bookingID}', [BookingController::class, 'confirmBooking']);


// Contact Page 
Route::get('/contact', [ContactController::class, 'contactTourist'])->name('contact');
Route::post('/contact', [ContactController::class, 'contactPost'])->name('contact.contactPost');
Route::get('/contact', [ContactController::class, 'contactGet'])->name('contact.contactGet');
Route::get('/viewContact', [ContactController::class, 'contactStaff'])->name('viewContact.contactStaff');


// Edit Contact Form
Route::get('/editContact/{contact}', [ContactController::class, 'editContact'])->name('editContact'); //show edit page
Route::put('/editContact/{contact}', [ContactController::class, 'updateContact']);
Route::delete('/deleteContact/{contact}', [ContactController::class, 'deleteContact'])->name('contact.deleteContact');

// Inventory Page
Route::get('/inventory', [InventoryController::class, 'invStaff'])->name('inventory');
Route::post('/inventory', [InventoryController::class, 'invPost'])->name('inventory.invPost');
Route::get('/inventory', [InventoryController::class, 'invGet'])->name('inventory.invGet');

// Edit Inventory Page
Route::get('/editInv/{inventory}', [InventoryController::class, 'editInventory'])->name('editInv');//show edit page
Route::put('/editInv/{inventory}', [InventoryController::class, 'updateInv']); // edit data
Route::delete('/deleteInv/{inventory}', [InventoryController::class, 'deleteInv']);


// Register Staff - Admin View
Route::get('/registerStaff', [HomeController::class, 'registerStaff'])->middleware(['auth', 'admin']);
Route::get('/registerStaff', [StaffController::class, 'staffGet'])->name('registerStaff');
Route::get('/registerNew', [StaffController::class, 'viewStaffForm'])->name('registerNew');
Route::post('/registerNew', [StaffController::class, 'registerPost'])->name('registerNew.registerPost');

// Staff Information
Route::get('/profileStaff', [StaffController::class, 'viewStaffInfo'])->name('profileStaff.viewStaffInfo');
Route::get('/staff.editProfileStaff{staff}', [StaffController::class, 'viewEditStaff'])->name('staff.editProfileStaff');
Route::put('/staff.editProfileStaff{staff}', [StaffController::class, 'updateStaffInfo']);

// Task
Route::get('/task', [TaskController::class, 'viewTask']);
Route::post('/task', [TaskController::class, 'taskPost'])->name('task.taskPost');
Route::get('/task', [TaskController::class, 'taskGet'])->name('task.taskGet');

Route::get('/editTask/{task}', [TaskController::class, 'editTask'])->name('editTask'); //show edit page
Route::put('/editTask/{task}', [TaskController::class, 'updateTask']); //show edit page
Route::delete('/deleteTask/{task}', [TaskController::class, 'deleteTask']);

//Check
Route::get('/check', [CheckController::class, 'viewCheck']);
Route::post('/check', [CheckController::class, 'checkPost'])->name('check.checkPost');
Route::get('/viewCheck', [CheckController::class, 'viewCheckInfo'])->name('viewCheck.viewCheckInfo');

// Edit Check
Route::get('/editCheck/{check}', [CheckController::class, 'viewEditCheck'])->name('editCheck'); //show edit page
Route::put('/editCheck/{check}', [CheckController::class, 'updateEditCheck']); //show edit page
Route::delete('/deleteCheck/{check}', [CheckController::class, 'deleteCheck']);

// Chart View - will review again
Route::get('/doughnutChart', [ChartController::class, 'countryVisitor']);

// FullCalendar View - will be doing it later
Route::get('/full_calendar', [EventController::class, 'index']);
Route::post('/full_calendar', [EventController::class, 'storeEvent'])->name('full_calendar.store');
Route::get('/admin.home', [EventController::class, 'viewEvents'])->name('home');

//Locker View
Route::get('/locker', [LockerController::class, 'viewLocker']);
Route::post('/locker', [LockerController::class, 'lockerPost'])->name('locker.lockerPost');
Route::get('/locker', [LockerController::class, 'getLocker'])->name('locker.getLocker');

//Edit Locker View
Route::get('/editLocker/{locker}', [LockerController::class, 'viewEditLocker'])->name('editLocker');; //show edit page
Route::put('/editLocker/{locker}', [LockerController::class, 'updateLocker']); //show edit page
Route::delete('/deleteLocker/{locker}', [LockerController::class, 'deleteLocker']);

//Announcement View - Staff
Route::get('/annStaff', [AnnouncementController::class, 'viewAnnouncement']);
Route::post('/annStaff', [AnnouncementController::class, 'annPost'])->name('annStaff.annPost');

//Edit Announcement View
Route::get('/editAnn/{sliders}', [AnnouncementController::class, 'viewEditAnn'])->name('editAnn');
Route::put('/editAnn/{sliders}', [AnnouncementController::class, 'updateAnn']);
Route::delete('/deleteAnn/{sliders}', [AnnouncementController::class, 'deleteAnn']);

//Announcement View - Visitor
Route::get('/announcementpage', [AnnouncementController::class, 'visitorAnn']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
