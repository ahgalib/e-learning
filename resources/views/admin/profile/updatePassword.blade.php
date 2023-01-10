@extends('admin-layouts.admin-master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin setting/updata password</li>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h4 class="card-title">{{Auth()->user()->name}},you can change your email and password here</h4>
                    </div><!-- /.card-header -->
                    <!-- form start -->

                    <form method="post" action="{{route('saveUpdatePassword')}}">
                        @csrf
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                <span style="color:red;">@error('email'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">New Password</label>
                                <input  type="password" class="form-control" name="password">
                                <span style="color:red;">@error('password'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                                <input  type="password" class="form-control" name="password_confirmation" >

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
