<?php
include("../baglanti.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Yöneticiler</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
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
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">Tüm Yöneticiler</h5>
                            <?php
                            $yonetici_sorgula = "SELECT * FROM kullanici_yonetici";
                            $yonetici_sorgu_sonuc = mysqli_query($baglanti, $yonetici_sorgula);

                            $cikti = "
                            <table class='table table-bordered'> 
                                <tr> 
                                    <th>ID</th> 
                                    <th>Kullanıcı Adı</th>
                                    <th>Şifre</th>
                                    <th style='width: 10%;'>Eylem</th> 
                                </tr>
                            "; 

                            if (mysqli_num_rows($yonetici_sorgu_sonuc) < 1) { 
                                $cikti .= "<tr><td colspan='4' class='text-center'>Admin Mevcut Değil</td></tr>"; 
                            } else {
                                while ($yonetici_bilgi_getir = mysqli_fetch_array($yonetici_sorgu_sonuc)) { 
                                    $kullanici_id = $yonetici_bilgi_getir['id'];
                                    $kullanici_adi = $yonetici_bilgi_getir['kullanici_adi'];
                                    $kullanici_sifre = $yonetici_bilgi_getir['kullanici_sifre'];  

                                    $cikti .= "
                                    <tr>
                                        <td>$kullanici_id</td>
                                        <td>$kullanici_adi</td>
                                        <td>$kullanici_sifre</td>
                                        <td>";
                                    if ($kullanici_id != $_SESSION['id']) {
                                        $cikti .= "
                                        <form method='POST' action=''>
                                            <input type='hidden' name='sil_id' value='$kullanici_id'>
                                            <button type='submit' class='btn btn-danger'>Sil</button>
                                        </form>";
                                    } else {
                                        $cikti .= "<button class='btn btn-secondary' disabled>Kendinizi Silemezsiniz</button>";
                                    }
                                    $cikti .= "
                                        </td>
                                    </tr>
                                    ";
                                }
                            }
                            $cikti .= "</table>";
                            echo $cikti;

                            if (isset($_POST['sil_id'])) {
                                $sil_id = $_POST['sil_id'];
                                $yonetici_sil_sorgu = "DELETE FROM kullanici_yonetici WHERE id = '$sil_id'";
                                $yonetici_sil_sorgu_sonuc = mysqli_query($baglanti, $yonetici_sil_sorgu);

                                if ($yonetici_sil_sorgu_sonuc) {
                                    echo "<script>alert('Admin başarıyla silindi.'); window.location.href = 'index.php';</script>";
                                } else {
                                    echo "<script>alert('Admin silinirken bir hata oluştu.');</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
