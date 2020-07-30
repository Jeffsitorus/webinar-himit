<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name','Laravel') }} | {{ ucwords($title) }}</title>
  
  <!-- favicon -->
  <link rel="icon" sizes="32x32" href="{{ asset('assets/favicon/laravel-32x32.png') }}" type="image/png">
  <link rel="icon" sizes="16x16" href="{{ asset('assets/favicon/laravel-16x16.png') }}" type="image/png">  

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.min-v=1.0.0.css" type="text/css">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.sidenav')
  
  <!-- Main content -->
  <div class="main-content" id="panel"> 

    <!-- Topnav -->
    @include('layouts.topnav')

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              {{-- <div class="alert alert-white" role="alert">
                {{ $title }}
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    @yield('content')
    
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="/assets/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="/assets/js/flash.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.min-v=1.0.0.js"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="/assets/js/demo.min.js"></script>

  <script>
    CKEDITOR.replace('content');
    $(document).ready(function() {
      $('.select2').select2({
        tags: "true",
        placeholder: "Select an option",
        allowClear: true,
        theme: "classic"
      });
    });
  </script>

</body>

</html>