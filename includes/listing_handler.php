<?php 

include_once "dbh.inc.php";

date_default_timezone_set('America/St_Lucia');
//$currDate = new DateTime();
$pricelimit = 541.00;

if($_SERVER["REQUEST_METHOD"] == "POST"){
$itemID = 'PT'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 20);
$iName = mysqli_real_escape_string($conn,$_POST['iName']);
$iDesc = mysqli_real_escape_string($conn,$_POST['iDesc']);
$iCat = mysqli_real_escape_string($conn,$_POST['iCat']);
$iPrice = $_POST['iPrice'];
$iAmt = mysqli_real_escape_string($conn,$_POST['iAmt']);
//$iDate = mysqli_real_escape_string($conn,$currDate);

if(isset($_POST['Submit'])){
	$iImg1 = $_FILES['img1'];
	$iImg2 = $_FILES['img2'];
	$iImg3 = $_FILES['img3'];
	$iImg1_fName = $_FILES['img1']['name'];
	$iImg2_fName = $_FILES['img2']['name'];
	$iImg3_fName = $_FILES['img3']['name'];
}
$iImg1_Alt = mysqli_real_escape_string($conn,$_POST['img1_Alt']);
$iImg2_Alt = mysqli_real_escape_string($conn,$_POST['img2_Alt']);
$iImg3_Alt = mysqli_real_escape_string($conn,$_POST['img3_Alt']);
$sellID = mysqli_real_escape_string($conn,$_POST['sellID']);


if ($iPrice > $pricelimit){
	echo "<script>alert('You entered an invalid price.')</script><br>";
	//header("refresh:5; url=../sell/listanitem.php?priceoflisting=invalid");
	//exit();
}

$sql = "INSERT INTO items(itemID, itemName, itemPrice, itemCategory, quantity, itemStatus, img1_fName, img1_AltText,  itemDescription, sellerID)
VALUES ('$itemID', '$iName', $iPrice, '$iCat',$iAmt,TRUE,'$iImg1_fName','$iImg1_Alt', '$iDesc','$sellID');";
$result = mysqli_query($conn,$sql);

if ($result === TRUE) {	
	$sql2 = "INSERT INTO item_images(itemID, img1_fName, img1_AltText, img2_fName, img2_AltText, img3_fName, img3_AltText)
	VALUES('$itemID','$iImg1_fName','$iImg1_Alt','$iImg2_fName','$iImg2_Alt','$iImg3_fName','$iImg3_Alt');";
	$result2 = mysqli_query($conn,$sql2);
	if($result2 === TRUE){
		echo "<script>alert('Item added successfully.')</script>";	
		header("refresh:3; url=../sell/dashboard.php?listingcreation=successful");	
	}else{
		echo "<script>alert('Images failed to upload.')</script>";
		header("refresh:3; url=../sell/dashboard.php?listingcreation=semi-failed");
	}

	
} else {
	echo "<script>alert('Listing creation failed.')</script>";
	header("refresh:3; url=../sell/listanitem.php?listingcreation=failed");
}
}
mysqli_close($conn);
?>