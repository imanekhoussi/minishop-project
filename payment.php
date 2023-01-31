<?php

session_start();
if(isset($_SESSION['logged_in'])) {
$logged=$_SESSION['logged_in'];
}
if($logged === true) 
{
   
       header("Location: checkout.php");
    }

else{

    include("login.php");

}
?>