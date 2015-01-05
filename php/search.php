<?php

require("db_connect.php");
require("functions.php");

////////////////////////
// User Location Data //
////////////////////////

// Get Zip Code of user location
$locationZip = $_REQUEST['zipsearch'];

// SQL Query
$locationSQL = "SELECT zip, latitude, longitude FROM zips WHERE zip='". mysql_real_escape_string($locationZip) ."' ORDER BY zip ASC LIMIT 1";

// Query Results
$locationQuery = mysql_query($locationSQL, $dblink);

// Query to associative array
$locationDataArray = mysql_fetch_array($locationQuery, MYSQL_ASSOC);

// User location latitude
$locationLat = $locationDataArray['latitude'];

// User location longitude
$locationLon = $locationDataArray['longitude'];

///////////////////////////
// User Destination Data //
///////////////////////////

// Seperate user destination city and country
$destinationInputArray = explode(", ", $_REQUEST['citysearch']);

// Put user destination city and country into variables
$destinationCity = $destinationInputArray[0];
$destinationCountry = $destinationInputArray[1];

// Search world_cities database for latitude and longitude where city and country are equal to user destination
$destinationSQL = "SELECT latitude, longitude FROM world_cities WHERE city='". mysql_real_escape_string($destinationCity) ."' AND country='". mysql_real_escape_string($destinationCountry) ."' ORDER BY country ASC LIMIT 1";

// Query Result
$destinationQuery = mysql_query($destinationSQL, $dblink);

// Array of destination information
$destinationDataArray = mysql_fetch_array($destinationQuery, MYSQL_ASSOC);

// User destination latitude
$destinationLat = $destinationDataArray['latitude'];
$destinationLon = $destinationDataArray['longitude'];

///////////////////////////
// Distance Calculation //
///////////////////////////

// Select first result from search from airports table after ordering from shortest to longest distance
$sql = "SELECT name, latitude, logitude";
$sql .= " FROM airports";
$sql .= " ORDER BY";

// Difference in latitude, squared (distance formula part 1)
$sql .= " (latitude - [users destination latitude]) * (latitude - [users destination latitude])";

// Plus
$sql .= " +";

// Difference in longitude, squared (distance formula part 2)
$sql .= " (longitude - [users destination longitude]) * (longitude - [users destination longitude])";

?>