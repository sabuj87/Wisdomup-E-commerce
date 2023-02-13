<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider:: orderby('created_at','DESC')->paginate(10);
        return  view('back.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.slider.create');
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


            $slider=new Slider;

            $slider->title=$request->title;
            $slider->url=$request->url;
            $slider->button_text=$request->btnText;
            $slider->priority=$request->priorty;
            $slider->status=$request->status;

            if($request->hasFile('image')){
                $image=$request->file('image');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/slider',$imgName);
                $slider->image=$imgName;
               
               
            }
            
            if($request->hasFile('mimage')){
                $image=$request->file('mimage');
                $imgName=time().'m.'.$image->getClientOriginalExtension();
                $image->move('image/slider',$imgName);
                $slider->mimage=$imgName;
               
               
            }


            $slider->save();
            flash('Slider created successfully')->success();
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
        $slider=Slider::find($id);

        return view('back.pages.slider.edit',compact('slider'));

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
    
        

            $slider=Slider::find($id);

            $slider->title=$request->title;
            $slider->url=$request->url;
            $slider->button_text=$request->btnText;
            $slider->priority=$request->priorty;
            $slider->status=$request->status;

            if($request->hasFile('image')){
   
                if(file_exists("image/slider/".$slider->image)){
                    unlink("image/slider/".$slider->image);
                }


                $image=$request->file('image');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/slider',$imgName);
                $slider->image=$imgName;
               
               
            }

            if($request->hasFile('mimage')){
   
                if(file_exists("image/slider/".$slider->mimage)){
                    unlink("image/slider/".$slider->mimage);
                }


                $image=$request->file('mimage');
                $imgName=time().'.'.$image->getClientOriginalExtension();
                $image->move('image/slider',$imgName);
                $slider->mimage=$imgName;
               
               
            }



            $slider->save();
            flash('Slider Updated successfully')->success();
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
        $slider=Slider::find($id);
        if(file_exists("image/slider/".$slider->image)){
            unlink("image/slider/".$slider->image);
        }
      
        $slider->delete();
        flash('Slider deleted successfully')->success();
        return  back();
 

    }
}
