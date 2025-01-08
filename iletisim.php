<?php
include("baglanti.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gonder'])) {
    $ad_soyad = $_POST['ziyaretci_ad_soyad'];
    $konu = $_POST['konu'];
    $mesaj = $_POST['mesaj'];
    $email = $_POST['ziyaretci_email'];

    if (empty($ad_soyad) || strlen($ad_soyad) < 3) {
        $error['ziyaretci_ad_soyad'] = 'Lütfen en az 3 karakter uzunluğunda bir isim giriniz.';
    }
    if (empty($konu) || strlen($konu) > 50) {
        $error['konu'] = 'Başlık 50 karakterden uzun olamaz.';
    }
    if (empty($mesaj) || strlen($mesaj) > 1000) {
        $error['mesaj'] = 'Mesaj 1000 karakterden uzun olamaz.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['ziyaretci_email'] = 'Geçerli bir e-posta adresi giriniz.';
    }

    $ad_soyad = $baglanti->real_escape_string($ad_soyad);
    $konu = $baglanti->real_escape_string($konu);
    $mesaj = $baglanti->real_escape_string($mesaj);
    $email = $baglanti->real_escape_string($email);
    $sorgu = "INSERT INTO mesajlar (ziyaretci_ad_soyad, ziyaretci_email, konu, mesaj, gonderim_tarihi) 
    VALUES ('$ad_soyad', '$email', '$konu', '$mesaj', NOW())";
    if ($baglanti->query($sorgu) === TRUE) {
        echo "<script>alert('Mesaj gönderildi.')</script>";
    } else {
        echo "<script>alert('Mesaj gönderilemedi.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - İletişim</title>
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
<?php include("baslik.php"); ?>
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">İletişim</h1>
            <a href="index.php" class="h4 text-white">Ana Sayfa</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="iletisim.php" class="h4 text-white">İletişim</a>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="ziyaretci_ad_soyad" class="form-label">Adınız ve Soyadınız</label>
                        <input type="text" name="ziyaretci_ad_soyad" id="ziyaretci_ad_soyad" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="ziyaretci_email" class="form-label">E-posta</label>
                        <input type="email" name="ziyaretci_email" id="ziyaretci_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="konu" class="form-label">Konu</label>
                        <input type="text" name="konu" id="konu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mesaj" class="form-label">Mesaj</label>
                        <textarea name="mesaj" id="mesaj" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="gonder" class="btn btn-primary">Mesaj Gönder</button>
                </form>
            </div>
            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5971.686161966326!2d32.290781340194464!3d41.55099473485665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409b6504e76263bb%3A0xfcf96f2616ce034b!2zQmFydMSxbiDDnG5pdmVyc2l0ZXNpIEXEn2l0aW0gRmFrw7xsdGVzaSDEsGt0aXNhZGkgxLBkYXJpIEJpbGltbGVyIEZha8O8bHRlc2k!5e0!3m2!1str!2str!4v1735944147955!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<?php include("altbaslik.php"); ?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
