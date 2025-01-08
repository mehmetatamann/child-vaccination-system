<?php
include("baglanti.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tcNo = isset($_POST['kullanici_adi']) ? $_POST['kullanici_adi'] : '';
    $sifre = isset($_POST['kullanici_sifre']) ? $_POST['kullanici_sifre'] : '';
    $hashlenmis_sifre = hash('sha256', $sifre);

    $yonetici_sorgu = "SELECT * FROM kullanici_yonetici WHERE kullanici_adi = '$tcNo' AND kullanici_sifre = '$hashlenmis_sifre'";
    $yonetici_sorgu_sonuc = mysqli_query($baglanti, $yonetici_sorgu);

    if ($yonetici_sorgu_sonuc && mysqli_num_rows($yonetici_sorgu_sonuc) > 0) {
        $kullanici = mysqli_fetch_assoc($yonetici_sorgu_sonuc);
        $_SESSION['id'] = $kullanici['id']; 
        header("Location: admin/index.php"); 
        exit;
    } else {
        header("Location: yoneticigiris.php?error=1"); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Çocuk Aşı ve İzleme Sistemi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
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
            <h1 style="color: #fff;">Yönetici Giriş</h1>
            <form id="myForm" method="POST">
                <input type="text" placeholder="Kullanıcı Adı" name="kullanici_adi" required>
                <input type="password" placeholder="Şifre" name="kullanici_sifre" required>
                <input type="submit" value="Giriş Yap" name="yonetici_giris">
            </form>
            <br><br>
            <span>20010207018 - Mehmet Ataman</span>
        </div>
    </div>
</body>
</html>
