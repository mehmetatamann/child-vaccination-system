<?php
include ("../baglanti.php");
if (!($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastalar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../assets/img/bacteria.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="../assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center">Tüm Hastalar</h5>
                <?php
                $hasta_sorgula = "SELECT * FROM kullanici_hasta";
                $hasta_sorgula_sonuc = mysqli_query($baglanti, $hasta_sorgula);
                echo "<table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>T.C No</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    <th>Telefon</th>
                </tr>";

                if (mysqli_num_rows($hasta_sorgula_sonuc) < 1) {
                    echo "
                    <tr>
                        <td colspan='4' class='text-center'>Henüz hasta bulunmamakta.</td>
                    </tr>";
                } else {
                    while ($hasta_bilgi_getir = mysqli_fetch_assoc($hasta_sorgula_sonuc)) {
                        echo "
                        <tr>
                            <td>".$hasta_bilgi_getir['id'],"</td>
                            <td>".$hasta_bilgi_getir['kullanici_tcno'],"</td>
                            <td>".$hasta_bilgi_getir['kullanici_ad_soyad'],"</td>
                            <td>".$hasta_bilgi_getir['kullanici_email'],"</td>
                            <td>".$hasta_bilgi_getir['kullanici_tel'],"</td>
                        </tr>";
                    }
                }

                echo "</table>";
                ?>               
            </div>
        </div>
    </div>
</div>
</body>
</html>
