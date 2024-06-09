<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue VV</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Bootstrap CSS (jika digunakan) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/style.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand ml-3" href="#"> 
            <img src="../images/logo1.jpeg" alt="Logo VV" style="max-width: 100%; max-height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item {{ request()->is('Beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="/Beranda">Beranda</a>
                </li>
                <li class="nav-item {{ request()->is('Tentang') ? 'active' : '' }}">
                    <a class="nav-link" href="/Tentang">Tentang</a>
                </li>
                <li class="nav-item {{ request()->is('Paket-Pernikahan') ? 'active' : '' }}">
                    <a class="nav-link" href="/Paket-Pernikahan">Pernikahan</a>
                </li>
                <li class="nav-item {{ request()->is('Paket-Pesta') ? 'active' : '' }}">
                    <a class="nav-link" href="/Paket-Pesta">Pesta Ulang Tahun</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Paket Pernikahan</a>
                        <a class="dropdown-item" href="#">Paket Ulang Tahun</a>
                    </div>
                </li> -->
            </ul>
            <a href="/Login" class="btn btn-login mr-3">Login</a>
        </div>
    </nav>
    <!-- /Navbar -->

    <!-- Content -->
    @yield('content')
    <!-- /Content -->

    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted">
        <!-- Section: Links  -->
        <section class="bg-section">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 col-xl-3 mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img src="../images/logo2.jpeg" alt="Logo VV2" style="max-width: 100%; max-height: 50px;">
                        </h6>
                        <p>
                            Membuat momen spesial Anda tak terlupakan! 
                            Dari venue pernikahan elegan hingga ulang tahun kreatif, kami hadir untuk Anda.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 col-xl-3 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Kategori</h6>
                        <p><a href="#!" class="text-reset">Paket Pernikahan</a></p>
                        <p><a href="#!" class="text-reset">Paket Pesta Ulang Tahun</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 col-xl-3 mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Genteng, Banyuwangi, Jawa Timur</p>
                        <p><i class="fas fa-envelope me-3"></i> vvenueganizer@gmail.com</p>
                        <p><i class="fas fa-phone me-3"></i> 082-334-897-611 (Admin 1)</p>
                        <p><i class="fas fa-phone me-3"></i> 081-264-567-639 (Admin 2)</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4 bg-copyright">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="#">vinarmff</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- /Footer -->

    <!-- Button gulir up -->
    <button id="btn-up" onclick="scrollToTop()">
        <i class="bi bi-chevron-up"></i>
    </button>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>