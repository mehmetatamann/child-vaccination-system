<?php 
include("../baglanti.php");

if (isset($_GET['hasta_id'])) {
    $_SESSION['hasta_id'] = $_GET['hasta_id'];
    header("Location: hastadetay.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hasta Detayı</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center">Hasta Detayı</h5>

                <?php
                if (isset($_SESSION['hasta_id'])) {
                    $hasta_id = $_SESSION['hasta_id'];

                    $hasta_sorgu = "SELECT * FROM kullanici_hasta WHERE id = '$hasta_id'";
                    $hasta_sorgu_sonuc = mysqli_query($baglanti, $hasta_sorgu);

                    if ($hasta_bilgi_getir = mysqli_fetch_assoc($hasta_sorgu_sonuc)) {
                        echo "
                        <table class='table table-bordered'>
                        <tr>
                            <th>T.C No</th>
                            <td>{$hasta_bilgi_getir['kullanici_tcno']}</td>
                        </tr>
                        <tr>
                            <th>Ad Soyad</th>
                            <td>{$hasta_bilgi_getir['kullanici_ad_soyad']}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{$hasta_bilgi_getir['kullanici_email']}</td>
                        </tr>
                        <tr>
                            <th>Telefon</th>
                            <td>{$hasta_bilgi_getir['kullanici_tel']}</td>
                        </tr>
                        </table>
                        ";
                        $randevu_sorgu = "SELECT r.randevu_tarihi, a.asi_adi 
                                          FROM randevu r
                                          JOIN asilar a ON r.asi_id = a.id
                                          WHERE r.hasta_id = '$hasta_id'";
                        $randevu_sorgu_sonuc = mysqli_query($baglanti, $randevu_sorgu);

                        if (mysqli_num_rows($randevu_sorgu_sonuc) > 0) {
                            echo "<h5>Randevu Bilgileri</h5>";
                            echo "<table class='table table-bordered'>
                                  <thead>
                                      <tr>
                                          <th>Randevu Tarihi</th>
                                          <th>Aşı Adı</th>
                                      </tr>
                                  </thead>
                                  <tbody>";

                            while ($randevu_bilgi_getir = mysqli_fetch_assoc($randevu_sorgu_sonuc)) {
                                echo "
                                <tr>
                                    <td>{$randevu_bilgi_getir['randevu_tarihi']}</td>
                                    <td>{$randevu_bilgi_getir['asi_adi']}</td>
                                </tr>
                                ";
                            }

                            echo "</tbody></table>";
                        } else {
                            echo "<p>Bu hasta için herhangi bir randevu bulunamadı.</p>";
                        }
                    } else {
                        echo "<p>Hasta bilgisi bulunamadı.</p>";
                    }
                } else {
                    echo "<p>Hasta ID'si bulunamadı!</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>