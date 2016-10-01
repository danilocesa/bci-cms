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
    	$page_desc = '';
    	return view('index',['page_desc'=> $page_desc]);
    }

    public function page($name){
    	$view = str_replace('-', '_', $name);
    	$result = '';
    	switch ($name) {
    		case 'about-us':
    			$content = $this->page_content->where('page_category_id',1)->get();
    			$page = $this->page_category->where('page_category_id',1)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'aboutImage'=>$page->image,'page_desc'=>$page->page_description];
    			break;
    		case 'clients':
    			$content = $this->page_content->where('page_category_id',2)->get();
    			$page = $this->page_category->where('page_category_id',2)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'page_desc'=>$page->page_description];
    			break;
    		case 'portfolio':
    			$content = $this->page_content->where('page_category_id',3)->get();
    			$page = $this->page_category->where('page_category_id',3)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'page_desc'=>$page->page_description];
    			break;
    		case 'contact-us':
    			$content = $this->page_content->where('page_category_id',4)->first();
    			$page = $this->page_category->where('page_category_id',4)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'page_desc'=>$page->page_description];
    			break;	
    	}
    	return view($view,$result);
    }

    
}