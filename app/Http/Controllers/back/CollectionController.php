<?php

namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Product;

class CollectionController extends Controller
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
        $collections = Collection:: orderby('created_at','DESC')->get();
        return  view('back.pages.collection.index',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('back.pages.collection.create');
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


        $collection=new Collection();
        $collection->name=$request->name;
        $collection->description=$request->description;
        $collection->show_homepage=$request->show;
        $collection->save();
        if($request->hasFile('icon')){
          
            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/collection',$imgName);
            $collection->icon=$imgName;
            $collection->save();

        }
        flash('Collection created successfully')->success();
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
    public function product(Request $request)
    {
        $id=$request->id;
        $products = Product:: orderby('created_at','DESC')->where('collection_id',$id)->get();
        return ['success' =>$products];


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        return  view('back.pages.collection.edit',compact('collection'));
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


        $collection=Collection::findOrFail($id);
        $collection->name=$request->name;

        $collection->description=$request->description;
        $collection->show_homepage=$request->show;
        $collection->save();
        if($request->hasFile('icon')){

            if(file_exists("image/collection/".$collection->icon)){
                unlink("image/collection/".$collection->icon);
            }
            $image=$request->file('icon');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move('image/collection',$imgName);
            $collection->icon=$imgName;
            $collection->save();

        }
        flash('Collection Updated successfully')->success();
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
        $collection = Collection :: findOrFail($id);

        $collection->delete();


        flash('Collection deleted successfully')->success();
        return  redirect()->route('collections.index');
    }
}
