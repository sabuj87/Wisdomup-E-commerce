<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;
use Image;

class BrandController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $brands = Brand:: orderby('created_at','DESC')->get();
        return  view('back.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('back.pages.brand.create');
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


        $brand=new Brand;
        $brand->name=$request->name;
        $brand->country=$request->country;
        $brand->description=$request->description;
        $brand->show_homepage=$request->show;
        $brand->save();
        if($request->hasFile('icon')){

            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/brand',$imgName);
            $brand->icon=$imgName;
            $brand->save();

        }
        flash('Brand created successfully')->success();
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
        $brand = Brand::findOrFail($id);
        return  view('back.pages.brand.edit',compact('brand'));
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
        //validation
        $this->validate($request,[
            'name'=>'required|min:2|max:50|unique:categories'
        ]);


        $brand=Brand::findOrFail($id);
        $brand->name=$request->name;
        $brand->country=$request->country;
        $brand->description=$request->description;
        $brand->show_homepage=$request->show;
        $brand->save();
        if($request->hasFile('icon')){

            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/brand',$imgName);
            $brand->icon=$imgName;
            $brand->save();

        }
        flash('Brand Updated successfully')->success();
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
        $brand = Brand :: findOrFail($id);

        $brand->delete();


        flash('Brand deleted successfully')->success();
        return  redirect()->route('brands.index');
    }
}
