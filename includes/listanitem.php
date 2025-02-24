<?php 

include_once "dbh.inc.php";

date_default_timezone_set('America/St_Lucia');
$currDate = new DateTime();
$pricelimit = 200;

$itemID = 'PT'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 20);
$itemName = mysqli_real_escape_string($conn,$_POST['itemTitle']);
$itemPrice = mysqli_real_escape_string($conn,$_POST['itemPrice']);
$itemDate = new DateTime(mysqli_real_escape_string($conn,$_POST['iDate']));
$itemStatus = mysqli_real_escape_string($conn,$_POST['itemStatus']);
$sellID = mysqli_real_escape_string($conn,$sellID);


$sql = "INSERT into appointments(appointID, patientfName, patientlName, appointDate,appointPurpose,username,patientID,docID,accountID)
VALUES ('$appointID', '$fName','$lName','$appointDate','$appointPurpose','$uName','$patientID','$docID');";

if (mysqli_query($conn,$sql)) {
	echo "New records added successfully";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

header("location ../index.php?insert=successful");

mysqli_close($conn);
?>