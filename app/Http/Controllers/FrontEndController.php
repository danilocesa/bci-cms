<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PageContent;
use App\PageCategory;
use App\PageVideos;
use App\PrintAd;
use App\SubClients;

use Mail;

class FrontEndController extends Controller
{
    public function __construct(){
    	$this->page_content = new PageContent;
        $this->page_category = new PageCategory;
        $this->page_videos = new PageVideos;
        $this->print_ad = new PrintAd;
    	$this->sub_clients = new SubClients;
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
                $videos = $this->page_videos->where('page_category_id',3)->get();
    			$print_ad = $this->print_ad->get();
    			$page = $this->page_category->where('page_category_id',3)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'page_desc'=>$page->page_description,'videos'=>$videos,'print_ad'=>$print_ad];
    			break;
    		case 'contact-us':
    			$content = $this->page_content->where('page_category_id',4)->first();
    			$page = $this->page_category->where('page_category_id',4)->first();
    			$result = ['page_name'=>$name,'content'=>$content,'page_desc'=>$page->page_description];
    			break;
    		default:
    			abort(404);
    			break;		
    	}
    	return view($view,$result);
    }

    public function contactForm(Request $request){
        dd($request->all());

    }

    public function uploadAttach(Request $request){
        dd($request->all());
    }

    public function subClients($id){
        $subclients = $this->sub_clients->where('page_content_id',$id)->get();
        $subvideos  = $this->page_videos->where(['page_content_id'=>0,'page_category_id'=>0])->get();
        
        return view('sub_clients',['sub_clients'=>$subclients,'sub_videos'=>$subvideos]);
    }


}
