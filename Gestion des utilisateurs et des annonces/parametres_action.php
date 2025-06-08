<?php

include("./includes/session.php");
include("./includes/connexion.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

// Récupérer les données du formulaire
$id = $_SESSION['user_id'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = !empty($_POST['mot_de_passe']) ? password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT) : null;

// Mettre à jour la base
if ($password) {
    $update = $pdo->prepare("UPDATE users SET nom = :nom, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id");
    $update->execute([
        'nom' => $nom,
        'email' => $email,
        'mot_de_passe' => $password,
        'id' => $id
    ]);
} else {
    $update = $pdo->prepare("UPDATE users SET nom = :nom, email = :email WHERE id = :id");
    $update->execute([
        'nom' => $nom,
        'email' => $email,
        'id' => $id
    ]);
}

// Mettre à jour session
$_SESSION['user_nom'] = $nom;

header("Location: ./parametre.php?success=1");
exit();
?>
