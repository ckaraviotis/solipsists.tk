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
WHERE
	IsCurrent = 1
');
define('LITE_MEMB',
'SELECT
	members.name, 
	members.realm, 
	members.role, 
	wow_classes.name AS classname, 
	members.level, 
	members.ilvl, 
	members.ring_max,
	weapon_enchant.enchant AS enchant_weapon, 
	neck_enchant.enchant AS enchant_neck,
	cloak_enchant.enchant AS enchant_cloak, 
	ring1_enchant.enchant AS enchant_ring1, 
	ring2_enchant.enchant AS enchant_ring2, 
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
	INNER JOIN wow_enchants weapon_enchant ON members.enchant_weapon = weapon_enchant.enchantID
	INNER JOIN wow_enchants neck_enchant ON members.enchant_neck = neck_enchant.enchantID
	INNER JOIN wow_enchants cloak_enchant ON members.enchant_cloak = cloak_enchant.enchantID
	INNER JOIN wow_enchants ring1_enchant ON members.enchant_ring1 = ring1_enchant.enchantID
	INNER JOIN wow_enchants ring2_enchant ON members.enchant_ring2 = ring2_enchant.enchantID
WHERE
	IsCurrent = 1
');

define('LATEST_POSTS',
'
SELECT
        thumbnail,
        postContent,
        postDate,
        postUser
FROM
        posts

ORDER BY postDate DESC
LIMIT 10
');
define('NEW_ENCHANT_IDS',
'SELECT DISTINCT 
	enchantID
FROM 
(
	SELECT enchant_weapon as enchantID FROM `members`
	UNION ALL
	SELECT enchant_neck  as enchantID FROM `members`
	UNION ALL
	SELECT enchant_cloak  as enchantID FROM `members`
	UNION ALL
	SELECT enchant_ring1  as enchantID FROM `members`
	UNION ALL
	SELECT enchant_ring2 as enchantID FROM `members`
) enchants
');
define('CURR_ENCHANT_IDS',
'SELECT  
	enchantID,
	enchant
FROM 
	wow_enchants
');