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
                        if (isset($_POST['remember'])) {
                                 // Générer un token aléatoire
                                $rememberToken = bin2hex(random_bytes(32));
                                // Stocker le token dans la base pour ce user
                                $stmt = $pdo->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                                $stmt->execute([
                                'token' => $rememberToken,
                                'id' => $user['id']
                                ]);
                                // Créer un cookie qui dure 30 jours
                                setcookie('remember_token', $rememberToken, time() + (86400 * 30), "/");
                        }

                header("Location: ./index.php");
                exit();
        } else {
                header("Location: ./login.php?erreur=1");
                exit();
        }
}
?>