<?php 
include_once 'dbh.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $govCard = mysqli_real_escape_string($conn, $_POST['govCard_fName']);
    $salCard = mysqli_real_escape_string($conn, $_POST['salCard_fName']);
    $accID=$_SESSION['id'];

    $sqlVer = "SELECT * FROM accounts WHERE email = '$email' AND pwd = '$pwd'";
    $resVer = mysqli_query($conn,$sqlVer);

    if (mysqli_num_rows($resVer) > 0){
        $sql= "INSERT INTO sellRegIDs(accID,studID_img,govID_img)
    VALUES('$accID','$govCard','$salCard')";
    $result = mysqli_query($conn,$sql);
    
    if($result === TRUE){
        echo "Seller registration information updated.";
        header("refresh:5; url=../index.php");
    }else{
        $err = mysqli_error($conn,$sql);
        echo "Error: $sql <br> $err";  
        header("refresh:5; url=adminDashboard.php");
    }
    }else{
        die('Requested account does not exist');
        
    }
    
}

// Close connection
mysqli_close($conn);

?>