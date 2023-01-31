<?php
    session_start();
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // check if the cart session is set
        if (!isset($_SESSION['cart'])) {
            // create an empty cart
            $_SESSION['cart'] = array();
        }

        // check if the product is already in the cart
        if (in_array($product_id, $_SESSION['cart'])) {
            // product already in the cart
            echo "Product is already in the cart";
        } else {
            // add the product to the cart
            array_push($_SESSION['cart'], $product_id);
            echo "Product added to the cart";
        }
    } else {
        echo "No product selected";
    }
?>
