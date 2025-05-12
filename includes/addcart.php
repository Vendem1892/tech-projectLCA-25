<?php
include_once 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = mysqli_real_escape_string($conn, $_POST['itemID']);
    $accID = mysqli_real_escape_string($conn, $_POST['accID']);

    $sqlCheck = "SELECT * FROM shoppingcart WHERE itemID = '$itemID' AND accID = '$accID'";
    $resCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($resCheck) > 0) {
        echo "<script>
        alert('Item is already present in cart');        
        </script>";
        header("refresh:3; url=../index.php?addtocart=failed");
    } else {    
        $sql = "INSERT INTO shoppingcart(itemID,accID)
        VALUES('$itemID','$accID')";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            echo "<script>
            alert('Add to cart sucessful');            
            </script>";            
            header("refresh:3; url=../index.php?addtocart=sucessful");
        } else {
            die("Invalid Item/Account ID");
            header("refresh:3; url=../index.php?addtocart=failed");
        }
    }
    mysqli_close($conn);
}
