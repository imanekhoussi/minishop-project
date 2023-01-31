<?php 
 include("config/connexion.php");
  ?>
  
 <div class="box-shadow">
<h1> Your Order has been confirmed!</h1>
<h1> Thank You For Choosing Our Store</h1>
<div class="inBtn">
<form method="POST">

<button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">cancel order</button>


</form>
<form method="POST" action="myOrders.php">

<button class="btn btn-outline-success my-2 my-sm-0" name="order" type="submit">show my orders</button>


</form>
</div>
</div>
<style>
    .box-shadow {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
    .box-shadow {
      font-family: cursive, sans-serif;
      background-color: #FAF9F6;
      padding: 10px;
      color:#583f43;
      border-radius: 4px;
      box-shadow: 2px 2px 20px 23px  #FAF9F6;
    }
    .btn{
    display: inline-block;
    margin-top: 1rem;
    border-radius: 5rem;
    background:rgb(201, 141, 137);
    color:#583f43;
    padding: 0.3em;
    cursor: pointer;
    font-size: 1.7rem;
    border-color: #723d46;
   
}
    
.inBtn {
    display: inline;
    text-align: center;
}
    
    
    .btn:hover{
    background:#7a5259;
}
    h1{
        text-align: center;
    }
</style>
<?php
require("config/connexion.php");


if( isset($_POST['submit'])){
    $id= $_SESSION['checkout_id'] ;
    $stmt = $access->prepare("DELETE FROM checkout WHERE id=$id");
    if($stmt->execute()){
        echo "Order canceled successfully";
    }else{
        echo "Error canceling order: " . $stmt->error;
    }
}


?>