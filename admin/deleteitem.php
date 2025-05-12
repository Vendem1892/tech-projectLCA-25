<?php 

include_once '../includes/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $itemID = mysqli_real_escape_string($conn,$_POST['itemID']);

    $sql = "DELETE FROM items WHERE itemID = '$itemID'";
    $result = mysqli_query($conn,$sql);

    if($result === TRUE){
        echo "<script> alert('Item listing successfully removed.') </script>";
        header("refresh:5; url=adminDashboard.php?itemremoval=successful");
    }else{
        echo "<script> alert('Item listing removal failed.') </script>";
        header("refresh:5; url=adminDashboard.php?itemremoval=failed");
    }
    mysqli_close($conn);
}
?>