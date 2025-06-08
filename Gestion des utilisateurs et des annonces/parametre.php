<?php
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");

// Protection si pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

// Récupérer infos utilisateur connecté
$id = $_SESSION['user_id'];
$req = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$req->execute(['id' => $id]);
$user = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres du profil</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Paramètres du profil</h2>
    <div class="row justify-content-center">
        <!-- Partie gauche : infos -->
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header text-center">Vos informations</div>
                <div class="card-body">
                    <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
                    <p><strong>Prenom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
                    <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Inscrit le :</strong> <?= date('d/m/Y', strtotime($user['created_at'])) ?></p>
                    <a href="./index.php" class="btn btn-secondary">Retour accueil</a>
                </div>
            </div>
        </div>
        <!-- Partie droite : formulaire -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Modifier mes informations</div>
                <div class="card-body">
                    <form method="post" action="./parametres_action.php">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="mot_de_passe" class="form-label">Nouveau mot de passe (optionnel)</label>
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success mt-3">Profil mis à jour avec succès !</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include("./includes/footer.php"); ?>
</html>
