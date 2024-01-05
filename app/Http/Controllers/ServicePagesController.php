<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicePagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('backend.services.create');
    }
    public function store(Request $request){

        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $services = new Service;
        $services->icon=$request->icon;
        $services->title =$request->title;
        $services->description =$request->description;

        $services->save();

        return redirect()->route('b_service_list')->with('success','New service created successfully');

    }

    public function list(){
        $services = Service::all();
        return view('backend.services.list',compact('services'));
    }

    public function edit($id){
        $service = Service::find($id);
        return view('backend.services.edit',compact('service'));
    }
    public function update(Request $request,$id){

        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $services = Service::find($id);
        $services->icon=$request->icon;
        $services->title =$request->title;
        $services->description =$request->description;

        $services->save();

        return redirect()->route('b_service_list')->with('success','Service Updated successfully');

    }

      //Individual post delete
      public function delete($id){
        $data=Service::find($id);
        $data->delete();
        return redirect()->back()->with('success','Service Deleted successfully');

    }
}
