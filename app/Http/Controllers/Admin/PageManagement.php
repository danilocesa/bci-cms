<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\PageContent;
use App\PageCategory;

use Auth;

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
        
        return view('admin\pages\index',[ 'directors'=>$directors,'aboutInfo' => $aboutInfo ]);
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
        if($request->get('page_category') == 1){ //About us update
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
                    'meta_description' => $request->get('meta_description'),
                    'meta_keywords'     =>$request->get('meta_keywords')
                ]);
        }
        
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin\pages\index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
