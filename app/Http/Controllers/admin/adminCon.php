<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
class adminCon extends Controller
{
    public function showLoginPage(){
        return view('auth/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

    public function showAdminPage(){
        return view('admin.dashboard');
    }

    public function showCreateProfilePage(){
        return view('admin.profile.createProfile');
    }

    public function saveProfile(Request $request){
        // $data = $request->validate([
        //     'address'=>'required',
        //     'mobile'=>'required',
        //     'image'=>'required',
        // ]);
        $image_name = $request['image'];
        $image_ext = $image_name->getClientOriginalExtension();
        $rand_number = rand(11111,99999);
        $rand_img_name = $rand_number.'.'.$image_ext;

        Image::make($image_name)->save(public_path('upload/adminProfile/'.$rand_img_name));

    }

}
