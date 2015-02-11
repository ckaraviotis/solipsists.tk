<?php
#
# Retrieve guild and character information
#
require_once (__DIR__.'/../config.php');
include 'charInfo.php';

function guildInfo() {
	$guildJSON = file_get_contents('http://eu.battle.net/api/wow/guild/'.GUILD_SRVR.'/'.GUILD_NAME.'?fields=members', FILE_TEXT);
	$guild = json_decode($guildJSON); 

	$memberAry = $guild->{"members"};
	$returnObject = [];

	// Reset IsCurrent
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("
		UPDATE members SET IsCurrent = 0
	");

   	if( ! $stmt->execute() ) {
      die("Failed to reset Current flag: " . $conn->error);
    } else {
    	echo "Current flag reset OK.";
    }

    $stmt->close();
    $conn->close();

    // Increase timeout because this is pretty slow
	set_time_limit(120);

	for($i=0;$i < count($memberAry); $i++) {
		$name = $memberAry[$i]->{"character"}->{"name"};
		$realm =  $memberAry[$i]->{"character"}->{"realm"};
		$role =  $memberAry[$i]->{"character"}->{"spec"}->{"role"};
		$class = $memberAry[$i]->{"character"}->{"class"};
		$rank = $memberAry[$i]->{"rank"};

		$char = charInfo($name, $realm);

		$line = [$name, $realm, $role, $class, $rank, $char];
		
		array_push($returnObject, $line);
	}
	return $returnObject;
}
