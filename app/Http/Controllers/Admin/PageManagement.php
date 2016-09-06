<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\PageContent;
use App\PageCategory;

use Auth;
use Image;
use Validator;

class PageManagement extends Controller
{
    public function __construct(){
        if(!Auth::user()->can('view-page')){
            abort(404);
        }
        $this->page_category = new PageCategory;
        $this->page_content = new PageContent;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = $this->page_content->where('page_category_id',1)->get();
        $aboutInfo = $this->page_category->where('page_category_id',1)->first();
    
        return view('admin\pages\index',[ 'directors'=>$directors,'aboutInfo' => $aboutInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'page_description'      => 'required',
            'meta_description'      => 'required|max:150',
            'meta_keywords'         => 'required',
            'directors'             => 'required',
            'directors_position'    => 'required',
            'directors_desc'        => 'required',
            'director_link'         => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        if ($request->hasFile('aboutUs_image')) {
            $imageName = 'about-us'.'.'.$request->aboutUs_image->getClientOriginalExtension();
            $img = Image::make($request->aboutUs_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images').'/'.$imageName);
            $path = $request->aboutUs_image->move(public_path('images'),$imageName);
            $this->page_category->where('page_category_id',1)
                ->update([ 'image'=>$imageName ]);
        }
        foreach ($request->get('page_content_id') as $pageId) {
            $this->page_content
                ->where('page_content_id',$pageId)
                ->update([
                    'director_name'=>$request->get('directors')[$pageId - 1],
                    'director_position'=>$request->get('directors_position')[$pageId - 1],
                    'director_desc' => $request->get('directors_desc')[$pageId - 1],
                    'linkedin' => $request->get('director_link')[$pageId - 1]
                ]);
        }

        $this->page_category->where('page_category_id',1)
            ->update([
                'page_description'  =>  $request->get('page_description'),
                'meta_description'  =>  $request->get('meta_description'),
                'meta_keywords'     =>  $request->get('meta_keywords')
            ]);


        return redirect()->back()->with('success','Page Updated');    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catID = '';
        $qType = '';
        switch ($id) {
            case 'clients':
                $catID = 2;
                $qType = 'first';
                break;
            case 'portfolio':
                $catID = 3;
                $qType = 'get';
                break;
            case 'contact-us':
                $catID = 4;
                $qType = 'first';
                break; 
        }

        $pageInfo = $this->page_category->where('page_category_id',$catID)->first();
        $pageContent = $this->page_content->where('page_category_id',$catID)->$qType();

   
        return view('admin\pages\index',[
            'pageInfo' => $pageInfo,
            'pageContent' => $pageContent
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($request->all());
        if($request->get('page_category') == 2){ //Contact us update
            $validator = Validator::make($request->all(), [
                'page_description'      => 'required',
                'meta_description'      => 'required|max:150',
                'meta_keywords'         => 'required',
                'facebook_link'         => 'required',
                'linkedin_link'         => 'required',
                'career_email'          => 'required|email',
                'inquiry_email'         => 'required|email'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            $this->page_content->where('page_category_id',4)
            ->update([
                'fb_link'           =>  $request->get('facebook_link'),
                'linkedin'          =>  $request->get('linkedin_link'),
                'career_email'      =>  $request->get('career_email'),
                'inquiry_email'     =>  $request->get('inquiry_email'),
            ]);

            $this->page_category->where('page_category_id',4)
            ->update([
                'page_description'  =>  $request->get('page_description'),
                'meta_description'  =>  $request->get('meta_description'),
                'meta_keywords'     =>  $request->get('meta_keywords')
            ]);

            return redirect()->back()->with('success','Page Updated'); 
       }
       elseif($request->get('page_category') == 3){ //Portfolio update
             $validator = Validator::make($request->all(), [
                'page_description'      => 'required',
                'meta_description'      => 'required|max:150',
                'meta_keywords'         => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }
            $counter = 0;
            foreach ($request->get('page_content_id') as $pageId) {
                $this->page_content
                    ->where('page_content_id',$pageId)
                    ->update([
                        'portfolio_text'=>$request->get('portfolioText')[$counter]
                    ]);
                $counter ++;    
            }

            $this->page_category->where('page_category_id',3)
            ->update([
                'page_description'  =>  $request->get('page_description'),
                'meta_description'  =>  $request->get('meta_description'),
                'meta_keywords'     =>  $request->get('meta_keywords')
            ]);

            return redirect()->back()->with('success','Page Updated'); 


       }
       else{
            dd(1);
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function processFile(){

    }
}
