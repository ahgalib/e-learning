@extends('admin-layouts.admin-master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Course List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">course</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10  m-auto">
                <!-- general form elements -->
                <div class="card">
                    <!-- form start -->
                    <table class="table table-strip">
                        <tr>
                            <th>SI No</th>
                            <th>Course Name</th>
                            <th>Course Category</th>
                            <th>Course Price</th>
                            <th>Course Discount</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($course as $key=>$courses)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$courses['course_name']}}</td>
                            <td>{{$courses['course_price']}}</td>
                            <td>{{$courses['course_discount']}}</td>
                            <td>{{$courses['course_discount']}}</td>
                            <td><img src="{{asset('/upload/course')}}/{{$courses['course_image']}}" style="width:110px;height:60px;"></td>

                            <td class='d-flex'>
                                <button class="btn btn-info mr-2">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div> <!-- /.row end -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
