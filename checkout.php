

<?php 
session_start();
 require("config/connexion.php");
 include("checkform.php");



if (!isset($_SESSION['user_id'])) {
  $_SESSION['user_id'] = NULL;
} 
  $clt_id=$_SESSION['user_id'];
  $prix=$_SESSION['price'];

$errors = "";

if(isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["address"])
     && isset($_POST["city"])  && isset($_POST["state"]) && isset($_POST["zip"])) {
  $fullname = trim($_POST["fullname"]);
  $email = trim($_POST["email"]);
  $address = trim($_POST["address"]);
  $city = trim($_POST["city"]);
  $state = trim($_POST["state"]);
  $zip = trim($_POST["zip"]);

  if (empty($fullname) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zip)) {
    $errors = "All fields are required.";
    echo $errors;
  } 
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors = "Invalid email address.";
    echo $errors;
  } 
  else if (!preg_match("/^[0-9]{3}$/", $state)) {
    $errors = "Invalid BP code. Please use 3 digit BP code.";
    echo $errors;
  }
  else if (!preg_match("/^[0-9]{5}$/", $zip)) {
    $errors = "Invalid zip code. Please use 5 digit postal code.";
    echo $errors;
  }
  else {
    // Proceed with rest of script (e.g. insert data into database)
    $insert=$access->prepare('INSERT  INTO checkout( clt_id, email,full_name, adress,total_price, city, stat, zip) VALUES (?,?,?,?,?,?,?,?)');
    $insert->execute(array($clt_id, $email, $fullname, $address,$prix, $city, $state, $zip));
    $checkout_id = $access->lastInsertId();
    $_SESSION['checkout_id'] = $checkout_id;
    $products_in_cart = $_SESSION['products_in_cart'];

    if (!empty($products_in_cart)) {
        $total_price = 0;
        foreach($products_in_cart as $item) {
            $stmt = $access->prepare("INSERT INTO order_items (order_id, item_id, quantity, prix) VALUES (?, ?, ?, ?)");
            $stmt->execute([$checkout_id, $item['id'], $item['quantity'], $item['price']]); }
    
        header("Location: checked.php");
        exit;
    } } }
    
    /*session_start();
    $products_in_cart = $_SESSION['products_in_cart'];
var_dump($products_in_cart);*/
    ?> 