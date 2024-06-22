<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('template/assets/img/favicon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="{{ asset('template/assets/img/favicon.png') }}" alt="">
        <span class="d-none d-lg-block">SCompany</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('template/assets/img/profile-img.jpg') }}"  alt="Profile" class="rounded-circle">
            <span class=" ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <!--  Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-bar-chart-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <!-- Data Pegawai Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/datapegawai">
          <i class="bi bi-file-earmark-spreadsheet-fill"></i>
          <span> Data Pegawai</span>
        </a>
      </li><!-- End Data Pegawai Nav -->

      <!-- Log out Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Log out Page Nav -->

  </aside><!-- End Sidebar-->


  <!-- Main dashboard -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">
              <div class="card-body">
                  <h5 class="card-title">Admin</h5>
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="ri ri-admin-fill"></i>
                      </div>
                      <div class="ps-3">
                          <h6>{{ $adminCount }}</h6>
                      </div>
                  </div>
              </div>
          </div>
        </div>
  
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Posisi</h5>
                            <!-- Line Chart -->
                            <canvas id="lineChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#lineChart'), {
                                        type: 'line',
                                        data: {
                                            labels: @json($labels),
                                            datasets: [{
                                                label: 'Jumlah Pegawai berdasarkan Posisi',
                                                data: @json($data),
                                                fill: false,
                                                borderColor: 'rgb(75, 192, 192)',
                                                tension: 0.1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Line Chart -->
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jenis Kelamin</h5>
                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: ['Laki-laki', 'Perempuan'],
                                            datasets: [{
                                                label: 'Jumlah Pegawai berdasarkan Jenis Kelamin',
                                                data: @json($dataChart),
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Bar Chart -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="{{ asset('template/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
  

</body>

</html>