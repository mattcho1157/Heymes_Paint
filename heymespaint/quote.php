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
	
	<title>Heymes Paint | Paint Calculator</title>
	<link href="img/logo.png" rel="icon" type="image/png">
</head>
<body>
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

	<div class="banner">
		<h1>PAINT CALCULATOR</h1>
	</div>

    <div class="main" style="padding: 30px 10%;">
	<?php
	printf('<p>QUOTE ON %s SAVED ROOMS:<p>', count($_SESSION['roomArray']));

	// accumulated totals & price
	$surfacePrice = 30 * ceil($_SESSION['totSurface']);
	$doorPrice = 150 * $_SESSION['totDoors'];
	$windowPrice = 250 * $_SESSION['totWindows'];

	$totPrice = $surfacePrice + $doorPrice + $windowPrice;
	$surfacePaint = $_SESSION['totSurface'] / 12;
	?>

	<h3>Room Summary</h3>
	<table class="table table-bordered">
		<tr class="info">
			<th>Room Name</th>
			<th>New/Repaint</th>
			<th>Furniture Removal</th>
			<th>Length (m)</th>
			<th>Width (m)</th>
			<th>Height (m)</th>
			<th>Doors</th>
			<th>Windows</th>
		</tr>
		<?php
		// displaying room info retrieved from list of saved rooms
		foreach ($_SESSION['dimensionArray'] as $room) { 
			echo '<tr>';
			foreach ($room as $attr) {
				printf('<td>%s</td>', $attr);
			}
			echo '</tr>';
		}
		?>
	</table>

	<h3>Paint Summary</h3>
	<table class="table table-bordered">
		<tr class="info">
			<th rowspan="2" width="120">Room Name</th>
			<th colspan="2">Undercoat</th>
			<th colspan="2">Floor</th>
			<th colspan="2">Walls</th>
			<th colspan="2">Ceiling</th>
			<th colspan="2">Doors/ Windows/ Trim</th>
		</tr>
		<tr class="info paint-summary-subheading">
			<td>Coats</td><td>Paint</td>
			<td>Coats</td><td>Paint</td>
			<td>Coats</td><td>Paint</td>
			<td>Coats</td><td>Paint</td>
			<td>Coats</td><td>Paint</td>
		</tr>
		<?php
		// displaying paint info retrieved from list of saved rooms
		$imgFiles = ['undercoat', 'floor', 'wall', 'ceiling', 'dwt'];
		foreach ($_SESSION['paintArray'] as $room) { 
			echo '<tr>';
			printf('<td>%s</td>', $room[0]);
			for ($i=1; $i <= 5; $i++) { 
				$numCoats = $room[2*$i-1];
				$paintPNG = $room[2*$i];
				if ($numCoats != 0) {
					printf('<td width="80">%s</td>', $numCoats);
					printf('<td><img width="75" src="img/%s/%s.png"></td>', $imgFiles[$i-1], $paintPNG);
				} else {
					printf('<td colspan="2" height="80">NONE</td>');
				}
			}
			echo '</tr>';
		}
		?>
	</table>

	<h3>Accumulated Totals</h3>
	<table class="table table-bordered">
		<tr class="info">
			<th width="450">Item</th>
			<th>Amount</th>
			<th>Cost</th>
		</tr>
		<tr>
			<td class="align-left">Surface to be Painted (m<sup>2</sup> or part thereof)</td>
			<td><?php echo $_SESSION['totSurface']; ?></td>
			<td class="align-right"><?php printf('$%.2f',$surfacePrice); ?></td>
		</tr>
		<tr>
			<td class="align-left">Doors to be Painted</td>
			<td><?php echo $_SESSION['totDoors']; ?></td>
			<td class="align-right"><?php printf('$%.2f',$doorPrice); ?></td>
		</tr>
		<tr>
			<td class="align-left">Windows to be Painted</td>
			<td><?php echo $_SESSION['totWindows']; ?></td>
			<td class="align-right"><?php printf('$%.2f',$windowPrice); ?></td>
		</tr>
		<tr>
			<th colspan="2" class="align-right">Quote Total</th>
			<td class="align-right"><?php printf('<strong>$%.2f</strong>',$totPrice); ?></td>
		</tr>
	</table>
	<h3>Total Amount of Paint Required: <?php printf('<strong>%.2f</strong>',$surfacePaint); ?>L</h3><br>

	<a class="btn btn-primary" href="calculator.php">Add More Rooms</a>
	<a class="btn btn-danger" href="./">Start Over</a>
	</div>
</body>
</html>