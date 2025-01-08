<?php
include("../baglanti.php");

$iller_vt = "SELECT * FROM il";
$iller = mysqli_query($baglanti, $iller_vt);

$asilar_vt = "SELECT * FROM asilar";
$asilar = mysqli_query($baglanti, $asilar_vt);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ekle'])) {
    $hastane_adi = $_POST['hastane_adi'];
    $hastane_sifre = $_POST['hastane_sifre'];
    $il = $_POST['il_id'];

    if (empty($hastane_adi) || empty($hastane_sifre) || empty($il)) {
        $hata = "Hastane adı, şifre ve il bilgisi gereklidir.";
    } else {
        $hastane_sifre_hash = hash('sha256', $hastane_sifre);

        $hastane_isleme = "INSERT INTO kullanici_hastane (hastane_adi, hastane_sifre, hastane_il, durum)
                  VALUES ('$hastane_adi', '$hastane_sifre_hash', '$il', 'Onaylı Hastane')";

        if (mysqli_query($baglanti, $hastane_isleme)) {
            $hastane_id = mysqli_insert_id($baglanti);

            foreach ($_POST as $anahtar => $deger) {
                if (strpos($anahtar, "asi_") !== false) {
                    $asi_adi = str_replace("asi_", "", $anahtar);
                    $asi_id_sorgu = "SELECT id FROM asilar WHERE asi_adi = '$asi_adi'";
                    $asi_id_sonuc = mysqli_query($baglanti, $asi_id_sorgu);
                    if ($asi_id_sonuc && mysqli_num_rows($asi_id_sonuc) > 0) {
                        $asi_id_satir = mysqli_fetch_assoc($asi_id_sonuc);
                        $asi_id = $asi_id_satir['id'];
                        $asi_isleme = "INSERT INTO hastane_asi (hastane_id, asi_id, asi_yapiliyor) VALUES ('$hastane_id', '$asi_id', '$deger')";
                        mysqli_query($baglanti, $asi_isleme);
                    } else {
                        $hata = "Aşı Bilgisi bulunamadı:";
                    }
                }
            }
    }
}
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastane Ekle</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <div class="container mt-5">
                    <h5 class="text-center">Hastane Ekle</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Hastane Adı:</label>
                            <input type="text" name="hastane_adi" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Hastane Şifre:</label>
                            <input type="password" name="hastane_sifre" class="form-control" autocomplete="off" required>
                        </div>
                        
                        <div class="form-group">
                            <label>İl:</label>
                            <select name="il_id" class="form-control" required>
                                <option value="">İl Seçiniz</option>
                                <?php while ($il_row = mysqli_fetch_assoc($iller)): ?>
                                    <option value="<?= $il_row['il_id'] ?>"><?= $il_row['il_adi'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Aşı Seçenekleri:</label>
                            <div>
                                <?php while ($asi_bilgi_getir = mysqli_fetch_assoc($asilar)): ?>
                                    <div class="vaccination-item">
                                        <label for="<?= $asi_bilgi_getir['asi_adi'] ?>"><?= $asi_bilgi_getir['asi_adi'] ?>:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asi_<?= $asi_bilgi_getir['asi_adi'] ?>" id="asi_<?= $asi_bilgi_getir['asi_adi'] ?>_1" value="1">
                                            <label class="form-check-label" for="asi_<?= $asi_bilgi_getir['asi_adi'] ?>_1">Yapılıyor</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asi_<?= $asi_bilgi_getir['asi_adi'] ?>" id="asi_<?= $asi_bilgi_getir['asi_adi'] ?>_0" value="0" checked>
                                            <label class="form-check-label" for="asi_<?= $asi_bilgi_getir['asi_adi'] ?>_0">Yapılmıyor</label>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="ekle" value="Hastane Ekle" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
