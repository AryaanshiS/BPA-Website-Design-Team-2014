<?php

require("required_files.php");






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
// Airport near location //
///////////////////////////

// Select all columns of the first result from search from airports table after ordering from shortest to longest distance
$airportNearLocationSQL = "SELECT name, city, country, callsign";
$airportNearLocationSQL .= " FROM airports";
$airportNearLocationSQL .= " ORDER BY";

// Difference in latitude, squared (distance formula part 1)
$airportNearLocationSQL .= " (latitude - $locationLat) * (latitude - $locationLat)";

// Plus
$airportNearLocationSQL .= " +";

// Difference in longitude, squared (distance formula part 2)
$airportNearLocationSQL .= " (longitude - $locationLon) * (longitude - $locationLon)";

// Select firtst result after sorting
$airportNearLocationSQL .= " LIMIT 1";

// Search Database for Airport nearest to destination
$airportNearLocationQuery = mysql_query($airportNearLocationSQL, $dblink);

// Array of query results
$airportNearLocationDataArray = mysql_fetch_array($airportNearLocationQuery, MYSQL_ASSOC);

// Seperate array into variables
$airportNearLocationName = $airportNearLocationDataArray['name'];
$airportNearLocationCity = $airportNearLocationDataArray['city'];
$airportNearLocationCountry = $airportNearLocationDataArray['country'];
$airportNearLocationCallsign = $airportNearLocationDataArray['callsign'];






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






//////////////////////////////
// Airport Near Destination //
//////////////////////////////

// Select all columns of the first result from search from airports table after ordering from shortest to longest distance
$airportNearDestinationSQL = "SELECT name, city, country, callsign";
$airportNearDestinationSQL .= " FROM airports";
$airportNearDestinationSQL .= " ORDER BY";

// Difference in latitude, squared (distance formula part 1)
$airportNearDestinationSQL .= " (latitude - $destinationLat) * (latitude - $destinationLat)";

// Plus
$airportNearDestinationSQL .= " +";

// Difference in longitude, squared (distance formula part 2)
$airportNearDestinationSQL .= " (longitude - $destinationLon) * (longitude - $destinationLon)";

// Select firtst result after sorting
$airportNearDestinationSQL .= " LIMIT 1";

// Search Database for Airport nearest to destination
$airportNearDestinationQuery = mysql_query($airportNearDestinationSQL, $dblink);

// Array of query results
$airportNearDestinationDataArray = mysql_fetch_array($airportNearDestinationQuery, MYSQL_ASSOC);

// Seperate array into variables
$airportNearDestinationName = $airportNearDestinationDataArray['name'];
$airportNearDestinationCity = $airportNearDestinationDataArray['city'];
$airportNearDestinationCountry = $airportNearDestinationDataArray['country'];
$airportNearDestinationCallsign = $airportNearDestinationDataArray['callsign'];





///////////////////////////////////////////////////
// Distance From Location To Destination Airport //
///////////////////////////////////////////////////

// Distance from location to destination
$distance = distance($locationLat, $locationLon, $destinationLat, $destinationLon, "M");

?>