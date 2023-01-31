<?php


    require_once './config/connexion.php';
    if (isset($_POST['search_term'])) {
        $search_term = $_POST['search_term'];
    
        $query = $access->prepare("SELECT * FROM produits WHERE nom LIKE :search_term OR description LIKE :search_term");
        $query->bindValue(':search_term', "%$search_term%");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/shop.css" rel="stylesheet">
</head>

<body>
    <?php

include("header.php");
?>
 

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
           
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                   
                    <?php 
                    if (count($results) > 0) {
                    foreach($results as $result) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= $result['image'] ?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"  onclick="addToCart(<?= $result['id'] ?>)" href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="detail.php?pdt=<?= $result['id']  ?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?= $result['nom']  ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?= $result['prix']  ?></h5><h6 class="text-muted ml-2"><del><?= $result['prix']  ?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1" ></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        } } else {
                            echo "No results found.";
                        }
                        ?>
                   
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <style> 
*{
    font-size:1em !important;
}
.text-primary {
    color: #dd8d95!important;
}
</style> 
   
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>


    <!-- Template Javascript -->
    <script src="jsmain.js"></script>
</body>
</html>
         
           