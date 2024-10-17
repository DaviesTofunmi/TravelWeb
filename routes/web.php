<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourPackagesController;
use App\Http\Controllers\VisaApplicationFormController;
use App\Mail\WelcomeMail;
use App\Models\VisaApplicationForm;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get("/", function(){
    return Inertia::render("Home");
});
Route::get("/VisaApplication", function(){
    return Inertia::render("VisaApplication");
})->middleware(['auth'])->name('VisaApplication');
Route::post("createTour", [TourPackagesController::class, 'createTour'])->name("tour.create");

Route::post("createVisaForm", [VisaApplicationFormController::class, 'createVisaForm'])->name("visaForm.create");
Route::get("get_user_applications", [VisaApplicationFormController::class, 'fetchUserApplications'])->name("user.fetch_applications");
Route::get("get_user_companions", [VisaApplicationFormController::class, 'fetchUserCompanions'])->name("user.fetch_companions");
Route::get("get_all_applications", [VisaApplicationFormController::class, 'fetchAllApplications'])->name("fetch_all_applications");

Route::get("/get_application_by_id/{id}", [VisaApplicationFormController::class, 'fetchApplicationById'])->name("fetch_application_by_id");
Route::get("/get-companions-by-id/{id}", [VisaApplicationFormController::class, 'fetchCompanionsById'])->name("fetch_companions_by_id");
Route::get('/approve-application/{id}',[VisaApplicationFormController::class, 'approveApplication'])->name('approve_application');
Route::get('/approve-companion/{id}',[VisaApplicationFormController::class, 'approveCompanion'])->name('approve_companion');
Route::get('/reject-application/{id}',[VisaApplicationFormController::class, 'RejectApplication'])->name('reject_application');

Route::get('/deny-companion/{id}',[VisaApplicationFormController::class, 'DenyCompanion'])->name('deny_companion');

Route::post('/send-application-id', [VisaApplicationFormController::class, 'sendApplicationId']);


Route::get("fetchTour", [TourPackagesController::class, 'fetchPackages'])->name("tour.fetch");
Route::get("/fetchTourById/{id}", [TourPackagesController::class, 'fetchTourById'])->name("tour.fetchById");
Route::get("/createTour", function(){
    return Inertia::render("Admin/CreateTour");
})->name('createTour');
Route::get("/VisaAdmin", function(){
    return Inertia::render("Admin/VisaAdmin");
})->name('visa.admin');
Route::get("/TourDetails", function(){
    return Inertia::render("TourDetails");
})->name('tour.details');









Route::get("/UserDashboard", function(){
    return Inertia::render("UserDashboard");
})->name('userDashboard');
Route::get("/user_dashboard", function(){
    return Inertia::render("UserDashboard");
})->middleware(['auth'])->name('user.dashboard');
Route::get("/user_application", function(){
    return Inertia::render("Application");
})->middleware(['auth'])->name('user.application');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('send_mail', function(){
$data= ["name"=> "Tofunmi", "subject"=> "Welcome to Pegi Airline"];
Mail::to('daviestofunmi11@gmail.com')-> send(new WelcomeMail($data));
return "Email sent successfully";
});



// Laravel 8 & 9
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');


require __DIR__.'/auth.php';
