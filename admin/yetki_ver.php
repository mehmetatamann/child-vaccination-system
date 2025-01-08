<?php 
include ("../baglanti.php");


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $kullanici_id = intval($_GET['id']);

    $sorgu = "SELECT * FROM kullanici_hastane WHERE id='$kullanici_id'";
    $sonuc = mysqli_query($baglanti, $sorgu);
    $hastane_bilgisi = mysqli_fetch_assoc($sonuc);

    $asilar_sorgu = "SELECT * FROM asilar";
    $asilar_sonuc = mysqli_query($baglanti, $asilar_sorgu);
}

if (isset($_POST['yetki_ver'])) {
    $asilar_sonuc = mysqli_query($baglanti, $asilar_sorgu);
    while ($asi_row = mysqli_fetch_assoc($asilar_sonuc)) {
        $asi_id = $asi_row['id'];
        $asi_adi = $asi_row['asi_adi'];
        $durum = isset($_POST["asi_$asi_adi"]) ? intval($_POST["asi_$asi_adi"]) : 0;

        $guncelle_sorgu = "REPLACE INTO hastane_asi (hastane_id, asi_id, asi_yapiliyor) VALUES ('$kullanici_id', '$asi_id', '$durum')";
        if (!mysqli_query($baglanti, $guncelle_sorgu)) {
            echo "<script>alert('Hata!'); window.location.href='hastanebasvuru.php';</script>";
            exit();
        }
    }

    $durum_guncelle_sorgu = "UPDATE kullanici_hastane SET durum = 'Onaylı Hastane' WHERE id = '$kullanici_id'";
    if (mysqli_query($baglanti, $durum_guncelle_sorgu)) {
        echo "<script>alert('Hastane başvurusu onaylandı.'); window.location.href='hastanebasvuru.php';</script>";
    } else {
        echo "<script>alert('Durum güncellenirken bir hata oluştu:'); window.location.href='hastanebasvuru.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Yetki Ver</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h5 class="text-center my-3">Hastane Yetki Ver</h5>
        <form method="post">
            <div class="form-group">
                <label>Aşı Seçenekleri:</label>
                <div>
                    <?php while ($asi_row = mysqli_fetch_assoc($asilar_sonuc)): ?>
                        <?php $asi_adi_gorunur = str_replace('_', ' ', $asi_row['asi_adi']); ?>
                        <div>
                            <label for="asi_<?= $asi_row['asi_adi'] ?>"><?= htmlspecialchars($asi_adi_gorunur) ?>:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="asi_<?= $asi_row['asi_adi'] ?>" id="asi_<?= $asi_row['asi_adi'] ?>_1" value="1" <?= isset($hastane_bilgisi[$asi_row['asi_adi']]) && $hastane_bilgisi[$asi_row['asi_adi']] == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="asi_<?= $asi_row['asi_adi'] ?>_1">Yapılıyor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="asi_<?= $asi_row['asi_adi'] ?>" id="asi_<?= $asi_row['asi_adi'] ?>_0" value="0" <?= isset($hastane_bilgisi[$asi_row['asi_adi']]) && $hastane_bilgisi[$asi_row['asi_adi']] == 0 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="asi_<?= $asi_row['asi_adi'] ?>_0">Yapılmıyor</label>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <button name="yetki_ver" class="btn btn-success">Yetki Ver</button>
        </form>
    </div>
</body>
</html>
