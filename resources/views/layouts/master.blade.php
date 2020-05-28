
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

{{-- datatables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

{{-- datepicker --}}
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


 <link rel="stylesheet" href="/css/app.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" >
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

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
                <i class="fa fa-dashboard text-light"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/users" class="nav-link">
                <i class="fa fa-users text-light"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/attorneys/account" class="nav-link">
                <i class="fa fa-users text-light"></i>
                <p>
                  Lawyers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/reports/create" class="nav-link">
                <i class="fa fa-download text-light"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off text-danger"></i>
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
        <div class="container-fluid text-dark ">
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
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

</body>
  <script>
    $(document).ready(function (){

        // $('#updateLawyerEducation').on('show.bs.modal', function (event) {
        // var button = $(event.relatedTarget) // Button that triggered the modal
        // var school = button.data('institution') // Extract info from data-* attributes
        // var grad = button.data('graduation') // Extract info from data-* attributes
        // var degree = button.data('degree') // Extract info from data-* attribute
        // var education_id = button.data('education_id') // Extract info from data-* attribute

        // var modal = $(this)
        // modal.find('.modal-body #school_name').val(school);
        // modal.find('.modal-body #graduation').val(grad);
        // modal.find('.modal-body #degree').val(degree);
        // modal.find('.modal-body #education_id').val(education_id);
        // })

        // $('#updateLawyerWork').on('show.bs.modal', function (event) {
        // var button = $(event.relatedTarget) // Button that triggered the modal
        // var company_name = button.data('company_name') // Extract info from data-* attributes
        // var location = button.data('location') // Extract info from data-* attributes
        // var address = button.data('address') // Extract info from data-* attribute
        // var work_id = button.data('work_id') // Extract info from data-* attribute

        // var modal = $(this)
        // modal.find('.modal-body #company_name').val(company_name);
        // modal.find('.modal-body #location').val(location);
        // modal.find('.modal-body #address').val(address);
        // modal.find('.modal-body #work_id').val(work_id);
        // })

        // $('#editEndorsment').on('show.bs.modal', function (event) {
        // var button = $(event.relatedTarget) // Button that triggered the modal
        // var relationship = button.data('relationship') // Extract info from data-* attributes
        // var message = button.data('message') // Extract info from data-* attributes
        // var endorsment_id = button.data('endorsment_id') // Extract info from data-* attribute

        // var modal = $(this)
        // modal.find('.modal-body #relationship').val(relationship);
        // modal.find('.modal-body #message').val(message);
        // modal.find('.modal-body #endorsment_id').val(endorsment_id);
        // })

        //rating datepicker
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd',
            // minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd',
            maxDate: today,
            minDate: function () {
                return $('#startDate').val();
            }
        });

        // Lawyer registration datepicker
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#beginDate').datepicker({
          uiLibrary: 'bootstrap4',
          iconsLibrary: 'fontawesome',
          format:'yyyy-mm-dd',
          // minDate: today,
          maxDate: function () {
            return $('#lastDate').val();
          }
        });
        $('#lastDate').datepicker({
          uiLibrary: 'bootstrap4',
          iconsLibrary: 'fontawesome',
          format:'yyyy-mm-dd',
          maxDate: today,
          minDate: function () {
            return $('#beginDate').val();
          }
        });

         // Users registration datepicker
         var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#firstDate').datepicker({
          uiLibrary: 'bootstrap4',
          iconsLibrary: 'fontawesome',
          format:'yyyy-mm-dd',
          // minDate: today,
          maxDate: function () {
            return $('#finalDate').val();
          }
        });
        $('#finalDate').datepicker({
          uiLibrary: 'bootstrap4',
          iconsLibrary: 'fontawesome',
          format:'yyyy-mm-dd',
          maxDate: today,
          minDate: function () {
            return $('#firstDate').val();
          }
        });


    });
  </script>
</html>
