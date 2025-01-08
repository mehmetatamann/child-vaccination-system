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
    <title>ÇAVİS - Admin Yönetim Paneli</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-index.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php include("menu.php"); ?>
        </div>
        <div class="col-md-10">
            <h4 class="my-2">Yönetim Paneli</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card bg-success">
                        <div class="row">
                            <div class="col-md-8">
                                <?php 
                                $ad = mysqli_query($baglanti, "SELECT * FROM kullanici_yonetici");
                                $say = mysqli_num_rows($ad);
                                ?>
                                <h5><?php echo $say; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Toplam Yöneticiler</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="yonetici.php"><i class="fa fa-users-cog icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-info">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $hastaneonayli = mysqli_query($baglanti, "SELECT * FROM kullanici_hastane WHERE durum='Onaylı Hastane'");
                                $say2 = mysqli_num_rows($hastaneonayli);
                                ?>
                                <h5><?php echo $say2; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Onaylanan Hastaneler</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="hastanelistele.php"><i class="fa fa-hospital icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-warning">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $hastanebeklemede = mysqli_query($baglanti, "SELECT * FROM kullanici_hastane WHERE durum='Başvuru Onay Aşamasındadır.'");
                                $say3 = mysqli_num_rows($hastanebeklemede);
                                ?>
                                <h5><?php echo $say3; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Onay Bekleyen Hastaneler</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="hastanebasvuru.php"><i class="fa fa-hospital icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-secondary">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $hastanereddedilen = mysqli_query($baglanti, "SELECT * FROM kullanici_hastane WHERE durum='Reddedildi'");
                                $say4 = mysqli_num_rows($hastanereddedilen);
                                ?>
                                <h5><?php echo $say4; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Reddedilen Hastaneler</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="hastanereddedilen.php"><i class="fa fa-times-circle icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-md-3">
                    <div class="stat-card bg-danger">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $hasta = mysqli_query($baglanti, "SELECT * FROM kullanici_hasta");
                                $say5 = mysqli_num_rows($hasta);
                                ?>
                                <h5><?php echo $say5; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Toplam Hastalar</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="hastalar.php"><i class="fa fa-procedures icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-dark">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                $mesaj = mysqli_query($baglanti, "SELECT * FROM mesajlar");
                                $say6 = mysqli_num_rows($mesaj);
                                ?>
                                <h5><?php echo $say6; ?></h5>
                                <div class="card-content">
                                    <h6 class="card-title">Mesajlar</h6>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="mesaj.php"><i class="fa fa-flag icon"></i></a>
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
