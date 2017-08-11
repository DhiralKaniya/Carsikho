<?php
include("db.php");

$file = file_get_contents('http://api.fixer.io/latest?base=USD');
    
$fdecode = json_decode($file);

$rate = $fdecode->rates;
$inr = $rate->INR;

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='info@codexworld.com'; // Business email ID






$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
$item_price         = $_REQUEST['amt']; // Paypal received amount
$item_currency      = $_REQUEST['cc']; // Paypal received currency type
$status 			 = $_REQUEST['st'];

$payment_amount = $item_price*$inr;
$ins = "insert into payments(txnid,payment_amount,payment_status,itemid) values('$item_transaction','$payment_amount','$status','$item_no')";
$conn->query($ins);

header("refresh:10 ; url=index.php");
 
//Rechecking the product price and currency details


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Payment Successfull!!!!</h1>
</body>
</html>