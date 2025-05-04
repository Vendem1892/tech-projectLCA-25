<?php 
include_once '../includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $accID = mysqli_real_escape_string($conn,$_POST['accID']);

    $sql = "DELETE FROM sellregids WHERE accID = '$accID'";
    $result = mysqli_query($conn,$sql);     

    if($result === TRUE){
        echo "Seller registration from User: $accID has been removed.";
        header("refresh:5; url=adminDashboard.php?registration=denied");
        mysqli_close($conn);
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
        header("refresh:5; url=adminDashboard.php");
        mysqli_close($conn);
    }
}

?>