<?php 
include("./includes/session.php");
include("./includes/connexion.php");
include("./includes/head.php");
//recuperation des donnée ou selection

        $req = $pdo->query("SELECT id, nom, prenom, email FROM users");
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="row justify-content-end mt-3 mb-2">
    <div class="col-md-3 p-2">
        <a href="register.php"  class="btn btn-primary">
            Enregistrer un utilisateur 
        </a>
    </div>
</div>
                    <div class="col-md-12 m-2 ">
                        <div class=" p-4 shadow card table-responsive">
                            <table class="table table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr class="table-dark">
                                    <td class="col-md-1 text-center card-title">ID</td>
                                    <td class="col-md-2 text-center card-title">NOM</td>
                                    <td class="col-md-2 text-center card-title">PRENOM</td>
                                    <td class="col-md-2 text-center card-title">EMAIL</td>
                                    <td class="col-md-2 text-center card-title">ACTION</td>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php if(!empty($users)){ ?>
                                <?php foreach($users as $user):?>
                                    <tr class="table-light">
                                        <td class="col-md-1 text-center card-text"> <?php echo $user["id"]?> </td>
                                        <td class="col-md-2 text-center card-text"> <?php echo $user["nom"]?> </td>
                                        <td class="col-md-2 text-center card-text"> <?php echo $user["prenom"]?> </td>
                                        <td class="col-md-2 text-center card-text"> <?php echo $user["email"]?> </td> 
                                        <td  class="mt-auto d-flex justify-content-between gap-2">
                                            <a class="btn btn-danger btn-sm" href="./includes/delete.php?id=<?php echo$user["id"] ?>">supprimer</a>
                                            <a class="btn btn-primary btn-sm" href="./update.php?id= <?php echo $user["id"] ?>">modifier</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <td colspan="4">Aucun utilisateur trouver</td>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php include("./includes/footer.php"); ?>
