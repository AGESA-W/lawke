
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @section('title')
     @yield('content') 
  @endsection

  <script src="{{ asset('js/app.js')}}"></script>


 <link rel="stylesheet" href="/css/app.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="" alt="" class="brand-image img-circle"
            style="opacity: .8;width:40px;height:40px;">
        <span class="brand-text font-weight-light">LEGALCARE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="" class="img-circle" alt="" style="width:40px;height:30px;">
          </div>
          <div class="info">
            <a href="#" class="d-block text-center"> {{ Auth::user()->name }} </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/admin" class="nav-link active">
                <i class="nav-icon fa fa-dashboard text-light"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/users" class="nav-link">
                <i class="nav-icon fa fa-users text-light"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/attorneys/account" class="nav-link">
                <i class="nav-icon fa fa-users text-light"></i>
                <p>
                  Lawyers
                </p>
              </a>
            </li>
            {{-- <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fa fa-users text-light"></i>
                <p>
                  Lawyers
                  <i class="right fa fa-angle-down"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/attorneys/account" class="nav-link ">
                    <i class="fa fa-user nav-icon text-light"></i>
                    <p>Account</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/attorneys/education" class="nav-link">
                    <i class="fa fa-book nav-icon"></i>
                    <p>Education</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/attorneys/work" class="nav-link">
                    <i class="fa fa-map-marker nav-icon"></i>
                    <p>Place of work</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fa fa-power-off text-danger"></i>
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid text-dark">
          @include('partials.messages')
          @yield('content')
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy;2020 <a href="/" class="text-decoration-none text-dark">LEGALCONNECT</a></strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPT -->
</body>
  <script>
    $(document).ready(function (){

        $('#updateLawyerEducation').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var school = button.data('institution') // Extract info from data-* attributes
        var grad = button.data('graduation') // Extract info from data-* attributes
        var degree = button.data('degree') // Extract info from data-* attribute
        var education_id = button.data('education_id') // Extract info from data-* attribute

        var modal = $(this)
        modal.find('.modal-body #school_name').val(school);
        modal.find('.modal-body #graduation').val(grad);
        modal.find('.modal-body #degree').val(degree);
        modal.find('.modal-body #education_id').val(education_id);
        })

        $('#updateLawyerWork').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var company_name = button.data('company_name') // Extract info from data-* attributes
        var location = button.data('location') // Extract info from data-* attributes
        var address = button.data('address') // Extract info from data-* attribute
        var work_id = button.data('work_id') // Extract info from data-* attribute


        var modal = $(this)
        modal.find('.modal-body #company_name').val(company_name);
        modal.find('.modal-body #location').val(location);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #work_id').val(work_id);

        })

    });
  </script>
</html>
