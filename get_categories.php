<?php
    //include the conexion.php file
    require_once 'config/connexion.php';

    //query to get the categories
    $query = "SELECT catégorie,id,image FROM category";

    //prepare the statement
    $stmt = $access->prepare($query);

    //execute the statement
    $stmt->execute();

    //fetch the rows
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach($categories as $category){
      echo "<li>
            <div class='category-block'>
                
               <a href='category_products.php?id=" . $category['id'] . "' class='dropdowncat'>" . $category['catégorie'] . "</a>
            </div>
            </li>";
  }
  
            ?>
            <style>
              img.thumbnail {
              width: 20px;
              height: 20px;
              margin-right:20px;
              margin-left:20px;
              
          }

          a {
              color: rgb(201, 141, 137);
              text-decoration: none;
          }
          a:hover{
              color: #723d46; 
              text-decoration: none;
          }
          .category-block {
    display: flex;
}



              </style>
           
