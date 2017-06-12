<?php
session_start();
$dt = new DateTime('now');
if (isset($_SESSION["timezone"])) {
	$timezone = $_SESSION["timezone"];
	$dtz = new DateTimeZone($timezone);
	$dt->setTimezone($dtz);
}
$title = "Current Time";
require_once "nav.php"; 
?>

<div class="container">
	<div class="jumbotron">
		<h1>Time Zone Sensitivity</h1>
		<h3>Current Time:</h3>
		<h2><p class="text-info">
		<?php
		echo $dt->format("j F Y, H:i T");
		?>
		</p></h2>
	</div>
</div>

</body>
</html>