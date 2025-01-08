<?php
include("baglanti.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tcNo = isset($_POST['tcno']) ? $_POST['tcno'] : '';
    $sifre = isset($_POST['sifre']) ? $_POST['sifre'] : '';

    $hashlenmis_sifre = hash('sha256', $sifre);

    $kullanici_sorgu = "SELECT * FROM kullanici_hasta WHERE kullanici_tcno = '$tcNo' AND kullanici_sifre = '$hashlenmis_sifre'";
    $kullanici_sorgu_sonuc = mysqli_query($baglanti, $kullanici_sorgu);

    if ($kullanici_sorgu_sonuc && mysqli_num_rows($kullanici_sorgu_sonuc) > 0) {
        $kullanici = mysqli_fetch_assoc($kullanici_sorgu_sonuc);
        $_SESSION['id'] = $kullanici['id'];
        header("Location: hasta/index.php");
        exit;
    } else {
        header("Location: hastagiris.php?error=1");
        exit;
    }
}
?>
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
    <link href="assets/css/girisler.css" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <div class="wrapper">
            <h1>Hasta Giriş</h1>
            <form id="myForm" method="POST">
                <input type="text" placeholder="TC Kimlik Numarası" name="tcno" required>
                <input type="password" placeholder="Şifre" name="sifre" required>
                <input type="submit" value="Giriş Yap" name="hasta_giris">
            </form>
            <br><br>
            <span><a href="hastakayit.php">Kayıt Ol!</a></span>
        </div>
    </div>
</body>
</html>
