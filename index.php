<?php

require("config/commandes.php");

  $Produits=bestselling();
  $Produites=flashsales();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/fabIcon.png">
    <link rel="stylesheet" href="css/home.css">
    <title>Ecommerce Site</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="js/home.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
	

</head>
<body>
 <?php 
 include("config/connexion.php");
 include("header.php"); ?>

 <!-- ======= Hero Slider Section ======= -->


 <!-- hero section -->
<header class="hero-section">
<img src="https://images.milledcdn.com/2017-12-26/cruiz3Wg5TJxihM3/jh2E52Hz7boS.jpg" style="width:100% ;height:150px;"class="ima" alt="">
   
</header>

<!--aceuil-->
<section id="slider">
      <input type="radio" name="slider" id="s1" checked>
      <input type="radio" name="slider" id="s2">
      <input type="radio" name="slider" id="s3">
      <input type="radio" name="slider" id="s4">
      <input type="radio" name="slider" id="s5">
    
      <label for="s1" id="slide1"><img src="img/catt.jpg"></label>
      <label for="s2" id="slide2"><img src="img/slide8.jpg"></label>
      <label for="s3" id="slide3"><img src="img/slide9.jpg"></label>
      <label for="s4" id="slide4"><img src="img/slide4.jpg"></label>
      <label for="s5" id="slide5"><img src="img/slide5.jpg"></label>
    </section>

   
 <!-- inside product section. -->
 <main>
 <h1 class="heading"> <span>Products</span> </h1>
 <section class="prod">
    <h2 class="prod-category">BEST SELLING</h2>
</section>
 <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            
            //iterate over the array and create the product section
            foreach($Produites as $produit) {
            ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" width="30%" src="<?= $produit->image ?>" >
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> <?php echo $produit->nom; ?> </h5>
                                <!-- Product price-->
                                <?php echo $produit->prix; ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">    
                            <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
 <section class="prod">
    <h2 class="prod-category">FLASH SALES</h2>
</section>
 <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            
            //iterate over the array and create the product section
            foreach($Produits as $produit) {
            ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" width="30%" src="<?= $produit->image ?>" >
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> <?php echo $produit->nom; ?> </h5>
                                <!-- Product price-->
                                <?php echo $produit->prix; ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">    
                            <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

</main>
  
<button class="pre-btn"><img src="img/arrow.png" alt=""></button>
<button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
<!-- prodcuts section ends -->
<!-- collections -->
<h1 class="heading"> <span> Les Box</span> </h1>
<section class="collection-container">
    <div class="collection">
        <img src="img/women.jpg" alt="">
        <p class="collection-title">Femme </p>
          </div>
    <div class="collection">
        <img src="img/men.jpg" alt="">
        <p class="collection-title">Homme </p>
          </div>
    <div class="collection">
        <img src="img/last.jpg" alt="">
        
          </div>
</section>

</section>
<section class="service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
               
                <img src="img/icon-1.png" alt="">
               

              <div class="service-content">
                <h3 class="service-item-title">free delivery</h3>
                <p class="service-item-text">on all orders</p>
              </div>
            </li>

            <li class="service-item">
                <img src="img/icon-2.png" alt="">

              <div class="service-content">
                <h3 class="service-item-title">10 days returns</h3>
                <p class="service-item-text">moneyback guarantee</p>
              </div>
            </li>

            <li class="service-item">
               
                <img src="img/icon-3.png" alt="">
              
              <div class="service-content">
                <h3 class="service-item-title">offer & gifts</h3>
                <p class="service-item-text">on all orders</p>
              </div>
            </li>
          </ul>

        </div>
      </section>
 
<!-- contact section starts  -->

<nav class="contact" id="contact">

    <h1 class="heading"> <span> Contact </span> us </h1>

    <div class="row">
        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
        <div class="image">
            <img style='height:250px;width:250px;margin-left:200px;'src="img/conta.jpg" alt="">
        </div>

    </div>

</nav>

<!-- contact section ends -->
<!-- FOOTER -->
<?php 
 include("footer.php"); ?>
<style>
  body{
    overflow-x:hidden;
}
     #slider {
    margin-top: 0%;
    position: relative;
    width: 50%;
    height: 30vw;
    margin: 80px auto;
    font-family: 'Helvetica Neue', sans-serif;
    perspective: 1400px;
    transform-style: preserve-3d;
  }
  
  input[type=radio] {
    position: relative;
    top: 108%;
    left: 50%;
    width: 18px;
    height: 18px;
    margin: 0 15px 0 0;
    opacity: 0.4;
    transform: translateX(-83px);
    cursor: pointer;
  }
  
  
  input[type=radio]:nth-child(5) {
    margin-right: 0px;
  }
  
  input[type=radio]:checked {
    opacity: 1;
  }
  
  
  
  
  #slider label {
    position: absolute;
    left: 0;
    top: 0;
    color: white;
    font-size: 70px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 400ms ease;
  }
  
  #slide1 img {
    width:  680px;
    height: 420px;
  }
  
  #slide2 img {
    width:  680px;
    height: 420px;
  }
  
  #slide3 img {
    width:  680px;
    height: 420px;
  }
  #slide4 img {
    width:  680px;
    height: 420px;
  }
  
  #slide5 img {
    width:  680px;
    height: 420px;
}
  
  
  /* Slider Functionality */
  
  /* Active Slide */
  #s1:checked ~ #slide1, #s2:checked ~ #slide2, #s3:checked ~ #slide3, #s4:checked ~ #slide4, #s5:checked ~ #slide5 {
    box-shadow: 0 13px 26px rgba(0,0,0, 0.3), 0 12px 6px rgba(0,0,0, 0.2);
    transform: translate3d(0%, 0, 0px);
  }
  
  /* Next Slide */
  #s1:checked ~ #slide2, #s2:checked ~ #slide3, #s3:checked ~ #slide4, #s4:checked ~ #slide5, #s5:checked ~ #slide1 {
    box-shadow: 0 6px 10px rgba(0,0,0, 0.3), 0 2px 2px rgba(0,0,0, 0.2);
    transform: translate3d(15%, 0, -100px);
  }
  
  
  /* Next to Next Slide */
  #s1:checked ~ #slide3, #s2:checked ~ #slide4, #s3:checked ~ #slide5, #s4:checked ~ #slide1, #s5:checked ~ #slide2 {
    box-shadow: 0 1px 4px rgba(0,0,0, 0.4);
    transform: translate3d(30%, 0, -250px);
  }
  
  /* Previous to Previous Slide */
  #s1:checked ~ #slide4, #s2:checked ~ #slide5, #s3:checked ~ #slide1, #s4:checked ~ #slide2, #s5:checked ~ #slide3 {
    box-shadow: 0 1px 4px rgba(0,0,0, 0.4);
    transform: translate3d(-30%, 0, -250px);
  }
  
  /* Previous Slide */
  #s1:checked ~ #slide5, #s2:checked ~ #slide1, #s3:checked ~ #slide2, #s4:checked ~ #slide3, #s5:checked ~ #slide4 {
    box-shadow: 0 6px 10px rgba(0,0,0, 0.3), 0 2px 2px rgba(0,0,0, 0.2);
    transform: translate3d(-15%, 0, -100px);
  }
  .service { padding-block: 45px; }

.service-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 40px;
}

.service-item {
  max-width: 235px;
  width: 100%;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 20px;
}

.service-item-icon { width: 45px; }

.service-item-icon img { margin-inline: auto; }

.service-item-title {
    color:#333;
    padding-bottom: .4rem;
    font-size: 2rem;
}
.service-item-text{
    color:#555;
    font-size: 1.7rem;  
}
 
</style>
</body>
</html>