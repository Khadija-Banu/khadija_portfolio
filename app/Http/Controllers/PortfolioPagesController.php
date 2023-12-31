<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;

class PortfolioPagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('backend.portfolio.create');
    }
    public function store(Request $request){

        $this->validate($request, [
            
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'big_image' => 'required|image',
            'small_image' => 'required|image',
            'description' => 'required|string',
            'client' => 'required|string',
            'category' => 'required|string',
        ]);
        $portfolios = new Portfolio;

        $portfolios->title =$request->title;
        $portfolios->sub_title =$request->sub_title;
        $portfolios->description =$request->description;
        $portfolios->client =$request->client;
        $portfolios->category =$request->category;

        $big_file = $request->file('big_image');
        Storage::putFile('public/img/',$big_file);
        $portfolios->big_image = "storage/img/".$big_file->hashName();

        $small_file = $request->file('small_image');
        Storage::putFile('public/img/',$small_file);
        $portfolios->small_image = "storage/img/".$small_file->hashName();

        $portfolios->save();

        return redirect()->route('b_portfolio_list')->with('success','New portfolio created successfully');

    }

    public function list(){
        $portfolios = Portfolio::all();
        return view('backend.portfolio.list',compact('portfolios'));
    }

    public function edit($id){
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.edit',compact('portfolio'));
    }
    public function update(Request $request,$id){

        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string',
            'client' => 'required|string',
            'category' => 'required|string',
        ]);
        $portfolios = Portfolio::find($id);

        $portfolios->title =$request->title;
        $portfolios->sub_title =$request->sub_title;
        $portfolios->description =$request->description;
        $portfolios->client =$request->client;
        $portfolios->category =$request->category;

        if($request->file('big_image')){
            $big_file = $request->file('big_image');
            Storage::putFile('public/img/',$big_file);
            $portfolios->big_image = "storage/img/".$big_file->hashName();
        }
        if($request->file('small_image')){
            $small_file = $request->file('small_image');
            Storage::putFile('public/img/',$small_file);
            $portfolios->small_image = "storage/img/".$small_file->hashName();
        }

        $portfolios->save();

        return redirect()->route('b_portfolio_list')->with('success','Portfolio Updated successfully');

    
    }

      //Individual portfolio delete
      public function delete($id){
        $portfolio=Portfolio::find($id);
        @unlink(public_path($portfolio->big_image));
        @unlink(public_path($portfolio->small_image));
        $portfolio->delete();
        return redirect()->back()->with('success','Portfolio Deleted successfully');

    }
}
