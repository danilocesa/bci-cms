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
Route::get('/clients/{id}','FrontEndController@subClients');
Route::get('/slides/{id}','FrontEndController@subSlides');

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
		Route::group(['middleware'=>'auth'],function(){
			Route::get('logout','Admin\AuthController@doLogout');
			
			Route::get('dashboard','Admin\AuthController@dashboard');

			/*
		    * PageManagement
		    */

		    Route::post('page-uploads','Admin\PageManagement@processUpload');
		    Route::get('page-management/sub-page/{id}','Admin\PageManagement@subPage');
		    Route::post('page-management/save-video','Admin\PageManagement@saveVideo');
		    Route::get('page-management/delete-video/{id}','Admin\PageManagement@deleteVideo');
		    Route::get('page-management/sub-print','Admin\PageManagement@subPrint');
		    Route::get('page-management/delete-print/{id}','Admin\PageManagement@deletePrint');
		    Route::get('page-management/sub-clients/{id}','Admin\PageManagement@subClient');
		    Route::get('page-management/delete-subclients/{id}','Admin\PageManagement@deleteSubClient');
		    Route::get('page-management/subclient-videos/{id}','Admin\PageManagement@subVideos');
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
		});
});