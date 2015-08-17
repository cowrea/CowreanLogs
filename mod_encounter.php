<h3>Encounter-Menue</h3>
<table>
  <tr>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=10&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Healing Done</a></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=11&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Healing Taken</a></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=12&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Damage Done</a></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=13&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Damage Taken</a></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=14&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Mana gain</a></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=15&filter1=<?php echo $_GET['filter1']; if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>">Timeline</a></td>
  </tr>
</table>

<?php

  $DBconnection=openDB();


  // Check for Wipes

  // Get Combattime
  $query   =" SELECT MIN(l.timestamp) as min, MAX(l.timestamp) as max";
  $query  .=" FROM combat_log l";
  $query  .=" WHERE l.`event`=" .$_GET['event'];
  $query  .=" AND l.`trigger`=" .$_GET['encounter'];
  //echo $query;
  $result  = executeQuery($DBconnection, $query);
  $currentEncounter=$result->fetch_object();

  $query   =" SELECT ROUND(UNIX_TIMESTAMP(l.timestamp)/30) as zeitstempel, l.timestamp";
  $query  .=" FROM combat_log l"; 
  $query  .=" WHERE l.`event`=" .$_GET['event'];
  $query  .=" AND l.timestamp > '" .$currentEncounter->min ."'";
  $query  .=" AND l.timestamp < '" .$currentEncounter->max ."'";
  $query  .=" AND value_type IN(1,2,3,4,5,6,7,8,9,10,19)";
  $query  .=" AND l.spell != 378";
  $query  .=" GROUP BY zeitstempel;";
  //echo $query;

  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;

  $currentEncounter = $result->fetch_object();
  $timestamp=$currentEncounter->zeitstempel;
  $wipe[0]=$currentEncounter->timestamp;
  
  $j=1;
  for($i=1;$i<$numrows;$i++){
    $currentEncounter=$result->fetch_object();

    if($timestamp+1<$currentEncounter->zeitstempel) {
      $wipe[$j]=$currentEncounter->timestamp;
      $j++;
    }
    $timestamp=$currentEncounter->zeitstempel;
  }
  $wipe[$j++]=$currentEncounter->timestamp;
  
  ?>
    <a href="main.php?top=<?php echo $_GET['top'];?>&left=<?php echo $_GET['left'];?>&right=<?php echo $_GET['right'];?>&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=<?php echo $_GET['focus'];?>&filter1=<?php echo $_GET['filter1'];?>&encounter=<?php echo $_GET['encounter'];?>">Whole Encounter</a>

    <table>
      <tr>
        <th>Try</th>
        <th>Duration</th>
        <th>Start</th>
        <th>End</th></tr>
  <?php

  for($k=0;$k<$j-1;$k++) {

  $query   = " SELECT MIN(TIME(l.timestamp)) AS min, MAX(TIME(l.timestamp)) AS max, TIME_FORMAT(TIMEDIFF(MAX(l.timestamp), MIN(l.timestamp)), '%i:%s') AS duration";
  $query  .= " FROM combat_log l";
  $query  .= " WHERE l.`event`=" .$_GET['event'];
  $query  .= " AND l.timestamp >= '" .$wipe[$k] ."'";
  $query  .= " AND l.timestamp < '" .$wipe[$k+1] ."'";
  $query  .= " AND l.value_type IN (1,2,3,4,5,6,7,8,9,10,19);";
  //echo $query ."<br>";
 
  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;
  
    for($i=0;$i<$numrows;$i++) {
      $currentEncounter = $result->fetch_object();
      ?><tr><td><a href="main.php?top=<?php echo $_GET['top'];?>&left=<?php echo $_GET['left'];?>&right=<?php echo $_GET['right'];?>&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=<?php echo $_GET['focus'];?>&filter1=<?php echo $_GET['filter1'];?>&encounter=<?php echo $_GET['encounter'];?>&start=<?php echo $wipe[$k];?>&end=<?php echo $wipe[$k+1];?>" ><?php echo $k+1;?></a></td><td>
      <?php echo $currentEncounter->duration;?></td><td>
      <?php echo $currentEncounter->min;?></td><td>
      <?php echo $currentEncounter->max;?></td><tr>
      <?php
    }
  }
?>
</table>
