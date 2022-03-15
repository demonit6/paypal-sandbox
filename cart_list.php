<?php
include_once '../config.php';
include_once 'item.php';
session_start();
$empty_cart_list = "<script>";
$empty_cart_list .= "alert('item does not exist');";
$empty_cart_list .= "window.location='index.php';";
$empty_cart_list .= "</script>";
if(empty($_SESSION['cart_list'])){
	exit($empty_cart_list);
}
?>
<!DOCTYPE html>
<html lang="EN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shoping - Chart List</title>
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
			<h1 class="text-center">Basket</h1>
			<table>
				<thead>
					<tr>
						<th>Picture</th>
						<th>Basket Id</th>
						<th>Id-Code</th>
						<th>Name</th>
						<th>Type</th>
						<th>Item Count</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$total_amount = 0;
					foreach ($_SESSION['cart_list'] as $key => $value) {
					?>
					<tr>
						<td>
							<img alt="img" src="<?= $value['img'] ?>" class="img-thumb">
						</td>
						<td>
							<?= $value['id'] ?>
						</td>
						<td>
							<?= $value['idcode'] ?>
						</td>
						<td>
							<?= $value['name'] ?>
						</td>
						<td>
							<?= $value['type'] ?>
						</td>
						<td>
							1
						</td>
						<td>
							<i class="fa fa-usd"></i>. <?= $value['price'] ?>
						</td>
					</tr>
					<?php
					$total_amount += $value['price'];
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="6">
							Total Amount
						</th>
						<th><i class="fa fa-usd"></i>. <?= $total_amount ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="column">
			<a href="index.php" class="button">
				<i class="fa fa-arrow-left"></i> Back
			</a>
			<a href="clear_cart.php" class="button">
				<i class="fa fa-trash"></i> Clear Basket
			</a>
			<a href="paypal.php" class="button">
				<i class="fa fa-paypal"></i> CheckOut
			</a>
		</div>
	</div>
</div>
</body>
</html>