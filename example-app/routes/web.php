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

Route::get('/login',[loginController::class,'login']);

Route::get('/deshboard',[deshboardcontroller::class,'deshboardIndex']);

Route::get('/visitor',[visitorcontroller::class,'visitorIndex']);

//                              Skill section

Route::get('/Skills',[homecontroller::class,'skillIndex']);
Route::get('/getSkillData',[skillcontroller::class,'getSkillData']);
Route::post('/deleteSkillData',[skillcontroller::class,'deleteSkillData']);
Route::post('/detailsSkillData',[skillcontroller::class,'detailsSkillData']);
Route::post('/updateSkillData',[skillcontroller::class,'updateSkillData']);
Route::post('/addSkillData',[skillcontroller::class,'addSkillData']);

//                              Service section

Route::get('/services',[homecontroller::class,'servicesIndex']);
Route::get('/getservicesData',[servicescontroller::class,'getservicesData']);
Route::post('/deleteServicesData',[servicescontroller::class,'deleteServicesData']);
Route::post('/detailsServicesData',[servicescontroller::class,'detailsServicesData']);
Route::post('/updateServicesData',[servicescontroller::class,'updateServicesData']);
Route::post('/addServicesData',[servicescontroller::class,'addServicesData']);


//                              Choose section

Route::get('/choose',[homecontroller::class,'chooseIndex']);
Route::get('/getChooseData',[choosecontroller::class,'getChooseData']);
Route::post('/deleteChooseData',[choosecontroller::class,'deleteChooseData']);
Route::post('/detailsChooseData',[choosecontroller::class,'detailsChooseData']);
Route::post('/updateChooseData',[choosecontroller::class,'updateChooseData']);
Route::post('/addChooseData',[choosecontroller::class,'addChooseData']);


//                              Testimonial section

Route::get('/testimonial',[homecontroller::class,'testimonialIndex']);
Route::get('/getTestimonialData',[testimonialcontroller::class,'getTestimonialData']);
Route::post('/deleteTestimonialData',[testimonialcontroller::class,'deleteTestimonialData']);
Route::post('/detailsTestimonialData',[testimonialcontroller::class,'detailsTestimonialData']);
Route::post('/updateTestimonialData',[testimonialcontroller::class,'updateTestimonialData']);
Route::post('/addTestimonialData',[testimonialcontroller::class,'addTestimonialData']);


//                              Count section

Route::get('/count',[homecontroller::class,'countIndex']);
Route::get('/getCountData',[countController::class,'getCountData']);
Route::post('/deleteCountData',[countController::class,'deleteCountData']);
Route::post('/detailsCountData',[countController::class,'detailsCountData']);
Route::post('/updateCountData',[countController::class,'updateCountData']);
Route::post('/addCountData',[countController::class,'addCountData']);

//                              Parsonal Info section

Route::get('/parsonal',[aboutController::class,'parsonalIndex']);
Route::get('/getParsonalData',[parsonalcontroller::class,'getParsonalData']);
Route::post('/deleteParsonalData',[parsonalcontroller::class,'deleteParsonalData']);
Route::post('/detailsParsonalData',[parsonalcontroller::class,'detailsParsonalData']);
Route::post('/updateParsonalData',[parsonalcontroller::class,'updateParsonalData']);
Route::post('/addParsonalData',[parsonalcontroller::class,'addParsonalData']);

//                              Social Info section

Route::get('/social',[contactController::class,'socialIndex']);
Route::get('/getSocialData',[socialController::class,'getSocialData']);
Route::post('/deleteSocialData',[socialController::class,'deleteSocialData']);
Route::post('/detailsSocialData',[socialController::class,'detailsSocialData']);
Route::post('/updateSocialData',[socialController::class,'updateSocialData']);
Route::post('/addSocialData',[socialController::class,'addSocialData']);

//                              Contact Send

Route::get('/contact',[contactController::class,'contactData']);
Route::get('/getContactData',[contactController::class,'getContactData']);
Route::post('/insertContactData',[contactController::class,'insertContactData']);
Route::post('/deleteContactData',[contactController::class,'deleteContactData']);


//Route::get('/test',[contactController::class,'Datetime']);
