<?php
session_start();


require("./config/connexion.php");
require("./config/commandes.php");

$produits = afficher();


?>
<?php include ('./header.php');?>
<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produit22s</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
            <table class="table table-bordered text-center" style=" color: #723d46;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">image</th>
                        <th scope="col">nom</th>
                        <th scope="col">prix</th>
                        <th scope="col">Description</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Supp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produits as $produit): ?>
                        <tr>
                            <th scope="row"><?= $produit->id ?></th>
                            <td style="width: 10%;">
                                <img src="<?= $produit->image ?>" style="width: 70%">
                            </td>
                            <td style="color: #723d46;"><?= $produit->nom ?></td>
                            <td style="font-weight: bold; color:#C9CBA3 ;"><?= $produit->prix ?>€</td>
                            <td style="color: #723d46;"><?= substr($produit->description, 0, 100); ?>...</td>
                            <td style="color: #723d46;">
                                <a href="editer.php?id=<?= $produit->id ?>">
                                    <i class="fa fa-pencil" style="font-size: 30px;color:#723d46;"></i>
                                </a>
                            </td>
                            <td>
                                <a href="delete.php?id=<?= $produit->id ?>">
                                <i class="fa fa-trash" style="font-size: 30px;color:#723d46;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                   

                </tbody>
            </table>
            <button type="button" style="font-size: 20px; width: 150px;padding: 10px 20px; background-color:#723d46;">
  <a href="add.php" style="color:white;text-decoration:none;">Add Product</a>
</button>

        </div>
    </div>
</div>
    
</body>
</html>

<?php


?>