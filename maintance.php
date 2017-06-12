<?php
session_start();
$dt1 = new DateTime("21 December 2017, 16:00", new DateTimeZone("UTC"));
$dt2 = new DateTime("21 December 2017, 20:00", new DateTimeZone("UTC"));
if (isset($_SESSION["timezone"])) {
	$timezone = $_SESSION["timezone"];
	$dtz = new DateTimeZone($timezone);
	$dt1->setTimezone($dtz);
	$dt2->setTimezone($dtz);
}
$title = "Maintance Page";
require_once "nav.php"; 
?>

<div class="container">
	<div class="alert alert-info">
		<p>This website will be offline for routine maintance from 
		<span><?php echo $dt1->format("j F Y, H:i T"); ?></span> 
		to 
		<span><?php echo $dt2->format("j F Y, H:i T"); ?></span>
		</p>
	</div>
</div>

</body>
</html>