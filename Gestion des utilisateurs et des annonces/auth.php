<?php
session_start();
include ("./includes/connexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: ./login.php");
        exit();
}
if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
$email = strip_tags($_POST['email']);
$passwords = $_POST['mot_de_passe'];

        $req = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $req->execute(['email' => $email]);
        $user = $req->fetch();        
        if($user) {               
                $_SESSION['user_email'] = $user['email'];
                $_SESSION["user_id"] = $user["id"];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['last_activity'] = time();

                header("Location: ./index.php");
                exit();
        } else {
                header("Location: ./login.php?erreur=1");
                exit();
        }
}
?>