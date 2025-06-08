<?php
session_start();
include("./includes/connexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = strip_tags($_POST['nom']);
    $prenom = strip_tags($_POST['prenom']);
    $email = strip_tags($_POST['email']);
    $mdp = $_POST['mot_de_passe'];
    $mdp_confirm = $_POST['mot_de_passe_confirm'];  
    
    // Vérifie si l'email est déjà utilisé
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        header("Location: ./creerCompte.php?erreur=Email déjà utilisé.");
        exit();
    }

    // Hash du mot de passe
    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

    // Insertion en BDD
    $insert = $pdo->prepare("INSERT INTO users (nom,prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
    $insert->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'mot_de_passe' => $hashed_mdp
    ]);

    // Redirection vers login
    header("Location: ./login.php");
    exit();
} else {
    header("Location: ./creerCompte.php");
    exit();
}
?>
