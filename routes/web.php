<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\SiteController@index');
//Route::get('/sms', 'Frontend\SiteController@sms')->name('sms');

Route::group(['prefix'=>'admin'],function(){
    Route::get('login', 'Backend\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Backend\Auth\LoginController@login');
    Route::post('logout', 'Backend\Auth\LoginController@logout')->name('logout');
    Route::get('password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/confirm', 'Backend\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'Backend\Auth\ConfirmPasswordController@confirm');
    Route::get('email/verify', 'Backend\Auth\VerificationController@show')->name('verification.notice');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'] , function (){
    Route::get('/' ,                'Backend\IndexController@home')->name('admin.home');
    Route::put('/' ,                'Backend\IndexController@homeUpdate')->name('admin.home.update');

    Route::get('/contact' ,         'Backend\IndexController@contact')->name('admin.contact');
    Route::put('/contact' ,         'Backend\IndexController@contactUpdate')->name('admin.contact.update');

    Route::get('/social' ,         'Backend\IndexController@social')->name('admin.social');
    Route::put('/social' ,         'Backend\IndexController@socialUpdate')->name('admin.social.update');

    Route::get('/services' ,            'Backend\IndexController@services')->name('admin.service');
    Route::post('/services' ,           'Backend\IndexController@servicesStore')->name('admin.service.store');
    Route::get('/services/create' ,     'Backend\IndexController@servicesCreate')->name('admin.service.create');
    Route::get('/services/{id}/edit' ,  'Backend\IndexController@servicesEdit')->name('admin.service.edit');
    Route::put('/services/{id}' ,       'Backend\IndexController@serviceUpdate')->name('admin.service.update');
    Route::DELETE('/services/{id}' ,    'Backend\IndexController@serviceDestroy')->name('admin.service.destroy');

    Route::get('/about' ,              'Backend\IndexController@about')->name('admin.about');
    Route::put('/about' ,                  'Backend\IndexController@aboutUpdate')->name('admin.about.update');
    Route::get('/about-section/create' ,'Backend\IndexController@aboutSectionCreate')->name('admin.about.create');
    Route::post('/about-section' ,'Backend\IndexController@aboutSectionStore')->name('admin.about.store');
    Route::get('/about-section/{id}/edit' ,'Backend\IndexController@aboutSectionEdit')->name('admin.about.section.edit');
    Route::put('/about-section/{id}' ,          'Backend\IndexController@aboutSectionUpdate')->name('admin.about.section.update');
    Route::DELETE('/about-section/{id}' ,  'Backend\IndexController@aboutSectionDestroy')->name('admin.about.section.destroy');


    Route::get('/our-purpose' ,            'Backend\IndexController@ourPurpose')->name('admin.purpose');
    Route::post('/our-purpose' ,           'Backend\IndexController@ourPurposeStore')->name('admin.purpose.store');
    Route::get('/our-purpose/create' ,     'Backend\IndexController@ourPurposeCreate')->name('admin.purpose.create');
    Route::get('/our-purpose/{id}/edit' ,  'Backend\IndexController@ourPurposeEdit')->name('admin.purpose.edit');
    Route::put('/our-purpose/{id}' ,       'Backend\IndexController@ourPurposeUpdate')->name('admin.purpose.update');
    Route::DELETE('/our-purpose/{id}' ,    'Backend\IndexController@ourPurposeDestroy')->name('admin.purpose.destroy');


    Route::get('/our-value' ,            'Backend\IndexController@ourValue')->name('admin.value');
    Route::post('/our-value' ,           'Backend\IndexController@ourValueStore')->name('admin.value.store');
    Route::get('/our-value/create' ,     'Backend\IndexController@ourValueCreate')->name('admin.value.create');
    Route::get('/our-value/{id}/edit' ,  'Backend\IndexController@ourValueEdit')->name('admin.value.edit');
    Route::put('/our-value/{id}' ,       'Backend\IndexController@ourValueUpdate')->name('admin.value.update');
    Route::DELETE('/our-value/{id}' ,    'Backend\IndexController@ourValueDestroy')->name('admin.value.destroy');


    Route::get('/our-work' ,              'Backend\IndexController@work')->name('admin.work');
    Route::put('/our-work' ,                  'Backend\IndexController@workUpdate')->name('admin.work.update');
    Route::get('/our-work-section/create' ,'Backend\IndexController@workSectionCreate')->name('admin.work.create');
    Route::post('/our-work-section' ,'Backend\IndexController@workSectionStore')->name('admin.work.store');
    Route::get('/our-work-section/{id}/edit' ,'Backend\IndexController@workSectionEdit')->name('admin.work.section.edit');
    Route::put('/our-work-section/{id}' ,          'Backend\IndexController@workSectionUpdate')->name('admin.work.section.update');
    Route::DELETE('/our-work-section/{id}' ,  'Backend\IndexController@workSectionDestroy')->name('admin.work.section.destroy');

    Route::get('/our-work-section-list/create' ,'Backend\IndexController@workSectionListCreate')->name('admin.work.list.create');
    Route::post('/our-work-section-list' ,'Backend\IndexController@workSectionListStore')->name('admin.work.list.store');
    Route::get('/our-work-section-list/{id}/edit' ,'Backend\IndexController@workSectionListEdit')->name('admin.work.list.section.edit');
    Route::put('/our-work-section-list/{id}' ,          'Backend\IndexController@workSectionListUpdate')->name('admin.work.list.section.update');
    Route::DELETE('/our-work-section-list/{id}' ,  'Backend\IndexController@workSectionListDestroy')->name('admin.work.list.section.destroy');


    Route::get('/partners' ,            'Backend\IndexController@partners')->name('admin.partners');
    Route::post('/partners' ,           'Backend\IndexController@partnersStore')->name('admin.partners.store');
    Route::get('/partners/create' ,     'Backend\IndexController@partnersCreate')->name('admin.partners.create');
    Route::get('/partners/{id}/edit' ,  'Backend\IndexController@partnersEdit')->name('admin.partners.edit');
    Route::put('/partners/{id}' ,       'Backend\IndexController@partnersUpdate')->name('admin.partners.update');
    Route::DELETE('/partners/{id}' ,    'Backend\IndexController@partnersDestroy')->name('admin.partners.destroy');

});
