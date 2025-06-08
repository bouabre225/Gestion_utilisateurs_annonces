<?php
//inclusion des fichiers
session_start();
include("./includes/connexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);
//verification de la methode
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = strip_tags($_POST['nom']);
    $prenom = strip_tags($_POST['prenom']);
    $email = strip_tags($_POST['email']);
    $mdp = $_POST['mot_de_passe'];
    $mdp_confirm = $_POST['mot_de_passe_confirm'];  
    
    // verification de l'email
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        header("Location: ./creerCompte.php?erreur=Email déjà utilisé.");
        exit();
    }

    // hash du mot de passe
    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

    // insertion en BDD
    $insert = $pdo->prepare("INSERT INTO users (nom,prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
    $insert->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'mot_de_passe' => $hashed_mdp
    ]);

    // redirection vers login
    header("Location: ./login.php");
    exit();
} else {
    // redirection vers creerCompte
    header("Location: ./creerCompte.php");
    exit();
}
?>
