<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Models\User;
use App\Models\WebRegister;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        $webinar = Webinar::all();
        return view('home.index', compact('webinar'));
    }

    public function login_home(){
        $webinar = Webinar::all();
        return view('home.index', compact('webinar'));
    }

    //Webinar Register
    public function web_view($id){

        return view('home.web_register',compact('id'));
    }
    
    public function store(Request $request){

        $webinar = new WebRegister;
        $webinar->name = $request->name;
        $webinar->email = $request->email;
        $webinar->phone = $request->phone;
        $webinar->state = $request->state;
        $webinar->city = $request->city;
        $webinar->country = $request->country;
        $webinar->webinar_id = $request->webinar_id;

        $webinar->save();
 
        toastr()->timeOut(5000)->closeButton()->addSuccess('Webinar register successfully!');
        return view('home.index');
    }


    public function web_details(){

        return view('home.web_details');
    }
}
