<?php
function write_options($arr, $selected) {
	$output = "";
	foreach ($arr as $key => $value) {
		$output .= "<option value='" . $key . "'";
		if ($key == $selected) $output .= " selected";
		$output .= ">";
		$output .= $value;
		$output .= "</option>";
	}
	return $output;
}

function getZones() {
	$dt = new DateTime('now');
	$list = DateTimeZone::listIdentifiers();
	$output = [];
	foreach ($list as $zone) {
		$dtz = new DateTimeZone($zone);
		$dt->setTimezone($dtz);
		$offset = $dt->format("P");
		$output[$zone] = $zone . " (UTC " . $offset . ")";
	}
	return $output;
}

function getYears() {
	$now = date("Y");
	$keys = range($now - 10, $now + 10);
	$output = array_combine($keys, $keys);
	return $output;
}

function getMonths() {
	$keys = range(1, 12);
	$values = ["January", "February", "March",
	         "April", "May", "June",
	         "July", "August", "September",
	         "October", "November", "December"];
	$output = array_combine($keys, $values);
	return $output;
}

function getDays() {
	$keys = range(1, 31);
	$output = array_combine($keys, $keys);
	return $output;
}

function getHours() {
	$keys = range(0, 23);
	$output = array_combine($keys, $keys);
	array_walk($output, function(&$val) {
							$val = str_pad($val,2,"0",STR_PAD_LEFT);
						});
	return $output;
}

function getMinutes() {
	$keys = range(0, 59);
	$output = array_combine($keys, $keys);
	array_walk($output, function(&$val) {
							$val = str_pad($val,2,"0",STR_PAD_LEFT);
						});
	return $output;
}

session_start();
$dt = new DateTime("now");
if (isset($_SESSION["timezone"])) {
	$p_fromzone = $_SESSION["timezone"];
	$p_tozone = $_SESSION["timezone"];
} else {
	$p_fromzone = $dt->getTimezone()->getName();
	$p_tozone = $dt->getTimezone()->getName();
}
$dtz = new DateTimeZone($p_fromzone);
$dt->setTimezone($dtz);
$p_year = $dt->format("Y");
$p_month = $dt->format("n");
$p_day = $dt->format("j");
$p_hours = $dt->format("H");
$p_minutes = $dt->format("i");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$p_year = $_POST["year"];
	$p_month = $_POST["month"];
	$p_day = $_POST["day"];
	$p_hours = $_POST["hours"];
	$p_minutes = $_POST["minutes"];
	$p_fromzone = $_POST["fromzone"];
	$p_tozone = $_POST["tozone"];

	$dtz1 = new DateTimeZone($p_fromzone);
	$dt = new DateTime("$p_year/$p_month/$p_day $p_hours:$p_minutes", $dtz1);
	$dtz2 = new DateTimeZone($p_tozone);
	$dt->setTimezone($dtz2);
}

$title = "Time Zone Calculator";
require_once "nav.php"; 
?>

<div class="container">
<form class="form-horizontal calculator" method="POST">
	<fieldset>
		<legend>
		Time Zone Calculator
		</legend>
		<div class="form-group">
			<label for="year" class="col-xs-4 control-label">
				From Time:
			</label>
			<div class="col-xs-8">
				<select name="year" id="year">
				<?php
				$years = getYears();
				echo write_options($years, $p_year);
				?>	
				</select>
				<select name="month" id="month">
				<?php
				$months = getMonths();
				echo write_options($months, $p_month);
				?>	
				</select>
				<select name="day" id="day">
				<?php
				$days = getDays();
				echo write_options($days, $p_day);
				?>	
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="hour" class="col-xs-4 control-label">
			</label>
			<div class="col-xs-8">
				<select name="hours" id="hours">
				<?php
				$hours = getHours();
				echo write_options($hours, $p_hours);
				?>	
				</select>
				:
				<select name="minutes" id="minutes">
				<?php
				$minutes = getMinutes();
				echo write_options($minutes, $p_minutes);
				?>	
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="fromzone" class="col-xs-4 control-label">
				From Time Zone:
			</label>
			<div class="col-xs-8">
				<select name="fromzone" id="fromzone">
				<?php
				$zones = getZones();
				echo write_options($zones, $p_fromzone);
				?>	
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="tozone" class="col-xs-4 control-label">
				To Time Zone:
			</label>
			<div class="col-xs-8">
				<select name="tozone" id="tozone">
				<?php
				$zones = getZones();
				echo write_options($zones, $p_tozone);
				?>	
				</select>
			</div>
		</div>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
			<div class="form-group converted">
				<label class="col-xs-4 control-label">
					Converted Time:
				</label>
				<div class="col-xs-8">
					<?=$dt->format("j F Y, H:i")?>
				</div>
			</div>
		<?php } ?>
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