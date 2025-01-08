<?php
include ("../baglanti.php");

if (isset($_GET['mesaj_id']) && is_numeric($_GET['mesaj_id'])) {
    $mesaj_id = mysqli_real_escape_string($baglanti, $_GET['mesaj_id']);
    
    $mesaj_sorgu = "DELETE FROM mesajlar WHERE mesaj_id='$mesaj_id'";
    $mesaj_sorgu_sonuc = mysqli_query($baglanti, $mesaj_sorgu);

    if ($mesaj_sorgu_sonuc) {
        echo "<script>alert('Mesaj başarıyla silindi.'); window.location.href='mesaj.php';</script>";
    } else {
        echo "<script>alert('Mesaj silinirken bir hata oluştu: " . mysqli_error($baglanti) . "'); window.location.href='mesaj.php';</script>";
    }
} else {
    echo "<script>alert('Geçersiz işlem.'); window.location.href='mesaj.php';</script>";
}
?>
