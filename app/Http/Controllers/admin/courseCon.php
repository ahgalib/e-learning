<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use Image;

class courseCon extends Controller
{
    public function showCoursePage(){
        $course = Course::all();
        return view('admin.course.course',compact('course'));
    }

    public function showAddCoursePage(){
        $category = CourseCategory::all();
        return view('admin.course.addCourse',compact('category'));
    }

    public function saveCourse(Request $request){
        $data = $request->validate([
            'course_category_id' => 'required',
            'course_name' => ['required', 'string', 'max:255'],
            'course_price' => ['required', 'string', 'max:255'],
            'course_discount' => ['required', 'string', 'max:255'],
            'course_image'=>['required','mimes:jpg,png,jpeg'],
        ]);
        $image_name = $request['course_image'];
        $image_ext = $image_name->getClientOriginalExtension();
        $rand_number = rand(11111,99999);
        $rand_img_name = $rand_number.'.'.$image_ext;
        $main_image = Image::make($image_name)->save(public_path('upload/course/'.$rand_img_name));

        Course::create([
            'course_category_id'=>$data['course_category_id'],
            'course_name'=>$data['course_name'],
            'course_price'=>$data['course_price'],
            'course_discount'=>$data['course_discount'],
            'course_image'=>$rand_img_name,
        ]);
        return back()->with('success','admin profile created successfully');
    }
}
