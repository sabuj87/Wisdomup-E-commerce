<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
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
        $categories = Category:: orderby('created_at','DESC')->get();
        return  view('back.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $categories = Category:: orderby('created_at','DESC')->get();
        return  view('back.pages.category.create',compact('categories'));

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


        $category=new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->show_homepage=$request->show;
        $category->save();
        if($request->hasFile('icon')){

            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/category',$imgName);
            $category->icon=$imgName;
            $category->save();

        }
        flash('Category created successfully')->success();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category:: orderby('created_at','DESC')->get();
        return  view('back.pages.category.edit',compact('category','categories'));
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
            'name'=>'required|min:2|max:50|unique:categories,name,'.$id
        ]);

        $category = Category :: findOrFail($id);
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->show_homepage=$request->show;
        $category->save();
        if($request->hasFile('icon')){

            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/category',$imgName);
            $category->icon=$imgName;
            $category->save();

        }
        flash('Category updated successfully')->success();
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
        $category = Category :: findOrFail($id);

        $category->delete();


        flash('Category deleted successfully')->success();
        return  redirect()->route('categories.index');
    }


    public function getCategoriesJSON(){
        $categories = Category :: all();
        return response()->json([
           
            'success'=>true,
            'data'=>$categories

            

        ],Response::HTTP_OK);
    }


   
}