<?php 
  $trigger=$_GET['trigger'];

?>

  <table>
    <tr>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=1&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">General</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=2&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Healing Done</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=3&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Healing Taken</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=4&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];} if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Damage Done</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=5&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Damage Taken</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=6&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Mana gain</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=7&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Energy gain</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=8&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Rage gain</a></td>
      <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=9&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>">Timeline</a></td>
      <td>Buff uptime</td>
      <td>Debuff uptime</td></tr>
  </table>

<?php
  if($_GET['encounter'])
    include "mod_encounter.php";


  $focus="";
  switch($_GET['focus']) {
    case 1:   // General
              include "mod_focus_general.php";
      break;
    case 2:   // Healing Done
              $valueTypeArray = array (13, 15, 14);
              $focusString    = array ("Healing", "Done");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";

      break;
    case 3:   // Healing Taken
              $valueTypeArray = array (13, 15, 14);
              $focusString    = array ("Healing", "Taken");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "target";
              $DBtarget       = "trigger";
              $DBtarget_char  = "trigger";
              $DBtrigger_char = "target";
      break;
    case 4:   // Damage Done
              $valueTypeArray = array (1, 2, 3, 6, 7, 8, 9, 19);
              $focusString    = array ("Damage", "Done");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";

      break;
    case 5:   // Damage Taken
              $valueTypeArray = array(1, 2, 3, 6, 7, 8, 9, 19);
              $focusString    = array ("Damage", "Taken");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "target";
              $DBtarget       = "trigger";
              $DBtarget_char  = "trigger";
              $DBtrigger_char = "target";
      break;
    case 6:   // Mana Gain
              $valueTypeArray = array(16);
              $focusString    = array("Mana", "Gain");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";
      break;
    case 7:   // Energie Gain
              $valueTypeArray = array(18);
              $focusString    = array("Energie", "Gain");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";

      break;
    case 8:   // Rage Gain
              $valueTypeArray = array(17);
              $focusString    = array("Rage", "Gain");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";
      break;
    case 9:   // Timeline
              include "mod_focus_timeline.php";
      break;

    case 10:  // Healing Done While Encounter
              $valueTypeArray = array (13, 15, 14);
              $focusString    = array ("Healing", "Done");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "trigger";
              $DBtrigger_char = "trigger";
      break;
    case 11:  // Healing Taken  While Encounter
              $valueTypeArray = array (13, 15, 14);
              $focusString    = array ("Healing", "Taken");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "target";
              $DBtarget       = "trigger";
              $DBtarget_char  = "target";
              $DBtrigger_char = "target";
      break;
    case 12:  // Damage Done While Encounter
              $_GET['focus']  =4;
              $valueTypeArray = array (1, 2, 19, 3);
              $focusString    = array ("Damage", "Done");
              $trigger        = $_GET['encounter'];
              $DBtrigger      = "target";
              $DBtarget       = "trigger";
              $DBtarget_char  = "trigger";
              $DBtrigger_char = "target";
      break;
    
    case 13:  // Damage Taken While Encounter
              $_GET['focus']  = 5;
              $valueTypeArray = array(1, 2, 19, 3);
              $focusString    = array ("Damage", "Taken");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";
      break;
    case 14:   // Mana Gain While Encounter
              $valueTypeArray = array(16);
              $focusString    = array("Mana", "Gain");
              $trigger        = $_GET['trigger'];
              $DBtrigger      = "trigger";
              $DBtarget       = "target";
              $DBtarget_char  = "target";
              $DBtrigger_char = "trigger";
    break;
    case 15:  // Timeline While Encounter
              include "mod_focus_timeline.php";
      break;

  }


  switch($_GET['focus']) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 7:
    case 8:
    case 10:
    case 11:
    case 12:
    case 13:
    case 14:
              include "mod_focus_healing_done.php";
  }
?>
