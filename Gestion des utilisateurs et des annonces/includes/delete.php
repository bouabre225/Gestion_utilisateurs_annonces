<?php 
require('connexion.php');

//suppression
if(isset($_GET["id"])){
            if(!empty($_GET["id"])){
                  //securiser la variable
            $id = strip_tags($_GET["id"]);
                //mise a jour 
                  $req = $pdo->prepare("DELETE FROM users WHERE id = :id ");
                  $stmt = $req->execute(["id" => $id ]);
                  $email = $_GET['email'];

                  if($stmt){
                        header("Location: ../users.php?email=$email");
                  }else{
                  echo"Erreur!";
                  }
            } else{
            header("Location: ../users.php?email=$email");
            }
      } else {
            header("Location: ../users.php?email=$email");
            }

?>