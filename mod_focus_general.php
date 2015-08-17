  <h4>General</h4>
<?php

  $DBconnection=openDB();
  
  // Healing Done
  $query="SELECT IFNULL(SUM(l.value), 0) AS heal FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(13, 14, 15) ";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);  
  $currentFocus=$result->fetch_object();
?>
  <table>
    <tr>
      <td>Healing Done</td>
      <td align="right"><?php echo number_format(($currentFocus->heal), 0, ',', '.');?></td></tr>
<?php

  // Healing Taken
  $query="SELECT IFNULL(SUM(l.value), 0) AS heal FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`target`='" .$_GET['trigger'] ."' AND l.value_type IN(13, 14, 15)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
   ?><tr><td>Healing Taken</td>
   <td align="right"><?php echo number_format(($currentFocus->heal), 0, ',', '.');?></td></tr>
<?php



  // Damage Done
  $query="SELECT IFNULL(SUM(l.value), 0) AS damage FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(1, 2, 3, 4 ,5)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Damage Done</td>
  <td align="right"><?php echo number_format(($currentFocus->damage), 0, ',', '.');?></td></tr>

<?php

  // Damage Taken
  $query="SELECT IFNULL(SUM(l.value), 0) AS damage FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`target`='" .$_GET['trigger'] ."' AND l.value_type IN(1, 2, 3, 4 ,5)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Damage Taken</td>
  <td align="right"><?php echo number_format(($currentFocus->damage), 0, ',', '.');?></td></tr>

<?php

  // Mana gain
  $query="SELECT IFNULL(SUM(l.value), 0) AS mana FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(16)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Mana gain</td>
  <td align="right"><?php echo number_format(($currentFocus->mana), 0, ',', '.');?></td></tr>

<?php

  // Rage gain
  $query="SELECT IFNULL(SUM(l.value), 0) AS rage FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(17)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Rage gain</td>
  <td align="right"><?php echo $currentFocus->rage;?></td></tr>

<?php

  // Energie gain
  $query="SELECT IFNULL(SUM(l.value), 0) AS energie FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(18)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Energie gain</td>
  <td align="right"><?php echo $currentFocus->energie;?></td></tr>

<?php

    // Deaths
  $query="SELECT IFNULL(COUNT(l.value), 0) AS death FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(20)";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  ?><tr><td>Deaths</td>
  <td align="right"><?php echo $currentFocus->death;?></td></tr>

<?php

?>
  </table>
