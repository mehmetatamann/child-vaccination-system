<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Çocuk Aşılama ve İzleme Sistemi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="./assets/img/bacteria.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<div id="spinner" class="show bg-white position-fixed w-100 vh-100 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary m-1" role="status"></div>
    <div class="spinner-grow text-dark m-1" role="status"></div>
    <div class="spinner-grow text-secondary m-1" role="status"></div>
</div>

<!-- Topbar -->
<div class="container-fluid bg-light d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-end">
            <div class="d-inline-flex align-items-center bg-success text-white px-5">
                <p class="m-0 me-3"><i class="fa fa-envelope-open me-2"></i>iletisim@cavis.org.tr</p>
                <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+90 378 555 55 55</p>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm px-5 py-3">
    <?php
    $logo = '<a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0 text-success"><img src="assets/img/bacteria.png" alt="" style="width: 50px; height: 50px;"> ÇAVİS - Çocuk Aşılama ve İzleme Sistemi</h1>
             </a>';
    $button = '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">';

    if (isset($_SESSION['admin'])) {
        $kullanici = $_SESSION['admin'];
        echo "$logo
              $button
              <a href='admin/index.php' class='nav-item nav-link'>$kullanici</a>
              <a href='logout.php' class='nav-item nav-link'>Logout</a>
              </div>
              <a href='#' class='btn btn-primary py-2 px-4 ms-3'>Appointment</a>";
    } elseif (isset($_SESSION['hospital'])) {
        $kullanici = $_SESSION['hospital'];
        echo "$logo
              $button
              <a href='hospital/index.php' class='nav-item nav-link'>$kullanici</a>
              <a href='logout.php' class='nav-item nav-link'>Logout</a>
              </div>
              <a href='#' class='btn btn-primary py-2 px-4 ms-3'>Appointment</a>";
    } elseif (isset($_SESSION['patient'])) {
        $kullanici = $_SESSION['patient'];
        echo "$logo
              $button
              <a href='patient/index.php' class='nav-item nav-link'>$kullanici</a>
              <a href='logout.php' class='nav-item nav-link'>Logout</a>
              </div>
              <a href='appointment.php' class='btn btn-primary py-2 px-4 ms-3'>Appointment</a>";
    } else {
        echo "$logo
              $button
              <a href='index.php' class='nav-item nav-link'>Anasayfa</a>
              <a href='iletisim.php' class='nav-item nav-link'>İletişim</a>
              <a href='girisler.php' class='nav-item nav-link'>Giriş Yap</a>
              </div>";
    }
    ?>
</nav>

<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/lib/wow/wow.min.js"></script>
   <script src="assets/lib/easing/easing.min.js"></script>
   <script src="assets/lib/waypoints/waypoints.min.js"></script>
   <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
   <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
   <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
   <script src="assets/lib/twentytwenty/jquery.event.move.js"></script>
   <script src="assets/lib/twentytwenty/jquery.twentytwenty.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>