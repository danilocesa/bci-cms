<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontEndController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	return view('index');
    }

    public function page($name){
    	return view('about_us');
    }
}
