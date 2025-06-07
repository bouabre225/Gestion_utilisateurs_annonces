<?php
include("./includes/session.php");
include("./includes/connexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $stmt = $pdo->prepare("DELETE FROM annonces WHERE id = :id");
    $stmt->execute(["id" => $id]);
    header("Location: annonces.php");
    exit();
}
?>
