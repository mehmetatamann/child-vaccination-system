<?php 
include ("../baglanti.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$kullanici_id = $_SESSION['id'];

$randevu_sorgu = "SELECT * FROM randevu WHERE hasta_id = '$kullanici_id'";
$randevu_sonuc = mysqli_query($baglanti, $randevu_sorgu);

if (!$randevu_sonuc) {
    die("Veritabanı sorgusu başarısız oldu.");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hasta Bilgi Ekranı</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
                    <h5 class="text-center my-3">Hasta Bilgi Ekranı</h5>
                    <div class="container">
                        <div class="row-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron">
                                    <div class="card">
                                        <div class="card-header text-center">Randevu Bilgileri</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Hastane Adı</th>
                                                        <th>Randevu Tarihi</th>
                                                        <th>Aşı Adı</th>
                                                        <th>İşlem</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (mysqli_num_rows($randevu_sonuc) > 0): ?>
                                                        <?php while ($randevu_bilgi_getir = mysqli_fetch_assoc($randevu_sonuc)): ?>
                                                            <?php
                                                            $hastane_sorgu = "SELECT * FROM kullanici_hastane WHERE id='" . $randevu_bilgi_getir['hastane_id'] . "'";
                                                            $hastane_sonuc = mysqli_query($baglanti, $hastane_sorgu);
                                                            if (!$hastane_sonuc) {
                                                                die("Hastane sorgulamasında hata.");
                                                            }
                                                            $hastane_bilgi_getir = mysqli_fetch_assoc($hastane_sonuc);

                                                            $asi_sorgu = "SELECT * FROM asilar WHERE id='" . $randevu_bilgi_getir['asi_id'] . "'";
                                                            $asi_sonuc = mysqli_query($baglanti, $asi_sorgu);
                                                            if (!$asi_sonuc) {
                                                                die("Aşı sorgulamasında hata.");
                                                            }
                                                            $asi_bilgi = mysqli_fetch_assoc($asi_sonuc);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($hastane_bilgi_getir['hastane_adi']); ?></td>
                                                                <td><?php echo htmlspecialchars($randevu_bilgi_getir['randevu_tarihi']); ?></td>
                                                                <td><?php echo htmlspecialchars($asi_bilgi['asi_adi']); ?></td>
                                                                <td>
                                                                    <a href="randevuiptal.php?randevu_id=<?php echo htmlspecialchars($randevu_bilgi_getir['id']); ?>" class="btn btn-danger btn-sm">İptal Et</a>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center">Randevu bulunamadı.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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