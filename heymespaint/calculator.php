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

	<script type="text/javascript">
		$(document).ready(function(){
			$('.paint-select').change(function(){
				var optionVal = $(this).val();
				var paintRadio = '#paint-radio-' + $(this).attr('id')
				if (optionVal == '0') {
					$(paintRadio).collapse('hide');
				} else {
					$(paintRadio).collapse('show');
				}
			});
		});
	</script>
</head>
<body>

	<?php
	if ($_SESSION['init'] == true) {
		// initialise all session variables
		$_SESSION['roomArray'] = [];
		$_SESSION['dimensionArray'] = [];
		$_SESSION['paintArray'] = [];
		$_SESSION['totSurface'] = 0;
		$_SESSION['totDoors'] = 0;
		$_SESSION['totWindows'] = 0;
		$_SESSION['init'] = false;
	}
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

	<div class="banner">
		<h1>PAINT CALCULATOR</h1>
	</div>

	<div class="main">
	<form name="quote" action="calculator.php" method="POST">
		<fieldset class="form-group">
			<legend class="set-legend"><span>1</span> PROJECT INFO</legend>

			<div class="form-group col-xs-12 col-sm-4">
				<label for="room">Room Name</label>
				<input class="form-control" type="text" name="room" id="room" required>
			</div>

			<fieldset class="form-group radio-group col-xs-12 col-sm-8">
				<legend>Paint Job</legend>
				<label class="radio-inline"><input type="radio" name="paint" value="New" checked> New</label>
				<label class="radio-inline"><input type="radio" name="paint" value="Repaint"> Repaint</label>
			</fieldset>

			<fieldset class="form-group radio-group col-xs-12 col-sm-8">
				<legend>Furniture Removal Service</legend>
				<label class="radio-inline"><input type="radio" name="furniture" value="Requested" checked> Request</label>
				<label class="radio-inline"><input type="radio" name="furniture" value="Unrequested"> Unrequest</label>
			</fieldset>
		</fieldset>

		<fieldset class="form-group">
			<legend class="set-legend"><span>2</span> SURFACE DIMENSION</legend>
			<div>
				<div class="form-group col-xs-12 col-sm-4">
					<label for="length">Length (m)</label>
					<input class="form-control" type="number" name="length" id="length" min="1" max="500" step="0.01" required>
				</div>
				<div class="form-group col-xs-12 col-sm-4">
					<label for="width">Width (m)</label>
					<input class="form-control" type="number" name="width" id="width" min="1" max="500" step="0.01" required>
				</div>
				<div class="form-group col-xs-12 col-sm-4">
					<label for="height">Height (m)</label>
					<input class="form-control" type="number" name="height" id="height" min="1" max="500" step="0.01" required>
				</div>
			</div>

			<div>
				<div class="form-group col-xs-12 col-sm-4">
					<label for="doors">No. Doors</label>
					<input class="form-control" type="number" name="doors" id="doors" min="0" max="500" step="1" required>
				</div>
				<div class="form-group col-xs-12 col-sm-4">
					<label for="windows">No. Windows</label>
					<input class="form-control" type="number" name="windows" id="windows" min="0" max="500" step="1" required>
				</div>
			</div>
		</fieldset>

		<fieldset class="form-group">
			<legend class="set-legend"><span>3</span> PAINT & COATING</legend>

			<fieldset class="form-group">
				<legend>Undercoat</legend>
				<div class="form-group col-xs-12 col-md-4">
					<label for="undercoat">No. Coats</label>
					<select class="form-control paint-select" name="undercoat" id="undercoat">
						<option value="0">None</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</div>
				<fieldset class="form-group radio-group collapse paint-radio-fieldset col-xs-12 col-md-8" id="paint-radio-undercoat">
					<legend>Undercoat Paint Type</legend>
					<label><input type="radio" name="undercoatPaint" value="ELacrylic" checked><img src="img/undercoat/ELacrylic.png"></label>
					<label><input type="radio" name="undercoatPaint" value="ELquickdry"><img src="img/undercoat/ELquickdry.png"></label>
					<label><input type="radio" name="undercoatPaint" value="NLsealer"><img src="img/undercoat/NLsealer.png"></label>
					<label><input type="radio" name="undercoatPaint" value="UPultracover"><img src="img/undercoat/UPultracover.png"></label>
					<label><input type="radio" name="undercoatPaint" value="UPultralock"><img src="img/undercoat/UPultralock.png"></label>
					<label><input type="radio" name="undercoatPaint" value="UPultraseal"><img src="img/undercoat/UPultraseal.png"></label>
				</fieldset>
			</fieldset>

			<fieldset class="form-group">
				<legend>Floor</legend>
				<div class="form-group col-xs-12 col-md-4">
					<label for="floor">No. Coats</label>
					<select class="form-control paint-select" name="floor" id="floor">
						<option value="0">None</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<fieldset class="form-group radio-group collapse paint-radio-fieldset col-xs-12 col-md-8" id="paint-radio-floor">
					<legend>Floor Paint Type</legend>
					<label><input type="radio" name="floorPaint" value="quickpave" checked><img src="img/floor/quickpave.png"></label>
					<label><input type="radio" name="floorPaint" value="SWaqualac"><img src="img/floor/SWaqualac.png"></label>
					<label><input type="radio" name="floorPaint" value="SWtungoil"><img src="img/floor/SWtungoil.png"></label>
					<label><input type="radio" name="floorPaint" value="ULepoxy"><img src="img/floor/ULepoxy.png"></label>
					<label><input type="radio" name="floorPaint" value="ULnonslip"><img src="img/floor/ULnonslip.png"></label>
					<label><input type="radio" name="floorPaint" value="ULpolyurethane"><img src="img/floor/ULpolyurethane.png"></label>
				</fieldset>
			</fieldset>

			<fieldset class="form-group">
				<legend>Walls</legend>
				<div class="form-group col-xs-12 col-md-4">
					<label for="walls">No. Coats</label>
					<select class="form-control paint-select" name="walls" id="walls">
						<option value="0">None</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<fieldset class="form-group radio-group collapse paint-radio-fieldset col-xs-12 col-md-8" id="paint-radio-walls">
					<legend>Walls Paint Type</legend>
					<label><input type="radio" name="wallsPaint" value="ELinterior" checked><img src="img/wall/ELinterior.png"></label>
					<label><input type="radio" name="wallsPaint" value="ELtrim"><img src="img/wall/ELtrim.png"></label>
					<label><input type="radio" name="wallsPaint" value="NLacrylic"><img src="img/wall/NLacrylic.png"></label>
					<label><input type="radio" name="wallsPaint" value="NLenamel"><img src="img/wall/NLenamel.png"></label>
					<label><input type="radio" name="wallsPaint" value="UPexpressions"><img src="img/wall/UPexpressions.png"></label>
					<label><input type="radio" name="wallsPaint" value="UPtrim"><img src="img/wall/UPtrim.png"></label>
				</fieldset>
			</fieldset>

			<fieldset class="form-group">
				<legend>Ceiling</legend>
				<div class="form-group col-xs-12 col-md-4">
					<label for="ceiling">No. Coats</label>
					<select class="form-control paint-select" name="ceiling" id="ceiling">
						<option value="0">None</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</div>
				<fieldset class="form-group radio-group collapse paint-radio-fieldset col-xs-12 col-md-8" id="paint-radio-ceiling">
					<legend>Ceiling Paint Type</legend>
					<label><input type="radio" name="ceilingPaint" value="ELceiling" checked><img src="img/ceiling/ELceiling.png"></label>
					<label><input type="radio" name="ceilingPaint" value="NLceiling"><img src="img/ceiling/NLceiling.png"></label>
					<label><input type="radio" name="ceilingPaint" value="UPexpressions"><img src="img/ceiling/UPexpressions.png"></label>
				</fieldset>
			</fieldset>

			<fieldset class="form-group">
				<legend>Doors, Windows & Trim</legend>
				<div class="form-group col-xs-12 col-md-4">
					<label for="dwt">No. Coats</label>
					<select class="form-control paint-select" name="dwt" id="dwt">
						<option value="0">None</option>
						<option value="1">1</option>
					</select>
				</div>

				<fieldset class="form-group radio-group collapse paint-radio-fieldset col-xs-12 col-md-8" id="paint-radio-dwt">
					<legend>DWT Paint Type</legend>
					<label><input type="radio" name="dtwPaint" value="ELenamel" checked><img src="img/dwt/ELenamel.png"></label>
					<label><input type="radio" name="dtwPaint" value="NLenamel"><img src="img/dwt/NLenamel.png"></label>
					<label><input type="radio" name="dtwPaint" value="UPacrylic"><img src="img/dwt/UPacrylic.png"></label>
				</fieldset>
			</fieldset>
		</fieldset>

		<input class="btn btn-success" type="submit" name="submit" value="Save Project">
	</form>

	<?php
	if (isset($_POST['submit'])) {
		// collecting user inputs
		$room = $_POST['room'];
		if (!in_array($room, $_SESSION['roomArray'])) {
			$paint = $_POST['paint'];
			$furniture = $_POST['furniture'];
			$length = $_POST['length'];
			$width = $_POST['width'];
			$height = $_POST['height'];
			$numDoors = $_POST['doors'];
			$numWindows = $_POST['windows'];
			$undercoatCoats = $_POST['undercoat'];
			$undercoatPaint = $_POST['undercoatPaint'];
			$floorCoats = $_POST['floor'];
			$floorPaint = $_POST['floorPaint'];
			$wallsCoats = $_POST['walls'];
			$wallsPaint = $_POST['wallsPaint'];
			$ceilingCoats = $_POST['ceiling'];
			$ceilingPaint = $_POST['ceilingPaint'];
			$dwtCoats = $_POST['dwt'];
			$dtwPaint = $_POST['dtwPaint'];

			// calculating paint area for each surface type
			$surface1 = $length * $width; // floor or ceiling
			$surface2 = $length * $height; // wall A
			$surface3 = $width * $height; // wall B
			$undercoatSurface = $undercoatCoats * 2*($surface1 + $surface2 + $surface3);
			$floorSurface = $floorCoats * $surface1;
			$WallsSurface = $wallsCoats * 2*($surface2 + $surface3);
			$ceilingSurface = $ceilingCoats * $surface1;

			// updating session variables
			$paintSurface = $undercoatSurface + $floorSurface + $WallsSurface + $ceilingSurface; // total surface area
			$doors = $numDoors * $dwtCoats;
			$windows = $numWindows * $dwtCoats;
			$_SESSION['totSurface'] += $paintSurface;
			$_SESSION['totDoors'] += $doors;
			$_SESSION['totWindows'] += $windows;

			// appending room's array of attributes to session array variable
			$roomDimension = [$room, $paint, $furniture, $length, $width, $height, $numDoors, $numWindows];
			$roomPaint = [$room, $undercoatCoats, $undercoatPaint, $floorCoats, $floorPaint, $wallsCoats, $wallsPaint, $ceilingCoats, $ceilingPaint, $dwtCoats, $dtwPaint];
			array_push($_SESSION['roomArray'], $room);
			array_push($_SESSION['dimensionArray'], $roomDimension);
			array_push($_SESSION['paintArray'], $roomPaint);

			// updating number of rooms saved
		} else {
			echo '<script type="text/javascript">alert("Room Already Exists!")</script>';
		}
	}
	echo '<br><a class="btn btn-primary" href="quote.php">View '.count($_SESSION['roomArray']).' Saved Rooms</a>';
	?>
	</div>
</body>
</html>