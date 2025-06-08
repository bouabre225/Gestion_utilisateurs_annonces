<?php
//inclusion des fichiers

session_start();
include("./includes/connexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

//verification de la methode
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: ./login.php");
        exit();
}

//verification des champs
if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
$email = strip_tags($_POST['email']);
$passwords = $_POST['mot_de_passe'];

//verification de l'utilisateur
$req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$req->execute(['email' => $email]);
$user = $req->fetch();        
if($user) {               
$_SESSION['user_email'] = $user['email'];
$_SESSION["user_id"] = $user["id"];
$_SESSION['user_nom'] = $user['nom'];
$_SESSION['user_prenom'] = $user['prenom'];
$_SESSION['last_activity'] = time();
//redirection
header("Location: ./index.php");
exit();
        } else {
//redirection avec message d'erreur
header("Location: ./login.php?erreur=1");
exit();
        }
}
?>