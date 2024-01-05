<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainPagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function main(){
        $main = Main::first();
        return view('backend.b_main',compact('main'));
    }
    public function main_update(Request $request){

        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ]);
        $main = Main::first();
        $main->title =$request->title;
        $main->sub_title =$request->sub_title;

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/' ,'bc_img.'.$img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.'.$img_file->getClientOriginalExtension();
        }
        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.'.$pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.'.$pdf_file->getClientOriginalExtension();
        }
        $main->save();
        return redirect()->route('b_main')->with('success',"Main page data has been updated successfully");
    }
}
