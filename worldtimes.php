<?php
$cities = array(
  'Tokyo, Japan' => 'Asia/Tokyo',
  'New York, USA' => 'America/New_York',
  'Sao Paulo, Brazil' => 'America/Sao_Paulo',
  'Seoul, South Korea' => 'Asia/Seoul',
  'Mexico City, Mexico' => 'America/Mexico_City',
  'Osaka, Japan' => 'Asia/Tokyo',
  'Manila, Philippines' => 'Asia/Manila',
  'Mumbai, India' => 'Asia/Kolkata',
  'Delhi, India' => 'Asia/Kolkata',
  'Jakarta, Indonesia' => 'Asia/Jakarta',
  'Lagos, Nigeria' => 'Africa/Lagos',
  'Kolkata, India' => 'Asia/Kolkata',
  'Cairo, Egypt' => 'Africa/Cairo',
  'Los Angeles, USA' => 'America/Los_Angeles',
  'Buenos Aires, Argentina' => 'America/Argentina/Buenos_Aires',
  'Rio de Janeiro, Brazil' => 'America/Sao_Paulo',
  'Moscow, Russia' => 'Europe/Moscow',
  'Shanghai, China' => 'Asia/Shanghai',
  'Karachi, Pakistan' => 'Asia/Karachi',
  'Paris, France' => 'Europe/Paris',
  'Istanbul, Turkey' => 'Europe/Istanbul',
  'Nagoya, Japan' => 'Asia/Tokyo',
  'Beijing, China' => 'Asia/Shanghai',
  'Chicago, USA' => 'America/Chicago',
  'London, UK' => 'Europe/London'
);
$dt = new DateTime("now");
$output = [];
foreach ($cities as $key => $value) {
	$dtz = new DateTimeZone($value);
	$dt->setTimezone($dtz);
	$output[$key] = $dt->format("Z"); 
}
asort($output);

$title = "Current World Times";
require_once "nav.php"; 
?>

<div class="container">
	<h1>Current World Times</h1>
	<table class="table table-striped table-hover">
	<?php
	foreach ($output as $city => $value) {
		$dtz = new DateTimeZone($cities[$city]);
		$dt->setTimezone($dtz);
		echo "<tr>";
		echo "<td>" . $city . "</td>";
		echo "<td>" . $dt->format("H:i") . "</td>";
		echo "</tr>";
	}
	?>
	</table>
</div>

</body>
</html>