<?php 
include ("../baglanti.php");
if (!($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$hastane_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastane Yönetim Paneli</title>
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
    <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php include("menu.php"); ?>
        </div>
        <div class="col-md-10">
            <div class="container-fluid">
                <h5>Hastane Yönetim Paneli</h5>
                <div class="row">
                    <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-white my-4">Profiliniz</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="profil.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $hasta_sorgu = mysqli_query($baglanti, "SELECT * FROM kullanici_hasta");
                                $hasta_sorgu_sonuc = mysqli_num_rows($hasta_sorgu);
                                ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $hasta_sorgu_sonuc; ?></h5>
                                <h5 class="text-white">Toplam Hastalar</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="hastalar.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $randevu_sorgu = "SELECT * FROM randevu WHERE hastane_id = '$hastane_id'";
                                $randevu_sorgu_sonuc = mysqli_query($baglanti, $randevu_sorgu);
                                $randevu_bilgi_getir = mysqli_num_rows($randevu_sorgu_sonuc);
                                ?>
                                <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $randevu_bilgi_getir; ?></h5>
                                <h5 class="text-white">Toplam Randevular</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="randevular.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
