<?php
include("baslik.php");
?>

<body>
 <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="./assets/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Çocuklarınızı Sağlıklı Tutun</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">En İyi Aşılama Hizmetlerinden Yararlanın</h1>
                            <a href="randevu.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Randevu Oluştur</a>
                            <a href="iletisim.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">İletişim</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Çocuklarınızı Sağlıklı Tutun</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">En İyi Aşılama Hizmetlerinden Yararlanın</h1>
                            <a href="randevu.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Randevu Oluştur</a>
                            <a href="iletisim.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">İletişim</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Önceki</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sonraki</span>
            </button>
        </div>
    </div>
<?php 
include("altbaslik.php");
?>
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