<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iLanding Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/user/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/user/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center me-auto me-xl-0">

        <img src="{{ asset('assets/admin/img/logo.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
        
          <li><a href="#services">Event</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#services">Lihat Event</a>

    </div>
  </header>

  <main class="main">

    
    <!-- Hero Section -->
    <section id="hero" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
            <h1 class="mb-4">
                Temukan Pengalaman <br>
                Tak Terlupakan <br>
                <span class="accent-text">Bersama Kami</span>
            </h1>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
            <img src="{{ asset('assets/admin/img/logo.png') }}" alt="Hero Image" class="img-fluid">
            </div>
        </div>
        </div>
    </div>
    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 20px;">Event</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            <div class="row gy-4" id="kendaraanList" style="display: flex; flex-wrap: wrap; justify-content: center;"> <!-- Gaya inline untuk memusatkan -->
            @foreach($events as $item)
                <div class="col-lg-3 kendaraan-item" data-status="{{ $item->status }}" data-aos="fade-up" data-aos-delay="100" style="display: flex; justify-content: center; margin-bottom: 10px;"> <!-- Gaya inline untuk memusatkan setiap kartu -->
                    <div class="card" style="margin: 5px; border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 100%; max-width: 300px;"> <!-- Jarak antar kartu -->
                        <img src="{{ asset('images/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_event }}" style="width: 100%; height: 200px; object-fit: cover;"> <!-- Mengatur ukuran gambar -->
                        <div class="card-body" style="padding: 15px;">
                            <h3 class="card-title" style="font-size: 1.5rem; margin-bottom: 10px;"><strong>{{ $item->nama_event }}</strong></h3>
                            <p class="card-text" style="margin-bottom: 5px; font-size: 0.9rem; line-height: 1.4;"> {{ $item->deskripsi }}</p>
                            <p class="card-text" style="margin-bottom: 5px; font-size: 0.9rem; line-height: 1.4; color:red;">
                                <strong>{{ \Carbon\Carbon::parse($item->tanggal_event)->translatedFormat('l, d F Y') }}</strong>
                            </p>
                        </div>
                    </div>
                </div><!-- End Card Item -->
            @endforeach
            </div>
        </div>
    </div>

    </section><!-- /Services Section -->



  </main>

  <footer id="footer" class="footer">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Every Event</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/user/js/main.js') }}"></script>

</body>

</html>