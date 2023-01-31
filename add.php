<?php include("header.php");?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
</head>
<body>
    <div class="container">
        <h1>Ajouter un produit</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" class="form-control" id="prix" name="prix">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <input type="submit" name="submit" value="Ajouter un produit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>