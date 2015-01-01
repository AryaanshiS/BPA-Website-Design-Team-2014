<?php

////////////////
// Constants //
////////////////

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "jman22355");
define("DB_NAME", "bpa2014");

// Establish Connection to Database
$dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());

// Select Database
mysql_select_db(DB_NAME);

?>