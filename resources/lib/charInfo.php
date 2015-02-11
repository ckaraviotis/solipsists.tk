<?php
#
# Get full character item, statistics, progression and talent info from the armory
#
function charInfo($name, $realm) {

	$url = 'http://eu.battle.net/api/wow/character/'.$realm.'/'.$name.'?fields=items,statistics,progression,talents';
	$charJSON = file_get_contents($url, FILE_TEXT);
	$char = json_decode($charJSON);

	$wodStats = $char->{"statistics"}->{"subCategories"}[5]->{"subCategories"}[5]->{"statistics"};

	// Heroic Dungeon Boss Kills
	$heroicKills =  !isset($wodStats[1]->{"quantity"}) ? 0 : $wodStats[1]->{"quantity"};
	$heroicKills += !isset($wodStats[3]->{"quantity"}) ? 0 : $wodStats[3]->{"quantity"};
	$heroicKills += !isset($wodStats[5]->{"quantity"}) ? 0 : $wodStats[5]->{"quantity"};
	$heroicKills += !isset($wodStats[7]->{"quantity"}) ? 0 : $wodStats[7]->{"quantity"};
	$heroicKills += !isset($wodStats[9]->{"quantity"}) ? 0 : $wodStats[9]->{"quantity"};
	$heroicKills += !isset($wodStats[11]->{"quantity"}) ? 0 : $wodStats[11]->{"quantity"};
	$heroicKills += !isset($wodStats[13]->{"quantity"}) ? 0 : $wodStats[13]->{"quantity"};
	$heroicKills += !isset($wodStats[15]->{"quantity"}) ? 0 : $wodStats[15]->{"quantity"};

	$head = !isset($char->{"items"}->{"head"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"head"}->{"itemLevel"};
	$neck = !isset($char->{"items"}->{"neck"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"neck"}->{"itemLevel"};
	$shoulder = !isset($char->{"items"}->{"shoulder"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"shoulder"}->{"itemLevel"};
	$back = !isset($char->{"items"}->{"back"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"back"}->{"itemLevel"};
	$chest = !isset($char->{"items"}->{"chest"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"chest"}->{"itemLevel"};
	$wrist = !isset($char->{"items"}->{"wrist"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"wrist"}->{"itemLevel"};
	$hands = !isset($char->{"items"}->{"hands"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"hands"}->{"itemLevel"};
	$waist = !isset($char->{"items"}->{"waist"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"waist"}->{"itemLevel"};
	$legs = !isset($char->{"items"}->{"legs"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"legs"}->{"itemLevel"};
	$feet = !isset($char->{"items"}->{"feet"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"feet"}->{"itemLevel"};
	$finger1 = !isset($char->{"items"}->{"finger1"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"finger1"}->{"itemLevel"};
	$finger2 = !isset($char->{"items"}->{"finger2"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"finger2"}->{"itemLevel"};
	$trinket1 = !isset($char->{"items"}->{"trinket1"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"trinket1"}->{"itemLevel"};
	$trinket2 = !isset($char->{"items"}->{"trinket2"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"trinket2"}->{"itemLevel"};
	$mainHand = !isset($char->{"items"}->{"mainHand"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"mainHand"}->{"itemLevel"};	
	$offHand = !isset($char->{"items"}->{"offHand"}->{"itemLevel"}) ? 0 : $char->{"items"}->{"offHand"}->{"itemLevel"};

	$weaponEnchant = !isset($char->{"items"}->{"mainHand"}->{"tooltipParams"}->{"enchant"}) ? 0 : $char->{"items"}->{"mainHand"}->{"tooltipParams"}->{"enchant"};
	$neckEnchant = !isset($char->{"items"}->{"neck"}->{"tooltipParams"}->{"enchant"}) ? 0 : $char->{"items"}->{"neck"}->{"tooltipParams"}->{"enchant"};
	$ring1Enchant = !isset($char->{"items"}->{"finger1"}->{"tooltipParams"}->{"enchant"}) ? 0 : $char->{"items"}->{"finger1"}->{"tooltipParams"}->{"enchant"};
	$ring2Enchant = !isset($char->{"items"}->{"finger2"}->{"tooltipParams"}->{"enchant"}) ? 0 : $char->{"items"}->{"finger2"}->{"tooltipParams"}->{"enchant"};
	$cloakEnchant = !isset($char->{"items"}->{"back"}->{"tooltipParams"}->{"enchant"}) ? 0 : $char->{"items"}->{"back"}->{"tooltipParams"}->{"enchant"};

	$highmaulStats =  $char->{"progression"}->{"raids"}[32]->{"bosses"};
	$highmaul_normal_kills = 0;
	$highmaul_heroic_kills = 0;
	$highmaul_mythic_kills = 0;
	for ($i = 0; $i < count($highmaulStats); $i++) {
		$highmaul_normal_kills += $highmaulStats[$i]->{"normalKills"};
		$highmaul_heroic_kills += $highmaulStats[$i]->{"heroicKills"};
		$highmaul_mythic_kills += $highmaulStats[$i]->{"mythicKills"};
	}

	$blackrockStats =  $char->{"progression"}->{"raids"}[33]->{"bosses"};
        $blackrock_normal_kills = 0;
        $blackrock_heroic_kills = 0;
        $blackrock_mythic_kills = 0;
        for ($i = 0; $i < count($highmaulStats); $i++) {
                $blackrock_normal_kills += $blackrockStats[$i]->{"normalKills"};
                $blackrock_heroic_kills += $blackrockStats[$i]->{"heroicKills"};
                $blackrock_mythic_kills += $blackrockStats[$i]->{"mythicKills"};
        }


	$ilvl = $char->{"items"}->{"averageItemLevel"};

	$returnObject = [$heroicKills, $ilvl, $head, $neck, $shoulder, $back, $chest, $wrist, $hands, $waist, $legs, $feet, $finger1, $finger2, $trinket1, $trinket2, $mainHand, $offHand,
	$weaponEnchant, $neckEnchant, $ring1Enchant, $ring2Enchant, $cloakEnchant, $highmaul_normal_kills, $highmaul_heroic_kills, $highmaul_mythic_kills,
	$blackrock_normal_kills, $blackrock_heroic_kills, $blackrock_mythic_kills
	];

	return $returnObject;
}

