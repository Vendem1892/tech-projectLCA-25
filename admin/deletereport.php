<?php 

include_once '../includes/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $repID = mysqli_real_escape_string($conn,$_POST['repID']);

    $sql = "DELETE FROM reports WHERE itemID = '$repID'";
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