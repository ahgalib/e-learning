@extends('admin-layouts.admin-master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin setting/profile</li>
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
                        <h4 class="card-title">{{Auth()->user()->name}},you can edit your details here</h4>
                    </div><!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('saveEditProfile') }}" enctype="multipart/form-data">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger mt-3">
                                {{Session::get('fail')}}
                            </div>
                        @elseif(Session::get('success'))
                            <div class="alert alert-success mt-3">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->adminProfile->address}}">
                                <span style="color:red;">@error('address'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>
                                <input  type="number" class="form-control" name="mobile" value="{{Auth::user()->adminProfile->mobile}}">
                                <span style="color:red;">@error('mobile'){{$message}}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <img src="{{asset('upload/adminProfile')}}/{{Auth::user()->adminProfile->image}}" id="blah" width="200"  alt="">
                                <br>
                                <span style="color:red;">@error('image'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>{{-- end col 6 --}}

            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{Auth()->user()->name}} first type your old password for change your current email and password</h4>
                    </div><!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('adminUserUpdate')}}">
                        @csrf
                        @if(Session::get('fail'))
                            <div class="alert alert-danger mt-3">
                                {{Session::get('fail')}}
                            </div>
                        @elseif(Session::get('success'))
                            <div class="alert alert-success mt-3">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input type="password" class="form-control" name="oldPassVal" id="old_password" placeholder="enter your old password">
                                <p id="checkCurrentPassword"></p>

                            </div>
                        </div>
                        <p class="passLink"></p>
                    </form>

                </div>
            </div>
        </div> <!-- /.row end -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
