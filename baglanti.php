<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "asi_otomasyon";

    $baglanti = new mysqli($servername, $username, $password, $dbname);

    if (!$baglanti) {
        die("Veritabanı bağlantısı başarısız.");
    }    
?>