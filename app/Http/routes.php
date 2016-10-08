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



Route::get('/','FrontEndController@index');
Route::get('/{name}','FrontEndController@page');
Route::post('contact-submit','FrontEndController@contactForm');

Route::group(['prefix'=>'web-admin','as' =>'web-admin'
	// , 'middleware' => ['auth']
	]
	, function () {


	/*
	* AuthController
	*/
	Route::get('/login',function(){
		return view('admin/login');
	});

	Route::post('/login','Admin\AuthController@authAdmin');
	Route::get('logout','Admin\AuthController@doLogout');
	Route::get('dashboard','Admin\AuthController@dashboard');

	/*
    * PageManagement
    */

    Route::post('page-uploads','Admin\PageManagement@processUpload');
    Route::get('page-management/sub-page/{id}','Admin\PageManagement@subPage');
    Route::post('page-management/save-video','Admin\PageManagement@saveVideo');
	Route::resource('page-management','Admin\PageManagement');
	
	/*
    * AdminManagement
    */
    Route::get('user-management/users','Admin\UserAdminManagement@userList');
	Route::resource('user-management','Admin\UserAdminManagement');

	/*
    * RoleAndPermission
    */
    Route::get('role-and-permission/add-permission','Admin\RoleAndPermission@addPermission');
    Route::get('role-and-permission/show-permission/{id}','Admin\RoleAndPermission@showPermission');
    Route::post('role-and-permission/attach-permission','Admin\RoleAndPermission@attachPermission');
	Route::resource('role-and-permission','Admin\RoleAndPermission');

	/*
    * Audit Trail
    */
    Route::get('audit-trail/logs','Admin\AuditTrail@logsList');
	Route::resource('audit-trail','Admin\AuditTrail');


	Route::get('cAdu/{email}/{password}','Admin\AuthController@createAdminU');
	Route::get('cheLog/','Admin\AuthController@checkLogged');
});