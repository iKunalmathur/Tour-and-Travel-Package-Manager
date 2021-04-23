<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travel4AM | Admin Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">

  {{-- Custom Style --}}
  <link rel="stylesheet" href="{{ asset("assets/custom/css/custom.css") }}">
  @section('add-style')

  @show

  @stack('styles')

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.main.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.main.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @section('main-content')

    @show
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('layouts.main.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/assets/dist/js/adminlte.min.js') }}"></script>

  {{-- Custom Scripts --}}

  @section('add-script')

  @show

  @stack('scripts')
</body>

</html>