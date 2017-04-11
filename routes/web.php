<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','Frontend@index');

Route::get('blank',function(){
   
    return view('frontend.blank');
    
});

Route::get('sign-up','Frontend@sign_up');

Route::get('about','Frontend@about');

Route::get('how-it-works','Frontend@how_it_works');

Route::post('enquiry','Frontend@enquiry');

Route::get('contact','Frontend@contact');

Route::get('dashboard','Frontend@dashboard');

Route::get('profile/{user_id}','Frontend@profile');

Route::post('update-profile','Frontend@update_profile');

Route::post('approve-pop','Frontend@approve_pop');

Route::post('flag-pop','Frontend@flag_pop');

Route::get('upload-pop','Frontend@show_pop');

Route::post('make-pop-uploaded','Frontend@upload_pop');

Route::get('make-payment','Frontend@make_payment');

Route::get('export','Frontend@excel_test');

Route::post('user-registration','Frontend@user_registration');

Route::get('logout','Frontend@logout');

Route::get('user-registration-success',function(){
       return view('frontend/registration-success'); 
});

Route::get('confirm-user','Frontend@confirm_user');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin','middleware' => ['auth','role:1']], function () {
    Route::get('/','Admin@index');
    Route::get('profile/{user_id}','Admin@profile');
    Route::post('update-profile','Admin@update_profile');
    
    // Donation 
    Route::get('view-donation','Admin@view_donations');
    Route::get('change-donation-status','Admin@change_donation_status');
    
    // Plan
    Route::get('plans','Admin@plan_read');    
    Route::get('plan-delete','Admin@plan_delete');
    
    Route::get('plan-edit','Admin@plan_show_update');
    Route::post('make-plan-edited','Admin@plan_update');
    
    Route::get('plan-create','Admin@plan_show_create');
    Route::post('make-plan-created','Admin@plan_create');
    
    // User 
    
    Route::get('users','Admin@view_users');
    Route::get('delete-user','Admin@delete_user');
    Route::get('create-user','Admin@create_user');
    Route::post('user-registration','Admin@user_registration');
    
    
    
    
    
});
