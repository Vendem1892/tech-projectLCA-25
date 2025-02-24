<?php
include_once 'dbh.inc.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieve signup form data
    $accID = 'SLT'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 18);
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];
    $dob = $_POST['dob'];

    // Insert signup data into database
    $sql = "INSERT INTO accounts (accID,accfName,acclName,accName,accEmail, pwd,dob) 
    VALUES ('$accID','$fName','$lName','$email', '$pwd','$dob')";


    if ($conn->query($sql) === TRUE) {
        echo "Signup successful";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();

$msg = "Your account has been registered.";


$msg = wordwrap($msg, 70);
$sent = mail($email, "Congratulations", $msg);
if (!$sent) {
    $errorMessage = error_get_last()['message'];
} else {
    header("Location: ../index.php");

}
