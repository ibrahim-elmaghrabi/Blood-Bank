<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bloodbank</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.layouts.head')
    <link rel="icon" href="{{  asset('images/Icon.png') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"
          src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
   @include('admin.layouts.main-headbar')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
    @include('admin.layouts.main-sidebar')
  <!--- / main sidebar ---->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@yield('pageName')</a></li>
                <li class="breadcrumb-item active">@yield('main-pageName')</li>
              </ol>
            </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
    <x-flash-message />
    <!-- Main content -->
        @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   @include('admin.layouts.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 @include('admin.layouts.footer-scripts')
</body>
</html>
