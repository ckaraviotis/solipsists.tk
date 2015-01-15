<?php
# Update guild information in the database
//ini_set('display_errors','On');
//error_reporting(E_ALL);

include 'config.php';
include 'queries.php';
include 'guildInfo.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$guildInfo = guildInfo();

for($i = 0; $i < count($guildInfo); $i++) {
	$name = max($guildInfo[$i][0], 0);
	$realm = max($guildInfo[$i][1], 0);
	$role = max($guildInfo[$i][2], 0);
	$class = max($guildInfo[$i][3], 0);
	$rank = max($guildInfo[$i][4], 0);
	$heroicKills = max($guildInfo[$i][5][0], 0);
	$ilvl = max($guildInfo[$i][5][1], 0);
	$head = max($guildInfo[$i][5][2], 0);
	$neck = max($guildInfo[$i][5][3], 0);
	$shoulder = max($guildInfo[$i][5][4], 0);
	$back = max($guildInfo[$i][5][5], 0);
	$chest = max($guildInfo[$i][5][6], 0);
	$wrist = max($guildInfo[$i][5][7], 0);
	$hands = max($guildInfo[$i][5][8], 0);
	$waist = max($guildInfo[$i][5][9], 0);
	$legs = max($guildInfo[$i][5][10], 0);
	$feet = max($guildInfo[$i][5][11], 0);
	$ring1 = max($guildInfo[$i][5][12], 0);
	$ring2 = max($guildInfo[$i][5][13], 0);
	$trinket1 = max($guildInfo[$i][5][14], 0);
	$trinket2 = max($guildInfo[$i][5][15], 0);
	$mainhand = max($guildInfo[$i][5][16], 0);
	$offhand = max($guildInfo[$i][5][17], 0);
	$enchant_weapon = max($guildInfo[$i][5][18], 0);
	$enchant_neck = max($guildInfo[$i][5][19], 0);
	$enchant_ring1 = max($guildInfo[$i][5][20], 0);
	$enchant_ring2 = max($guildInfo[$i][5][21], 0);
	$enchant_cloak = max($guildInfo[$i][5][22], 0);
	$highmaul_normal_kills = max($guildInfo[$i][5][23], 0);
	$highmaul_heroic_kills = max($guildInfo[$i][5][24], 0);
	$highmaul_mythic_kills = max($guildInfo[$i][5][25], 0);
	$blackrock_normal_kills = max($guildInfo[$i][5][26], 0);
	$blackrock_heroic_kills = max($guildInfo[$i][5][27], 0);
	$blackrock_mythic_kills = max($guildInfo[$i][5][28], 0);
	$ring_max = max($ring1, $ring2);

	$level = 100;

	var_dump($guildInfo[$i][5][19]);
	echo "$name : $enchant_neck <br />";
	
/*
	$stmt = $conn->prepare("
INSERT INTO members (name, realm, role, class, level, ilvl, ring_max, heroics, head, neck, shoulder, back, chest, wrist, hands, waist, legs, feet, ring1, ring2, trinket1, trinket2, mainhand, offhand, enchant_weapon, enchant_neck, enchant_cloak, enchant_ring1, enchant_ring2, highmaul_kills_normal, highmaul_kills_heroic, highmaul_kills_mythic, blackrock_kills_normal, blackrock_kills_heroic, blackrock_kills_mythic) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
	ON DUPLICATE KEY UPDATE
		name=VALUES(name), realm=VALUES(realm), role=VALUES(role),class=VALUES(class),level=VALUES(level),ilvl=VALUES(ilvl),ring_max=VALUES(ring_max),
		heroics=VALUES(heroics),head=VALUES(head),neck=VALUES(neck),shoulder=VALUES(shoulder),back=VALUES(back),chest=VALUES(chest),wrist=VALUES(wrist),
		hands=VALUES(hands),waist=VALUES(waist),legs=VALUES(legs),feet=VALUES(feet),ring1=VALUES(ring1),ring2=VALUES(ring2),trinket1=VALUES(trinket1),
		trinket2=VALUES(trinket2),mainhand=VALUES(mainhand),offhand=VALUES(offhand),enchant_weapon=VALUES(enchant_weapon),
		enchant_neck=VALUES(enchant_neck),enchant_cloak=VALUES(enchant_cloak),enchant_ring1=VALUES(enchant_ring1),
		enchant_ring2=VALUES(enchant_ring2),highmaul_kills_normal=VALUES(highmaul_kills_normal),
		highmaul_kills_heroic=VALUES(highmaul_kills_heroic),highmaul_kills_mythic=VALUES(highmaul_kills_mythic),
		blackrock_kills_normal=VALUES(blackrock_kills_normal),blackrock_kills_heroic=VALUES(blackrock_kills_heroic),
		blackrock_kills_mythic=VALUES(blackrock_kills_mythic)
	");

	$stmt->bind_param("sssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii",$name, $realm, $role, $class, $rank, $heroicKills, $ilvl, $ring_max, $head, $neck, $shoulder, $back, $chest, $wrist, $hands, $waist, $legs, $feet, $ring1, $ring2, $trinket1, $trinket2, $mainhand, $offhand, $enchant_weapon, $enchant_neck, $enchant_ring1, $enchant_ring2, $enchant_cloak, $highmaul_normal_kills , $highmaul_heroic_kills , $highmaul_mythic_kills , $blackrock_normal_kills, $blackrock_heroic_kills, $blackrock_mythic_kills);

	if( $stmt->execute() ) {
		echo "<b>$name</b> written to database OK.<br />";
	} else {
		echo "Error writing <b>$name</b>";
		var_dump($stmt);
	}
	$stmt->close();
*/
}
$conn->close();
?>

