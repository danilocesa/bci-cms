<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\PageContent;
use App\PageCategory;
use App\UILogs;

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
        $this->ui_logs = new UILogs;
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

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully updated page: About Us';
        $this->ui_logs->save();
                    
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
                $qType = 'get';
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
        $pagelog = '';
        if($request->get('page_category') == 4){ //Contact us update
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
            $pagelog = 'Contact Us';
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
            $pagelog = 'Portfolio';
       }
       elseif($request->get('page_category') == 2){
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
            $this->page_category->where('page_category_id',2)
            ->update([
                'page_description'  =>  $request->get('page_description'),
                'meta_description'  =>  $request->get('meta_description'),
                'meta_keywords'     =>  $request->get('meta_keywords')
            ]);
            $pagelog = 'Clients';
       }
       else{
            return redirect()->back()->with('errors','Else invoked.'); 
       }

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully updated page: '.$pagelog;
        $this->ui_logs->save();

       return redirect()->back()->with('success','Page Updated'); 

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


    public function processUpload(Request $request){
        // return response()->json($request->all());
        /** About Us Upload **/
        if ($request->hasFile('aboutUs_image')) {
            $imageName = 'about-us'.'.'.$request->aboutUs_image->getClientOriginalExtension();
            $img = Image::make($request->aboutUs_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images').'/'.$imageName);
            $path = $request->aboutUs_image->move(public_path('images'),$imageName);
            $this->page_category->where('page_category_id',1)
                ->update([ 'image'=>$imageName ]);
        }

        if($request->hasFile('port_image')){
            $imageName = date('YmdHis').'-'.$request->port_image->getClientOriginalName();
            $img = Image::make($request->port_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/portfolio').'/'.$imageName);
            $path = $request->port_image->move(public_path('images/portfolio'),$imageName);
            $this->page_content->where(['page_category_id'=>3,'page_content_id'=>$request->port_id])
                ->update([ 'portfolio_image'=>$imageName ]);
        }

        if($request->hasFile('client_image')){
            $imageName = date('YmdHis').'-'.$request->client_image->getClientOriginalName();
            $img = Image::make($request->client_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/clients').'/'.$imageName);
            $path = $request->client_image->move(public_path('images/clients'),$imageName);
            $this->page_content->where(['page_category_id'=>2,'page_content_id'=>$request->client_id])
                ->update([ 'client_image'=>$imageName ]);
        }


        return response()->json('success');


    }   
}
