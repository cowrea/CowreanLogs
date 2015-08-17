<?php
  //include "lib/function.php";
  //include "conf/conf.php";
  $DBconnection=openDB();
  
  // Update Timestamp
  $query  = "SELECT MIN(`timestamp`) AS `start`, MAX(`timestamp`) AS `end` ";
  $query .= "FROM tmp_combat_log ";
  $query .= 'WHERE `event`="' .$event .'";';
  $result = executeQuery($DBconnection, $query);

  $currentEvent=$result->fetch_object();

  // Update Event
  $query  ='SELECT english FROM instanz WHERE shortcut="' .$head .'";';
  $result = executeQuery($DBconnection, $query);
  $currentRaid=$result->fetch_object();
  $query  = 'UPDATE `event` SET `name`="' .$currentRaid->english .'", `start`="';
  $query .= $currentEvent->start;
  $query .= '", `end`="';
  $query .= $currentEvent->end;
  $query .= '" WHERE `id`=' .$event .';';
  $result = executeQuery($DBconnection, $query);

  // Insert new Character
  $query = ' INSERT INTO `character` (`character`.char_name_de)';
  $query .= ' SELECT tmp_combat_log.`trigger`';
  $query .= ' FROM tmp_combat_log';
  $query .= ' GROUP BY tmp_combat_log.`trigger`';
  $query .= ' ON DUPLICATE KEY UPDATE `character`.char_name_de = `character`.char_name_de';
  $result = executeQuery($DBconnection, $query);


  
  // Insert new Abilities
  $query = ' INSERT INTO `ability` (`ability`.ability_name_en)';
  $query .= ' SELECT tmp_combat_log.`spell`';
  $query .= ' FROM tmp_combat_log';
  $query .= ' GROUP BY tmp_combat_log.`spell`';
  $query .= ' ON DUPLICATE KEY UPDATE `ability`.ability_name_en = `ability`.ability_name_en;';
  $result = executeQuery($DBconnection, $query);




  // Replace Trigger-String by Trigger-ID
  $query = "UPDATE tmp_combat_log LEFT JOIN `character` ON `character`.char_name_de= tmp_combat_log.`trigger` set tmp_combat_log.`trigger` = `character`.id;";
  $result = executeQuery($DBconnection, $query);

  // Replae Target-String by Target-ID
  $query = "UPDATE tmp_combat_log LEFT JOIN `character` ON `character`.char_name_de= tmp_combat_log.`target` set tmp_combat_log.`target` = `character`.id;";
  $result = executeQuery($DBconnection, $query);

  // Replace Spell-String by Ability-ID
  $query = "UPDATE tmp_combat_log LEFT JOIN `ability` ON `ability`.ability_name_en= tmp_combat_log.`spell` set tmp_combat_log.`spell` = `ability`.id;";
  $result = executeQuery($DBconnection, $query);

  // Move Values from "tmp_combat_log" to combat_log
  $query  ="INSERT INTO combat_log  (`timestamp`, `event`, `trigger`, target, `separator`, value, value_type, value2, value2_type, spell, damage_school)
SELECT t.`timestamp`, t.`event`, t.`trigger`, t.target, t.`separator`, t.value, t.value_type, t.value2, t.value2_type, t.spell, t.damage_school
FROM tmp_combat_log t;";
  //echo $query;
  $result = executeQuery($DBconnection, $query);












//print_r($currentEvent);

?>
