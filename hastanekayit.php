<?php 
include("baglanti.php");

if (isset($_POST['hastane_basvuru'])) {
    $hastane_kadi = $_POST['hastane_adi'];
    $hastane_sifre = $_POST['hastane_sifre'];
    $hastane_il = $_POST['hastane_il'];

    $hata = array();
    
    if (empty($hastane_kadi)) {
        $hata['hastane_basvuru'] = "Lütfen Hastane Adını Giriniz.";
    } else if (empty($hastane_sifre)) {
        $hata['hastane_basvuru'] = "Lütfen Şifrenizi Giriniz";
    } else if (empty($hastane_il)) {
        $hata['hastane_basvuru'] = "Lütfen Bir İl Seçiniz.";
    }

    if (count($hata) == 0) {
        $hastane_sifre_hash = hash('sha256', $hastane_sifre);
        $hastane_kayit_sorgu = "INSERT INTO kullanici_hastane (hastane_adi, hastane_sifre, hastane_il, durum) VALUES ('$hastane_kadi', '$hastane_sifre_hash', '$hastane_il', 'Başvuru Onay Aşamasındadır.')";
        $hastane_kayit_sonuc = mysqli_query($baglanti, $hastane_kayit_sorgu);

        if ($hastane_kayit_sonuc) {
            echo "<script>alert('Başvuru başarılı, yönlendiriliyorsunuz.')</script>";
            header("Location: hastanegiris.php");
            exit;
        }else {
            echo "<script>alert('Başvuru Başarısız, Tekrar Deneyin.')</script>";
        }
}
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Çocuk Aşılama ve İzleme Sistemi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="./assets/img/bacteria.png" rel="icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/girisler.css" rel="stylesheet">
</head>
<body>
<div class="flex">
    <div class="wrapper">
        <h1 style="color: #fff;">Hastane Kayıt</h1>
        <div>
            <?php
            if (isset($hata['hastane_basvuru'])) {
                $hhata = $hata['hastane_basvuru'];
                $goster = "<h4 class='alert alert-danger'>$hhata</h4>";
            } else {
                $goster = "";
            }
            echo $goster;
            ?>
        </div>
        <form id="myForm" method="post">
            <input type="text" placeholder="Lütfen Hastane Adını Giriniz." name="hastane_adi" required>
            <input type="password" placeholder ="Lütfen Şifrenizi Giriniz." name="hastane_sifre" required>
            <label for="hastane_il">İl Seçin:</label>
            <select name="hastane_il" class="form-control" required>
                <option value="">Seçiniz</option>
                <?php
                // İlleri almak için sorgu
                $il_sorgu = "SELECT * FROM il";
                $il_sonuc = mysqli_query($baglanti, $il_sorgu);
                while ($il = mysqli_fetch_assoc($il_sonuc)) {
                    echo "<option value='" . $il['il_id'] . "'>" . $il['il_adi'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Kayıt Ol." name="hastane_basvuru">
        </form>
        <br><br>
        <a href="hastanegiris.php">Tıklayın ve Giriş Yapın</a>
    </div>
</div>
</body>
</html>
