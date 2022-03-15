<?php
include_once '../config.php';
include_once 'item.php';
session_start();
$cart_list = [];
$idcode = !empty($_GET['idcode']) ? $_GET['idcode'] : '';
if(!empty($_SESSION['cart_list'])){
	$cart_list = $_SESSION['cart_list'];
}
$check = false;
foreach ($item as $key => $value) {
	if($value['idcode'] == $idcode){
		$count_cart_list = count($cart_list);
		$cart_list[$count_cart_list]['id'] = $count_cart_list + 1;
		$cart_list[$count_cart_list]['idcode'] = $value['idcode'];
		$cart_list[$count_cart_list]['name'] = $value['name'];
		$cart_list[$count_cart_list]['type'] = $value['type'];
		$cart_list[$count_cart_list]['img'] = $value['img'];
		$cart_list[$count_cart_list]['price'] = $value['price'];
		$_SESSION['cart_list'] = $cart_list;
		$check = true;
	}
}
if(!$check){
	echo "<script>";
	echo "alert('item does not exist');";
	echo "window.location='index.php';";
	echo "</script>";
}
else{
	echo "<script>";
	echo "alert('item added successfully');";
	echo "window.location='cart_list.php';";
	echo "</script>";
}