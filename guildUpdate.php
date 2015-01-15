<?php
# Update guild information in the database
ini_set('display_errors','On');
error_reporting(E_ALL);

include 'config.php';
include 'queries.php';
include 'guildInfo.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$guildInfo = guildInfo();

for($i = 0; $i < count($guildInfo); $i++) {
	$name = MAX($guildInfo[$i][0], 0);
	$realm = MAX($guildInfo[$i][1], 0);
	$role = MAX($guildInfo[$i][2], 0);
	$class = MAX($guildInfo[$i][3], 0);
	$rank = MAX($guildInfo[$i][4], 0);
	$heroicKills = MAX($guildInfo[$i][5][0], 0);
	$ilvl = MAX($guildInfo[$i][5][1], 0);
	$head = MAX($guildInfo[$i][5][2], 0);
	$neck = MAX($guildInfo[$i][5][3], 0);
	$shoulder = MAX($guildInfo[$i][5][4], 0);
	$back = MAX($guildInfo[$i][5][5], 0);
	$chest = MAX($guildInfo[$i][5][6], 0);
	$wrist = MAX($guildInfo[$i][5][7], 0);
	$hands = MAX($guildInfo[$i][5][8], 0);
	$waist = MAX($guildInfo[$i][5][9], 0);
	$legs = MAX($guildInfo[$i][5][10], 0);
	$feet = MAX($guildInfo[$i][5][11], 0);
	$ring1 = MAX($guildInfo[$i][5][12], 0);
	$ring2 = MAX($guildInfo[$i][5][13], 0);
	$trinket1 = MAX($guildInfo[$i][5][14], 0);
	$trinket2 = MAX($guildInfo[$i][5][15], 0);
	$mainhand = MAX($guildInfo[$i][5][16], 0);
	$offhand = MAX($guildInfo[$i][5][17], 0);
	$enchant_weapon = MAX($guildInfo[$i][5][18], 0);
	$enchant_neck = MAX($guildInfo[$i][5][19], 0);
	$enchant_ring1 = MAX($guildInfo[$i][5][20], 0);
	$enchant_ring2 = MAX($guildInfo[$i][5][21], 0);
	$enchant_cloak = MAX($guildInfo[$i][5][22], 0);
	$highmaul_normal_kills = MAX($guildInfo[$i][5][23], 0);
	$highmaul_heroic_kills = MAX($guildInfo[$i][5][24], 0);
	$highmaul_mythic_kills = MAX($guildInfo[$i][5][25], 0);
	$blackrock_normal_kills = MAX($guildInfo[$i][5][26], 0);
	$blackrock_heroic_kills = MAX($guildInfo[$i][5][27], 0);
	$blackrock_mythic_kills = MAX($guildInfo[$i][5][28], 0);

	$level = 100;

// QUOTES AROUND STRINGS
// EMPTY VALUES MUST BE ZEROED

	$sql = 'INSERT INTO 
	members (	name, realm, role, class, level, ilvl, ring_max, 
				heroics, head, neck, shoulder, back, chest, wrist, 
				hands, waist, legs, feet, ring1, ring2, trinket1, 
				trinket2, mainhand, offhand, enchant_weapon, 
				enchant_neck, enchant_cloak, enchant_ring1, 
				enchant_ring2, highmaul_kills_normal, 
				highmaul_kills_heroic, highmaul_kills_mythic, 
				blackrock_kills_normal, blackrock_kills_heroic, 
				blackrock_kills_mythic)
VALUES 	('.$name.','.$realm.','.$role.','.$class.','.$level.','.$ilvl.','.MAX($ring1, $ring2).','
		.$heroicKills.','.$head.','.$neck.','.$shoulder.','.$back.','.$chest.','.$wrist.','
		.$hands.','.$waist.','.$legs.','.$feet.','.$ring1.','.$ring2.','.$trinket1.','
		.$trinket2.','.$mainhand.','.$offhand.','.$enchant_weapon.','
		.$enchant_neck.','.$enchant_cloak.','.$enchant_ring1.','
		.$enchant_ring2.','.$highmaul_normal_kills.','
		.$highmaul_heroic_kills.','.$highmaul_mythic_kills.','
		.$blackrock_normal_kills.','.$blackrock_heroic_kills.','
		.$blackrock_mythic_kills.')';
/*
ON DUPLICATE KEY UPDATE
	name=VALUES(name), realm=VALUES(realm), role=VALUES(role),class=VALUES(class),level=VALUES(level),ilvl=VALUES(ilvl),ring_max=VALUES(ring_max),
	heroics=VALUES(heroics),head=VALUES(head),neck=VALUES(neck),shoulder=VALUES(shoulder),back=VALUES(back),chest=VALUES(chest),wrist=VALUES(wrist),
	hands=VALUES(hands),waist=VALUES(waist),legs=VALUES(legs),feet=VALUES(feet),ring1=VALUES(ring1),ring2=VALUES(ring2),trinket1=VALUES(trinket1),
	trinket2=VALUES(trinket2),mainhand=VALUES(mainhand),offhand=VALUES(offhand),enchant_weapon=VALUES(enchant_weapon),
	enchant_neck=VALUES(enchant_neck),enchant_cloak=VALUES(enchant_cloak),enchant_ring1=VALUES(enchant_ring1),
	enchant_ring2=VALUES(enchant_ring2),highmaul_kills_normal=VALUES(highmaul_kills_normal),
	highmaul_kills_heroic=VALUES(highmaul_kills_heroic),highmaul_kills_mythic=VALUES(highmaul_kills_mythic),
	blackrock_kills_normal=VALUES(blackrock_kills_normal),blackrock_kills_heroic=VALUES(blackrock_kills_heroic),
	blackrock_kills_mythic=VALUES(blackrock_kills_mythic)';
*/
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
$conn->close();
?>
