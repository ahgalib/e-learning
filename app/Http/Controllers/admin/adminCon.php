<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminProfile;
use App\Models\User;
use Auth;
use Image;
use Hash;
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
        $data = $request->validate([
            'address'=>'required',
            'mobile'=>'required',
            'image'=>'required',
        ]);
        $image_name = $request['image'];
        $image_ext = $image_name->getClientOriginalExtension();
        $rand_number = rand(11111,99999);
        $rand_img_name = $rand_number.'.'.$image_ext;
        $main_image = Image::make($image_name)->save(public_path('upload/adminProfile/'.$rand_img_name));

        AdminProfile::create([
            'user_id'=>Auth::id(),
            'address'=>$data['address'],
            'mobile'=>$data['mobile'],
            'image'=>$rand_img_name,
        ]);
        return back()->with('success','admin profile created successfully');
    }

    public function showEditProfilePage(){
        return view('admin.profile.editProfile');
    }

    public function saveEditProfile(Request $request){
        $data = $request->validate([
            'address'=>'required',
            'mobile'=>'required',
        ]);
        if($request->image){
            $image_name = $request['image'];
            $image_ext = $image_name->getClientOriginalExtension();
            $rand_number = rand(11111,99999);
            $rand_img_name = $rand_number.'.'.$image_ext;
            $main_image = Image::make($image_name)->save(public_path('upload/adminProfile/'.$rand_img_name));
            //delete the old image
            $old_image = AdminProfile::where('user_id',Auth::id())->first();
            $image_path = 'upload/adminProfile/'.$old_image['image'];
            unlink($image_path);
            AdminProfile::where('user_id',Auth::id())->update([
                'address'=>$data['address'],
                'mobile'=>$data['mobile'],
                'image'=>$rand_img_name,
            ]);
        }else{
            AdminProfile::where('user_id',Auth::id())->update([
                'address'=>$data['address'],
                'mobile'=>$data['mobile'],
            ]);
        }
        return back()->with('success','admin profile updated successfully');
    }

    public function showRegisterPage(){
        return view('auth.register');
    }

    public function adminUserUpdate(Request $request){
        if(Hash::check($request['oldPassVal'],Auth::user()->password)){
            echo "hoice";
        }else{
            echo "false";
        }
       // echo"<pre>";print_r($data);die;
    }

    public function adminPassUpdate(){
        return view('admin.profile.updatePassword');
    }

    public function saveUpdatePassword(Request $request){
        $data = $request->validate([
            'email'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::where('id',Auth::id())->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return back()->with('success','admin email & password updated successfully');
    }

    public function showAddAdminPage(){
        return view('admin.add_admin.add_admin');
    }

    public function saveAddAdmin(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'=>['required','string','max:255','unique:users'],
            'password'=>['required','string','min:8','max:250'],
        ]);
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
        return back()->with('success','admin added successfully');
    }

}
