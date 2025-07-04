<?php
//inclusion des fichiers
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");
$stmt = $pdo->query("SELECT * FROM annonces ORDER BY id DESC");
$annonces = $stmt->fetchAll();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="m-2">Liste des annonces</h2>
    <a href="formAnnonce.php" class="btn btn-primary m-2 justify-content-end btn-sm">Ajouter une annonce</a>
</div>
<!-- affichage des annonces  -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <?php foreach ($annonces as $annonce): ?>
        <div class="col m-2">
            <div class="card h-100 shadow-sm card-body">
                <img src="<?= $annonce['image'] ?> " class="card-img-top img-fluid" alt="Image annonce" style="object-fit:cover; height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><?= htmlspecialchars($annonce['titre']) ?></h5>
                    <p class="card-text text-break"><?= nl2br(htmlspecialchars($annonce['description'])) ?></p>
                    <div class="mt-auto d-flex justify-content-between gap-2 align-items-center">
                        <a href="modifAnnonce.php?id=<?= $annonce['id'] ?>" class="btn btn-sm btn-primary btn-sm">Modifier</a>
                        <form method="post" action="delAnnonce.php" class="d-inline btn-sm">
                            <input type="hidden" name="id" value="<?= $annonce['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="./assets/js/script_lien.js"></script>
<?php include("./includes/footer.php"); ?>
