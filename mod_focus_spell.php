<?php 
?>

  <h4><?php echo $focusString[0];?> <?php echo $focusString[1];?></h4>

<?php
  // Ask Database for Sum of Healing, Damage, etc.
  $query   ="SELECT IFNULL(SUM(l.value), 0) AS value ";
  $query  .="FROM combat_log l ";
  $query  .="WHERE l.`event`=" .$_GET['event'];
  $query  .=" AND l.`" .$DBtrigger ."`='" .$trigger;
  $query  .="' AND l.value_type=" .$_GET['filter1'] ." ";
  if($_GET['start'] && $_GET['end']) {
    $query.=" AND timestamp > '" .$_GET['start'] ."' ";
    $query.=" AND timestamp < '" .$_GET['end'] ."' ";
  }
  $query  .="AND l.spell='" .$_GET['spell'] ."';";
  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  $sumValue=$currentFocus->value;
  

  // Print Table Header
?>
  <p><?php echo $focusString[0];?> <?php echo $focusString[1];?>: <?php echo number_format($sumValue, 0, ',', '.');;?>
    <table class="border">
      <tr>
        <th>Position</th>
        <th>Time</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>Type</th>
        <th>Target</th></tr>
<?php

  // Get Value Ranking
  $query   ="SELECT l.value, l.value_type, l.timestamp, c.char_name_de AS src ";
  $query  .="FROM combat_log l, combat_action a, `character` c ";
  $query  .="WHERE l.value_type=a.combatID ";
  $query  .=" AND l.`" .$DBtarget ."`=c.id ";
  $query  .="AND l.`event`=" .$_GET['event'];
  $query  .=" AND l.`" .$DBtrigger ."`='" .$trigger;
  $query  .="' AND l.value_type=" .$_GET['filter1'] ." ";
  if($_GET['start'] && $_GET['end']) {
    $query.=" AND timestamp > '" .$_GET['start'] ."' ";
    $query.=" AND timestamp < '" .$_GET['end'] ."' ";
  }
  $query  .="AND spell='" .$_GET['spell'] ."' ";
  $query  .="ORDER BY timestamp ASC;";

  $ranking_result=executeQuery($DBconnection, $query);
  $rankRows=$ranking_result->num_rows;
 


  for($i=1;$i<=$rankRows;$i++) {
    $currentRanking=$ranking_result->fetch_object();

    ?><tr><td align="right"><?php echo $i?></td>
    <td align="right"><?php echo $currentRanking->timestamp;?></td>
    <td align="right"><?php echo number_format(($currentRanking->value/$sumValue*100), 2, ',', ".");?> %</td>
    <td align="right"><?php echo number_format(($currentRanking->value), 0, ',', ".");?></td>
    <td align="left"><?php switch($currentRanking->value_type) {
                        case  1:
                        case 13:  ?>Hit<?php
                          break;

                        case  2:
                        case 15:  ?>Crit<?php
                          break;
                        
                        case 14:  ?>HoT<?php
                          break;

                        case 19:  ?>DoT<?php
                          break;
                        case  3:  ?>Glancing<?php
                          break;
                      }?></td>
    <td align="left"><?php echo $currentRanking->src;?></td>

    </tr>







    <?php
    $value[$i]=number_format($currentRanking->sum/$sumValue*100, 2, ".", "");
  }
?>

    </table>
  </p>
    <?php if($value[1]>0) {?>
      <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" >
    <?php } ?>
  <p><h5><?php echo $focusString[0];?> <?php echo $focusString[1];?> to targets</h5>
    <table class="border">
      <tr>
        <td>Position</td>
        <td>Target</td>
        <td>Relativ</td>
        <td>Absolute</td>
        <td>Quantity</td>
        <td>AVG</td>
        <td>Min</td>
        <td>Max</td></tr>
   
<?php
  $query   ="SELECT c.char_name_de AS src, IFNULL(SUM(l.value), 0) AS sum, COUNT(l.value) AS quantity, MIN(l.value) AS min, AVG(l.value) AS avg, Max(l.value) AS max ";
  $query  .="FROM combat_log l, `character`c ";
  $query  .="WHERE l.`event`=" .$_GET['event'];
  $query  .=" AND l." .$DBtarget_char ." = c.id ";
  $query  .=" AND l.`" .$DBtrigger_char ."`='" .$trigger;
  $query  .="' AND l.value_type=" .$_GET['filter1'] ." ";
  if($_GET['start'] && $_GET['end']) {
    $query.=" AND timestamp > '" .$_GET['start'] ."' ";
    $query.=" AND timestamp < '" .$_GET['end'] ."' ";
  }

  $query  .="AND l.value>0 ";
  $query  .="AND l.spell='". $_GET['spell'];
  $query  .="' GROUP BY src ";
  $query  .="ORDER BY sum DESC;";

  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;

  for($i=1;$i<=$numrows;$i++) {
    $currentFocus=$result->fetch_object();
    
    ?><tr><td align="right"><?php echo $i;?></td>
    <td><?php echo $currentFocus->src;?></td>
    <td align="right"><?php echo number_format(($currentFocus->sum/$sumValue*100), 2, ',', ".");?> %</td>
    <td align="right"><?php echo number_format(($currentFocus->sum), 0, ',', ".");?></td>
    <td align="right"><?php echo number_format(($currentFocus->quantity), 0, ",", ".");?></td>
    <td align="right"><?php echo number_format(($currentFocus->avg), 2, ',', '.');?></td>
    <td align="right"><?php echo number_format($currentFocus->min, 0, ',', '.');?></td>
    <td align="right"><?php echo number_format($currentFocus->max, 0, ',', '.');?></td></tr>
    <?php
    $value[$i]=number_format($currentFocus->sum/$sumValue*100, 2, ".", "");
  }
         ?>
    </tr>
  </table>
</p>
  <?php if($value[1]!=null) { ?>
    <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" >
  <?php } ?>
