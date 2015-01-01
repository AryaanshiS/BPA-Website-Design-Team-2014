<?php

	///////////////////////////
	// Distance Calculation //
	///////////////////////////

	// Select first result from search from airports table after ordering from shortest to longest distance
	$sql = "SELECT TOP 1 name, latitude, logitude";
	$sql .= " FROM airports";
	$sql .= " ORDER BY";
	
	// Difference in latitude, squared (distance formula part 1)
	$sql .= " (latitude - [users destination latitude]) * (latitude - [users destination latitude])";

	// Plus
	$sql .= " +";

	// Difference in longitude, squared (distance formula part 2)
	$sql .= " (longitude - [users destination longitude]) * (longitude - [users destination longitude])";

?>