<?php
function charInfo($name, $realm) {

	$url = 'http://eu.battle.net/api/wow/character/'.$realm.'/'.$name.'?fields=items,statistics,progression,talents';
	$charJSON = file_get_contents($url, FILE_TEXT);
	$char = json_decode($charJSON);
	
	$wodStats = $char->{"statistics"}->{"subCategories"}[5]->{"subCategories"}[5]->{"statistics"};

	$heroicKills += $wodStats[1]->{"quantity"};
	$heroicKills += $wodStats[3]->{"quantity"};
	$heroicKills += $wodStats[5]->{"quantity"};
	$heroicKills += $wodStats[7]->{"quantity"};
	$heroicKills += $wodStats[9]->{"quantity"};
	$heroicKills += $wodStats[11]->{"quantity"};
	$heroicKills += $wodStats[13]->{"quantity"};
	$heroicKills += $wodStats[15]->{"quantity"};


	$head = $char->{"items"}->{"head"}->{"itemLevel"};
	$neck = $char->{"items"}->{"neck"}->{"itemLevel"};
	$shoulder = $char->{"items"}->{"shoulder"}->{"itemLevel"};
	$back = $char->{"items"}->{"back"}->{"itemLevel"};
	$chest = $char->{"items"}->{"chest"}->{"itemLevel"};
	$wrist = $char->{"items"}->{"wrist"}->{"itemLevel"};
	$hands = $char->{"items"}->{"hands"}->{"itemLevel"};
	$waist = $char->{"items"}->{"waist"}->{"itemLevel"};
	$legs = $char->{"items"}->{"legs"}->{"itemLevel"};
	$feet = $char->{"items"}->{"feet"}->{"itemLevel"};
	$finger1 = $char->{"items"}->{"finger1"}->{"itemLevel"};
	$finger2 = $char->{"items"}->{"finger2"}->{"itemLevel"};
	$trinket1 = $char->{"items"}->{"trinket1"}->{"itemLevel"};
	$trinket2 = $char->{"items"}->{"trinket2"}->{"itemLevel"};
	$mainHand = $char->{"items"}->{"mainHand"}->{"itemLevel"};
	$offHand = $char->{"items"}->{"offHand"}->{"itemLevel"};

	$weaponEnchant = $char->{"items"}->{"mainHand"}->{"tooltipParams"}->{"enchant"};
	$neckEnchant = $char->{"items"}->{"neck"}->{"tooltipParams"}->{"enchant"};
	$ring1Enchant = $char->{"items"}->{"finger1"}->{"tooltipParams"}->{"enchant"};
	$ring2Enchant = $char->{"items"}->{"finger2"}->{"tooltipParams"}->{"enchant"};
	$cloakEnchant = $char->{"items"}->{"back"}->{"tooltipParams"}->{"enchant"};

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

	$returnObject = [$heroicKills, $head, $neck, $shoulder, $back, $chest, $wrist, $hands, $waist, $legs, $feet, $finger1, $finger2, $trinket1, $trinket2, $mainHand, $offHand,
	$weaponEnchant, $neckEnchant, $ring1Enchant, $ring2Enchant, $cloakEnchant, $highmaul_normal_kills, $highmaul_heroic_kills, $highmaul_mythic_kills,
	$blackrock_normal_kills, $blackrock_heroic_kills, $blackrock_mythic_kills
	];

	return $returnObject;
}
?>
