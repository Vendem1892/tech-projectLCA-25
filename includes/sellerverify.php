<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $govCard = mysqli_real_escape_string($conn, $_POST['govCard']);
    $salCard = mysqli_real_escape_string($conn, $_POST['govCard']);
    $accID = $_SESSION['id'];

    //Query to check if user exists in the database with given email and password
    $sql = "SELECT * FROM accounts WHERE email = '$email' AND pwd = '$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, create vendor id
    
        $sellID =  'SLV'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 18);
        
        //Insert data into seller table
        $sql = "INSERT INTO sellers(sellerID, itemsSold,accID)
        VALUES('$sellID',0,'$accID');";
        $result = $conn->query($sql);
        
        //Update accounts table with new seller ID
        $sqlUp = "UPDATE accounts SET sellerID = $sellID WHERE accID = $accID;";
        $result = $conn->query($sql);

        $_SESSION['sellID'] = $sellID;

        // Redirect the user to a dashboard or home page
        header("Location: ../sell/dashboard.php?verification=successful");
        exit(); // Ensure script execution stops after redirect
    
    } else {
        // No user found with given credentials, verification failed
        die("Invalid email or password");
    }
}

// Close connection
mysqli_close($conn);

?>