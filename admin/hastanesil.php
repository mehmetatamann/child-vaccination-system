<?php 
include ("../baglanti.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $kullanici_id = intval($_GET['id']);

    $sil_asi_sorgu = "DELETE FROM hastane_asi WHERE hastane_id='$kullanici_id'";
    if (!mysqli_query($baglanti, $sil_asi_sorgu)) {
        echo "<script>alert('Aşı bağımlılıkları silinirken bir hata oluştu:'); window.location.href='hastanelistele.php';</script>";
        exit();
    }

    $sil_hastane_sorgu = "DELETE FROM kullanici_hastane WHERE id='$kullanici_id'";
    if (mysqli_query($baglanti, $sil_hastane_sorgu)) {
        echo "<script>alert('Hastane başarıyla silindi.'); window.location.href='hastanelistele.php';</script>";
    } else {
        echo "<script>alert('Hastane silme işlemi başarısız. Lütfen tekrar deneyin.'); window.location.href='hastanelistele.php';</script>";
    }
} else {
    echo "<script>alert('Geçersiz işlem.'); window.location.href='hastanelistele.php';</script>";
}
?>
