<?php

include_once 'dbh.inc.php';
session_start();
$_SESSION = array();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdRep = mysqli_real_escape_string($conn, $_POST['pwd-rep']);    

    //Query to check if user exists in the database with given username and password
    $sql = "SELECT * FROM accounts WHERE email = '$email' AND pwd = '$pwd'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
    if (mysqli_num_rows($result) > 0) {
        // User exists, login successful
        echo "Login successful";

        while ($row = mysqli_fetch_assoc($result)) {            
            $_SESSION['id'] = $row['accID'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['accfName'].$row['acclName'];
            
            if($row['sellerID'] != NULL){
                $_SESSION['sellID'] = $row['sellerID'];
            }
            if($row['sellerID'] != NULL){
                $_SESSION['sellID'] = $row['sellerID'];
            }
        }

        /*Creating a Cookie*/
        $cookie_name = $_SESSION['name'];        
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (2 * 3600), "/"); // 3600 = 1 hour        

        // Redirect the user to a dashboard or home page
        header("refresh:5; url=../index.php?login=successful");
        exit(); // Ensure script execution stops after redirect
    
    } else {
        // No user found with given credentials, login failed
        die("Invalid email or password");
        header("Location: ../login.php?login=failed");
        header("Location: ../login.php?login=failed");
    }
}

// Close connection
mysqli_close($conn);
?>