<?php

session_start();

require("./config/connexion.php");
require("./config/commandes.php");

$id = $_GET['id'];

$query = "SELECT * FROM produits WHERE id = :id";
$statement = $access->prepare($query);
$statement->execute(array(":id" => $id));
$produit = $statement->fetch();

if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }

        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/".$file_name);
            $image = $file_name;
        }else{
            print_r($errors);
        }
    } else {
        $image = $produit['image'];
    }

    $query = "UPDATE produits SET nom = :nom, prix = :prix, description = :description, image = :image WHERE id = :id";
    $statement = $access->prepare($query);
    $statement->execute(array(":nom" => $nom, ":prix" => $prix, ":description" => $description, ":image" => $image, ":id" => $id));

    header("Location: ./afficher.php");
}


?>

<?php include('./header.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Editer un produit</title>
</head>
<body>
    <div class="container">
        <h1>Editer un produit</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $produit['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" class="form-control" id="prix" name="prix" value="<?= $produit['prix'] ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?= $produit['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <input type="submit" name="submit" value="Enregistrer les modifications" class="btn btn-primary">
        </form>
    </div>
</body>
</html>