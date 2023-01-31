<?php
require("config/connexion.php");
require("config/commandes.php");

$Produits=afficher();

session_start();
$clt_id= $_SESSION['user_id'];

if( isset($_POST['order'])){
   

 ?>
<head>
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

</head>

      
          <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
           
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">

                    <?php 
                       $query = "SELECT id FROM checkout WHERE clt_id = ?";
                       $stmt = $access->prepare($query);
                       $stmt->execute([$clt_id]);
                       $results = $stmt->fetchAll(); 
                       $order_ids = array_column($results, 'id');
                       
                       if(count($order_ids) > 0){
                           $placeholders = implode(',', array_fill(0, count($order_ids), '?'));
                           $query = "SELECT * FROM order_items WHERE order_id IN ($placeholders)";
                           $stmt = $access->prepare($query);
                           $stmt->execute($order_ids);
                           $results = $stmt->fetchAll(); 
                       
                           $prod_ids = array_column($results, 'item_id');
                         
                       }
                        foreach($Produits as $produit) {
                            if(in_array($produit->id, $prod_ids)) {
                    ?> 
                      <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= $produit->image ?>" alt="">
                                
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?=  $produit->nom ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?=  $produit->prix ?></h5><h6 class="text-muted ml-2"><del><?=  $produit->prix?></del></h6>
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
                        }
                    }
                }
            
            else 
            echo "no post submitted"
                        ?>
                    
                   
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
          
                       
                   
              
    

  



 
                   
           