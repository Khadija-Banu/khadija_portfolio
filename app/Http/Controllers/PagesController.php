<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\About;

class PagesController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
        $main = Main::first();
        return view('pages.index',compact('main','services','portfolios','abouts'));
    }
}
