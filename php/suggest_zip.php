<?php

if ( !isset($_REQUEST['term']) )
    exit;

///////////////
// Constants //
///////////////

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "jman22355");
define("DB_NAME", "bpa2014");

// Establish Connection to Database
$dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());

// Select Database
mysql_select_db(DB_NAME);

// Define Record Set $rs
//
// Query the database
// SELECT columns zip, city, state, latitude, and longitude
// FROM table zips
// WHERE zip is similar (LIKE) the user's input value
//
// mysql_real_escape_string(); <-- Formats strings to prevent SQL injections 

$rs = mysql_query('SELECT zip, city, state, latitude, longitude FROM zips WHERE zip LIKE "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY zip ASC LIMIT 0,10', $dblink);


// Define empty array to be populated with results from search and sent to user as populated list
$data = array();

// Conditional: If there are results to return, continue
if ( $rs && mysql_num_rows($rs) )
{
	// mysql_fetch_array($rs, MYSQL_ASSOC); <-- Searches database for zip code similar to user's input and returns values as associative array
	// 											for key => value, key = column title and value = row value
	// 											
	// While $row is populated from associative array
	// 		labels in the array will become: ZIP - CITY, STATE
	// 		example: 47374 - Richmond, Indiana
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['zip'] .' - '. $row['city'] .', '. $row['state'] ,
            'value' => $row['zip']
        );
    }
}

// Print out $data in json for jQuery usage
echo json_encode($data);

// Clear PHP buffer and force send information to browser
flush();

?>