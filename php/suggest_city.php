<?php

if ( !isset($_REQUEST['term']) )
    exit;

// Connection
require('db_connect.php');

// Define Record Set $rs
//
// Query the database
// SELECT columns zip, city, state, latitude, and longitude
// FROM table zips
// WHERE zip is similar (LIKE) the user's input value
//
// mysql_real_escape_string(); <-- Formats strings to prevent SQL injections 

$rs = mysql_query('SELECT country, city, latitude, longitude FROM world_cities WHERE city LIKE "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY city ASC LIMIT 0,10', $dblink);


// Define empty array to be populated with results from search and sent to user as populated list
$data = array();

// Conditional: If there are results to return, continue
if ( $rs && mysql_num_rows($rs) )
{
	// mysql_fetch_array($rs, MYSQL_ASSOC); <-- Searches database for zip code similar to user's input and returns values as associative array
	// 											for key => value, key = column title and value = row value
	// 											
	// While $row is populated from associative array
	// 		labels in the array will become: CITY, STATE
	// 		example: Richmond, IN
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['city'] .', '. $row['country'] ,
            'value' => $row['city']
        );
    }
}

// Print out $data in json for jQuery usage
echo json_encode($data);

// Clear PHP buffer and force send information to browser
flush();

?>