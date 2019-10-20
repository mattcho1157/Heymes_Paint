<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="heymespaint.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/bs/js/bootstrap.min.js"></script>
	
	<title>Heymes Paint</title>
	<link href="img/logo.png" rel="icon" type="image/png">
</head>
<body>
	<?php
	$_SESSION['init'] = true;
	?>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./"><img src="img/logo.png" height="45"></a>
			</div>
			<div class="collapse navbar-collapse" id="main-navbar">
				<ul class="nav navbar-nav">
					<li><a href="https://www.haymespaint.com.au/explore-colours/">EXPLORE COLOURS</a></li>
					<li><a href="https://www.haymespaint.com.au/products/product-information/">OUR PRODUCTS</a></li>
					<li><a href="https://www.haymespaint.com.au/inspiration/">INSPIRATION</a></li>
					<li><a href="https://www.haymespaint.com.au/about-us/">ABOUT US</a></li>
					<li><a href="https://www.haymespaint.com.au/find-a-store/">FIND A STORE</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="index-banner">
		<h1>HEYMES PAINT</h1>
	</div>

	<div>
		<h2 class="sub-banner">AUSTRALIA'S FIRST PAINT FAMILY</h2>
	</div>

	<img src="img/indexwall.jpg" style="width: 100%; position: relative; top: -20px;">

	<div class="main">
	<div style="text-align: center;">
		<h2>It took a great Aussie paint family to make the great Aussie family paint.</h2><br>
		<h3>BORN IN BALLARAT IN 1935, OUR FAMILY RUN BUSINESS IS NOW IN THE HANDS OF THE FOURTH GENERATION OF HAYMES</h3><br>
		<p>Over the years, each member has taken care to hand on the commitment and passion for crafting quality products. After all, it is our name and reputation on the can. We live and breathe our values of individuality, independence and integrity. It's why you can be sure we'll never treat you like a number, never take shortcuts with the quality of our products or our service and why you'll find us at exclusive paint retailers.</p><br>
	</div>

	<h2>Paint Calculator</h2>
	<p>Our paint calculator helps you to estimate how much paint you will need for your project and the total estimated cost. Will your paint project fall under your tight budget?</p>
	<p>GET YOUR MEASURING TAPE, TELL US ABOUT YOUR ROOM, AND LET'S FIND OUT!</p>
	<a class="btn btn-primary" href="calculator.php">Get Quote</a>
	</div>

</body>
</html>