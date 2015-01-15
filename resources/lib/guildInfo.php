<?php
#
# Retrieve guild and character information
#
include '/var/www/beta.solipsists.tk/resources/config.php';
include 'charInfo.php';

function guildInfo() {
	$guildJSON = file_get_contents('http://eu.battle.net/api/wow/guild/'.GUILD_SRVR.'/'.GUILD_NAME.'?fields=members', FILE_TEXT);
	$guild = json_decode($guildJSON); 

	$memberAry = $guild->{"members"};
	$returnObject = [];

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
