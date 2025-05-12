<?php 
include_once '../includes/dbh.inc.php';

$id = mysqli_real_escape_string($conn,$_POST['adID']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

$sql = "SELECT * FROM accounts WHERE accID = '$id' AND pwd = '$pwd'";
$result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        // User exists, login successful
        echo "Login successful";

        while ($row = mysqli_fetch_assoc($result)) {            
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['accfName'].' '.$row['acclName'];                        
        }

        /*Creating a Cookie*/
        $cookie_value = $_SESSION['email'];
        setcookie('admin', $cookie_value, time() + (2 * 3600), "/"); // 3600 = 1 hour
        //setcookie("role", $role, time() + (4 * 3600), "/"); // 3600 = 1 hour

        // Redirect the user to a dashboard or home page
        header("Location: adminDashboard.php?login=successful");
        exit(); // Ensure script execution stops after redirect
    
    } else {
        // No user found with given credentials, login failed
        die("Invalid email or password");
        header("Location: adminlogin.php?login=failed");
    }


// Close connection
mysqli_close($conn);
?>
?>