<?php
include_once "dbh.inc.php";

$rep_reason = mysqli_real_escape_string($conn,$_POST['repReason']);
$itemID = mysqli_real_escape_string($conn,$_POST['itemID']);


$sql = "INSERT INTO reports(itemID,rep_reason)
VALUES ('$itemID','$rep_reason');";
$result = mysqli_query($conn,$sql);

if ($result === TRUE) {
	echo "<script>alert('New report created successfully.')</script>";	
	header("refresh:5; url=../index.php");	
} else {
	echo "<script>alert('Failed to create report.')</script>";
	header("refresh:5; url=../index.php");
}

mysqli_close($conn);
?>