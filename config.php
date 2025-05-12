<?php
// Product Details
$itemNumber = "DP12345";
$itemName = "Demo Product";
$currency = "USD";

/* PayPal REST API configuration
 * You can generate API credentials from the PayPal developer panel.
 * See your keys here: https://developer.paypal.com/dashboard/
 */
define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production
// PayPal API keys for Sandbox
define('PAYPAL_SANDBOX_CLIENT_ID', 'AdE0H-ASoUbddz1WcVDXukB6oUhC8YLYulZIHouGN4Ztlnkz7O_gUlx-_aWBrp53HGA8777ihpoQBil5');
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EDnnrHCDiNB8EqhPK7z0NsSBa-rcyEVwMQ9WYgHptisQMcMbOKnHJHmRGBUDCLKgM-6wt6U1iGf0uT5C');
// PayPal API keys for Production
define('PAYPAL_PROD_CLIENT_ID', 'Insert_Live_PayPal_Client_ID_Here');
define('PAYPAL_PROD_CLIENT_SECRET', 'Insert_Live_PayPal_Secret_Key_Here');


/* Database configuration
 * Database host, username, password, and name
 */
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'saltradcircdb');