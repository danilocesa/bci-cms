<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});


Route::group(['as' => 'web-admin'], function () {
	/*
	* AuthController
	*/
	Route::get('web-admin',function(){
		if(Auth::user()){
			return redirect('web-admin/dashboard');
		}	
		return view('admin/login');
	});
	Route::post('web-admin','Admin\AuthController@authAdmin');
	Route::get('web-admin/logout','Admin\AuthController@doLogout');
	Route::get('web-admin/dashboard','Admin\AuthController@dashboard');

	/*
	* PageManagement
	*/
	Route::resource('web-admin/page-management','Admin\PageManagement');

	/*
	* AdminManagement
	*/
	Route::resource('web-admin/user-management','Admin\UserAdminManagement');

	/*
	* Audit Trail
	*/
	Route::resource('web-admin/audit-trail','Admin\AuditTrail');
	

	Route::get('web-admin/cAdu/{email}/{password}','Admin\AuthController@createAdminU');
	Route::get('web-admin/cheLog/','Admin\AuthController@checkLogged');

});