<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PageContent;
use App\PageCategory;

class FrontEndController extends Controller
{
    public function __construct(){
    	$this->page_content = new PageContent;
    	$this->page_category = new PageCategory;
    }

    public function index(){

    	return view('index',['page_desc'=> $page_desc]);
    }

    public function page($name){
    	dump($name);
    	$view = str_replace('-', '_', $name);
    	$content = '';
    	switch ($name) {
    		case 'about-us':
    			$content = $this->page_content->where('page_category_id',1)->get();
    			break;
    	}
    	dump($content);
    	return view($view,['page_name'=>$name,'content'=>$content]);
    }
}
