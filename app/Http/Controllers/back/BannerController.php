<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::orderBy('created_at','DESC')->get();
        return view("back.pages.banner.index",compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate(
            [
            'image' => 'required',
        
            ]);  

            $banner= new Banner;

            $banner->title=$request->title;
            $banner->type=$request->type;
            $banner->url=$request->url;
            $banner->button_text=$request->btnText;
            $banner->priority=$request->priorty;

            if($request->hasFile('image')){
                $image=$request->file('image');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/banner',$imgName);
                $banner->image=$imgName;
               
               
            }


            $banner->save();
            flash('Banner created successfully')->success();
            return  back();





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner=Banner::find($id);
        return view('back.pages.banner.edit',compact('banner'));

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
        $banner= Banner::find($id);

        $banner->title=$request->title;
        $banner->type=$request->type;
        $banner->url=$request->url;
        $banner->button_text=$request->btnText;
        $banner->priority=$request->priorty;

        if($request->hasFile('image')){

            if(file_exists("image/banner/".$banner->image)){
                unlink("image/banner/".$banner->image);
            }


            $image=$request->file('image');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/banner',$imgName);
            $banner->image=$imgName;
           
           
        }


        $banner->save();
        flash('Banner updated successfully')->success();
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= Banner::find($id);
        if(file_exists("image/banner/".$banner->image)){
            unlink("image/banner/".$banner->image);
        }
        $banner->delete();
        flash('Banner deleted successfully')->success();
        return  back();

    }
}
