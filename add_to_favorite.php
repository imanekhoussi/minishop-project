<?php
    session_start();
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // check if the fav session is set
        if (!isset($_SESSION['favorite'])) {
            // create an empty favorite
            $_SESSION['favorite'] = array();
        }

        // check if the product is already in the favorite
        if (in_array($product_id, $_SESSION['favorite'])) {
            // product already in the favorite
            echo "Product is already in the favorite";
        } else {
            // add the product to the favorite
            array_push($_SESSION['favorite'], $product_id);
            echo "Product added to the favorite";
        }
    } else {
        echo "No product selected";
    }
?>
