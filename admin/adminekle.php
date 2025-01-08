<?php
include("../baglanti.php");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Yönetici Ekle</title>
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
                <div class="container mt-5">
                    <h5 class="text-center">Yönetici Ekle</h5>
                    <?php
                    if (isset($_POST['kullanici_adi']) && isset($_POST['kullanici_sifre'])) {
                        $kullanici_adi = $_POST['kullanici_adi'];
                        $kullanici_sifre = $_POST['kullanici_sifre'];

                        $kullanici_sifre_hash = hash('sha256', $kullanici_sifre);
                        $admin_isleme = "INSERT INTO kullanici_yonetici (kullanici_adi, kullanici_sifre) VALUES ('$kullanici_adi', '$kullanici_sifre_hash')";
                        $admin_isleme_sonuc = mysqli_query($baglanti, $admin_isleme);

                        if ($admin_isleme_sonuc) {
                            echo "<div class='alert alert-success'>Admin başarıyla eklendi.</div>";
                        } else {
                            $hata = "Admin eklenemedi:";
                            echo "<div class='alert alert-danger'>$hata</div>";
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Kullanıcı Adı:</label>
                            <input type="text" name="kullanici_adi" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Şifre:</label>
                            <input type="password" name="kullanici_sifre" class="form-control" required>
                        </div>
                        <br>
                        <input type="submit" name="ekle" value="Ekle" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
