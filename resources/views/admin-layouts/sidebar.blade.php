
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
        <img src="{{url('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->adminProfile)
                    <img src="{{asset('upload/adminProfile')}}/{{Auth::user()->adminProfile->image}}" style="width:100px;height:80px;"class="img-circle " alt="User Image">
                @else
                    <img src="" style="width:100px;height:80px;"class="img-circle " alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard  </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    @if(Auth::user()->adminProfile)
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{route('adminProfileEdit')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile Details</p>
                            </a>
                            </li>
                        </ul>
                    @else
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('adminProfile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Profile</p>
                                </a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="nav-item">
                    <a href="{{route('addAdmin')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Add Admin</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Course Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories list</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addCategory')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Course
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('course')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Course list</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addCourse')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Course</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit Course</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

