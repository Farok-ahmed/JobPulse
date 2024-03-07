<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\CompanyPanel\CompanyController;
use App\Http\Controllers\CandidatePanel\CandidateController;

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



Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/contact-post',[HomeController::class,'contactStore'])->name('contactStore');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/job',[JobController::class,'job'])->name('job');
Route::get('/job/detail/{id}',[JobController::class,'jobDetail'])->name('jobDetail');


Route::get('/dashboard',[CandidateController::class,'dashboard'])->middleware(['verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('candidate/profile',[CandidateController::class,'candidateProfile'])->name('candidateProfile');
    Route::put('candidate/profile',[CandidateController::class,'update'])->name('profileUpdate');

    Route::post('job/apply-job/{id}',[JobController::class,'applyJob'])->name('applyJob');
    Route::get('job/apply-job-list',[CandidateController::class,'applyedJobList'])->name('applyedJob');
    Route::get('job/save-job-list',[JobController::class,'saveJobList'])->name('saveJobList');
    Route::post('job/save-job/{id}',[JobController::class,'saveJob'])->name('saveJob');

});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');


    // Admin Job Route
    Route::get('/admin/job-list',[AdminController::class,'jobList'])->name('admin.jobList');
    Route::get('/admin/job-create',[AdminController::class,'jobCreate'])->name('admin.createJob');
    Route::post('/admin/job-post',[AdminController::class,'jobPost'])->name('admin.JobPost');
    Route::get('/admin/job-edit/{id}',[AdminController::class,'jobEdit'])->name('admin.JobEdit');
    Route::put('/admin/job-update/{id}',[AdminController::class,'jobUpdate'])->name('admin.jobUpdate');
    Route::get('/admin/job-delete/{id}',[AdminController::class,'jobDestory'])->name('admin.jobDelete');

    Route::get('/admin/applications',[AdminController::class,'ApplicationList'])->name('admin.applications');

    Route::get('/admin/user-list',[AdminController::class,'userList'])->name('admin.userList');
    Route::get('/admin/company-list',[AdminController::class,'companyList'])->name('admin.companyList');
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin panel contact form list
    Route::get('/contact-form',[AdminController::class,'contactFormList'])->name('contactFormList');
    Route::get('/contact-form-view/{id}',[AdminController::class,'contactFormView'])->name('contactFormView');
    Route::get('/contact-form-destory/{id}',[AdminController::class,'contactFormDestory'])->name('contactFormDestory');
});
Route::middleware(['auth','role:company'])->group(function () {
    Route::get('/company/dashboard',[CompanyController::class,'index'])->name('company.dashboard');
    Route::get('/company/profile',[CompanyController::class,'profile'])->name('company.profile');
    Route::put('/company/update',[CompanyController::class,'update'])->name('company.update');

    Route::get('/company/job-create',[CompanyController::class,'jobCreate'])->name('company.createJob');
    Route::post('/company/job-post',[CompanyController::class,'jobPost'])->name('company.JobPost');
    Route::get('/company/job-list',[CompanyController::class,'jobList'])->name('company.jobList');
    Route::get('/company/job-edit/{id}',[CompanyController::class,'jobEdit'])->name('company.JobEdit');
    Route::put('/company/job-update/{id}',[CompanyController::class,'jobUpdate'])->name('company.jobUpdate');
    Route::get('/company/job-delete/{id}',[CompanyController::class,'jobDestory'])->name('company.jobDelete');
    Route::get('/company/job-application',[CompanyController::class,'jobApplication'])->name('company.jobApplication');
    Route::get('/company/job-application-edit/{id}',[CompanyController::class,'jobApplicationEdit'])->name('company.jobApplicationEdit');
    Route::post('/company/job-application-update/{id}',[CompanyController::class,'jobApplicationUpdate'])->name('company.jobApplicationUpdate');

});

require __DIR__.'/auth.php';
