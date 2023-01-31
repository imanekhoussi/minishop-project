<?php 
require("config/connexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="row">
        
    <link rel="shortcut icon" type="image/x-icon" href="images/fabIcon.png">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                    
    <title>checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<html>
<body>
<?php 
 //include("header.php");
  ?>
  <div class="col-75">
    <div class="container">
    <form method="POST" action="checkout.php" id="checkout-form">
  <div class="row">
    <div class="col-50">
      <h3>Billing Address</h3>
      <table width='700px'>
        <tr>
          <td>
        <label for="fname"><i class="fa fa-user"></i> Full Name</label></td>
        <td><input type="text" id="fname" name="fullname" placeholder="exemple: Nom Prénom"></td>
</tr>
<tr>
      
<td>  <label for="email"><i class="fa fa-envelope"></i> Email</label></td>
<td>  <input type="text" id="email" name="email" placeholder="exemple: myname@example.com"></td>
</tr>
<tr>
      <td>  <label for="adr"><i class="fas fa-address-card"></i> Address</label></td>
      <td> <input type="text" id="adr" name="address" placeholder="exemple: 6, Rue Mohamed Jazouli"></td>
      </tr>
<tr>
      <td><label for="city"><i class="fa fa-institution"></i> City</label></td>
      <td> <input type="text" id="city" name="city" placeholder="exemple: Casablanca"></td>
</tr>
</tr>
<tr>
<td> <label for="state">boite postal</label></td>
<td> <input type="text" id="state" name="state" placeholder="exemple: 425"></td>
            </tr>
<tr>
        
<td> <label for="zip">code postal</label></td>
<td> <input type="text" id="zip" name="zip" placeholder="exemple: 20001"></td>
            </tr>
</table>       
        
      
    </div>
  </div>
  <label>
    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
  </label>
  <input type="submit" value="Continue to checkout" id="btn" onclick="document.querySelector('#checkout-form').reset(); '">
</form>

</div>
</div>
              </div>
             </form>
            </div>
           </div>
          </div>

         

<style>
  /*checkout form*/
.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }
  
 
  
  .col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
    padding: 0 16px;

  }
  
  .col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
    padding: 0 16px;

  }
  
  
  
  .container {
    background-color: #f2f2f2;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
    
  }
  
  input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  
  label {
    margin-bottom: 10px;
    display: block;
  }
  
  
  
  #btn {
    background: rgb(201, 141, 137);
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }
  
  #btn:hover {
    background-color: #723d46;
  }
  
 
  *{
    font-size:1em !important;
    text-align:center;
  }
  .form-group {
    display: flex !important;
    align-items: center !important;
  }
  label {
    text-align: right !important;
    margin-right: 20px !important;
  }
 
</style>

    
</body>
</html>