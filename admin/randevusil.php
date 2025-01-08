<?php
include("../baglanti.php");

if (isset($_GET['randevu_id']) && is_numeric($_GET['randevu_id'])) {
    $randevu_id = intval($_GET['randevu_id']);
    
    $sil_sorgu = "DELETE FROM randevu WHERE id = '$randevu_id'";
    if (mysqli_query($baglanti, $sil_sorgu)) {
        echo "<script>alert('Randevu başarıyla silindi.'); window.location.href='hastadetay.php';</script>";
    } else {
        echo "<script>alert('Randevu silinirken bir hata oluştu:'); window.location.href='hastadetay.php';</script>";
    }
} else {
    echo "<script>alert('Geçersiz işlem.'); window.location.href='hastadetay.php';</script>";
}
?>
