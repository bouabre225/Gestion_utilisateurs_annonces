<?php
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");


$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM annonces WHERE id = :id");
$stmt->execute(["id" => $id]);
$annonce = $stmt->fetch();

if (!$annonce) {
    echo "Annonce introuvable.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = htmlspecialchars($_POST["titre"]);
    $description = htmlspecialchars($_POST["description"]);

    $sql = "UPDATE annonces SET titre = :titre, description = :description";
    $params = ["titre" => $titre, "description" => $description, "id" => $id];

    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"];
        $target_dir = "./uploads/";
        $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
        $newFileName = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $newFileName;

        $check = getimagesize($image["tmp_name"]);
        if ($check === false) {
            echo "Ce fichier n'est pas une image.";
            exit();
        }

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $sql .= ", image = :image";
            $params["image"] = $target_file;
        } else {
            echo "Erreur lors du téléchargement de l'image.";
            exit();
        }
    }

    $sql .= " WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header("Location: annonces.php");
    exit();
}
?>

<h2 class="text-center mt-3">Modifier une annonce</h2>
<form method="post" enctype="multipart/form-data" class="vstack gap-2 card p-3">
    <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($annonce['titre']) ?>" required>
    <textarea name="description" class="form-control" required><?= htmlspecialchars($annonce['description']) ?></textarea>
    <img src="<?= $annonce['image'] ?>" class="img-fluid" width="150">
    <input type="file" name="image" class="form-control" accept="image/*">
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php include("./includes/footer.php"); ?>
