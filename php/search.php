<!DOCTYPE html>
<html lang="en">

<body>
<?php

require("required_files.php");





#######################################################################################
#######################################################################################
#
# 									Ticket Generator
# 
#######################################################################################
#######################################################################################




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
$hoursOfFlight = "About <b>" . round(($flightDistance) / $flightSpeed) . "</b> hours";





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

// Flight Printed Below Wikipedia API Call




#######################################################################################
#######################################################################################
#
# 									Wikipedia API Call
# 
#######################################################################################
#######################################################################################





$html = @file_get_contents('http://en.wikipedia.org/wiki/' . $destinationCity);
$dom = @DOMDocument::loadHTML($html);
$xpath = new domXPath($dom);
$query = "//div[@id=\"bodyContent\"]/div[@id=\"mw-content-text\"]/p";
$results = $xpath->query($query);
$htmlString = $dom->saveHTML($results->item(0));

echo $htmlString;




//////////////////
// Print Ticket //
//////////////////

include('ticket.php');





#######################################################################################
#######################################################################################
#
# 									HOTEL GENERATOR
# 
#######################################################################################
#######################################################################################

//////////////////////////////////
// Random Hotel Image Generator //
//////////////////////////////////

// Build array of files 
$hotelImagesArray = scandir("../images/hotels");

// Output random hotel image
$randomHotelImage = "../images/hotels/" . $hotelImagesArray[rand(2, (count($hotelImagesArray) -1 ))];






///////////////////////////////////
// Get Destionation City Node ID //
///////////////////////////////////

// URL to send request to
$osmQueryURL = "http://overpass-api.de/api/interpreter?data=";

// Request for details on destination city as node
$osmDestinationCityInfoQuery = "[out:json][timeout:25];area[name=\"" . $destinationCity . "\"];(node[place=\"city\"](area););out;";

// Send request to Overpass API and get (json) info back
$osmDestinationCityInfoQueryData = file_get_contents($osmQueryURL . urlencode($osmDestinationCityInfoQuery));

// Convert requested json to associative array
$osmDestinationCityInfoQueryDataArray = json_decode($osmDestinationCityInfoQueryData, TRUE);

// Destionation city node ID
$osmDestinationCityNodeID = $osmDestinationCityInfoQueryDataArray['elements'][0]['id'];






////////////////////////////////////////////////////////////////
// Get List Of Hotels In Destination City & Print Random Name //
////////////////////////////////////////////////////////////////

// Query for list of hotels in destination city
$osmHotelsInDestinationCityQuery = "[out:json];(node(" . $osmDestinationCityNodeID . ");node(around:5000)[\"tourism\"=\"hotel\"];);out;";

// Send request to Overpass API and get (json) info back
$osmHotelsInDestinationCityQueryData = file_get_contents($osmQueryURL . urlencode($osmHotelsInDestinationCityQuery));

// Convert requested json to associative array
$osmHotelsInDestinationCityQueryDataArray = json_decode($osmHotelsInDestinationCityQueryData, TRUE);

// Create empty array to be populated
$osmHotelsInDestinationCityList = array();

// Creat array with hotels that have pretty names
for ($i=1; $i < (count($osmHotelsInDestinationCityQueryDataArray['elements']) - 2); $i++) {

	// Variable to check is name
	$variableToCheck = $osmHotelsInDestinationCityQueryDataArray['elements'][$i]['tags']['name'];

	// If the variable to check contains nothing but english charactors
	if (!preg_match('/[^A-Za-z0-9]/', $variableToCheck)){

		// If the variable is not empty
		if (isset($variableToCheck)){

			// Add name to array
			array_push($osmHotelsInDestinationCityList, ucwords($variableToCheck));
		}
	}
}

// Random Hotel Name
$hotelName = $osmHotelsInDestinationCityList[rand(0, (count($osmHotelsInDestinationCityList) - 1))];





/////////////////////////
// Random Hotel Rating //
/////////////////////////

// Build array of images
$hotelStarsArray = scandir("../images/stars");

// Nameof random image
$hotelStarName = $hotelStarsArray[rand(3, (count($hotelStarsArray) -1 ))];

// Number of stars for hotel
$numberOfStars = substr($hotelStarName, 0, 1);

// Hotel rating in decimal form
$hotelRating = $numberOfStars . "." . rand(0, 9);

// Random Star Image Width
$hotelStarWidth = 100;

// Random Star Image
$hotelStar = "<img src=\"../images/stars/" . $hotelStarName . "\" width=\"" . $hotelStarWidth . "px\" />";




///////////////////////////
// Print Random Discount //
///////////////////////////

$discountInfo = "&#8595; Price is " . rand(0, 4) . rand(0, 9) . "% lower than usual.";





//////////////////////////////////////////////////
// Random Distance From Destination City Center //
//////////////////////////////////////////////////

$distanceInfo = "<b>" . rand(0, 2) . "." . rand(0, 9) . "</b> miles from the center of " . $destinationCity;





////////////////////////////////////////////////
// Random ammount of people viewing the hotel //
////////////////////////////////////////////////

$hotelView = "There are <b>" . rand(0, 10) . "</b> people viewing this hotel right now.";




/////////////////////////////////
// Hotel Price Based On Rating //
/////////////////////////////////

// Cost of hotel per night based on number of stars
$pricePerStarPerNight = 30;

// Random Price Calculaton
$hotelPrice = "$" . ($pricePerStarPerNight * $hotelRating);





/////////////////
// Print Hotel //
/////////////////

if($_REQUEST['hotel'] == "yes"){
	include('hotel.php');	
}





#######################################################################################
#######################################################################################
#
# 									CAR RENTAL
# 
#######################################################################################
#######################################################################################
	
////////////////////////////////////
// Selet Rental Car Company Logo //
////////////////////////////////////


$rentalCompany = $_REQUEST['rentalCompany'];
$rentalCompanyImage = "../images/rentalCompanies/" . $rentalCompany . ".png";





///////////////////////////////////
// Select Rental Car Type Image //
///////////////////////////////////

$rentalType = $_REQUEST['rentalCarClass'];
$rentalTypeImage = "../images/rentalTypes/" . $rentalType . ".jpg";





///////////////////////////////
// Miscellaneous Information //
///////////////////////////////

// Number of passengers
$rentalPassengers = array(
	'economy' => 4,
	'compact' => 4,
	'standard' => 4,
	'van' => 8,
	'suv' => 8,
	'pickup' => 2,);

// Number of bags that can be held
$rentalLuggage = array(
	'economy' => 2,
	'compact' => 4,
	'standard' => 2,
	'van' => 6,
	'suv' => 6,
	'pickup' => 10,);

// Number of doors
$rentalDoor = array(
	'economy' => 4,
	'compact' => 4,
	'standard' => 2,
	'van' => 4,
	'suv' => 4,
	'pickup' => 2,);

// Color of vehicle
$rentalColor = array(
	'economy' => 'Red',
	'compact' => 'White',
	'standard' => 'Silver',
	'van' => 'Blue',
	'suv' => 'Tan',
	'pickup' => 'Greem',);

// Rental Transmission
$rentalTransArray = array(
	'Automatic',
	'Manual',);

$rentalTrans = $rentalTransArray[rand(0, 1)];

// Price of vehicle
$rentalColor = array(
	'economy' => 25,
	'compact' => 29,
	'standard' => 34,
	'van' => 63,
	'suv' => 80,
	'pickup' => 80,);





//////////////////////
// Print Rental Car //
//////////////////////

if ($_REQUEST['rental'] == "yes") {
	include('rentalCar.php');
}




?>
</body>
</html>