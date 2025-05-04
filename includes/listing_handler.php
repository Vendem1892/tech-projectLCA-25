<?php 

include_once "dbh.inc.php";

date_default_timezone_set('America/St_Lucia');
$currDate = new DateTime();
$pricelimit = 800;

$itemID = 'PT'. substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 20);
$iName = mysqli_real_escape_string($conn,$_POST['iName']);
$iCat = mysqli_real_escape_string($conn,$_POST['iCategory']);
$iPrice = mysqli_real_escape_string($conn,$_POST['iPrice']);
$itemAmt = mysqli_real_escape_string($conn,$_POST['iAmt']);
$itemDate = $currDate;
//new DateTime(mysqli_real_escape_string($conn,$_POST['iDate']));
$iImg1 = mysqli_real_escape_string($conn,$_POST['iImg1']);
$iImg1_Alt = mysqli_real_escape_string($conn,$_POST['iImg1_Alt']);
$iImg2 = mysqli_real_escape_string($conn,$_POST['iImg2']);
$iImg2_Alt = mysqli_real_escape_string($conn,$_POST['iImg2_Alt']);
$iImg3 = mysqli_real_escape_string($conn,$_POST['iImg3']);
$iImg3_Alt = mysqli_real_escape_string($conn,$_POST['iImg3_Alt']);
$sellID = mysqli_real_escape_string($conn,$sellID);

if ($iPrice > $priceLimit){
	header("location ../sell/listanitem.php?priceoflisting=invalid");
	exit();
}

$sql = "INSERT into items(itemID, itemName,  itemPrice, itemCategory, quantity, itemDate, itemStatus, img1_fName, img1_Alt, img2_fName, img2_Alt, img3_fName, img3_Alt, sellerID)
VALUES ('$itemID', '$iName',$iPrice, '$iCat',$iAmt,'$iDate',TRUE,'$iImg1','$iImg1_Alt','$iImg2','$iImg2_Alt','$iImg3','$sellID');";

if (mysqli_query($conn,$sql)) {
	echo "Item added successfully";
	mysqli_close($conn);
	header("refresh:5; url=../sell/listanitem.php?listingcreation=successful");
	exit();
} else {
	echo "Listing creation failed.";
	mysqli_close($conn);
	header("refresh:5; url=../sell/listanitem.php?listingcreation=failed");
}

?>