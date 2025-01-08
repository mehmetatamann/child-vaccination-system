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
                $hastane_sorgu = "
                SELECT kh.id, kh.hastane_adi, i.il_adi, kh.durum
                FROM kullanici_hastane kh 
                JOIN il i ON kh.hastane_il = i.il_id
                WHERE kh.durum = 'Onaylı Hastane'";
                $hastane_sorgu_sonuc = mysqli_query($baglanti, $hastane_sorgu);
                echo "
                <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hastane Adı</th>
                        <th>Hastane Şehir</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                ";
    
                if (mysqli_num_rows($hastane_sorgu_sonuc) < 1) {
                    echo "
                    <tr>
                        <td colspan='5' class='text-center'>Kayıtlı hastane bulunamadı.</td>
                    </tr>";
                } else {
                    while ($hastane_veri_getir = mysqli_fetch_assoc($hastane_sorgu_sonuc)) {
                        echo "
                        <tr>
                            <td>{$hastane_veri_getir['id']}</td>
                            <td>{$hastane_veri_getir['hastane_adi']}</td>
                            <td>{$hastane_veri_getir['il_adi']}</td>
                            <td>{$hastane_veri_getir['durum']}</td>
                            <td>
                                <a href='hastaneduzenle.php?id={$hastane_veri_getir['id']}'>
                                    <button class='btn btn-success'>Düzenle</button>
                                </a>
                                <a href='hastanesil.php?id={$hastane_veri_getir['id']}' onclick=\"return confirm('Bu hastaneyi silmek istediğinizden emin misiniz?');\">
                                    <button class='btn btn-danger btn-sm'>Sil</button>
                                </a>
                            </td>
                        </tr>
                        ";
                    }
                }
                echo "</tbody></table>";
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
