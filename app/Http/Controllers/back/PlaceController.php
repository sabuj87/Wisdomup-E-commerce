<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places=Place::orderBy('created_at','DESC')->get();

        return  view('back.pages.place.index',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.place.create');
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
            'name' => 'required',
        
            ]);  

            $place= new Place;

            $place->name=$request->name;
            $place->end_date=$request->date;
            $place->show_home=$request->show;
         

            if($request->hasFile('image')){
                $image=$request->file('image');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/place',$imgName);
                $place->image=$imgName;
               
               
            }


            $place->save();
            flash('Place created successfully')->success();
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
        $place=Place::find($id);
        return view('back.pages.place.edit',compact('place'));
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
            $request->validate(
            [
            'name' => 'required',
        
            ]);  

            $place=Place::find($id);

            $place->name=$request->name;
            $place->end_date=$request->date;
            $place->show_home=$request->show;
         

            if($request->hasFile('image')){
               
                if(file_exists("image/place/".$place->image)){
                    unlink("image/place/".$place->image);
                }
    
                 
                $image=$request->file('image');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/place',$imgName);
                $place->image=$imgName;
               
               
            }


            $place->save();
            flash('Place updated successfully')->success();
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
        $place=Place::find($id);
        if(file_exists("image/place/".$place->image)){
            unlink("image/place/".$place->image);
        }
        
        $place->delete();
        flash('Place deleted successfully')->success();
        return  back();



    }
}
