<?php 
include ("../baglanti.php");

$kullanici_sorgu = "SELECT * FROM kullanici_hasta WHERE id";
$kullanici_sonuc = mysqli_query($baglanti, $kullanici_sorgu);
$kullanici_veri = mysqli_fetch_assoc($kullanici_sonuc);
$kullanici_adi = $kullanici_veri['kullanici_ad_soyad'];
$kullanici_email = $kullanici_veri['kullanici_email'];

if (isset($_POST['gonder'])) {
    $konu = $_POST['konu'];
    $mesaj = $_POST['mesaj'];

    $mesaj_sorgu = "INSERT INTO mesajlar (ziyaretci_ad_soyad, ziyaretci_email, konu, mesaj, gonderim_tarihi) VALUES ('$kullanici_adi', '$kullanici_email', '$konu', '$mesaj', NOW())";
    if (mysqli_query($baglanti, $mesaj_sorgu)) {
        echo "<script>alert('Mesaj başarıyla gönderildi.');</script>";
    } else {
        echo "<script>alert('Mesaj gönderilirken bir hata oluştu.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - İstek, Öneri, Şikayet</title>
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
                    <?php
                    include("menu.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Bize Ulaşın</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">                                
                                <h5 class="text-center my-3"> Mesaj Gönder</h5>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Konu</label>
                                        <input type="text" name="konu" class="form-control" required placeholder="Mesaj Başlığını Girin">
                                    </div>
                                    <div class="form-group">
                                        <label>Mesaj</label>
                                        <textarea name="mesaj" class="form-control" required placeholder="Mesajınızı Girin"></textarea>
                                    </div>
                                    <input type="submit" name="gonder" class="btn btn-success" value="Mesajı Gönder">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
