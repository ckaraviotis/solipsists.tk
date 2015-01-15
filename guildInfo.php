<?php
# Retrieve guild and character information
include 'charInfo.php';
function guildInfo() {
 
	$guildJSON = file_get_contents("http://eu.battle.net/api/wow/guild/Bloodhoof/Solipsists?fields=members", FILE_TEXT);
	$guild = json_decode($guildJSON); 

	//echo $guildJSON;

	$memberAry = $guild->{"members"};
	$returnObject = [];

	for($i=0;$i < count($memberAry); $i++) {
		$name =  mb_convert_encoding($memberAry[$i]->{"character"}->{"name"}, 'HTML-ENTITIES', 'UTF-8');
		$realm =  $memberAry[$i]->{"character"}->{"realm"};
		$role =  $memberAry[$i]->{"character"}->{"spec"}->{"role"};
		$class = $memberAry[$i]->{"character"}->{"class"};
		$rank = $memberAry[$i]->{"rank"};

		$char = charInfo($name, $realm);

		$line = [$name, $realm, $role, $class, $rank, $char];
		
		array_push($returnObject, $line);
	}
/*
	if(DEBUG==true) {
		echo "<pre>";
		print_r($guild);
		echo "</pre>";
	}

*/
	return $returnObject;


/*
	$line = new Array();
	$toonInfo = pull(name, realm);
	line.push(name, realm, role);
	for (j = 0; j < toonInfo.length; j++) {
		line.push(toonInfo[j])
	}
	returnObject.push(line)
*/
}
?>
