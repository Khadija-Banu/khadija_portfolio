<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\About;

class AboutPagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('backend.about.create');
    }
    public function store(Request $request){

        $this->validate($request, [
            
            'title1' => 'required|string',
            'title2' => 'required|string',
            'image' => 'required|image|max:2048',
            'description' => 'required|string',
        ]);
        $abouts = new About;

        $abouts->title1 =$request->title1;
        $abouts->title2 =$request->title2;
        $abouts->description =$request->description;

        $image_file = $request->file('image');
        Storage::putFile('public/img/',$image_file);
        $abouts->image = "storage/img/".$image_file->hashName();


        $abouts->save();

        return redirect()->route('b_about_list')->with('success','New about created successfully');

    }

    public function list(){
        $abouts = About::all();
        return view('backend.about.list',compact('abouts'));
    }

    public function edit($id){
        $about = About::find($id);
        return view('backend.about.edit',compact('about'));
    }
    public function update(Request $request,$id){

        $this->validate($request, [
            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
        ]);
        $abouts = About::find($id);

        $abouts->title1 =$request->title1;
        $abouts->title2 =$request->title2;
        $abouts->description =$request->description;

        if($request->file('image')){
            $image = $request->file('image');
            Storage::putFile('public/img/',$image);
            $abouts->image = "storage/img/".$image->hashName();
        }
      
        $abouts->save();

        return redirect()->route('b_about_list')->with('success','About Updated successfully');

    
    }

      //Individual portfolio delete
      public function delete($id){
        $about=About::find($id);
        @unlink(public_path($portfolio->big_image));
        $about->delete();
        return redirect()->back()->with('success','About Deleted successfully');

    }
}
