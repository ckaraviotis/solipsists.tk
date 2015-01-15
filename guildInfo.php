<?php
# Retrieve guild information
function guildInfo() {
 
	$guildJSON = file_get_contents("http://eu.battle.net/api/wow/guild/Bloodhoof/Solipsists?fields=members");
	$guild = json_decode($guildJSON); 

	echo $guildJSON;
	echo $guild;
	/*$members = guild.members;
	$returnObject = new Array();
    
	for (k = 0; k < members.length; k++) {
		$name = members[k].character.name;
		$realm = members[k].character.realm;
		$class = members[k].character.class;
		$level = members[k].character.level;

		// Doesnt always exist
		if(members[k].character.hasOwnProperty('spec')){
			$role = members[k].character.spec.role;
		} 
		else {
			$role = ""
		}
		$rank = members[k].rank;

		// If above levelling, get the stats
		if ($rank < 6) {
			$line = new Array();
			$toonInfo = pull(name, realm);
			line.push(name, realm, role);

			for (j = 0; j < toonInfo.length; j++) {
				line.push(toonInfo[j])
			}
			returnObject.push(line)
		}
	}
	return returnObject;*/
}
?>