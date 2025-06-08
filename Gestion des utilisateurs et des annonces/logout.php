<?php
//logout.php

if (session_status() === PHP_SESSION_NONE) session_start();
include("./includes/connexion.php");

// Si l'utilisateur est connecté et a un cookie remember_token
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Supprimer le token en base (optionnel mais recommandé)
    $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL WHERE id = :id");
    $stmt->execute(['id' => $userId]);
}

// Supprimer le cookie
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, "/"); // Cookie supprimé en le datant dans le passé
}

// Détruire la session
session_unset();
session_destroy();

// Rediriger vers login
header("Location: ./login.php");
exit();
?>  
