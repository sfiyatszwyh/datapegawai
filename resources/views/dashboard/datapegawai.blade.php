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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Include other CSS files -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

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

  <!-- Custom CSS File -->
  <link href="{{ asset('template/assets/css/custom.css') }}" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="{{ asset('template/assets/img/favicon.png') }}" alt="">
        <span class="d-none d-lg-block">Scompany</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('template/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class=" ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <!--  Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-bar-chart-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <!-- Data Pegawai Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/datapegawai">
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


  <!-- Main data pegawai -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Pegawai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Data Pegawai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pegawai</h5>
    
              <!-- Tambah Pegawai Button -->
              <a href="/datapegawai/create" class="btn btn-primary mb-3">Tambah Pegawai</a>
    
              <div class="table-responsive">

                <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pegawais as $pegawai)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td>{{ $pegawai->posisi }}</td>
                    <td><img src="{{ asset('pegawai/'.$pegawai->foto) }}" alt="Foto" class="thumbnail" width="50"></td>
                    <td>
                      <a href="/datapegawai/{{ $pegawai->id }}" class="btn btn-info" title="Detail">
                          <i class="fas fa-eye"></i>
                      </a>
                      <a href="/datapegawai/{{ $pegawai->id }}/edit" class="btn btn-warning" title="Edit">
                          <i class="fas fa-edit"></i>
                      </a>
                      <form action="/datapegawai/{{ $pegawai->id }}" method="post" style="display:inline-block">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger" title="Delete">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                  </td>
                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
                
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </section>
    
  </main><!-- End #main -->

  <!-- Overlay for zoomed image -->
  <div class="overlay"></div>
  <img src="" alt="Zoomed Image" class="zoomed-image">

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

  <!-- Custom JS for zooming -->
  <script>
    $(document).ready(function() {
      $(".thumbnail").on("click", function() {
        const src = $(this).attr("src");
        $(".zoomed-image").attr("src", src).addClass("big").css({
          "display": "initial"
        }).center();
        $(".overlay").show();
      });

      $(".overlay").on("click", function() {
        $(this).hide();
        $(".zoomed-image").removeClass("big").css({
          "display": "none"
        });
      });
    });

    jQuery.fn.center = function() {
      this.css("position", "absolute");
      this.css("top", ($(window).height() - this.height()) / 2 + $(window).scrollTop() + "px");
      this.css("left", ($(window).width() - this.width()) / 2 + $(window).scrollLeft() + "px");
      return this;
    }

    $(".zoomed-image").on('animationend', function(e) {
      $(this).removeClass("big");
    });
  </script>

</body>

</html>
