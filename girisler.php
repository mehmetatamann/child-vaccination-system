<?php
include("baslik.php");
?>
<style>
 
    .body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    
    .login-container {
      text-align: center;
      margin: 20px;
    }
    
    .giris-button {
      color: #fff;
    background-color: #198754;
    border-color: #198754;
    border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
      transition-duration: 0.4s;
    }
    
    .giris-button:hover {
      background-color: #45a049;
    }
    
    .yonetici {
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin-right: 20px;
    }
    
    .hastane, .hasta {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
  </style>
<body>
<div class="body">
<div class="login-container yonetici">
    <h2>Yönetici Giriş</h2>
    <button class="giris-button"><a href="yoneticigiris.php" class="btn btn-success">Giriş Yap</a></button>
  </div>
  <div class="login-container hastane">
    <h2>Hastane Giriş</h2>
    <button class="giris-button"><a href="hastanegiris.php" class="btn btn-success">Giriş Yap</a></button>
  </div>
  <div class="login-container hasta">
    <h2>Hasta Giriş</h2>
    <button class="giris-button"><a href="hastagiris.php" class="btn btn-success">Giriş Yap</a></button>
  </div>
  </div>
</body>
</html>