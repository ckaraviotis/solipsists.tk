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
	$name = $guildInfo[$i][0];
	$realm = $guildInfo[$i][1];
	$role = !isset($guildInfo[$i][2]) ? "N/A" : $guildInfo[$i][2];
	$class = !isset($guildInfo[$i][3]) ? 0 : $guildInfo[$i][3];
	$rank = !isset($guildInfo[$i][4]) ? 0 : $guildInfo[$i][4];
	$heroicKills = !isset($guildInfo[$i][5][0]) ? 0 : $guildInfo[$i][5][0];
	$ilvl = !isset($guildInfo[$i][5][1]) ? 0 : $guildInfo[$i][5][1];
	$head = !isset($guildInfo[$i][5][2]) ? 0 : $guildInfo[$i][5][2];
	$neck = !isset($guildInfo[$i][5][3]) ? 0 : $guildInfo[$i][5][3];
	$shoulder = !isset($guildInfo[$i][5][4]) ? 0 : $guildInfo[$i][5][4];
	$back = !isset($guildInfo[$i][5][5]) ? 0 : $guildInfo[$i][5][5];
	$chest = !isset($guildInfo[$i][5][6]) ? 0 : $guildInfo[$i][5][6];
	$wrist = !isset($guildInfo[$i][5][7]) ? 0 : $guildInfo[$i][5][7];
	$hands = !isset($guildInfo[$i][5][8]) ? 0 : $guildInfo[$i][5][8];
	$waist = !isset($guildInfo[$i][5][9]) ? 0 : $guildInfo[$i][5][9];
	$legs = !isset($guildInfo[$i][5][10]) ? 0 : $guildInfo[$i][5][10];
	$feet = !isset($guildInfo[$i][5][11]) ? 0 : $guildInfo[$i][5][11];
	$ring1 = !isset($guildInfo[$i][5][12]) ? 0 : $guildInfo[$i][5][12];
	$ring2 = !isset($guildInfo[$i][5][13]) ? 0 : $guildInfo[$i][5][13];
	$trinket1 = !isset($guildInfo[$i][5][14]) ? 0 : $guildInfo[$i][5][14];
	$trinket2 = !isset($guildInfo[$i][5][15]) ? 0 : $guildInfo[$i][5][15];
	$mainhand = !isset($guildInfo[$i][5][16]) ? 0 : $guildInfo[$i][5][16];
	$offhand = !isset($guildInfo[$i][5][17]) ? 0 : $guildInfo[$i][5][17];
	$enchant_weapon = !isset($guildInfo[$i][5][18]) ? 0 : $guildInfo[$i][5][18];
	$enchant_neck = !isset($guildInfo[$i][5][19]) ? 0 : $guildInfo[$i][5][19];
	$enchant_ring1 = !isset($guildInfo[$i][5][20]) ? 0 : $guildInfo[$i][5][20];
	$enchant_ring2 = !isset($guildInfo[$i][5][21]) ? 0 : $guildInfo[$i][5][21];
	$enchant_cloak = !isset($guildInfo[$i][5][22]) ? 0 : $guildInfo[$i][5][22];
	$highmaul_normal_kills = !isset($guildInfo[$i][5][23]) ? 0 : $guildInfo[$i][5][23];
	$highmaul_heroic_kills = !isset($guildInfo[$i][5][24]) ? 0 : $guildInfo[$i][5][24];
	$highmaul_mythic_kills = !isset($guildInfo[$i][5][25]) ? 0 : $guildInfo[$i][5][25];
	$blackrock_normal_kills = !isset($guildInfo[$i][5][26]) ? 0 : $guildInfo[$i][5][26];
	$blackrock_heroic_kills = !isset($guildInfo[$i][5][27]) ? 0 : $guildInfo[$i][5][27];
	$blackrock_mythic_kills = !isset($guildInfo[$i][5][28]) ? 0 : $guildInfo[$i][5][28];

	$ring_max = max($ring1, $ring2);

	//FIXME
	$level = 100;

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

	$stmt->bind_param("sssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii",$name, $realm, $role, $class, $level, $ilvl, $ring_max, $heroicKills, $head, $neck, $shoulder, $back, $chest, $wrist, $hands, $waist, $legs, $feet, $ring1, $ring2, $trinket1, $trinket2, $mainhand, $offhand, $enchant_weapon, $enchant_neck, $enchant_cloak, $enchant_ring1, $enchant_ring2, $highmaul_normal_kills , $highmaul_heroic_kills , $highmaul_mythic_kills , $blackrock_normal_kills, $blackrock_heroic_kills, $blackrock_mythic_kills);

	if( $stmt->execute() ) {
		echo "<b>$name</b> written to database OK.<br />";
	} else {
		echo "Error writing <b>$name</b>";
		var_dump($stmt);
	}
	$stmt->close();
}
$conn->close();
?>

