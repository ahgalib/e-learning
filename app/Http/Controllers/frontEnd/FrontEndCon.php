<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\customerLogin;
use App\Models\Cart;
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
        $cart = Cart::where('customer_login_id',Auth::guard('customer_login')->user()->id)->get();
        return view('Font_end.cart',compact('cart'));
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

    public function customerLogout(){
        Auth::guard('customer_login')->logout();
        return redirect('customer/login');
    }

    public function saveCartPage(Request $request){
        Cart::create([
            'customer_login_id'=>Auth::guard('customer_login')->user()->id,
            'course_id'=>$request->course_id,
        ]);
        return redirect('/cart');
    }


}
