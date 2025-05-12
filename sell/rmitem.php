<?php 

include_once '../includes/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $itemID = mysqli_real_escape_string($conn,$_POST['itemID']);    
    
    $sqlDel = "DELETE FROM item_images WHERE itemID='$itemID'";
    $resDel = mysqli_query($conn,$sqlDel);
    
    if($resDel===TRUE){
        $sql = "DELETE FROM items WHERE itemID='$itemID'";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
        echo "<script> alert('Item listing successfully removed.') </script>";
        header("refresh:3; url=dashboard.php?itemremoval=successful");
        }else{
        echo "<script> alert('Item listing removal failed.') </script>";
        header("refresh:3; url=dashboard.php?itemremoval=failed");
        }
    }else{
        echo "<script> alert('Item listing removal failed.') </script>";
        header("refresh:3; url=dashboard.php?itemremoval=failed");
    }

    
    mysqli_close($conn);
}
?>