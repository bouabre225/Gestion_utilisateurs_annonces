<?php 
include("./includes/connexion.php");
include("./includes/head.php"); 

// register.php : Page d'inscription Bootstrap moderne et responsive
//verification du formulaire
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])){

      //verification des champs du fomulaire
        
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $motdepasse = password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT);

//insertion des données dans la base de donnée ou   et protection XSS  

        $req = $pdo->prepare("INSERT INTO users(nom,prenom,email,mot_de_passe) VALUES(:nom,:prenom, :email, :mot_de_passe)");
        $stmt = $req->execute(['nom' => $nom , 'prenom' => $prenom , 'email' => $email , 'mot_de_passe' => $motdepasse ]);

    if($stmt){
        
echo"formulaire envoyé avec succes";
header("Location: ./index.php");
exit();
} else{

    echo"formulaire non envoyer";
    header("Location: ./register.php");
    exit();
} 

} 
?>


<div class="register-card shadow col-md-12 m-2">
        <div class="logo mb-3 text-center pt-3">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <h2 class="text-center mb-4">Enregistrer un utilisateur</h2>
        <form  id="registrationForm" method="post" action="" enctype="multipart/form-data" class="col-md-6 m-auto p-2">
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
            <button type="submit" class="btn btn-primary w-100 mb-4">Enregistrer</button>
        </form>
        <script src="./script.js"></script>

<?php include("./includes/footer.php"); ?>
