<?php
include("../baglanti.php");
if (!($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
if (isset($_GET['id'])) {
    $randevu_id = mysqli_real_escape_string($baglanti, $_GET['id']);
    
    $sil_sorgu = "DELETE FROM randevu WHERE id = '$randevu_id'";
    $sil_sonuc = mysqli_query($baglanti, $sil_sorgu);

    if ($sil_sonuc) {
        echo "<script>alert('Randevu başarıyla silindi.'); window.location.href='randevular.php';</script>";
    } else {
        echo "<script>alert('Randevu silinirken bir hata oluştu.'); window.location.href='randevular.php';</script>";
    }
} else {
    echo "<script>alert('Geçersiz işlem.'); window.location.href='randevular.php';</script>";
}
?>
