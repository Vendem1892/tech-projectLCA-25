<?php 
include_once 'dbh.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if(isset($_POST['Register'])){
        $govCard = $_FILES['govCard'];
        $salCard = $_FILES['salCard'];
        $govCard_fName = $_FILES['govCard']['name'];
        $salCard_fName = $_FILES['salCard']['name'];
    }
    $accID = mysqli_real_escape_string($conn,$_POST['accID']);    
    $sqlVer = "SELECT * FROM accounts WHERE email = '$email'";
    $resVer = mysqli_query($conn,$sqlVer);

    if (mysqli_num_rows($resVer) > 0){
        $row = mysqli_fetch_assoc($resVer);
        $verify = password_verify($pwd,$row['pwd']);            
        if($verify){
            $sql= "INSERT INTO sellRegIDs(accID,studID_img,govID_img)
            VALUES('$accID','$govCard_fName','$salCard_fName')";
            $result = mysqli_query($conn,$sql);
            if($result === TRUE){
                echo "<script>alert('Seller registration information uploaded')</script>";
                header("refresh:5; url=../index.php");
            }else{
                $err = mysqli_error($conn,$sql);
                echo "Error: $sql <br> $err";  
                header("refresh:5; url=../becomeseller.php");
            }
        }else{
            echo "<script>alert('Passwords do not match')</script>";
        }
    
        }else{
        die('Requested account does not exist');
        header("refresh:5; url=../becomeseller.php");
    }

    }
    


// Close connection
mysqli_close($conn);

?>