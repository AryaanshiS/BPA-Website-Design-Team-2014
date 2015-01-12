<?php

////////////////////////////////////////////
// Print 1 Deimensional Associative Array //
////////////////////////////////////////////

function printArray($arrayToPrint){
	echo "<table><tr><td><b>Key</b></td><td><b>Value</b></td></tr>";
	foreach ($arrayToPrint as $key => $value) {
		echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
	}
	echo "</table>";
}






//////////////////////////////////////
// Calculate distance on a 2D plane //
//////////////////////////////////////

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K")
	{
		return ($miles * 1.609344);
	}

	else if ($unit == "N")
	{
		return ($miles * 0.8684);
	}

	else
	{
		return $miles;
	}
}

?>