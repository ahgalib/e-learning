<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Image;


class categoryCon extends Controller
{
    public function showCategoryPage(){
        $categories = CourseCategory::all();
        return view('admin.course_category.category',compact('categories'));
    }

    public function showAddCategoryPage(){
        return view('admin.course_category.addCategory');
    }

    public function saveCategory(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image'=>['required','mimes:jpg,png,jpeg'],
        ]);
        $image_name = $request['image'];
        $image_ext = $image_name->getClientOriginalExtension();
        $rand_number = rand(11111,99999);
        $rand_img_name = $rand_number.'.'.$image_ext;
        $main_image = Image::make($image_name)->save(public_path('upload/categories/'.$rand_img_name));

        CourseCategory::create([
            'name'=>$data['name'],
            'image'=>$rand_img_name,
            'status'=>1
        ]);
        return back()->with('success','admin profile created successfully');
    }
}
