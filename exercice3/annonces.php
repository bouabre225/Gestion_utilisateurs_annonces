<?php
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");
$stmt = $pdo->query("SELECT * FROM annonces ORDER BY id DESC");
$annonces = $stmt->fetchAll();

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des annonces</h2>
    <a href="formAnnonce.php" class="btn btn-primary">Ajouter une annonce</a>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach ($annonces as $annonce): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= $annonce['image'] ?>" class="card-img-top img-fluid" alt="Image annonce" style="object-fit:cover; height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= htmlspecialchars($annonce['titre']) ?></h5>
                    <p class="card-text text-break"><?= nl2br(htmlspecialchars($annonce['description'])) ?></p>
                    <div class="mt-auto d-flex justify-content-between gap-2">
                        <a href="modifAnnonce.php?id=<?= $annonce['id'] ?>" class="btn btn-sm btn-primary">Modifier</a>
                        <form method="post" action="delAnnonce.php" class="d-inline">
                            <input type="hidden" name="id" value="<?= $annonce['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include("./includes/footer.php"); ?>
