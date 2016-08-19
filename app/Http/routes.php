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


Route::group(['prefix'=>'web-admin','as' =>'web-admin'
	// , 'middleware' => ['role:admin']
	]
	, function () {


	/*
	* AuthController
	*/
	Route::get('/',function(){
		if(Auth::user()){
			return redirect('web-admin/dashboard');
		}	
		return view('admin/login');
	});

//	if(Auth::user()){
		Route::post('/','Admin\AuthController@authAdmin');
		Route::get('logout','Admin\AuthController@doLogout');
		Route::get('dashboard','Admin\AuthController@dashboard');

		/*
        * PageManagement
        */
		Route::resource('page-management','Admin\PageManagement');

		/*
        * AdminManagement
        */
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
		Route::resource('audit-trail','Admin\AuditTrail');


		Route::get('cAdu/{email}/{password}','Admin\AuthController@createAdminU');
		Route::get('cheLog/','Admin\AuthController@checkLogged');

//	}



});