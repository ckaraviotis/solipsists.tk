function getCharacter(toonName,toonRealm) {
 
  if(!toonName)
  {
    return "";
  }
    if(!toonRealm)
  {
    return "";
  }
  
  var toonJSON = UrlFetchApp.fetch("eu.battle.net/api/wow/character/"+toonRealm+"/"+toonName+"?fields=items,statistics,progression,talents"); 
  var toon = JSON.parse(toonJSON.getContentText()); 
 
  var wodstats = toon.statistics.subCategories[5].subCategories[5].statistics 
  
  var gugrokkkills = wodstats[1].quantity 
  var skullockills = wodstats[3].quantity 
  var terongorkills = wodstats[5].quantity 
  var viryxkills = wodstats[7].quantity 
  var tovrakills = wodstats[9].quantity 
  var yalnukills = wodstats[11].quantity 
  var nerzhulkills = wodstats[13].quantity 
  var zaelakills = wodstats[15].quantity
  
  var headlvl = toon.items.head.itemLevel 
  if (headlvl > 630) { headlvl = 630 } 
  
  var necklvl = toon.items.neck.itemLevel 
  if (necklvl > 630) { necklvl = 630 } 
  
  var shoulderlvl = toon.items.shoulder.itemLevel 
  if (shoulderlvl > 630) { shoulderlvl = 630 } 
  
  var backlvl = toon.items.back.itemLevel 
  if (backlvl > 630) { backlvl = 630 } 
  
  var chestlvl = toon.items.chest.itemLevel 
  if (chestlvl > 630) { chestlvl = 630 } 
  
  var wristlvl = toon.items.wrist.itemLevel 
  if (wristlvl > 630) { wristlvl = 630 } 
  
  var weaponlvl = toon.items.mainHand.itemLevel 
  if (weaponlvl > 630) { weaponlvl = 630 } 
  
  var offhandlvl = 0
  var offhand = 0
  if (toon.items.offHand) { 
    offhandlvl = toon.items.offHand.itemLevel 
    offhand = offhandlvl 
    if (offhandlvl > 630) { offhandlvl = 630 } 
  } 
  
  var handslvl = toon.items.hands.itemLevel 
  if (handslvl > 630) { handslvl = 630 } 
  
  var waistlvl = toon.items.waist.itemLevel 
  if (waistlvl > 630) { waistlvl = 630 } 
  
  var legslvl = toon.items.legs.itemLevel 
  if (legslvl > 630) { legslvl = 630 } 
  
  var feetlvl = toon.items.feet.itemLevel 
  if (feetlvl > 630) { feetlvl = 630 } 
  
  var finger1lvl = toon.items.finger1.itemLevel 
  if (finger1lvl > 630) { finger1lvl = 630 } 
  
  var finger2lvl = toon.items.finger2.itemLevel 
  if (finger2lvl > 630) { finger2lvl = 630 } 
  
  var trinket1lvl = toon.items.trinket1.itemLevel 
  if (trinket1lvl > 630) { trinket1lvl = 630 } 
  
  var trinket2lvl = toon.items.trinket2.itemLevel 
  if (trinket2lvl > 630) { trinket2lvl = 630 } 
  
  var CM_iL_Total = headlvl+necklvl+shoulderlvl+backlvl+chestlvl+wristlvl+handslvl+waistlvl+legslvl+feetlvl+finger1lvl+finger2lvl+trinket1lvl+trinket2lvl+weaponlvl+offhandlvl 
  var CM_iL = CM_iL_Total / 16 
  if (offhandlvl == 0) { CM_iL = CM_iL_Total / 15 } 
  
  
  var wepchantID = toon.items.mainHand.tooltipParams["enchant"]
  var wepchant
  switch (wepchantID) {
    case 5336:
      wepchant = "Blackrock"
      break;
    case 5335:
      wepchant = "Shadowmoon"
      break;
    case 5334:
      wepchant = "Frostwolf"
      break;
    case 5331:
      wepchant = "Shattered Hand"
      break;
    case 5276:
      wepchant = "Megawatt"
      break;
    case 5275:
      wepchant = "Oglethorp's"
      break;
    case 5383:
      wepchant = "Hemet's"
      break;
    case 5330:
      wepchant = "Thunderlord"
      break;
    case 5337: 
      wepchant = "Warsong"
      break;
    case 5384:
      wepchant = "Bleeding Hollow"
      break;
    default:
      wepchant = "None"
  } 
  if (toon.class == 6) {wepchant = "DK"}
     
  var class;
  switch(toon.class) {
    case 1:
      class = "Warrior"
      break;
    case 2:
      class = "Paladin"
      break;
    case 3:
      class = "Hunter"
      break;
    case 4:
      class = "Rogue"
      break;
    case 5:
      class = "Priest"
      break;
    case 6:
      class = "Death Knight"
      break;
    case 7:
      class = "Shaman"
      break;
    case 8:
      class = "Mage"
      break;
    case 9:
      class = "Warlock"
      break;
    case 10:
      class = "Monk"
      break;
    case 11:
      class = "Druid"
      break;
  }
  
  var gi = [5310, 5317, 5311, 5324, 5318, 5325, 5312, 5319, 5326, 5313, 5320, 5327, 5314, 5321, 5328]; // gift of X enchants
  var bi = [5281, 5285, 5284, 5298, 5292, 5297, 5300, 5293, 5299, 5302, 5294, 5301, 5304, 5295, 5303]; // breath of X enchants

  
  var neckchant
  if (gi.indexOf(toon.items.neck.tooltipParams["enchant"]) > -1) {
  neckchant = "Gift"
  } else if (bi.indexOf(toon.items.neck.tooltipParams["enchant"]) > -1) {
      neckchant = "Breath"
  } else {
      neckchant = "None"
  } 
  
  var r1chant
  if (gi.indexOf(toon.items.finger1.tooltipParams["enchant"]) > -1) {
  r1chant = "Gift"
  } else if (bi.indexOf(toon.items.finger1.tooltipParams["enchant"]) > -1) {
      r1chant = "Breath"
  } else {
      r1chant = "None"
  }
  
  var r2chant
  if (gi.indexOf(toon.items.finger2.tooltipParams["enchant"]) > -1) {
  r2chant = "Gift"
  } else if (bi.indexOf(toon.items.finger2.tooltipParams["enchant"]) > -1) {
      r2chant = "Breath"
  } else {
      r2chant = "None"
  }
  
  var cloakchant
  if (gi.indexOf(toon.items.back.tooltipParams["enchant"]) > -1) {
  cloakchant = "Gift"
  } else if (bi.indexOf(toon.items.back.tooltipParams["enchant"]) > -1) {
      cloakchant = "Breath"
  } else {
      cloakchant = "None"
  }
  
  var highmaulN = 0;
  var highmaulH = 0;
  var highmaulM = 0;
  for (i= 0; i < 7; i++)
  {
    if(toon.progression.raids[32].bosses[i].normalKills != 0)
    {
      highmaulN+=toon.progression.raids[32].bosses[i].normalKills
    }
    if(toon.progression.raids[32].bosses[i].heroicKills != 0)
    {
      highmaulH+=toon.progression.raids[32].bosses[i].heroicKills
    }
    if(toon.progression.raids[32].bosses[i].mythicKills != 0)
    {
      highmaulM+=toon.progression.raids[32].bosses[i].mythicKills
    }   
  }
  
  var brfN = 0;
  var brfH = 0;
  var brfM = 0;
  for (i= 0; i < 10; i++)
  {
    if(toon.progression.raids[33].bosses[i].normalKills != 0)
    {
      brfN+=toon.progression.raids[33].bosses[i].normalKills
    }
    if(toon.progression.raids[33].bosses[i].heroicKills != 0)
    {
      brfH+=toon.progression.raids[33].bosses[i].heroicKills
    }
    if(toon.progression.raids[33].bosses[i].mythicKills != 0)
    {
      brfM+=toon.progression.raids[33].bosses[i].mythicKills
    }   
  }
  
  var toonInfo = new Array( 
    class, toon.level, toon.items.averageItemLevelEquipped, Math.floor(CM_iL), 
    Math.max(toon.items.finger1.itemLevel, toon.items.finger2.itemLevel), 
    nerzhulkills+zaelakills+gugrokkkills+skullockills+terongorkills+viryxkills+yalnukills+tovrakills, 
    toon.items.head.itemLevel, toon.items.neck.itemLevel, 
	toon.items.shoulder.itemLevel, toon.items.back.itemLevel, 
	toon.items.chest.itemLevel, toon.items.wrist.itemLevel, 
	toon.items.hands.itemLevel, toon.items.waist.itemLevel, 
	toon.items.legs.itemLevel, toon.items.feet.itemLevel, 
	toon.items.finger1.itemLevel, toon.items.finger2.itemLevel, 
	toon.items.trinket1.itemLevel,toon.items.trinket2.itemLevel, 
    toon.items.mainHand.itemLevel, offhand, 
    wepchant, neckchant, cloakchant, r1chant, r2chant, 
	highmaulN, highmaulH, highmaulM, 
    brfN, brfH, brfM
  )
 return toonInfo;
}