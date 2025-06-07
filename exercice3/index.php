<?php
include("./includes/session.php");
include("./includes/head.php");?>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <i class="bi bi-people-fill display-5 text-primary mb-2"></i>
                            <h5>Utilisateurs</h5>
                            <p class="mb-0"><a href="./users.php" class='btn btn-primary'>Gérez vos utilisateurs facilement.</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <i class="bi bi-bar-chart-fill display-5 text-success mb-2"></i>
                            <h5>Annonces</h5>
                            <p class="mb-0"><a href="./annonces.php" class='btn btn-primary'>voir les differentes annonces</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <i class="bi bi-gear-fill display-5 text-warning mb-2"></i>
                            <h5>Paramètres</h5>
                            <p class="mb-0"><a href="./parametre.php" class='btn btn-primary'>Personnalisez votre profil.</a></p>
                        </div>
                    </div>
                </div>
<?php include("./includes/footer.php"); ?>
