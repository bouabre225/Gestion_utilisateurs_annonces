<?php
//verification de la session
if (session_status() === PHP_SESSION_NONE) session_start();

//verification de l'authentification
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

//verification de l'expiration de la session
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 1800) {
    //redirection 
    session_unset();
    session_destroy();
    header("Location: ./login.php");
    exit();
}
$_SESSION['last_activity'] = time();
?>
