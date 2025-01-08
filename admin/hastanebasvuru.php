<?php 
include ("../baglanti.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Hastaneler</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center">Hastane Başvuruları</h5>
                <?php
                $hastane_basvuru_sorgu = "
                SELECT kh.id, kh.hastane_adi, i.il_adi, kh.durum 
                FROM kullanici_hastane kh
                JOIN il i ON kh.hastane_il = i.il_id
                WHERE kh.durum = 'Başvuru Onay Aşamasındadır.'";
                $hastane_basvuru_sorgu_sonuc = mysqli_query($baglanti, $hastane_basvuru_sorgu);
                
                $cikti = "";

                $cikti .= "
                <table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Hastane Adı</th>
                    <th>Hastane İl</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
                ";

                if (mysqli_num_rows($hastane_basvuru_sorgu_sonuc) < 1) {
                    $cikti .= "
                    <tr>
                        <td colspan='6' class='text-center'>Herhangi bir başvuru yok.</td>
                    </tr>";
                }

                while ($hastane_basvurulari_veri_getir = mysqli_fetch_array($hastane_basvuru_sorgu_sonuc)) {
                    $cikti .= "
                    <tr>
                        <td>".$hastane_basvurulari_veri_getir['id']."</td>
                        <td>".$hastane_basvurulari_veri_getir['hastane_adi']."</td>
                        <td>".$hastane_basvurulari_veri_getir['il_adi']."</td>
                        <td>".$hastane_basvurulari_veri_getir['durum']."</td>
                        <td>
                            <a href='yetki_ver.php?id=".$hastane_basvurulari_veri_getir['id']."'>
                                <button class='btn btn-success'>Yetki Ver</button>
                            </a>
                            <a href='reddet.php?id=".$hastane_basvurulari_veri_getir['id']."'>
                                <button class='btn btn-danger'>Reddet</button>
                            </a>
                            <a href='hastaneduzenle.php?id=".$hastane_basvurulari_veri_getir['id']."'>
                                <button class='btn btn-info'>Düzenle</button>
                            </a>
                        </td>
                    </tr>
                    ";
                }
                $cikti .= "</table>";

                echo $cikti;
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
