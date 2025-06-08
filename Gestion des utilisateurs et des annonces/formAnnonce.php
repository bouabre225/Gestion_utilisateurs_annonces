<?php
//inclusion des fichiers
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");

//verification de la methode
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //recuperation des données
    $titre = htmlspecialchars($_POST["titre"]);
    $description = htmlspecialchars($_POST["description"]);
    $image = $_FILES["image"];

    //verification de l'extension

    $target_dir = "./uploads/";
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
    $newFileName = uniqid() . "." . $imageFileType;
    $target_file = $target_dir . $newFileName;

    //verification de l'extension
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        //message d'erreur
        echo "Ce fichier n'est pas une image.";
        exit();
    }

    //verification du téléchargement
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        //message de confirmation
        //insertion des données
        $stmt = $pdo->prepare("INSERT INTO annonces (titre, description, image) VALUES (:titre, :description, :image)");
        $stmt->execute([
            "titre" => $titre,
            "description" => $description,
            "image" => $target_file
        ]);
        //redirection vers annonces.php
        header("Location: ./annonces.php");
        exit();
    } else {
        //message d'erreur
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>
<!-- formulaire d'ajout d'une annonce -->
<h2 class="text-center">Créer une annonce</h2>
<form method="post" enctype="multipart/form-data" class="vstack gap-2 card p-3">
<div class="mb-3 form-group">
    <div class="mb-3">
        <input type="text" class="form-control" name="titre" required placeholder="Titre">
        </div>
        <div class="mb-3">
        <textarea class="form-control" name="description" required placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
        <input type="file" class="form-control"  name="image" accept="image/*" required>
    </div>
</div>
    <button type="submit"class="btn btn-primary w-100">Ajouter</button>
</form>

<?php include("./includes/footer.php"); ?>
