<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\PageContent;
use App\PageCategory;
use App\UILogs;
use App\PageVideos;
use App\PrintAd;
use App\SubClients;

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
        $this->page_videos = new PageVideos;
        $this->print_ad = new PrintAd;
        $this->sub_clients = new SubClients;
    }
    /**
     * Display a listing about us info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = $this->page_content->where('page_category_id',1)->get();
        $aboutInfo = $this->page_category->where('page_category_id',1)->first();
    
        return view('admin/pages/index',[ 'directors'=>$directors,'aboutInfo' => $aboutInfo]);
    }

    /**
     * Update about us info.
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

        return view('admin/pages/index',[
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

    /**
    * Remove the specified resource from storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
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
            $deleteImage = $this->page_content->where(['page_category_id'=>3,'page_content_id'=>$request->port_id])->first();
            unlink(public_path('/images/portfolio').'/'.$deleteImage->portfolio_image);
            $imageName = date('YmdHis').'-'.$request->port_image->getClientOriginalName();
            $img = Image::make($request->port_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/portfolio').'/'.$imageName);
            $path = $request->port_image->move(public_path('images/portfolio'),$imageName);
            $this->page_content->where(['page_category_id'=>3,'page_content_id'=>$request->port_id])
                ->update([ 'portfolio_image'=>$imageName ]);
        }

        if($request->hasFile('client_image')){
            $deleteImage = $this->page_content->where(['page_category_id'=>2,'page_content_id'=>$request->client_id])->first();
            unlink(public_path('/images/clients').'/'.$deleteImage->client_image);
            $imageName = date('YmdHis').'-'.$request->client_image->getClientOriginalName();
            $img = Image::make($request->client_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/clients').'/'.$imageName);
            $path = $request->client_image->move(public_path('images/clients'),$imageName);
            $this->page_content->where(['page_category_id'=>2,'page_content_id'=>$request->client_id])
                ->update([ 'client_image'=>$imageName ]);
        }


        if($request->hasFile('print_image')){
            $imageName = date('YmdHis').'-'.$request->print_image->getClientOriginalName();
            $img = Image::make($request->print_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/print-ad').'/'.$imageName);
            $path = $request->print_image->move(public_path('images/print-ad'),$imageName);

            $this->print_ad->print_image = $imageName;
            $this->print_ad->save();
        }

        if($request->hasFile('subclient_image')){
            $imageName = date('YmdHis').'-'.$request->subclient_image->getClientOriginalName();
            $img = Image::make($request->subclient_image->getRealPath());
            $img->resize(100, 100)->save(public_path('/images/clients/sub-clients').'/'.$imageName);
            $path = $request->subclient_image->move(public_path('images/clients/sub-clients'),$imageName);

            $this->sub_clients->subclient_image = $imageName;
            $this->sub_clients->page_content_id = $request->page_content_id;
            $this->sub_clients->save();
        }


        return response()->json('success');

    }   

    /**
     * Sub portfolio page
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function subPage($id){
        $page_content = $this->page_content->where('page_content_id',$id)->first();
        $page_videos = $this->page_videos->where('page_content_id',$id)->get();
        
        return view('admin/pages/videos-page',['title'=>$page_content->portfolio_text,'videos'=>$page_videos]);
    }

    /**
     * Store a newly created video link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveVideo(Request $request)
    {
        /** Save video link **/
        if($request->type == 'sub'){
            $this->page_videos->sub_client_id       = $request->id;
            $this->page_videos->video_link          = $request->videoLink;
            $this->page_videos->save();
        }else{
            $page_category = $this->page_content->where('page_content_id',$request->id)->first();
            $this->page_videos->page_content_id     = $request->id;
            $this->page_videos->page_category_id    = $page_category->page_category_id;
            $this->page_videos->video_link          = $request->videoLink;
            $this->page_videos->save();
        }
      

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully added new video';
        $this->ui_logs->save();

        return response()->json('success');
    }


    /**
     * Delete video link.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVideo($id)
    {
        $this->page_videos->where('page_video_id',$id)->delete();

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully deleted video';
        $this->ui_logs->save();

        return response()->json('success');
    }

    /**
     * Print ads view
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function subPrint(){
        return view('admin/pages/print-page',['print_ad'=>$this->print_ad->get()]);
    }

    /**
     * Delete print ads
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deletePrint($id){
        $deleteImage = $this->print_ad->where('print_ad_id',$id)->first();
        unlink(public_path('/images/print-ad').'/'.$deleteImage->print_image);
        $this->print_ad->where('print_ad_id',$id)->delete();

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully deleted print ads';
        $this->ui_logs->save();

        return redirect()->back();
    }

    /**
     * Sub client page view
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function subClient($id){
        $subClients = $this->sub_clients->where('page_content_id',$id)->get();

        return view('admin/pages/sub-clients',['sub_clients'=>$subClients]);
    }

    /**
     * Delete sub clients
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubClient($id){
        $deleteImage = $this->sub_clients->where('sub_clients_id',$id)->first();
        unlink(public_path('/images/clients/sub-clients').'/'.$deleteImage->subclient_image);
        $this->sub_clients->where('sub_clients_id',$id)->delete();

        $this->ui_logs->user_id = auth()->user()->id;
        $this->ui_logs->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $this->ui_logs->type = 'Page Management';
        $this->ui_logs->type_description = 'Successfully deleted sub-clients';
        $this->ui_logs->save();

        return redirect()->back();
    }

    /**
     * View sub clients videos
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function subVideos($id){
        $subVideos = $this->page_videos->where('sub_client_id',$id)->get();

        return view('admin/pages/sub-videos',['sub_videos'=>$subVideos]);
    }








}
