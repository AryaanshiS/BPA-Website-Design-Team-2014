<?php 

	// echo $_REQUEST['zipsearch'];

	// Scratchpad 

	$sql = "SELECT TOP 1 name, latitude, logitude";
	$sql .= " FROM airports";
	$sql .= " ORDER BY";
	
	// Difference in latitude, squared
	$sql .= " (latitude - [users destination latitude]) * (latitude - [users destination latitude])";

	// Plus
	$sql .= " +";

	// Difference in longitude, squared
	$sql .= " (longitude - [users destination longitude]) * (longitude - [users destination longitude])";

	

















	// Select the first row from table table airports (now varaible a)
	// Order by smallest to largest distance squared

	// CALCULATION
	// (latitude) = loop value
	// 60.234 = latitude of users selected destination

	// Description
		// Using the distance formula, this SQL call calculated the distance between the user's distination and the nearest airport to return the cloests aiport
		// For this call to work I need the users desttination airport




?>