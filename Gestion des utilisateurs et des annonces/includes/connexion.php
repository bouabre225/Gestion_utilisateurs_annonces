<?php
  try {
    //connexion a la base de donnée pdo
    $pdo = new PDO('mysql:host=localhost;dbname=texte;charset=utf8','root','');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    
  } catch (PDOException $e) {
    die("Erreur de connexion :" . $e -> getMessage());
  }
?>