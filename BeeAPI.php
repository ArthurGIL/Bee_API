<!DOCTYPE html>
<html>
<head>
	<title>Bee API - IoT Project</title>
	<link rel="stylesheet" href="styles.css" type="text/css" />
	<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
	</script>
</head>

<body onload="zoom()">
<?php
	require 'test_cookies.php';
?>

<div id="title">
	<h1>Bee API</h1>
</div>
<div id="sub"><i>- Arthur GIL - P-E FOUILLARD - Callixte FUSIER - Stanislas DUVAL</i></div>

<hr>

<br>
<div id="sell">
	<a href="sell-admin.php" title="Sell"><button class="button4">Sell</button></a>
</div>

<div id="grid_container">
	<?php getCarItems(); ?>

	<?php foreach ($_SESSION['item'] as $itemSelected) : ?>

	<div id="item">
	    <img id="objPos" src="peugeot-208.jpg" length=200 width=200><br><br>
		<?= $itemSelected[1] ?><br>
		<?= $itemSelected[3] ?>€<br><br>
		<a href="details-admin.php" title="Car Details">
			<button class="button2">More Details</button>
		</a>
	</div>
	<?php endforeach; ?>
</div>

<br>
<br>

<div id="footer">
	<div id="footText">Admin</div>
	<div id="footBlock"></div>
	<div id="Deconnexion">
		<a href="test_cookies.php?deco=1" title="Deconnexion"><button class="buttonDeco">Deconnexion</button></a>
	</div>
</div>

</body>
</html>