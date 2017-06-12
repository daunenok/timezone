<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$timezone = $_POST["timezone"];
	$_SESSION["timezone"] = $timezone;
}

$list = DateTimeZone::listIdentifiers();
$title = "Time Zone Selection";
require_once "nav.php"; 
?>

<div class="container">
<form class="form-horizontal" method="POST">
	<fieldset>
		<legend>
		Time Zone Selection
		</legend>
		<div class="form-group">
			<div>
				<select name="timezone">
				<?php
				$dt = new DateTime('now');
				foreach ($list as $zone) {
					$dtz = new DateTimeZone($zone);
					$dt->setTimezone($dtz);
					echo "<option value='";
					echo $zone;
					echo "'";
					if (isset($_SESSION["timezone"]) &&
						$_SESSION["timezone"] == $zone)
						echo " selected";
					echo ">";
					echo $zone . " (UTC " . $dt->format("P") . ")";
					echo "</option>";
				}
				?>	
				</select>
			</div>
		</div>
		<div class="form-group">
			<div>
				<button type="submit" class="btn btn-primary">
					Submit
				</button>
			</div>
		</div>
	</fieldset>
</form>
</div>

</body>
</html>