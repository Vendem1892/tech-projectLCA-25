<?php
include_once 'dbh.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $currDate = new DateTime();
    
    $ordID = mysqli_real_escape_string($conn,$_POST['orderID']);
    $ordDate = $currDate;
    $ordTotal = mysqli_real_escape_string($conn,$_POST['orderTotal']);
    $accID = mysqli_real_escape_string($conn, $_POST['accID']);
    $itemID = mysqli_real_escape_string($conn,$_POST['itemID']);

    $sql = "INSERT INTO orders(orderID,orderDate,orderTotal,accID,itemID)
    VALUES('$ordID',$ordDate,$ordTotal,'$accID','$itemID')";
    $result = mysqli_query($conn,$sql);

    if($result === TRUE){
        echo "<script>alert('Payment Confirmed')</script>
        <form action='../receipt.php' method='post'>
            <input type='hidden' name='orderID' id='orderID' class='hidden' value='$ordID'>
            <input type='hidden' name='totalAmt' id='totalAmt' class='hidden' value='$priceUS'>
            <input type='hidden' name='accID' id='accID' class='hidden' value='$accID'>
            <input type='hidden' name='itemID' id='itemID' class='hidden' value='$itemID'>                        
        </form>";
        header("refresh:3;url=../inculdes/receipt.php");
        
    }else{
        echo "<script>alert('Payment Failed')</script>";
        header("refresh:5;url=../inculdes/checkout.php");
    }
}

?>