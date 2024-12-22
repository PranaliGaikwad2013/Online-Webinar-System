<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Str;
use File;

class SettingController extends Controller
{
   public function setting(Request $request){
    $data['getRecord'] = Setting::find(1);

    return view('admin.settings.edit', $data);

   }

   public function setting_edit(Request $request){

    $save = Setting::find(1);
    $save->website_name = trim($request->website_name);


    if(!empty($request->file('logo')))
    {
        if(!empty($save->logo) && file_exists('upload/' .$save->logo))
        {
            unlink('upload/' .$save->logo);
        }
        $file = $request->file('logo');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $save->logo = $filename;
    }

    if(!empty($request->file('banner')))
    {
        if(!empty($save->banner) && file_exists('upload/' .$save->banner))
        {
            unlink('upload/' .$save->banner);
        }
        $file = $request->file('banner');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $save->banner = $filename;
    }
    if(!empty($request->file('profile_pic')))
    {
        if(!empty($save->profile_pic) && file_exists('upload/' .$save->profile_pic))
        {
            unlink('upload/' .$save->profile_pic);
        }
        $file = $request->file('profile_pic');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $save->profile_pic = $filename;
    }
    $save->save();
    return redirect('admin/settings')->with('success', 'Setting updated successfully!');
   }

   public function account_setting(){
    return view('admin/account');
   }

}
