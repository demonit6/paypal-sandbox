<?php
include_once '../config.php';
include_once 'item.php';
session_start();
?>
<!DOCTYPE html>
<html lang="EN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shoping - Camera</title>
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
	<div id="panel">
		<div class="c-container">
			<div class="row">
				<div class="column">
					<a href="index.php">Product</a>
					<a href="https://github.com/demonit6">
						<i class="fa fa-github"></i> Github
					</a>
					<a href="cart_list.php">
						<i class="fa fa-shopping-cart"
						<?php if(!empty($_SESSION['cart_list'])) echo 'style="color: #771eb5; background-color: #FFF; border-radius: 10px;"'; ?>
						></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div id="product">
		<div class="container">
			<?php
			$loop = 0;
			$count_item = 0;
			foreach ($item as $key => $value) {
				if($loop == 0){
					echo '<div class="row">';
				}
				echo '<div class="column">
					<div class="product-list">
						<div class="product-list-detail">';
				echo "<h1 class=\"img-header text-center\">$value[name]</h1>";
				echo '<img alt="img" class="img-product" src="'.$value['img'].'">';
				echo "<div class=\"price-tag\"><i class=\"fa fa-usd\"></i>. $value[price]</div>";
				echo '<div class="description-product">';
				echo "<b>Start From : $. $value[price]</b>, good choice for photography.";
				echo '</div>';
				echo '<div class="div"></div>';
				echo '<div class="text-center">';
				echo '<a class="btn" href="add_cart.php?idcode='.$value['idcode'].'">';
				echo '<i class="fa fa-paypal"></i>&nbsp;&nbsp;&nbsp;PayPal';
				echo '</a>';
				echo '</div>';
				echo '</div>
					</div>
				</div>';
				$loop++;
				$count_item++;
				if($loop > 2 || $count_item == count($item)){
					echo '</div>';
					$loop = 0;
				}
			}
			?>
		</div>
	</div>
	<div id="footer">
		<i class="fa fa-heart"></i> FREE FOR FREE
	</div>
	<div id="to-up">
		<i class="fa fa-arrow-up"></i>
	</div>
	<script>
window.onscroll = function () { 
	if (document.body.scrollTop >= 800 || document.documentElement.scrollTop >= 800 ){
		document.getElementById('to-up').style.opacity = '1';
		document.getElementById('to-up').style.visibility = 'visible';
	}
	else{
		document.getElementById('to-up').style.opacity = '0';
		document.getElementById('to-up').style.visibility = 'hidden';
	}
}
document.getElementById('to-up').onclick = function(){
	document.querySelector('#product').scrollIntoView({
		behavior: 'smooth'
	});
}

	</script>
</body>
</html>