<?php
//inclusion des fichiers
include("./includes/session.php");
include("./includes/connexion.php");

//verification de la methode
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $stmt = $pdo->prepare("DELETE FROM annonces WHERE id = :id");
    $stmt->execute(["id" => $id]);
    //redirection vers annonces.php
    header("Location: ./annonces.php");
    exit();
}
?>
