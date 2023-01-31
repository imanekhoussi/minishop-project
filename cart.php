<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php
session_start();
require_once 'config/connexion.php';
include ("header.php"); 

if (isset($_SESSION['cart'])) {
    $total_price = 0;
    echo "<table class='table table-bordered my-5'>";
    echo "<tr>";
    echo "<th>ITEM ID</th>";
    echo "<th>ITEM NAME</th>";
    echo "<th>ITEM PRICE</th>";
    echo "<th>ITEM QUANTITY</th>";
    echo "<th>PRICE</th>";
    echo "<th>ACTION</th>";

    echo "</tr>";
    foreach ($_SESSION['cart'] as $product_id) {
        // get the product details from the database
        $stmt = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();

        if($product) {
            echo "<tr>";
            echo "<td><img src='" . $product['image'] . "' alt='product image' height='50' width='50'></td>";

            

            echo "<td>" . $product['nom'] . "</td>";
            echo "<td>" . $product['prix'] . "</td>";
            echo "<td><input type='number' name='quantity' value='1' min='1' class='form-control quantity' id='quantity_".$product['id']."'></td>";
            echo "<input type='hidden' id='price_".$product['id']."' value='".$product['prix']."' >";
            //echo "<td>" . $product['quantity'] . "</td>";
            echo "<td>
                    <span id='total_".$product['id']."'>" . $product['prix'] . "</span>

                </td>";
                $_SESSION['prix']=$product['prix'];

            echo "<td>";
            echo "<button class='btn btn-danger remove' id='" . $product['id'] . "'>Remove</button>";
            echo "</td>";
           
            echo "</tr>";
            $total_price += $product['prix'] * 1;
         
        }
    }
    echo "<tr>";
    echo "<td colspan='3'></td>";
    echo "<td>Total Price</td>";
    echo "<td id='final_price'>" . $total_price . "</td>";
    echo "<td>";
    echo "<button class='btn btn-warning clearall'>Clear All</button>";
    echo "</td>";
    echo "</tr>";

    echo "</table>";

   echo '<a href="payment.php?pdt='.$product['id'].'" class="btn btn-success " id="go-to-checkout">Go to checkout</a>';

    $_SESSION['price'] = $total_price;
} else {
    echo "<div class='text-center my-5'>No items in the cart</div>";
}

/*cart items info*/ 
$products_in_cart = [];
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id) {
        // get the product details from the database
        $stmt = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();

        if($product) {
            $product_details = [
                'id' => $product['id'],
                'name' => $product['nom'],
                'price' => $product['prix'],
                'quantity' => 1

            ];
            
            $products_in_cart[] = $product_details;
            $_SESSION['products_in_cart'] = $products_in_cart;

        }
    }
}
/*cart items info end*/ 
?>
 
<script type="text/javascript">
    $(document).ready(function(){
        $(".remove").click(function(){
            var id = $(this).attr("id");
            var action = "remove";

            $.ajax({
                method:"POST",
                url:"cart_actions.php",
                data:{action:action,id:id},
                success:function(data){
                    location.reload();
                }
            });
        });
        
        $(".clearall").click(function(){
            var action = "clearall";
            $.ajax({
                method:"POST",
                url:"cart_actions.php",
                data:{action:action},
                success:function(data){
                    location.reload();
                }
            });
        });
        
    
    });
    
    
    $(".quantity").change(function(){
    var product_id = $(this).attr("id").split("_")[1];
    var quantity = $(this).val();
    var price = $("#price_"+product_id).val();
    var total_price = quantity * price;
    $("#total_"+product_id).html(total_price); // update the display of the total price
    updateFinalPrice();
});

function updateFinalPrice(){
    var finalPrice = 0;
    $('.quantity').each(function(){
        var product_id = $(this).attr("id").split("_")[1];
        var quantity = $(this).val();
        var price = $("#price_"+product_id).val();
        finalPrice += quantity * price;
    });
    $("#final_price").html(finalPrice); // update the display of the final price
}





/*
// Collect data from each product
$('.product').each(function(){
    var product = {
        id: $(this).data('id'),
        name: $(this).data('name'),
        price: $(this).data('price')
    };
    products.push(product);
});

// Send data to checkout.php using an ajax call
$.ajax({
    type: 'POST',
    url: 'checkout.php',
    data: {products: products},
    success: function(response){
        console.log(response);
    }
});
*/
</script>
<style>/* Table styling */
table {
    width: 50% !important;
    border-collapse: collapse;
}

th, td {
    width:20%;
    padding: 10px;
    border: 1px solid #ddd;
}

th {
    background-color: #f8f9fa;
    color: #723d46;
}

/* button styling */
.btn {
    padding: 10px 20px;
    border-radius: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

/* Remove button styling */
.btn-danger {
    background-color: #723d46;
    color: white;
}

/* Clear All button styling */
.btn-warning {
    background-color: #f8f9fa;
    color: #723d46;
    border: 1px solid #723d46;
}

/* Text styling */
.text-center {
    text-align: center;
}

/* Accent color styling */
.color-accent {
    color: #723d46;
}

</style>
