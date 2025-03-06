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
    $sql = "SELECT * FROM accounts WHERE accEmail = '$email' AND pwd = '$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, login successful
        echo "Login successful";

        while ($row = mysqli_fetch_assoc($result)) {
            $uName = $row['accfName'] + ' ' + $row['acclName'];
            $_SESSION['username'] = $uName;
            
            
        }

        /*Creating a Cookie*/
        $cookie_name = "$uName";        
        $cookie_value = $email;
        setcookie($cookie_name, $cookie_value, time() + (4 * 3600), "/"); // 3600 = 1 hour
        //setcookie("role", $role, time() + (4 * 3600), "/"); // 3600 = 1 hour

        // Redirect the user to a dashboard or home page
        header("Location: ../index.php?login=successful");
        exit(); // Ensure script execution stops after redirect
    
    } else {
        // No user found with given credentials, login failed
        die("Invalid email or password");
    }
}

// Close connection
mysqli_close($conn);
?>