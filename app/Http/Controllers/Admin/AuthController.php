<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests;
use App\AdminsTB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
	use ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/web-admin/dashboard';
    protected $loginPath = '/web-admin';
    protected $redirectAfterLogout = '/web-admin';

    public function __construct(){
    	$this->adminsTB = new AdminsTB();
    }

    public function authAdmin(Request $request){
    	$validator = Validator::make($request->all(), [
	        'email' => 'required|email',
	        'password' => 'required|min:6',
	    ]);
	    if ($validator->fails()) {
	        return back()
	            ->withInput()
	            ->withErrors($validator);
	    }

	    if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
            return redirect()->intended('/web-admin/dashboard');
        } else{
            return back()->withInput()->with('checkUser', 'Incorrect Email or Password');
        }


    }

    public function createAdminU($email,$password)
    {
    	$this->adminsTB->email = $email;
    	$this->adminsTB->password = bcrypt($password);
    	$this->adminsTB->save();

    	return response('hehe');
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
    }


    public function dashboard(){
        if(!auth()->user()){
            abort(404);
        }
        return view('admin/dashboard');
        // dump(auth()->user());
    }

    public function doLogout(){
        Auth::logout();
        return redirect('web-admin');
    }
}
