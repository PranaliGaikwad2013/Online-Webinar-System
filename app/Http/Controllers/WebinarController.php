<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Webinar;
use App\Models\User;
use App\Models\WebRegister;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

class WebinarController extends Controller
{
   //view webinar page
    public function view_webinar(){

        $webinars = Webinar::paginate(5);

        return view('admin.list_webinar', compact('webinars'));
    }

    //create new webinar
    public function create_webinar(){

        return view('admin.create_webinar');
    }
    //store created webinar
    public function upload_webinar(Request $request){
        
       $webinar = new Webinar;
       $webinar->title = $request->title;
       $webinar->start_date = $request->start_date;
       $webinar->start_time = $request->start_time;
       $webinar->end_date = $request->end_date;
       $webinar->end_time = $request->end_time;
       $webinar->speaker_name = $request->speaker_name;
       $webinar->about_speaker = $request->about_speaker;
       $webinar->web_type = $request->web_type;
       $webinar->web_mode = $request->web_mode;
       $webinar->web_add = $request->web_add;
       $webinar->web_link = $request->web_link;
       $webinar->web_desc = $request->web_desc;
       $webinar->price = $request->price;

        
       if(!empty($request->file('image')))
       {
           if(!empty($webinar->image) && file_exists('upload/' .$webinar->image))
           {
               unlink('upload/' .$webinar->image);
           }
           $file = $request->file('image');
           $randomStr = Str::random(30);
           $filename = $randomStr . '.' .$file->getClientOriginalExtension();
           $file->move('upload/',$filename);
           $webinar->image = $filename;
       }

       $webinar->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Webinar created successfully!');
        return redirect()->back();
    }
//delete created webinar
    public function delete_webinar($id){
       $webinar = Webinar::find($id);
       $webinar->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Webinar deleted successfully!');
        return redirect()->back();
    }
//edit created webinar
    public function edit_webinar($id){

       $webinar = Webinar::find($id);
        return view('admin.edit_webinar', compact('webinar'));
    }
//update created webinar
    public function update_webinar(Request $request,$id){
       $webinar = Webinar::find($id);
      
       $webinar->title = $request->title;
       $webinar->start_date = $request->start_date;
       $webinar->start_time = $request->start_time;
       $webinar->end_date = $request->end_date;
       $webinar->end_time = $request->end_time;
       $webinar->speaker_name = $request->speaker_name;
       $webinar->about_speaker = $request->about_speaker;
       $webinar->web_type = $request->web_type;
       $webinar->price = $request->price;
       $webinar->web_mode = $request->web_mode;
       $webinar->web_add = $request->web_add;
       $webinar->web_link = $request->web_link;
       $webinar->web_desc = $request->web_desc;
       $webinar->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Webinar updated successfully!');
        return redirect('/view_webinar');
    }
//search webinar list
    public function webinar_search(Request $request){
      $search = $request->search;
      $webinars = Webinar::where('title', 'LIKE', '%'.$search.'%')->orWhere('speaker_name', 'LIKE', '%'.$search.'%')->paginate(3);
      return view('admin.list_webinar', compact('webinars'));
    }
    
    //Category
   

    //USER
    //create user page
    public function create_user(){

        return view('admin.create_user');
    }
    //store user data
    public function upload_user(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->usertype = $request->usertype;
        $user->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('User created successfully!');
        return redirect()->back();
    }
    //view user list
    public function user_list(){

        $users = User::paginate(5);

        return view('admin.user_list', compact('users'));
    }
//delete user
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('User deleted successfully!');
         return redirect()->back();
     }
 //edit user
     public function edit_user($id){
 
        $user = User::find($id);
         return view('admin.edit_user', compact('user'));
     }
 //update user
     public function update_user(Request $request,$id){
        $user = User::find($id);
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->usertype = $request->usertype;
        $user->address = $request->address;
        $user->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Webinar updated successfully!');
         return redirect('/user_list');
     }
//search users
     public function user_search(Request $request){
        $search = $request->search;
        $users = User::where('name', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.user_list', compact('users'));
      }

     //Email Verification
     public function view_email(){

        $users = User::paginate(4);

        return view('admin.view_email', compact('users'));
    }
    public function delete_email($id){

        $user = User::find($id);
        $user->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Verified user deleted successfully!');
         return redirect()->back();
     }

     //Webinar Register List
     //view webinar register list
     public function view_register(){
        $data = WebRegister::with('webinar')->paginate(5); 
        return view('admin.webinar_register_list', compact('data'));
    }
    //delete webinar register
    public function delete_list($id){

        $data = WebRegister::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Register deleted successfully!');
         return redirect()->back();
     }
//search webinar register
     public function register_search(Request $request){
        $search = $request->search;
        $data = WebRegister::where('name', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.webinar_register_list', compact('data'));
      }

    
}
