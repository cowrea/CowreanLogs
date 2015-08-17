<?php
  $DBconnection = openDB();
/*
  // Raidname
  $query        = "SELECT e.name FROM `event` e WHERE e.id=" .$_GET['event'];
  $result = executeQuery($DBconnection, $query);
  $currentRaid= $result->fetch_object();
  echo $currentRaid->name;


  // Encounter
  $query      = "SELECT c.char_name_de FROM `character` c WHERE c.id=" .$_GET['encounter'];
  $result = executeQuery($DBconnection, $query);
  $currentEncounter = $result->fetch_object();
  echo " > " .$currentEncounter->char_name_de;


  // Damage, Heal
  echo " > ";
  switch($_GET['focus']) {
    case 1:   echo "General";
      break;
    case 2:   echo "Healing Done";
      break;
    case 3:   echo "Healing Taken";
      break;
    case 4:   echo "Damage Done";
      break;
    case 5:   echo "Damage Taken";
      break;
    case 6:   echo "Mana Gain";
      break;
    case 7:   echo "Energie Gain";
      break;
    case 8:   echo "Rage Gain";
      break;
    case 9:   echo "Timeline";
      break;
    case 10:  
      break;
    case 11:
      break;
    case 12:
      break;
    case 13:
      break;
    case 14:
      break;
    case 15:
      break;
    case 16:
      break;
  } 

*/
?>
<table>
  <tr>
    <td><a href="main.php?top=1&left=3&right=0">Startseite</a></td>
    <td><a href="main.php?top=1&left=2&right=0">Events</a></td>
    <td><a href="main.php?top=1&left=4&right=0">Administration</td></tr>
</table>
