<?php 
include ("../baglanti.php");

if (isset($_GET['id'])) {
    $kullanici_id = $_GET['id'];

    $sorgu = "SELECT * FROM kullanici_hastane WHERE id='$kullanici_id'";
    $sonuc = mysqli_query($baglanti, $sorgu);
    $hastane_bilgisi = mysqli_fetch_assoc($sonuc);

    $asilar_sorgu = "SELECT a.id, a.asi_adi, ha.asi_yapiliyor FROM asilar a 
                     LEFT JOIN hastane_asi ha ON a.id = ha.asi_id AND ha.hastane_id = '$kullanici_id'";
    $asilar_sonuc = mysqli_query($baglanti, $asilar_sorgu);
    $asilar = [];
    while ($row = mysqli_fetch_assoc($asilar_sonuc)) {
        $asilar[] = $row;
    }
}

if (isset($_POST['guncelle'])) {
    $hastane_adi = mysqli_real_escape_string($baglanti, $_POST['hastane_adi']);
    
    $guncelle_sorgu = "UPDATE kullanici_hastane SET hastane_adi='$hastane_adi' WHERE id='$kullanici_id'";
    mysqli_query($baglanti, $guncelle_sorgu);

    foreach ($asilar as $asi) {
        $asi_id = $asi['id'];
        $asi_durum = isset($_POST["asi_$asi_id"]) ? intval($_POST["asi_$asi_id"]) : 0;
        $guncelle_asi = "REPLACE INTO hastane_asi (hastane_id, asi_id, asi_yapiliyor) VALUES ('$kullanici_id', '$asi_id', '$asi_durum')";
        mysqli_query($baglanti, $guncelle_asi);
    }
    $guncelle_durum = "UPDATE kullanici_hastane SET durum='Onaylı Hastane' WHERE id='$kullanici_id'";
    mysqli_query($baglanti, $guncelle_durum);

    echo "<script>alert('Hastane bilgileri güncellendi ve durumu Onaylı Hastane olarak değiştirildi.'); window.location.href='hastanelistele.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastane Düzenle</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <h5 class="text-center my-3">Hastane Düzenle</h5>
    <form method="post">
        <div class="form-group">
            <label for="hastane_adi">Hastane Adı:</label>
            <input type="text" name="hastane_adi" id="hastane_adi" class="form-control" value="<?= htmlspecialchars($hastane_bilgisi['hastane_adi']) ?>" required>
        </div>
        <div class="form-group">
            <label>Aşı Seçenekleri:</label>
            <div>
                <?php foreach ($asilar as $asi): ?>
                    <div>
                        <label><?= htmlspecialchars($asi['asi_adi']) ?>:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="asi_<?= $asi['id'] ?>" id="asi_<?= $asi['id'] ?>_1" value="1" <?= $asi['asi_yapiliyor'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="asi_<?= $asi['id'] ?>_1">Yapılıyor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="asi_<?= $asi['id'] ?>" id="asi_<?= $asi['id'] ?>_0" value="0" <?= $asi['asi_yapiliyor'] == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="asi_<?= $asi['id'] ?>_0">Yapılmıyor</label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" name="guncelle" class="btn btn-primary my-2">Güncelle</button>
        <a href="hastanelistele.php" class="btn btn-secondary">Geri Dön</a>
    </form>
</div>
</body>
</html>
