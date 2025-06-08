<?php
//inclusion des fichiers
session_start();
include("./includes/connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Créer un compte</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/icons/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #4f8cff 0%, #3358d1 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-card {
      background: #fff;
      border-radius: 1.2rem;
      box-shadow: 0 4px 32px rgba(80,120,200,0.13);
      padding: 2.5rem 2rem;
      max-width: 400px;
      width: 100%;
    }
    .register-card .form-control:focus {
      border-color: #4f8cff;
      box-shadow: 0 0 0 0.2rem rgba(79,140,255,.15);
    }
    .register-card .logo {
      width: 60px;
      height: 60px;
      background: #eaf1ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem auto;
      font-size: 2rem;
      color: #4f8cff;
    }
    .register-card .btn-primary {
      background: linear-gradient(90deg, #4f8cff 0%, #3358d1 100%);
      border: none;
    }
    .register-card .btn-primary:hover {
      background: linear-gradient(90deg, #3358d1 0%, #4f8cff 100%);
    }
  </style>
</head>
<body>
<!-- formulaire de creation de compte -->
<div class="register-card shadow col-md-12 m-2">
        <div class="logo mb-3">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <h2 class="text-center mb-4">Créer un compte</h2>
        <form  id="registrationForm" method="post" action="./creerCompte_auth.php">
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="lastname" name="nom" placeholder="Votre nom" required>
                    <div class="invalid-feedback" id="erreurNom"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="firstname" name="prenom" placeholder="Votre prenom" required>
                        <div class="invalid-feedback" id="erreurPrenom"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre e-mail" required>
                    <div class="invalid-feedback" id="erreurEmail"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password" name="mot_de_passe" placeholder="Mot de passe" required>
                    <div class="invalid-feedback" id="erreurPassword"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="passwordConfirm" name="mot_de_passe_confirm" placeholder="Confirmer le mot de passe" required>
                    <div class="invalid-feedback" id="erreurPasswordConfirm"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">S'inscrire</button>
        </form>
        <div class="text-center mt-3 mb-5">
            <span class="text-muted small">Déjà un compte ?</span>
            <a href="./login.php" class="small text-primary text-decoration-none">Se connecter</a>
        </div>
        <script src="./script.js"></script>
</body>
</html> 
