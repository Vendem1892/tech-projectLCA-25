<?php 
include_once 'includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $itemID = mysqli_real_escape_string($conn,$_POST['itemID']);
    $accID = mysqli_real_escape_string($conn,$_POST['accID']);

    $sql = "INSERT INTO shoppingcart(itemID,accID)
    VALUES('$itemID','$accID')";

    if(mysqli_query($conn,$sql) == TRUE){
        echo "Add to cart sucessful";
        header("location:url=../index.php?addtocart=successful");
    }else{
        die("Invalid Item/Account ID");
        header("refresh:3; url=../index.php?addtocart=failed");
    }
}
?>