<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\AdminsTB;
use App\UILogs;
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
    protected $loginPath = '/web-admin/login';
    protected $redirectAfterLogout = '/web-admin/login';

    public function __construct(){
        $this->adminsTB = new AdminsTB();
        $this->ui_logs = new UIlogs();
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
            $user = $this->adminsTB->where('email',$request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                $this->ui_logs->user_id = $user->id;
                $this->ui_logs->name = $user->first_name.' '.$user->last_name;
                $this->ui_logs->type = 'Login';
                $this->ui_logs->type_description = 'Successfully logged';
                $this->ui_logs->save();
            }
            return redirect()->intended('web-admin/dashboard');
        } else{
            return back()->withInput()->with('checkUser', 'Incorrect Email or Password');
        }


    }

    public function dashboard(){

        return view('admin/dashboard');
        // dump(auth()->user());
    }

    public function doLogout(){
        Auth::logout();
        return redirect('web-admin/login');
    }
}
