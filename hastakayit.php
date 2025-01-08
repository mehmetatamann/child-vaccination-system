<?php 
include("baglanti.php");

if (isset($_POST['hasta_kayit'])) {
    $kullanici_tcno = $_POST['kullanici_tcno'];
    $kullanici_ad_soyad = $_POST['kullanici_ad_soyad'];
    $kullanici_sifre = $_POST['kullanici_sifre'];
    $kullanici_dogum = $_POST['kullanici_dogum'];
    $kullanici_email = $_POST['kullanici_email'];
    $kullanici_tel = $_POST['kullanici_tel'];

    $error = array();

    if (empty($kullanici_tcno)) {
        $error['kullanici_kayit'] = "Lütfen TC Kimlik Numaranızı Giriniz.";
    } else if (empty($kullanici_ad_soyad)) {
        $error['kullanici_kayit'] = "Lütfen Adınızı ve Soyadınızı Giriniz.";
    } else if (empty($kullanici_sifre)) {
        $error['kullanici_kayit'] = "Lütfen Şifrenizi Giriniz.";
    } else if (empty($kullanici_dogum)) {
        $error['kullanici_kayit'] = "Lütfen Doğum Tarihinizi Giriniz.";
    } else if (empty($kullanici_email)) {
        $error['kullanici_kayit'] = "Lütfen E-posta Adresinizi Giriniz.";
    } else if (empty($kullanici_tel)) {
        $error['kullanici_kayit'] = "Lütfen Telefon Numaranızı Giriniz.";
    }

    if (count($error) == 0) {
        $kullanici_sifre_hash = hash('sha256', $kullanici_sifre);
        $kullanici_kayit_sorgu = "INSERT INTO kullanici_hasta (kullanici_tcno, kullanici_ad_soyad, kullanici_sifre, kullanici_dogum, kullanici_email, kullanici_tel) VALUES ('$kullanici_tcno', '$kullanici_ad_soyad', '$kullanici_sifre_hash', '$kullanici_dogum', '$kullanici_email', '$kullanici_tel')";
        $kullanici_kayit_sonuc = mysqli_query($baglanti, $kullanici_kayit_sorgu);

        if ($kullanici_kayit_sonuc) {
            echo "<script>alert('Kayıt Başarılıdır, Yönlendiriliyorsunuz.')</script>";
            header("Location: hastagiris.php");
            exit;
        } else {
            echo "<script>alert('Kayıt Başarısız, Tekrar Deneyin.')</script>";
        }
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/hastakayit.css" rel="stylesheet">
</head>
<body>
<div class="flex">
    <div class="wrapper">
        <h1 style="color: #fff;">Hasta Kayıt</h1>
        <form id="myForm" method="POST">
            <input type="text" placeholder="TC Kimlik Numaranızı Giriniz" name="kullanici_tcno" required>
            <input type="text" placeholder="Adınızı ve Soyadınızı Giriniz" name="kullanici_ad_soyad" required>
            <input type="password" placeholder="Şifrenizi Giriniz" name="kullanici_sifre" required>
            <input type="date" placeholder="Doğum Tarihinizi Giriniz" name="kullanici_dogum" required>
            <input type="email" placeholder="E-posta Adresinizi Giriniz" name="kullanici_email" required>
            <input type="tel" placeholder="Telefon Numaranızı Başında (0) Olmadan Giriniz" name="kullanici_tel" required>
            <input type="submit" value="Kayıt Ol" name="hasta_kayit">
        </form>
        <br><br>
        <span><a href="hastagiris.php">Giriş Yapın</a></span>
    </div>
</div>
</body>
</html>
