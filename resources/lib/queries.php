<?php
# List of character information
define('MEMBERS',
'SELECT
	members.name, 
	members.realm, 
	members.role, 
	wow_classes.name AS classname, 
	members.level, 
	members.ilvl, 
	members.ring_max,
	members.heroics, 
	members.head, 
	members.neck, 
	members.shoulder, 
	members.back, 
	members.chest, 
	members.wrist,
	members.hands, 
	members.waist, 
	members.legs, 
	members.feet, 
	members.ring1, 
	members.ring2, 
	members.trinket1,
	members.trinket2, 
	members.mainhand, 
	members.offhand, 
	members.enchant_weapon, 
	members.enchant_neck,
	members.enchant_cloak, 
	members.enchant_ring1, 
	members.enchant_ring2, 
	members.highmaul_kills_normal,
	members.highmaul_kills_heroic, 
	members.highmaul_kills_mythic, 
	members.blackrock_kills_normal,
	members.blackrock_kills_heroic, 
	members.blackrock_kills_mythic,
	wow_classes.css_name
FROM
	members
	INNER JOIN wow_classes ON members.class = wow_classes.id
');


