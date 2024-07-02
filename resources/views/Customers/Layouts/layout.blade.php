<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description">
     <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('Assets-Customers/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('Assets-Customers/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Assets-Customers/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Assets-Customers/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Assets-Customers/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Assets-Customers/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Assets-Customers/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('Assets-Customers/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('Assets-Customers/css/style.css') }}" rel="stylesheet">
    <title>{{$title}}</title>

    <!-- =======================================================
    * Template Name: Vlava
    * Template URL: https://bootstrapmade.com/vlava-free-bootstrap-one-page-template/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>

@include('Customers.Layouts.header')
<!-- ======= Hero Section ======= -->
@yield('content')

@include('Customers.Layouts.footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('Assets-Customers/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Assets-Customers/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('Assets-Customers/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('Assets-Customers/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('Assets-Customers/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('Assets-Customers/js/main.js') }}"></script>
<script src="{{ asset('mdb/js/mdb.umd.min.js') }}"></script>

</body>
</html>
