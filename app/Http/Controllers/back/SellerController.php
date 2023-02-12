<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use File;
use Image;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $sellers = Seller:: orderby('created_at','DESC')->get();
        return  view('back.pages.seller.index',compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('back.pages.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories'
        ]);


        $seller=new Seller;
        $seller->name=$request->name;
        $seller->country=$request->country;
        $seller->description=$request->description;
        $seller->show_homepage=$request->show;
        $seller->save();
        if($request->hasFile('icon')){
            if(file_exists("image/seller/".$seller->icon)){
                unlink("image/seller/".$seller->icon);
            }
            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/seller',$imgName);
            $seller->icon=$imgName;
            $seller->save();

        }
        flash('Seller created successfully')->success();
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
        $seller = Seller::findOrFail($id);
        return  view('back.pages.seller.edit',compact('seller'));
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
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories'
        ]);


        $seller=Seller::findOrFail($id);
        $seller->name=$request->name;
        $seller->country=$request->country;
        $seller->description=$request->description;
        $seller->show_homepage=$request->show;
        $seller->save();
        if($request->hasFile('icon')){

            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/seller',$imgName);
            $seller->icon=$imgName;
            $seller->save();

        }
        flash('Seller Updated successfully')->success();
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
        $seller = Seller :: findOrFail($id);

        $seller->delete();


        flash('Seller deleted successfully')->success();
        return  redirect()->route('sellers.index');
    }
}
