

<?php

include "config/connexion.php";
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post" id="sign-in-form">
            <div class="mb-3">
                <label for="email" class="form-label">Login</label>
                <input type="email" name="email" class="form-control"  >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control">
            </div>
            <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter" >
        </form>

        </div>
    </div>
</div>
    
</body>
</html>

<?php

require_once 'config/connexion.php';



if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and password from the form
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    
    // Prepare the statement
    $stmt = $access->prepare("SELECT * FROM users WHERE email=:email AND motdepasse=:motdepasse");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':motdepasse', $motdepasse);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($stmt->rowCount() > 0) {
        // login was successful
        setcookie("email", $email, time() + (10 * 365 * 24 * 60 * 60));
        setcookie("motdepasse", $motdepasse, time() + (10 * 365 * 24 * 60 * 60));
        $_SESSION["email"] = $email;
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['nom'] = $result['prenom'];
        $_SESSION['role'] = $result['role'];
        
        if ($result['role'] === 'admin') {
            header('Location: index.php');
        } else {
            // user is not an admin
            if(strpos($_SERVER['HTTP_REFERER'], 'payment.php') !== false) {
                header("Location: checkout.php");
            } else {
                header('Location: index.php');    
            }
        }
    } else {
        // login failed
        echo "Login failed";
    }
}
 else {
        // form has not been submitted, display login form
        // ...
    }




?>
<script>
    $(document).ready(function(){
    $("#sign-in-form").hide();
    $("#sign-in-option").click(function(){
        $("#sign-in-form").toggle();
    });
});

</script>
<style>
    .btn{
        font-size: 1.3em;
        width:auto;
    }
    .row{
        width:150;
    }
</style>