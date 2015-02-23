<?php
#
# Grab the latest progression results
#
require_once (__DIR__.'/../config.php');
require_once 'queries.php';
require_once 'raid.php';

#
# Return an array containing all of the current raid progression
#
function getProgression() {
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error){
	        die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query(PROGRESSION);
	$raids = [];

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$r = new raid($row["name"], $row["normal"], $row["heroic"], $row["mythic"], $row["max"]);
			array_push($raids, $r);
		}
	}

	$conn->close();

	return $raids;
}