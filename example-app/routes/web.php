<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\visitorcontroller;
use App\Http\Controllers\deshboardcontroller;
use App\Http\Controllers\skillcontroller;
use App\Http\Controllers\servicescontroller;
use App\Http\Controllers\choosecontroller;
use App\Http\Controllers\countController;
use App\Http\Controllers\testimonialcontroller;
use App\Http\Controllers\footercontroller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\parsonalcontroller;
use App\Http\Controllers\socialController;


//                            Font-end Route


Route::get('/',[homecontroller::class,'homeIndex'])->name('/');
Route::get('/About',[aboutController::class,'aboutIndex'])->name('About');
Route::get('/Portfolio',[portfolioController::class,'portfolioIndex'])->name('Portfolio');
Route::get('/Contact',[contactController::class,'contactIndex'])->name('Contact');


//                             ADMIN ROUTE

Route::get('/login',[loginController::class,'login'])->name('login');
Route::post('/onlogin',[loginController::class,'onlogin']);
Route::get('/logout',[loginController::class,'onlogout']);
Route::get('/registration',[loginController::class,'registration'])->name('registration');

Route::get('/deshboard',[deshboardcontroller::class,'deshboardIndex']);
Route::get('/visitor',[visitorcontroller::class,'visitorIndex'])->middleware('loginCheck');

//                              Skill section

Route::get('/Skills',[homecontroller::class,'skillIndex'])->middleware('loginCheck');
Route::get('/getSkillData',[skillcontroller::class,'getSkillData'])->middleware('loginCheck');
Route::post('/deleteSkillData',[skillcontroller::class,'deleteSkillData'])->middleware('loginCheck');
Route::post('/detailsSkillData',[skillcontroller::class,'detailsSkillData'])->middleware('loginCheck');
Route::post('/updateSkillData',[skillcontroller::class,'updateSkillData'])->middleware('loginCheck');
Route::post('/addSkillData',[skillcontroller::class,'addSkillData'])->middleware('loginCheck');

//                              Service section

Route::get('/services',[homecontroller::class,'servicesIndex'])->middleware('loginCheck');
Route::get('/getservicesData',[servicescontroller::class,'getservicesData'])->middleware('loginCheck');
Route::post('/deleteServicesData',[servicescontroller::class,'deleteServicesData'])->middleware('loginCheck');
Route::post('/detailsServicesData',[servicescontroller::class,'detailsServicesData'])->middleware('loginCheck');
Route::post('/updateServicesData',[servicescontroller::class,'updateServicesData'])->middleware('loginCheck');
Route::post('/addServicesData',[servicescontroller::class,'addServicesData'])->middleware('loginCheck');


//                              Choose section

Route::get('/choose',[homecontroller::class,'chooseIndex'])->middleware('loginCheck');
Route::get('/getChooseData',[choosecontroller::class,'getChooseData'])->middleware('loginCheck');
Route::post('/deleteChooseData',[choosecontroller::class,'deleteChooseData'])->middleware('loginCheck');
Route::post('/detailsChooseData',[choosecontroller::class,'detailsChooseData'])->middleware('loginCheck');
Route::post('/updateChooseData',[choosecontroller::class,'updateChooseData'])->middleware('loginCheck');
Route::post('/addChooseData',[choosecontroller::class,'addChooseData'])->middleware('loginCheck');


//                              Testimonial section

Route::get('/testimonial',[homecontroller::class,'testimonialIndex'])->middleware('loginCheck');
Route::get('/getTestimonialData',[testimonialcontroller::class,'getTestimonialData'])->middleware('loginCheck');
Route::post('/deleteTestimonialData',[testimonialcontroller::class,'deleteTestimonialData'])->middleware('loginCheck');
Route::post('/detailsTestimonialData',[testimonialcontroller::class,'detailsTestimonialData'])->middleware('loginCheck');
Route::post('/updateTestimonialData',[testimonialcontroller::class,'updateTestimonialData'])->middleware('loginCheck');
Route::post('/addTestimonialData',[testimonialcontroller::class,'addTestimonialData'])->middleware('loginCheck');


//                              Count section

Route::get('/count',[homecontroller::class,'countIndex'])->middleware('loginCheck');
Route::get('/getCountData',[countController::class,'getCountData'])->middleware('loginCheck');
Route::post('/deleteCountData',[countController::class,'deleteCountData'])->middleware('loginCheck');
Route::post('/detailsCountData',[countController::class,'detailsCountData'])->middleware('loginCheck');
Route::post('/updateCountData',[countController::class,'updateCountData'])->middleware('loginCheck');
Route::post('/addCountData',[countController::class,'addCountData'])->middleware('loginCheck');

//                              Parsonal Info section

Route::get('/parsonal',[aboutController::class,'parsonalIndex'])->middleware('loginCheck');
Route::get('/getParsonalData',[parsonalcontroller::class,'getParsonalData'])->middleware('loginCheck');
Route::post('/deleteParsonalData',[parsonalcontroller::class,'deleteParsonalData'])->middleware('loginCheck');
Route::post('/detailsParsonalData',[parsonalcontroller::class,'detailsParsonalData'])->middleware('loginCheck');
Route::post('/updateParsonalData',[parsonalcontroller::class,'updateParsonalData'])->middleware('loginCheck');
Route::post('/addParsonalData',[parsonalcontroller::class,'addParsonalData'])->middleware('loginCheck');

//                              Social Info section

Route::get('/social',[contactController::class,'socialIndex'])->middleware('loginCheck');
Route::get('/getSocialData',[socialController::class,'getSocialData'])->middleware('loginCheck');
Route::post('/deleteSocialData',[socialController::class,'deleteSocialData'])->middleware('loginCheck');
Route::post('/detailsSocialData',[socialController::class,'detailsSocialData'])->middleware('loginCheck');
Route::post('/updateSocialData',[socialController::class,'updateSocialData'])->middleware('loginCheck');
Route::post('/addSocialData',[socialController::class,'addSocialData'])->middleware('loginCheck');

//                              Contact Send

Route::get('/contact',[contactController::class,'contactData'])->middleware('loginCheck');
Route::get('/getContactData',[contactController::class,'getContactData'])->middleware('loginCheck');
Route::post('/insertContactData',[contactController::class,'insertContactData'])->middleware('loginCheck');
Route::post('/deleteContactData',[contactController::class,'deleteContactData'])->middleware('loginCheck');


//Route::get('/test',[contactController::class,'Datetime']);
