<?php 
include("../baglanti.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastalar</title>
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
                <h5 class="text-center">Toplam Hastalar</h5>
                <?php
                $hasta_sorgu = "SELECT * FROM kullanici_hasta";
                $hasta_sorgu_sonuc = mysqli_query($baglanti, $hasta_sorgu);

                echo "
                <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hasta Adı</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                ";

                if (mysqli_num_rows($hasta_sorgu_sonuc) < 1) {
                    echo "
                    <tr>
                        <td colspan='6' class='text-center'>Henüz başvuru yok.</td>
                    </tr>";
                } else {
                    while ($hasta_bilgi_getir = mysqli_fetch_assoc($hasta_sorgu_sonuc)) {
                        echo "
                        <tr>
                            <td>{$hasta_bilgi_getir['id']}</td>
                            <td>{$hasta_bilgi_getir['kullanici_ad_soyad']}</td>
                            <td>{$hasta_bilgi_getir['kullanici_email']}</td>
                            <td>{$hasta_bilgi_getir['kullanici_tel']}</td>
                            <td>
                                <a href='hastadetay.php?hasta_id={$hasta_bilgi_getir['id']}'>
                                    <button class='btn btn-success'>Hasta Detayı</button>
                                </a>
                            </td>
                        </tr>
                        ";
                    }
                }
                echo "</tbody></table>";
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
