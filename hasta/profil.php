<?php
include ("../baglanti.php");

$kullanici_id = $_SESSION['id'];

$hasta_sorgu = "SELECT * FROM kullanici_hasta WHERE id='$kullanici_id'";
$hasta_sorgu_sonuc = mysqli_query($baglanti, $hasta_sorgu);
$kullanici_bilgi_getir = mysqli_fetch_array($hasta_sorgu_sonuc);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Profil Paneli</title>
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
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Profilim</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Bilgilerim</th>
                                    </tr>
                                    <tr>
                                        <td>Kullanıcı Adı</td>
                                        <td><?php echo htmlspecialchars($kullanici_bilgi_getir['kullanici_ad_soyad']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>TC Kimlik No</td>
                                        <td><?php echo htmlspecialchars($kullanici_bilgi_getir['kullanici_tcno']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo htmlspecialchars($kullanici_bilgi_getir['kullanici_email']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telefon Numarası</td>
                                        <td><?php echo htmlspecialchars($kullanici_bilgi_getir['kullanici_tel']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Şifre</td>
                                        <td><?php echo htmlspecialchars($kullanici_bilgi_getir['kullanici_sifre']); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Email Güncelle</h5>
                                <form method="post">
                                    <label>Yeni Email Girin</label>
                                    <input type="email" name="kullanici_email" class="form-control" autocomplete="off" placeholder="Yeni Email Girin" required>
                                    <input type="submit" name="emailguncelle" class="btn btn-success my-2" value="Email'i Güncelle">
                                </form>

                                <h5 class="text-center">Telefon Numarasını Güncelle</h5>
                                <form method="post">
                                    <label>Yeni Telefon Numarası Girin</label>
                                    <input type="text" name="kullanici_tel" class="form-control" autocomplete="off" placeholder="Yeni Telefon Numarası Girin" required>
                                    <input type="submit" name="telefonguncelle" class="btn btn-success my-2" value="Telefon Numarasını Güncelle">
                                </form>

                                <h5 class="text-center">Şifreyi Güncelle</h5>
                                <form method="post">
                                    <label>Eski Şifre</label>
                                    <input type="password" name="eski_sifre" class="form-control" autocomplete="off" placeholder="Eski Şifrenizi Girin" required>
                                    <label>Yeni Şifre</label>
                                    <input type="password" name="yenisifre" class="form-control" autocomplete="off" placeholder="Yeni Şifrenizi Girin" required>
                                    <label>Yeni Şifreyi Onaylayın</label>
                                    <input type="password" name="sifreonay" class="form-control" autocomplete="off" placeholder="Yeni Şifrenizi Onaylayın" required>
                                    <input type="submit" name="sifreguncelle" class="btn btn-success my-2" value="Şifreyi Güncelle">
                                </form>

                                <h5 class="text-center">Profili Sil</h5>
                                <form method="post" onsubmit="return confirm('Profilinizi silmek istediğinizden emin misiniz?');">
                                    <input type="submit" name="profilsil" class="btn btn-danger my-2" value="Profili Sil">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['emailguncelle'])) {
        $kullanici_email = $_POST['kullanici_email'];

        if (!empty($kullanici_email)) {
            $email_sorgu = "UPDATE kullanici_hasta SET kullanici_email='$kullanici_email' WHERE id='$kullanici_id'";
            if (mysqli_query($baglanti, $email_sorgu)) {
                echo "<script>alert('Email güncellendi.'); window.location.href='profil.php';</script>";
            } else {
                echo "<script>alert('Email güncellenirken bir hata oluştu.');</script>";
            }
        } else {
            echo "<script>alert('Yanlış email girildi.');</script>";
        }
    }
    if (isset($_POST['telefonguncelle'])) {
        $kullanici_tel = $_POST['kullanici_tel'];

        if (!empty($kullanici_tel)) {
            $telefon_sorgu = "UPDATE kullanici_hasta SET kullanici_tel='$kullanici_tel' WHERE id='$kullanici_id'";
            if (mysqli_query($baglanti, $telefon_sorgu)) {
                echo "<script>alert('Telefon numarası güncellendi.'); window.location.href='profil.php';</script>";
            } else {
                echo "<script>alert('Telefon numarası güncellenirken bir hata oluştu.');</script>";
            }
        } else {
            echo "<script>alert('Yanlış numara girildi.');</script>";
        }
    }
    if (isset($_POST['sifreguncelle'])) {
        $eski_sifre = $_POST['eski_sifre'];
        $yenisifre = $_POST['yenisifre'];
        $sifreonay = $_POST['sifreonay'];

        if (hash('sha256', $eski_sifre) == $kullanici_bilgi_getir['kullanici_sifre'] && $yenisifre == $sifreonay && !empty($yenisifre)) {
            $sifre_sorgu = "UPDATE kullanici_hasta SET kullanici_sifre='".hash('sha256', $yenisifre)."' WHERE id='$kullanici_id'";
            if (mysqli_query($baglanti, $sifre_sorgu)) {
                echo "<script>alert('Şifre başarıyla güncellendi.'); window.location.href='profil.php';</script>";
            } else {
                echo "<script>alert('Şifre güncellenirken bir hata oluştu.');</script>";
            }
        } else {
            echo "<script>alert('Şifre güncelleme başarısız oldu.');</script>";
        }
    }
    if (isset($_POST['profilsil'])) {
        $profil_sil_sorgu = "DELETE FROM kullanici_hasta WHERE id='$kullanici_id'";
        $profil_sil_sorgu_sonuc = mysqli_query($baglanti, $profil_sil_sorgu);

        if ($profil_sil_sorgu_sonuc) {
            session_destroy();
            echo "<script>alert('Profil başarıyla silindi'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Profil silme başarısız oldu.');</script>";
        }
    }
    ?>
</body>
</html>
