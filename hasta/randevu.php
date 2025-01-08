<?php
include("../baglanti.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$kullanici_id = $_SESSION['id'];

$il_sorgu = "SELECT * FROM il";
$il_sorgu_sonuc = mysqli_query($baglanti, $il_sorgu);

$hastaneler = [];
$asilar = [];
$secilen_il = "";
$secilen_hastane_id = "";

if (isset($_POST['il']) && !empty($_POST['il'])) {
    $secilen_il = $_POST['il'];
    $hastane_sorgu = "SELECT * FROM kullanici_hastane WHERE hastane_il = '$secilen_il'";
    $hastane_sonuc = mysqli_query($baglanti, $hastane_sorgu);

    if ($hastane_sonuc) {
        while ($dizi_olustur = mysqli_fetch_assoc($hastane_sonuc)) {
            $hastaneler[] = $dizi_olustur;
        }
    } else {
        echo "Hastane sorgusu başarısız oldu.";
    }
}

if (isset($_POST['hastane']) && !empty($_POST['hastane'])) {
    $secilen_hastane_id = $_POST['hastane'];
    $asi_sorgu = "SELECT a.id, a.asi_adi 
                  FROM hastane_asi ha 
                  JOIN asilar a ON ha.asi_id = a.id 
                  WHERE ha.hastane_id = '$secilen_hastane_id' 
                  AND ha.asi_yapiliyor = 1";
    $asi_sonuc = mysqli_query($baglanti, $asi_sorgu);
    
    if ($asi_sonuc) {
        while ($dizi_olustur = mysqli_fetch_assoc($asi_sonuc)) {
            $asilar[] = $dizi_olustur;
        }
    } else {
        echo "Aşı sorgusu başarısız oldu.";
    }
}

if (isset($_POST['randevukaydet'])) {
    $hastane_id = $secilen_hastane_id;
    $asi_id = $_POST['id'];
    $randevu_tarihi = $_POST['randevu_tarihi'] . ' ' . $_POST['randevu_saati'];

    $randevu_ekle_sorgu = "INSERT INTO randevu (hasta_id, hastane_id, asi_id, randevu_tarihi) 
                           VALUES ('$kullanici_id', '$hastane_id', '$asi_id', '$randevu_tarihi')";
    
    $randevu_sonuc = mysqli_query($baglanti, $randevu_ekle_sorgu);

    if ($randevu_sonuc) {
        echo "<script>alert('Randevu başarıyla kaydedildi.');</script>";
    } else {
        echo "<script>alert('Randevu kaydı sırasında bir hata oluştu:');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Randevu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h5 class="text-center my-3">Randevu Al</h5>
                    <div class="container">
                        <div class="row-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron">
                                    <form method="post">
                                        <label for="il">İl Seçin:</label>
                                        <select name="il" id="il" class="form-control" required onchange="this.form.submit()">
                                            <option value="">İl Seçin</option>
                                            <?php while ($il_veri_getir = mysqli_fetch_assoc($il_sorgu_sonuc)): ?>
                                                <option value="<?php echo $il_veri_getir['il_id']; ?>" 
                                                    <?php echo ($secilen_il == $il_veri_getir['il_id']) ? 'selected' : ''; ?>>
                                                    <?php echo $il_veri_getir['il_adi']; ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>

                                        <label for="hastane">Hastaneler</label>
                                        <select name="hastane" id="hastane" class="form-control" required onchange="this.form.submit()">
                                            <option value="">Hastane Seçin</option>
                                            <?php foreach ($hastaneler as $hastane): ?>
                                                <option value="<?php echo $hastane['id']; ?>" <?php echo ($secilen_hastane_id == $hastane['id']) ? 'selected' : ''; ?>>
                                                    <?php echo $hastane['hastane_adi']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <label for="id">Aşılar</label>
                                        <select name="id" id="id" class="form-control" required>
                                            <option value="">Aşı Seçin</option>
                                            <?php foreach ($asilar as $asi): ?>
                                                <option value="<?php echo $asi['id']; ?>"><?php echo $asi['asi_adi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <label for="randevu_tarihi">Randevu Tarihi</label>
                                        <input type="date" name="randevu_tarihi" class="form-control" required>

                                        <label for="randevu_saati">Randevu Saati</label>
                                        <input type="time" name="randevu_saati" class="form-control" required>

                                        <input type="submit" name="randevukaydet" class="btn btn-success my-2" value="Randevu Al">
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
