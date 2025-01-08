<?php 
include ("../baglanti.php");


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $kullanici_id = mysqli_real_escape_string($baglanti, $_GET['id']);
    
    $reddet_sorgu = "UPDATE kullanici_hastane SET durum = 'Reddedildi' WHERE id = '$kullanici_id'";
    $reddet_sonuc = mysqli_query($baglanti, $reddet_sorgu);

    if ($reddet_sonuc) {
        echo "<script>
                alert('Başvuru başarıyla reddedildi.');
                window.location.href='hastanebasvuru.php';
              </script>";
    } else {
        echo "<script>
                alert('Başvuru reddedilirken bir hata oluştu.');
                window.location.href='hastanebasvuru.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Geçersiz işlem.');
            window.location.href='hastanebasvuru.php';
          </script>";
}
?>
