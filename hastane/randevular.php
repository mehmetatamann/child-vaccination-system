<?php
include ("../baglanti.php");

$hastane_id = $_SESSION['id'];

$randevu_sorgu = "SELECT * FROM randevu WHERE hastane_id='$hastane_id'";
$randevu_sonuc = mysqli_query($baglanti, $randevu_sorgu);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Randevular</title>
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
                    <h5 class="text-center my-3">Tüm Randevular</h5>
                    <?php
                    $cikti = "
                    <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Randevu ID</th>
                            <th>T.C No</th>
                            <th>Ad ve Soyad</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Hastane Adı</th>
                            <th>Aşı Adı</th>
                            <th>Randevu Tarihi</th>
                            <th>Eylem</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";

                    if (mysqli_num_rows($randevu_sonuc) < 1) {
                        $cikti .= "
                        <tr>
                            <td class='text-center' colspan='9'>Henüz Randevu Yok.</td>
                        </tr>";
                    } else {
                        while ($veritabani_randevu_getir = mysqli_fetch_assoc($randevu_sonuc)) {
                            $hasta_sorgu = "SELECT * FROM kullanici_hasta WHERE id='" . $veritabani_randevu_getir['hasta_id'] . "'";
                            $hasta_sonuc = mysqli_query($baglanti, $hasta_sorgu);
                            $hasta_bilgi = mysqli_fetch_assoc($hasta_sonuc);

                            $hastane_sorgu = "SELECT hastane_adi FROM kullanici_hastane WHERE id='" . $veritabani_randevu_getir['hastane_id'] . "'";
                            $hastane_sonuc = mysqli_query($baglanti, $hastane_sorgu);
                            $hastane_bilgi = mysqli_fetch_assoc($hastane_sonuc);

                            $asi_sorgu = "SELECT asi_adi FROM asilar WHERE id='" . $veritabani_randevu_getir['asi_id'] . "'";
                            $asi_sonuc = mysqli_query($baglanti, $asi_sorgu);
                            $asi_bilgi = mysqli_fetch_assoc($asi_sonuc);

                            $cikti .= "
                            <tr>
                                <td>" . htmlspecialchars($veritabani_randevu_getir['id']) . "</td>
                                <td>" . htmlspecialchars($hasta_bilgi['kullanici_tcno']) . "</td>
                                <td>" . htmlspecialchars($hasta_bilgi['kullanici_ad_soyad']) . "</td>
                                <td>" . htmlspecialchars($hasta_bilgi['kullanici_email']) . "</td>
                                <td>" . htmlspecialchars($hasta_bilgi['kullanici_tel']) . "</td>
                                <td>" . htmlspecialchars($hastane_bilgi['hastane_adi']) . "</td>
                                <td>" . htmlspecialchars($asi_bilgi['asi_adi']) . "</td>
                                <td>" . htmlspecialchars($veritabani_randevu_getir['randevu_tarihi']) . "</td>
                                <td>
                                    <a href='randevuiptal.php?id=" . htmlspecialchars($veritabani_randevu_getir['id']) . "'>
                                        <button class='btn btn-danger'>İptal</button>
                                    </a>
                                </td>
                            </tr>";
                        }
                    }

                    $cikti .= "
                    </tbody>
                    </table>";

                    echo $cikti;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
