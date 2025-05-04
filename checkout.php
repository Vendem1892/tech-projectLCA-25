<?php
include_once 'includes/functions.php';
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sir Arthur Lewis Trading Circle</title>
    <!-- Load the client component. -->
    <script src="https://js.braintreegateway.com/web/3.111.0/js/client.min.js"></script>
    <!-- Load the PayPal Checkout component. -->
    <script src="https://js.braintreegateway.com/web/3.111.0/js/paypal-checkout.min.js"></script>
</head>

<body class="font-sans">
    <?php dispHeaderShop(); ?>
    <div class="bg-gray-300">
        <?php
        $accID = $_SESSION['id'];
        $orderPrice = 0;
        $sql = "SELECT * FROM shoppingcart WHERE accID = $accID;";
        $sql2 = "SELECT FROM items WHERE itemID = $itemID;";        
        $result = mysqli_query($conn, $sql);
        $resItem = mysqli_query($conn,$sql2);                    
?>
        
            <div class='bg-slate-400 font-normal static col-span-3' id='cart'>
                <h2 class='text-3xl text-black'>Order Summary</h2>
                <ul class='flex flex-row'>
                <?php 
                if (mysqli_num_rows($result) <= 0) {
                    echo "<p class='text-black self-center italic'>No Items in Cart</p>";
                    exit();
                }
        
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemID = $row['itemID'];
                    while($row2 = mysqli_fetch_assoc($resItem)){
        
                
                        $iTitle = $row['itemName'];
                        $iDesc = $row['itemDescription'];
                        $iCat = $row['itemCategory'];
                        $iPrice = $row['itemPrice'];
                        $iDate = $row['itemDate'];
                        $img1 = $row['img1_fName'];
                        $imgAlt1 = $row['img1_altText'];                                                    
        
                ?>
                    <li class=" w-1/4">
                        <div class='bg-slate-200'>
                            <img href='<?php echo $img ?>' alt='<?php echo $imgAlt1 ?>' class='h-5 w-5 overflow-auto shadow-lg'>
                            <hr>
                            <div class="float-left md:text-clip">
                                <h4 class="text-lg"><?php echo $iTitle ?></h4>
                                <br>                                
                                <h6 class="text-base"><?php echo '$' . $iPrice ?></h6>
                                <br><br>
                            </div>
                        </div>
                        <hr>
                    <?php $orderPrice = +$iPrice;
                }
            }
                    ?>
                    </li>
                </ul>
            </div>
            <div class="bg-slate-300 float-right col-span-2" id="checkoutPage">
                <div id="paypal-button"></div>
                <!-- <button class="bg-yellow-500 hover:bg-yellow-600 focus:outine-2 focus:outine-black active:bg-yellow-600 text-center  text-slate-300" id="paypal-button">
                    Pay with PayPal
                </button> !-->
                <label id="priceXCD">XCD Price: </label>
                <p class="inline-flex text-black font-semibold"><?php echo "'$' . $orderPrice"; ?></p>
                <label id="priceUSD">USD Price: </label>
                <p class="inline-flex text-black font-semibold">
                    <?php
                    $priceUS = $orderPrice / 2.7;
                    echo "'$' . $priceUS";
                    ?>
                </p>
            </div>
            <script>                
                // Create a PayPal Checkout component.
                // Create a client.
                braintree.client.create({
                    authorization: CLIENT_AUTHORIZATION
                }, function(clientErr, clientInstance) {

                    // Stop if there was a problem creating the client.
                    // This could happen if there is a network error or if the authorization
                    // is invalid.
                    if (clientErr) {
                        console.error('Error creating client:', clientErr);
                        return;
                    }

                    // Create a PayPal Checkout component.
                    braintree.paypalCheckout.create({
                        client: clientInstance
                    }, function(paypalCheckoutErr, paypalCheckoutInstance) {

                        // Stop if there was a problem creating PayPal Checkout.
                        // This could happen if there was a network error or if it's incorrectly
                        // configured.
                        if (paypalCheckoutErr) {
                            console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
                            return;
                        }

                        // Load the PayPal JS SDK (see Load the PayPal JS SDK section)
                        paypalCheckoutInstance.loadPayPalSDK(function(loadSDKErr) {
                            // The PayPal script is now loaded on the page and
                            // window.paypal.Buttons is now available to use

                            // render the PayPal button (see Render the PayPal Button section)
                            braintree.paypalCheckout.create({
                                client: clientInstance
                            }, function(paypalCheckoutErr, paypalCheckoutInstance) {
                                // Base PayPal SDK script options
                                var loadPayPalSDKOptions = {
                                    currency: 'USD', // Must match the currency passed in with createPayment
                                    intent: 'capture' // Must match the intent passed in with createPayment
                                }

                                paypalCheckoutInstance.loadPayPalSDK(loadPayPalSDKOptions, function() {
                                    paypal.Buttons({
                                        fundingSource: paypal.FUNDING.PAYPAL,

                                        createOrder: function() {
                                            // Base payment request options for one-time payments
                                            var createPaymentRequestOptions = {
                                                flow: 'checkout', // Required
                                                amount: <?php echo $orderPrice;?>, // Required
                                                currency: 'USD', // Required, must match the currency passed in with loadPayPalSDK

                                                intent: 'capture', // Must match the intent passed in with loadPayPalSDK
                                            };

                                            return paypalCheckoutInstance.createPayment(createPaymentRequestOptions);
                                        },

                                        onApprove: function(data, actions) {
                                            return paypalCheckoutInstance.tokenizePayment(data, function(err, payload) {
                                                // Submit 'payload.nonce' to your server
                                            });
                                        },

                                        onCancel: function(data) {
                                            console.log('PayPal payment cancelled', JSON.stringify(data, 0, 2));
                                        },

                                        onError: function(err) {
                                            console.error('PayPal error', err);
                                        }
                                    }).render('#paypal-button').then(function() {
                                        // The PayPal button will be rendered in an html element with the ID
                                        // 'paypal-button'. This function will be called when the PayPal button
                                        // is set up and ready to be used
                                    });
                                });
                            });
                        });
                    });

                });
            </script>
</body>

</html>