<?php 
//inclusion des fichiers
include("includes/session.php");        
include("includes/connexion.php");
include("includes/head.php"); 

//eviter la declaration sur plusieur ligne ;

$succes= $error = "";

//verification de l'id
if (isset($_GET['id']) && ($_GET['id'])) {
    $id =strip_tags ($_GET['id']); 

    //recuperation des données
    $req = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $update = $req->execute(['id' => $id]);
    $user = $req->fetch(PDO::FETCH_ASSOC);

    //verification de l'id
    if ($update) {
        
    } else {
        echo "Erreur lors de la modification ";
    }
    } else {
        echo "ID utilisateur invalide ";
    }

//verification des variables
    if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])){

//verification des champs du fomulaire
        $id = strip_tags($_POST['id']);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);

//modification des données dans la base  ou   et protection XSS  

        $req = $pdo->prepare("UPDATE users SET id = :id,  nom = :nom, prenom = :prenom, email = :email  WHERE id = :id");
        $stmt = $req->execute([ 'id' => $id ,'nom' => $nom , 'prenom' => $prenom , 'email' => $email , ]);

if($stmt){
    $succes = "modification effectue avec succes";
} else {
    $error = "une erreur ces produite lors de la modification";
}

} 
?> 

    <div class="register-card shadow col-md-12 m-2">
        <div class="logo mb-3">
            <i class="bi bi-person-plus-fill"></i>
        </div>
        <?php if(!empty($succes)): ?>
                        <div class="row alert alert-sucess">
                            <samp class="text-center">
                                <?php echo $succes; ?>
                            </samp>
                        </div>
                    <?php endif ; ?>
                    <?php if(!empty($error)): ?>
                        <div class="row alert alert-danger">
                            <samp class="text-center">
                                <?php echo $error; ?>
                            </samp>
                        </div>
                    <?php endif ; ?>

        <h2 class="text-center mb-4">Modifier Votre Compte </h2>
        <form id="registrationForm" method="post" action="">

            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="lastname" name="nom" value="<?php echo $user['nom']; ?>" placeholder="Votre nom" required>
                    <span class="error" id="nomError"></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="firstname"  name="prenom" value="<?php echo $user['prenom']; ?>" placeholder="Votre prenom" required>
                    <span class="error" id="prenomError"></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Votre e-mail" required>
                    <span class="error" id="emailError"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Modifier</button>
        </form>
        <div class="text-center mt-3">
            <span class="text-muted small">Déjà un compte ?</span>
            <a href="login.php" class="small text-primary">Se connecter</a>
        </div>
    </div>
    <script src="script.js"></script>

<?php include("includes/footer.php"); ?>
