<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{!empty($header_title) ? $header_title: ""}} School</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo..png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link" style='text-align:center'>
      <span class="brand-text font-weight-light" style='font-weight:bold !important; font-size:20px'>School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
@if(Auth::user()->User_type==1)
<li class="nav-item">
  <a href="admin/dashboard" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard 
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>

<li class="nav-item">
    <a href="{{url ('admin-list') }}" class="nav-link @if(Request::segment(1)=='admin-list') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        Admin
      </p>
    </a>
  </li>
  <li class="nav-item">
      <a href="{{url ('admin/Teachers') }}" class="nav-link @if(Request::segment(2)=='teacher') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          Teachers
        </p>
      </a>
    </li>
  <li class="nav-item">
      <a href="{{url ('admin/students') }}" class="nav-link @if(Request::segment(2)=='students') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          Students
        </p>
      </a>
    </li>
    <li class="nav-item">
        <a href="{{url ('admin/Parents') }}" class="nav-link @if(Request::segment(2)=='Parents') active @endif">
          <i class="nav-icon far fa-user"></i>
          <p>
            Parents
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url ('admin/marks_register') }}" class="nav-link @if(Request::segment(1)=='marks_register') active @endif">
          <i class="nav-icon far fa-user"></i>
          <p>
            Marks Register
          </p>
        </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link  @if(Request::segment(2)=='class' ||Request::segment(2)=='subject' ||Request::segment(2)=='time_table' ||Request::segment(2)=='assign_subject' ||Request::segment(2)=='assign_teachers') active @endif">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Academics
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            <li class="nav-item">
                <a href="{{url ('admin/class') }}" class="nav-link @if(Request::segment(2)=='class') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Class
                  </p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{url ('admin/subject') }}" class="nav-link @if(Request::segment(2)=='subject') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Subjects
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url ('admin/assign_subject') }}" class="nav-link @if(Request::segment(2)=='assign_subject') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                    Assign Subjects
                    </p>
                  </a>
                </li>
                      <li class="nav-item">
                  <a href="{{url ('admin/assign_teachers') }}" class="nav-link @if(Request::segment(2)=='assign_teachers') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                    Assign Teachers
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{url ('admin/class_time_table') }}" class="nav-link @if(Request::segment(2)=='time_table') active @endif">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                      Time-Table
                      </p>
                    </a>
                  </li>
          </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link  @if(Request::segment(2)=='Examination' ) active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  Examination
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                  <a href="{{url ('admin/Examination/exam') }}" class="nav-link @if(Request::segment(3)=='exam') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Exam Lists
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{url ('admin/Examination/exam_schedule') }}" class="nav-link @if(Request::segment(3)=='exam_schedule') active @endif">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                        Exam Schedule
                      </p>
                    </a>
                  </li>
            </ul>
          </li>
      <li class="nav-item">
    <a href="{{url ('admin/myaccount') }}" class="nav-link @if(Request::segment(2)=='myaccount') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Account
      </p>
    </a>
  </li>
      <li class="nav-item">
        <a href="{{url ('admin/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
          <i class="nav-icon far fa-user"></i>
          <p>
         Change Password
          </p>
        </a>
      </li>
@elseif(Auth::user()->User_type==2)
<li class="nav-item">
  <a href="Teachers/dashboard" class="nav-link @if(Request::segment(2)=='teacher-dashboard') active @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>
<li class="nav-item">
    <a href="{{url ('Teachers/my_class_subjects') }}" class="nav-link @if(Request::segment(2)=='my_class_subjects') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Class & Subjects
      </p>
    </a>
  </li>
  <li class="nav-item">
      <a href="{{url ('Teachers/my_calendar') }}" class="nav-link @if(Request::segment(2)=='my_calendar') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          My Calendar
        </p>
      </a>
    </li>
  <li class="nav-item">
      <a href="{{url ('Teachers/my_teacher_exam_time_table') }}" class="nav-link @if(Request::segment(2)=='my_teacher_exam_time_table') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          My Exam Time-Table
        </p>
      </a>
    </li>
  <li class="nav-item">
      <a href="{{url ('Teachers/my_students') }}" class="nav-link @if(Request::segment(2)=='my_students') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          My Students
        </p>
      </a>
    </li>
<li class="nav-item">
    <a href="{{url ('Teachers/myaccount') }}" class="nav-link @if(Request::segment(2)=='myaccount') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Account
      </p>
    </a>
  </li>
<li class="nav-item">
  <a href="{{url ('Teachers/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
    <i class="nav-icon far fa-user"></i>
    <p>
   Change Password
    </p>
  </a>
</li>
@elseif(Auth::user()->User_type==3)
<li class="nav-item">
  <a href="Students/dashboard" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>
<li class="nav-item">
    <a href="{{url ('Students/mysubjects') }}" class="nav-link @if(Request::segment(2)=='mysubjects') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Subjects
      </p>
    </a>
  </li>
  <li class="nav-item">
      <a href="{{url ('Students/time_table') }}" class="nav-link @if(Request::segment(2)=='time_table') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          My Time-Table
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url ('Students/my_Calendar') }}" class="nav-link @if(Request::segment(2)=='my_Calendar') active @endif">
        <i class="nav-icon far fa-user"></i>
        <p>
          My Calendar
        </p>
      </a>
    </li>
    <li class="nav-item">
        <a href="{{url ('Students/my_exam_time_table') }}" class="nav-link @if(Request::segment(2)=='my_exam_time_table') active @endif">
          <i class="nav-icon far fa-user"></i>
          <p>
            My Exam Time-Table
          </p>
        </a>
      </li>
<li class="nav-item">
    <a href="{{url ('Students/myaccount') }}" class="nav-link @if(Request::segment(2)=='myaccount') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Account
      </p>
    </a>
  </li>
<li class="nav-item">
  <a href="{{url ('Students/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
    <i class="nav-icon far fa-user"></i>
    <p>
   Change Password
    </p>
  </a>
</li>
@elseif(Auth::user()->User_type==4)
<li class="nav-item">
  <a href="parent-dashboard" class="nav-link @if(Request::segment(1)=='parent-dashboard') active @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>
<li class="nav-item">
    <a href="{{url ('Parents/mystudents') }}" class="nav-link @if(Request::segment(2)=='mystudents') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Students
      </p>
    </a>
  </li>
<li class="nav-item">
    <a href="{{url ('Parents/myaccount') }}" class="nav-link @if(Request::segment(2)=='myaccount') active @endif">
      <i class="nav-icon far fa-user"></i>
      <p>
        My Account
      </p>
    </a>
  </li>
<li class="nav-item">
  <a href="{{url ('Parents/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
    <i class="nav-icon far fa-user"></i>
    <p>
   Change Password
    </p>
  </a>
</li>
@endif
          
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    {{$slot}}

    <footer class="main-footer">
      <strong>Copyright &copy; {{ date('Y') }} <a href="">VinxSchool</a>.</strong>
      All rights reserved.
     
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  

  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
  {{-- MyjsFile --}}
  <script src="{{asset('plugins/myjs.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
  @yield('script')
  </body>
  </html>
  