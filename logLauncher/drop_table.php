<?php
  // Open DB-Connection
  $dbConnection=openDB();

  // Drop Tmp-Table
  $query="DROP TABLE `tmp_combat_log`;";
  $result=executeQuery($dbConnection, $query);

echo "test";  
  
  

  // create new tmp table
  $query="CREATE TABLE `tmp_combat_log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` DATETIME NULL DEFAULT NULL, 
  `event` INT(11) NULL,
  `trigger` VARCHAR(50) NULL,
  `target` VARCHAR(50) NULL,
  `separator` INT(11) NULL,
  `value` INT(11) NULL,
  `value_type` INT(11) NULL,
  `value2` INT(11) NULL,
  `value2_type` INT(11) NULL,
  `spell` VARCHAR(50) NULL,
  `damage_school` INT(11) NULL,
  PRIMARY KEY (`id`)
)";


  $result=executeQuery($dbConnection, $query);
?>
