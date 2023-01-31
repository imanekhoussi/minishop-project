<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
// session_start();

include "config/connexion.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login_Soping</title>
</head>
<body>
<?php include ("header.php"); ?>
<div class="container" style="display: flex; justify-content: left;">
    <div class="row">
        <div class="col-md-10">

        <form method="post" action="inscription.php" style="width: 350%; background-color: #fff; color: #723D46; border-color: #723D46;">
            <h2 class="text-center mb-3" style="color: #723D46;">Inscription</h2>
            <div class="mb-3">
                <label for="nom" class="form-label" style="color: #723D46;">Nom</label>
                <input type="name" name="nom" class="form-control" style="width: 80%; background-color: #fff; color: #723D46; border-color: #723D46;" >
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label" style="color: #723D46;">Prenom</label>
                <input type="name" name="prenom" class="form-control" style="width: 80%; background-color: #fff; color: #723D46; border-color: #723D46;" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="color: #723D46;">Email</label>
                <input type="email" name="email" class="form-control" style="width: 80%; background-color: #fff; color: #723D46; border-color: #723D46;">
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label" style="color: #723D46;">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 80%; background-color: #fff; color: #723D46; border-color: #723D46;">
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="S'inscrire" style="background-color: #723D46; color: #fff;">
            <h6 class="mt-3" style="color: #723D46;">Vous avez deja un compte?  <a href="login.php" style="color: #723D46;">Se connecter</a></h6>
        </form>

        </div>
    </div>
</div>

    
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $insert= $access->prepare("INSERT INTO users(nom,prenom,email,motdepasse)
        VALUES (:nom,:prenom,:email,:motdepasse)");

        $insert->execute([
            ':nom' =>$nom,
            ':prenom'=>$prenom,
            ':email' =>$email,
            ':motdepasse' =>password_hash($motdepasse,PASSWORD_DEFAULT),
        ]);

       
    }
    else
        echo ('Veuillez remplir tous les champs' );

}

?>
