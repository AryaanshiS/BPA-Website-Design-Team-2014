<?php

require("required_files.php");





# AIRPLANE TICKET GENERATOR




////////////////////////
// User Location Data //
////////////////////////

// Get Zip Code of user location
$locationZip = $_REQUEST['zipsearch'];

// SQL Query
$locationSQL = "SELECT zip, latitude, longitude";
$locationSQL .= " FROM zips";
$locationSQL .= " WHERE zip='". mysql_real_escape_string($locationZip);
$locationSQL .= "' ORDER BY zip";
$locationSQL .= " ASC";
$locationSQL .= " LIMIT 1";

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
$destinationSQL = "SELECT latitude, longitude";
$destinationSQL .= " FROM world_cities";
$destinationSQL .= " WHERE city='". mysql_real_escape_string($destinationCity);
$destinationSQL .= "' AND country='". mysql_real_escape_string($destinationCountry);
$destinationSQL .= "' ORDER BY country";
$destinationSQL .= " ASC";
$destinationSQL .= " LIMIT 1";

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





//////////////////
// Ticket Title //
//////////////////

$ticketTitle = $airportNearLocationCity . " &#8594; " . $airportNearDestinationCity;






//////////////////////////////////
// Calculate Plane Ticket Price //
//////////////////////////////////

// Distance from location to destination
$flightDistance = distance($locationLat, $locationLon, $destinationLat, $destinationLon, "M");

// 11 cents per mile
$pricePerMile = .11;

// Preliminary fees
$preFlightCost = 50;

// Preliminary fees + double the distance (round trip) multiplied by price per mile and rounded to 2 decimal places
$ticketPrice = "$" . round($preFlightCost + ((2 * $flightDistance) * $pricePerMile), 2);





///////////////////////////
// Calculate Flight Time //
///////////////////////////

// Average mph of commercial flight
$flightSpeed = 500;

// Half of round trip distance divided by flight speed to get hours of flight, formatted for output
$hoursOfFlight = "About <b>" . round(($flightDistance / 2) / $flightSpeed) . "</b> hours";





///////////
// Dates //
///////////

// Departure Date
// MM/DD/YYYY to Day, Day-# Month, 4-Digit-Year
$departureDate = date("D, jS F, Y", strtotime($_REQUEST['departureDate']));

// Return Date
// MM/DD/YYYY to Day, Day-# Month, 4-Digit-Year
$returnDate = date("D, jS F, Y", strtotime($_REQUEST['returnDate']));






//////////////////////////////
// Random Departure Airline //
//////////////////////////////

// Search airlines database and return everything
$departureAirlineSQL = "SELECT *";
$departureAirlineSQL .= " FROM airlines";
$departureAirlineSQL .= " ORDER BY RAND()";
$departureAirlineSQL .= " LIMIT 1";

// Departure airline query
$departureAirlineQuery = mysql_query($departureAirlineSQL, $dblink);

// Departure airline query array
$departureAirlineDataArray = mysql_fetch_array($departureAirlineQuery, MYSQL_ASSOC);

// Departure airline name
$departureAirlineName = $departureAirlineDataArray['Name'];

// Departure airline callsign
$departureAirlineCallsign = $departureAirlineDataArray['Callsign'];





////////////////////////////////
// Random Destination Airline //
////////////////////////////////

// Search airlines database and return everything
$destinationAirlineSQL = "SELECT *";
$destinationAirlineSQL .= " FROM airlines";
$destinationAirlineSQL .= " ORDER BY RAND()";
$destinationAirlineSQL .= " LIMIT 1";

// destination airline query
$destinationAirlineQuery = mysql_query($destinationAirlineSQL, $dblink);

// destination airline query array
$destinationAirlineDataArray = mysql_fetch_array($destinationAirlineQuery, MYSQL_ASSOC);

// destination airline name
$destinationAirlineName = $destinationAirlineDataArray['Name'];

// destination airline callsign
$destinationAirlineCallsign = $destinationAirlineDataArray['Callsign'];





/////////////////////////
// Random Flight Times //
/////////////////////////

// First Departure Time

$firstDepartureTime = rand(1, 12) . ":" . rand(0, 5) . rand(0, 9) . " AM";

$firstArrivalTime = rand(1, 12) . ":" . rand(0, 5) . rand(0, 9) . " PM";

$secondDepartureTime = rand(1, 12) . ":" . rand(0, 5) . rand(0, 9) . " AM";

$secondArrivalTime = rand(1, 12) . ":" . rand(0, 5) . rand(0, 9) . " PM";





////////////////////
// Flight Numbers //
////////////////////

$departureFlightNumber = rand(0, 9999);

$returnFlightNumber = rand(0, 9999);





//////////////////
// Print Ticket //
//////////////////

include('ticket.php');





# HOTEL GENERATOR







?>