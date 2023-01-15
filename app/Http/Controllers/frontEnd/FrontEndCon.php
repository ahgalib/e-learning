<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\customerLogin;
use Hash;
use Auth;
class FrontEndCon extends Controller
{
    public function showIndexPage(){
        $category = CourseCategory::all();
        $popular_course = Course::orderBy('created_at','desc')->limit(3)->get();
        //echo"<pre>";print_r($popular_course);die;
        return view('font_end.index',compact('category','popular_course'));
    }

    public function showCartPage(){
        return view('Font_end.cart');
    }

    public function showCustomerLoginPage(){
        return view('Font_end.login');
    }

    public function checkCustomerLoginInfo(Request $request){
        //attempt ta automatic Hash check kore
        if(Auth::guard('customer_login')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/cart');
        }else{
            return redirect('customer/login');
        }
    }

    public function showCustomerRegisterPage(){
        return view('Font_end.register');
    }

    public function saveCustomerInfo(Request $request){
        customerLogin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);
        return back();
    }

}
