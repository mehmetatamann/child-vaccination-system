<?php
include ("../baglanti.php");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>ÇAVİS - Mesajlar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/bacteria.png" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <script>
        function silme_onay() {
            return silme_onay("Bu mesajı silmek istediğinizden emin misiniz?");
        }
    </script>
</head>

<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-3">Toplam Mesajlar</h5>
                <?php
                $mesaj_sorgu = "SELECT * FROM mesajlar";
                $mesaj_sorgu_sonuc = mysqli_query($baglanti, $mesaj_sorgu);

                echo "
                <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Mesaj ID</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Ad Soyad</th>
                        <th>Email</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                ";

                if (mysqli_num_rows($mesaj_sorgu_sonuc) < 1) {
                    echo "
                    <tr>
                        <td class='text-center' colspan='8'>Henüz mesaj yok.</td>
                    </tr>";
                } else {
                    while ($mesaj_veri_getir = mysqli_fetch_assoc($mesaj_sorgu_sonuc)) {
                        echo "
                        <tr>
                            <td>{$mesaj_veri_getir['mesaj_id']}</td>
                            <td>{$mesaj_veri_getir['konu']}</td>
                            <td>{$mesaj_veri_getir['mesaj']}</td>
                            <td>{$mesaj_veri_getir['ziyaretci_ad_soyad']}</td>
                            <td>{$mesaj_veri_getir['ziyaretci_email']}</td>
                            <td>
                                <a href='mesajsil.php?mesaj_id={$mesaj_veri_getir['mesaj_id']}' class='btn btn-danger' onclick='return silme_onay();'>Sil</a>
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
