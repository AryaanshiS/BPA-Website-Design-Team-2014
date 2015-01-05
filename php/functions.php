<?php

// Display associative array in table
function printArray($arrayToPrint){
	echo "<table><tr><td>Key</td><td>Value</td></tr>";
	foreach ($arrayToPrint as $key => $value) {
		echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
	}
	echo "</table>";
}

?>