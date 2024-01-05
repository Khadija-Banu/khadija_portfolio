<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class B_DashboardController extends Controller
{
    //security
    public function __construct(){
        $this->middleware('auth');
    }
    public function master(){
        $user = User::all();
        return view('backend.b_master',compact('user'));
    }
  

    public function about(){
        return view('backend.b_about');
    }
    public function contact(){
        return view('backend.b_contact');
    }

}
