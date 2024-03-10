<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPropertyController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SearchPropertyController;
use App\Http\Controllers\VisitController;

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

Route::get('/', [HomeController::class, 'index'])-> name('home');
Route::get('/property', [PropertyController::class, 'index'])->name('property');
// Route::get('/property-details', [PropertyDetailsController::class, 'index']) -> name('property-details');
Route::get('/property-details/{id}', [PropertyController::class, 'showPropertyDetails'])->name('property-details');

Route::get('/contact', [ContactUsController::class, 'index']) -> name('contact');
// Add this line for form submission
Route::post('/contact', [ContactUsController::class, 'sendEmail'])->name('contact.send');

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



/* New Change */
Route::get('/admin/dashboard', [AdminPropertyController::class, 'index'])->name('admin.dashboard');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/property', [AdminPropertyController::class, 'index'])->name('admin.property');
    Route::get('/admin/property/add', [AdminPropertyController::class, 'showAddForm'])->name('admin.property.add');
    Route::post('/admin/property/add', [AdminPropertyController::class, 'addProperty']);
    Route::get('/admin/property/edit/{id}', [AdminPropertyController::class, 'showEditForm'])->name('admin.property.edit');
    Route::post('/admin/property/edit/{id}', [AdminPropertyController::class, 'editProperty']);
    // Update the route definition for property edit
    Route::put('/admin/property/edit/{id}', [AdminPropertyController::class, 'editProperty'])->name('admin.property.edit');
    Route::delete('/admin/property/delete/{id}', [AdminPropertyController::class, 'deleteProperty'])->name('admin.property.delete');
        // Add the logout route
        Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::get('admin/profile', [AdminProfileController::class, 'showProfile'])->name('admin.profile');
        Route::put('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'showEditProfileForm'])->name('admin.profile.edit');


Route::get('/property/filter', [PropertyController::class, 'filterProperties'])->name('property.filter');

});


Route::get('/search', [SearchPropertyController::class, 'search'])->name('search');

Route::post('/submit-visit-form', [VisitController::class, 'submitForm'])->name('submit.visit.form');

Route::get('/search-property', [HomeController::class, 'searchProperty'])->name('search-property');

Route::get('/category-names', [HomeController::class, 'fetchCategoryNames'])->name('category.names');
Route::get('/properties/{category}', [HomeController::class, 'fetchPropertiesByCategory']);


// Fallback route for 404 errors
Route::fallback(function () {
    return response()->view('frontend.404', [], 404);
});
