<?php
session_start();
if(isset($_POST['action']) && $_POST['action'] == "remove"){
    // check if the cart session exists
    if(isset($_SESSION['cart'])){
        // get the id of the item to be removed
        $id = $_POST['id'];
        // search for the item in the cart session
        $index = array_search($id, $_SESSION['cart']);
        // if the item is found, remove it from the cart session
        if($index !== false){
            unset($_SESSION['cart'][$index]);
            echo "Item removed from cart";
        }else{
            echo "Item not found in cart";
        }
    }else{
        echo "Cart is empty";
    }
}

if($_POST['action'] == 'clearall'){
    unset($_SESSION['cart']);
    echo 'Cart cleared';
}

if($_POST['action'] == 'update'){
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$id] = $quantity;
    echo 'Cart updated';
}
?>