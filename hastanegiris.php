<?php
include("baglanti.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hastane_adi = isset($_POST['hastane_adi']) ? $_POST['hastane_adi'] : '';
    $hastane_sifre = isset($_POST['hastane_sifre']) ? $_POST['hastane_sifre'] : '';

    $hashed_sifre = hash('sha256', $hastane_sifre);

    $hastane_sorgu = "SELECT * FROM kullanici_hastane WHERE hastane_adi = '$hastane_adi' AND hastane_sifre = '$hashed_sifre'";
    $hastane_sorgu_sonuc = mysqli_query($baglanti, $hastane_sorgu);

    if ($hastane_sorgu_sonuc && mysqli_num_rows($hastane_sorgu_sonuc) > 0) {
        $kullanici = mysqli_fetch_assoc($hastane_sorgu_sonuc);

        if ($kullanici['durum'] == 'Başvuru Onay Aşamasındadır.') {
            echo "<script>alert('Başvurunuz onay aşamasında.'); Location = 'index.php';</script>";
        } elseif ($kullanici['durum'] == 'Onaylı Hastane') {
            $_SESSION['id'] = $kullanici['id'];
            header("Location: hastane/index.php");
            exit;
        } elseif ($kullanici['durum'] == 'Reddedildi') {
            echo "<script>alert('Başvurunuz reddedildi.'); Location = 'index.php';</script>";
        }
    }
}

mysqli_close($baglanti);
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
            <h1>Hastane Giriş</h1>
            <form id="myForm" method="POST">
                <input type="text" placeholder="Hastane Adı" name="hastane_adi" required>
                <input type="password" placeholder="Şifre" name="hastane_sifre" required>
                <input type="submit" value="Giriş Yap" name="hasta_giris">
            </form>
            <br><br>
            <span><a href="hastanekayit.php">Kayıt Ol!</a></span>
        </div>
    </div>
</body>
</html>
