<?php
include_once '../includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accID = mysqli_real_escape_string($conn, $_POST['accID']);

    //Query to check if user exists in the database with given email and password
    $sql = "SELECT * FROM accounts WHERE accID = '$accID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User exists, create vendor id

        $sellID = 'SLV' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 18);

        //Insert data into seller table
        $sqlNewSell = "INSERT INTO sellers(sellerID, itemsSold,accID)
        VALUES('$sellID',0,'$accID');";


        if (mysqli_query($conn, $sqlNewSell) === TRUE) {            
            $sqlUp = "UPDATE accounts SET sellerID = '$sellID' WHERE accID = '$accID';";
            $resUp = mysqli_query($conn, $sqlUp);
            //Update accounts table with new seller ID
            if ($resUp === TRUE) {
                $sqlDel = "DELETE FROM sellregids WHERE accID = '$accID'";
                $resDel = mysqli_query($conn,$sqlDel);
                if ($resDel === TRUE){
                    echo "<script>alert('User: $accID seller account verified')</script>";                                
                    header("refresh:3; url=adminDashboard.php?verification=successful");
                }else{
                    echo "<script>alert('Deletion of User: $accID seller verification request failed')</script>";
                    header("refresh:3; url=adminDashboard.php?verificationrequestdel=failed");
                }
                
            } else {
                echo "<script>alert('Account table failed to update')</script>";
                header("refresh:3; url=adminDashboard.php?accupdate=failed");
            }
        } else {
            echo "<script>alert('Seller verification failed')</script>";
            header("refresh:3; url=adminDashboard.php?verification=failed");
        }


        

        exit(); // Ensure script execution stops after redirect

    } else {
        // No user found with given credentials, verification failed
        die("Invalid Account ID");
        header("refresh:3; url=adminDashboard.php?verification=failed");
    }
}
