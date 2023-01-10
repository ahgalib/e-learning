@extends('admin-layouts.admin-master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Category</li>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Add Category Form</h3>
                    </div><!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('saveCategory') }}" enctype="multipart/form-data">
                        @if(Session::get('success'))
                            <div class="alert alert-success mt-3">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                <span style="color:red;">@error('name'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <img id="blah" width="200" src="" alt="">
                                <span style="color:red;">@error('image'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- /.row end -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
