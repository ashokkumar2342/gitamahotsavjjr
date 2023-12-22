<?php

use App\Http\Controllers\Admin\reportGenerateBarcode;
//registration start

//registration end 

Route::get('login', 'Auth\LoginController@login')->name('admin.login'); 
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::post('login-post', 'Auth\LoginController@loginPost')->name('admin.login.post'); 

Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::post('user-profile-update', 'DashboardController@userprofileUpdate')->name('user.profile.update');
	Route::get('start-quiz', 'DashboardController@startQuiz')->name('admin.start.quiz');
	Route::get('send-question', 'DashboardController@sendQuestion')->name('admin.send.question');
	Route::get('show-answer', 'DashboardController@showAnswer')->name('admin.show.answer');
	Route::get('show-score-board', 'DashboardController@showScoreBoard')->name('admin.show.score.board');
	Route::get('send-next-question', 'DashboardController@sendNextQuestion')->name('admin.send.next.question');
	Route::get('endquiz', 'DashboardController@endquiz')->name('admin.end.quiz');
	Route::get('start-exam', 'DashboardController@startexam')->name('admin.start.exam');
	Route::get('review-exam', 'DashboardController@reviewexam')->name('admin.review.exam');
	Route::post('answer-store', 'DashboardController@answerStore')->name('admin.student.answer.store');
	Route::get('check-all-submit', 'DashboardController@check_all_submit')->name('admin.check.all.submit');
	Route::get('end-exam', 'DashboardController@endexam')->name('admin.end.exam');
	Route::get('profile-show/{profile_pic}', 'DashboardController@proFilePhotoShow')->name('admin.profile.photo.show'); 



	Route::get('show-details', 'DashboardController@showStudentDetails')->name('admin.student.show.details');
	Route::get('registration-show-details', 'DashboardController@showStudentRegistrationDetails')->name('admin.student.Registration.details');
	Route::get('finish-confirm', 'DashboardController@finishCofirm')->name('admin.student.answer.finish.confirm');
	Route::get('finish', 'DashboardController@finish')->name('admin.student.answer.finish');
	Route::get('auto-finish', 'DashboardController@autofinish')->name('admin.student.answer.autofinish');
	Route::get('token', 'DashboardController@passportTokenCreate')->name('admin.token');
	Route::get('profile', 'DashboardController@proFile')->name('admin.profile');
	Route::get('profile-show', 'DashboardController@proFileShow')->name('admin.profile.show');
	Route::post('profile-update', 'DashboardController@profileUpdate')->name('admin.profile.update');
	
	Route::post('password-change', 'DashboardController@passwordChange')->name('admin.password.change');
	Route::get('profile-photo', 'DashboardController@profilePhoto')->name('admin.profile.photo');
	Route::post('upload-photo', 'DashboardController@profilePhotoUpload')->name('admin.profile.photo.upload');
	Route::get('photo-refrash', 'DashboardController@profilePhotoRefrash')->name('admin.profile.photo.refrash');
	

	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');

		Route::get('DistrictsAssign', 'AccountController@DistrictsAssign')->name('admin.account.DistrictsAssign'); 
		Route::get('StateDistrictsSelect', 'AccountController@StateDistrictsSelect')->name('admin.account.StateDistrictsSelect'); 
		Route::post('DistrictsAssignStore', 'AccountController@DistrictsAssignStore')->name('admin.Master.DistrictsAssignStore');
		Route::get('DistrictsAssignDelete/{id}', 'AccountController@DistrictsAssignDelete')->name('admin.Master.DistrictsAssignDelete');

		Route::get('BlockAssign', 'AccountController@BlockAssign')->name('admin.account.BlockAssign'); 
		Route::get('DistrictBlockAssign', 'AccountController@DistrictBlockAssign')->name('admin.account.DistrictBlockAssign'); 
		Route::post('DistrictBlockAssignStore', 'AccountController@DistrictBlockAssignStore')->name('admin.Master.DistrictBlockAssignStore');
		Route::get('DistrictBlockAssignDelete/{id}', 'AccountController@DistrictBlockAssignDelete')->name('admin.Master.DistrictBlockAssignDelete');
		
	});
	
		

        
	

    
 });