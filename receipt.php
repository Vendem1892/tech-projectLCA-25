<?php
// Include the configuration file 
require_once 'config.php';

// Include the database connection file 
require_once 'dbConnect.php';
require_once 'includes/dbh.inc.php';
session_start();
if (isset($_SESSION['email'])) {
    $accID = $_SESSION['id'];
    $ordID = $_SESSION['ordID'];
}


$payment_ref_id = $statusMsg = '';
$status = 'error';

// Check whether the payment ID is not empty
if(!empty($_GET['checkout_ref_id'])){
	$payment_txn_id  = base64_decode($_GET['checkout_ref_id']);
	
	// Fetch transaction data from the database
	$sqlQ = "SELECT id,payer_id,payer_name,payer_email,payer_country,order_id,transaction_id,paid_amount,paid_amount_currency,payment_source,payment_status,created FROM transactions WHERE transaction_id = ?";
	$stmt = $db->prepare($sqlQ); 
	$stmt->bind_param("s", $payment_txn_id);
	$stmt->execute();
	$stmt->store_result();

	if($stmt->num_rows > 0){
		// Get transaction details
		$stmt->bind_result($payment_ref_id, $payer_id, $payer_name, $payer_email, $payer_country, $order_id, $transaction_id, $paid_amount, $paid_amount_currency, $payment_source, $payment_status, $created);
		$stmt->fetch();
		$sqliID = "SELECT itemID FROM shoppingcart WHERE accID = '$accID'";
		$resiID = mysqli_query($conn,$sqliID);
		while($row=mysqli_fetch_assoc($resiID)){
			$itemID = $row['itemID'];
			$sqlUp = "UPDATE items SET quantity = quantity - 1 WHERE itemID = '$itemID'";
			$resUp = mysqli_query($conn,$sqlUp);			
		}				
		$sqlD = "DELETE FROM shoppingcart WHERE accID = '$accID'";
        $resultD = mysqli_query($conn,$sqlD);
		$status = 'success';
		$statusMsg = 'Your Payment has been Successful!';
	}else{
		$statusMsg = "Transaction has been failed!";
	}
}else{
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PayPal Payment Status - Sir Arthur Lewis Trading Circle</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="bg-slate-400 h-screen">
	<div class="ml-2">
		<?php if(!empty($payment_ref_id)){ ?>
			<h1 class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h1>
			<br><br>

			<?php $paid_amount = number_format((float)$paid_amount, 2, '.', ''); ?>
			<h4 class="text-center font-bold text-2xl">Payment Information</h4><br>
			<p class='text-lg'><b class="text-xl">Reference Number:</b> <?php echo $payment_ref_id; ?></p>
			<p class='text-lg'><b class="text-xl">Order ID:</b> <?php echo $ordID; ?></p>
			<p class='text-lg'><b class="text-xl">Transaction ID:</b> <?php echo $transaction_id; ?></p>
			<p class='text-lg'><b class="text-xl">Paid Amount:</b> <?php echo '$'.$paid_amount.' '.$paid_amount_currency; ?></p>
			<p class='text-lg'><b class="text-xl">Payment Status:</b> <?php echo $payment_status; ?></p>
			<p class='text-lg'><b class="text-xl">Date:</b> <?php echo $created; ?></p>
			
			<h4 class="text-center font-bold text-2xl">Payer Information</h4><br>
			<p class='text-lg'><b class="text-xl">ID:</b> <?php echo $payer_id; ?></p>
			<p class='text-lg'><b class="text-xl">Name:</b> <?php echo $payer_name; ?></p>
			<p class='text-lg'><b class="text-xl">Email:</b> <?php echo $payer_email; ?></p>
			<p class='text-lg'><b class="text-xl">Country:</b> <?php echo $payer_country; ?></p>
			
			<h4 class="text-center font-bold text-2xl">Product Information</h4><br>
			<p class='text-lg'><b class="text-xl">Name:</b> <?php echo $itemName; ?></p>
			<p class='text-lg'><b class="text-xl">Price:</b> <?php echo '$'.$paid_amount.' '.$currency; ?></p>
		<?php }else{ ?>
			<h1 class="error">Your Payment failed!</h1>
			<p class="error"><?php echo $statusMsg; ?></p>
		<?php } ?>
	</div>
	<a href="index.php" class="bg-green-600 flex justify-center m-2 rounded-md">Back to Payment Page</a>
</div>
</body>
</html>