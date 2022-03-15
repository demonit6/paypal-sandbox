<?php
include_once '../config.php';
include_once 'paypal-api.php';
use Paypal\Api\Payment\V1 as PaymentV1;
session_start();
$msg = '';
$access_token = $_SESSION['access_token'];
$payment_id = $_GET['paymentId'];
$token = $_GET['token'];
$payer_id = ['payer_id' => $_GET['PayerID']];
$test = new PaymentV1();
$links = $test->confirmPayment($access_token, $payment_id, $payer_id);
session_destroy();
if(array_key_exists("failed_transactions", $links)){
	if(empty($links['failed_transactions'])){
		$msg = "payment has been successful";
	}
	else{
		$msg = "payment has failed";
	}
}
else{
	$msg = "Key does not exist!";
}
?>
<!DOCTYPE html>
<html lang="EN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shoping - Short Message</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= assets() ?>reset200802.css">
	<link rel="stylesheet" type="text/css" href="<?= assets() ?>reset.css">
	<link rel="stylesheet" type="text/css" href="<?= assets() ?>milligram.css">
	<link rel="stylesheet" type="text/css" href="<?= assets() ?>css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="column">
			<h1 class="text-center">Message : <?= $msg ?></h1>
			<h1 class="text-center">
				Info - <i class="fa fa-info-circle"></i>
			</h1>
			<blockquote>
				<p><em>Payment Id : <input type="text" value="<?= $payment_id ?>"></em></p>
			</blockquote>
			<blockquote>
				<p><em>Token : <input type="text" value="<?= $token ?>"></em></p>
			</blockquote>
			<blockquote>
				<p><em>Payer Id : <input type="text" value="<?= $payer_id['payer_id'] ?>"></em></p>
			</blockquote>
			<a href="index.php" class="button">
				<i class="fa fa-arrow-left"></i> Back
			</a>
		</div>
	</div>
</div>
</body>
</html>