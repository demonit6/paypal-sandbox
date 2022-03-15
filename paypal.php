<?php
include_once '../config.php';
include_once 'paypal-api.php';
use Paypal\Api\Payment\V1 as PaymentV1;

session_start();
$empty_cart_list = "<script>";
$empty_cart_list .= "alert('item does not exist');";
$empty_cart_list .= "window.location='index.php';";
$empty_cart_list .= "</script>";
if(empty($_SESSION['cart_list'])){
	exit($empty_cart_list);
}
$total_amount = 0;
$id = '';
foreach ($_SESSION['cart_list'] as $key => $value) {
	$total_amount += $value['price'];
}
$test = new PaymentV1();
$test->setClientID('AYvv0wHRoCmTRMIfgwGfukmBoDxk7BVOQkjCHAthgQPgGSUnQ5XmHbuz14Pxt1WR4AkRe1A9g_HDoe5A');
$test->setSecret('EJ7USsyae22fHBR0C8gP-NY1QIey8tgd-S_5IgO78PyRfXXnPXDkI3XVIKnvxrQ7E18BeORvnOU1m7GN');
$test->generateToken();
$access_token = $test->getAccessToken();
$_SESSION['access_token'] = $access_token;
$payloads = [
	"intent" => "sale",
	"payer" => [
		"payment_method" => "paypal"
	],
	"transactions" => [
		[
			"amount" => [
				"total" => "$total_amount",
				"currency" => "USD"
			]
		]
	],
	"note_to_payer" => "This Is Only Sample",
	"redirect_urls" => [
		"return_url" => burl()."r_return.php",
		"cancel_url" => burl()."r_cancel.php"
	]
];
$links = $test->createPayment($payloads);
$redir = $links['links'][1]['href'];
header('Location: '.$redir);