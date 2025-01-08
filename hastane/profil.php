<?php
include("../baglanti.php");
if (!($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$kullanici_id = $_SESSION['id'];

$hastane_sorgu = "SELECT * FROM kullanici_hastane WHERE id = '$kullanici_id'";
$hastane_sonuc = mysqli_query($baglanti, $hastane_sorgu);

if (!$hastane_sonuc) {
    die("Veritabanı hatası.");
}

if (mysqli_num_rows($hastane_sonuc) > 0) {
    $hastane_veri_getir = mysqli_fetch_assoc($hastane_sonuc);
} else {
    die("Hastane bilgisi bulunamadı. Lütfen veritabanını kontrol edin.");
}

$il_id = $hastane_veri_getir['hastane_il'];

$il_sorgu = "SELECT * FROM il WHERE il_id='$il_id'";
$il_sonuc = mysqli_query($baglanti, $il_sorgu);

if (!$il_sonuc) {
    die("İl sorgusu başarısız.");
}

if (mysqli_num_rows($il_sonuc) > 0) {
    $il_veri_getir = mysqli_fetch_assoc($il_sonuc);
} else {
    die("İl bilgisi bulunamadı. Lütfen veritabanını kontrol edin.");
}

if (isset($_POST['guncelle_sifre'])) {
    $eski_sifre = $_POST['eski_sifre'] ?? '';
    $yeni_sifre = $_POST['yeni_sifre'] ?? '';
    $yeni_sifre_tekrar = $_POST['yeni_sifre_tekrar'] ?? '';

    if (hash('sha256', $eski_sifre) === $hastane_veri_getir['hastane_sifre']) {
        if ($yeni_sifre === $yeni_sifre_tekrar && !empty($yeni_sifre)) {
            $yeni_sifre_hash = hash('sha256', $yeni_sifre);
            $guncelle_sifre_sorgu = "UPDATE kullanici_hastane SET hastane_sifre='$yeni_sifre_hash' WHERE id='$kullanici_id'";
            if (mysqli_query($baglanti, $guncelle_sifre_sorgu)) {
                echo "<script>alert('Şifre başarıyla güncellendi.'); window.location.href='profil.php';</script>";
            } else {
                echo "<script>alert('Şifre güncellenirken bir hata oluştu.');</script>";
            }
        } else {
            echo "<script>alert('Yeni şifreler eşleşmiyor veya boş.');</script>";
        }
    } else {
        echo "<script>alert('Eski şifre hatalı.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastane Profili</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../assets/img/bacteria.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                <div class="col-md-10 ">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" class="text-center">Detaylar</th>
                                            </tr>
                                            <tr>
                                                <td>Hastane Adı / Kullanıcı Adı</td>
                                                <td><?php echo htmlspecialchars($hastane_veri_getir['hastane_adi']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Şifre</td>
                                                <td><?php echo htmlspecialchars($hastane_veri_getir['hastane_sifre']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>İl</td>
                                                <td><?php echo htmlspecialchars($il_veri_getir['il_adi']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Şifre Değiştir</h5>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Eski Şifre</label>
                                            <input type="password" name="eski_sifre" class="form-control" autocomplete="off" placeholder="Eski Şifrenizi Girin" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Yeni Şifre</label>
                                            <input type="password" name="yeni_sifre" class="form-control" autocomplete="off" placeholder="Yeni Şifrenizi Girin" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Yeni Şifre (Tekrar)</label>
                                            <input type="password" name="yeni_sifre_tekrar" class="form-control" autocomplete="off" placeholder="Yeni Şifrenizi Tekrar Girin" required>
                                        </div>
                                        <input type="submit" name="guncelle_sifre" class="btn btn-success" value="Şifreyi Güncelle">
                                    </form>
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
