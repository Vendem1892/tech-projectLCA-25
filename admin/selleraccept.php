<?php
include_once '../includes/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accID = mysqli_real_escape_string($conn, $_POST['accID']);

    //Query to check if user exists in the database with given email and password
    $sql = "SELECT * FROM accounts WHERE email = '$email' AND pwd = '$pwd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User exists, create vendor id

        $sellID = 'SLV' . substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 18);

        //Insert data into seller table
        $sqlNewSell = "INSERT INTO sellers(sellerID, itemsSold,accID)
        VALUES('$sellID',0,'$accID');";


        if (mysqli_query($conn, $sqlNewSell) === TRUE) {
            echo "User: $accID seller account verified.";
            $sqlUp = "UPDATE accounts SET sellerID = $sellID WHERE accID = $accID;";
            //Update accounts table with new seller ID
            if (mysqli_query($conn, $sqlUp) === TRUE) {
                echo "User: $accID account table updated.";
                header("refresh:5; url=adminDashboard.php?verification=successful");
            } else {
                echo "Account table failed to update.";
                header("refresh:3; url=adminDashboard.php?accupdate=failed");
            }
        } else {
            echo "Seller verification failed.";
            header("refresh:3; url=adminDashboard.php?verification=failed");
        }


        

        exit(); // Ensure script execution stops after redirect

    } else {
        // No user found with given credentials, verification failed
        die("Invalid Account ID");
        header("refresh:3; url=adminDashboard.php?verification=failed");
    }
}
