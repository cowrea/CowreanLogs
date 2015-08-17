<?php
  if($_GET['filter1']!='') {
    include "mod_focus_spell.php";
    exit;
  }
?>

  <h4><?php echo $focusString[0];?> <?php echo $focusString[1];?></h4>

<?php
  // Ask Database for Sum of Healing, Damage, etc.
  $query   ="SELECT IFNULL(SUM(l.value), 0) AS value, COUNT(l.value) as count, a.ability_name_en, l.spell ";
  $query  .="FROM combat_log l, ability a ";
  $query  .="WHERE l.`event`=" .$_GET['event'];
  if($_GET['focus']>1 && $_GET['focus']<9) {
    $query  .=" AND l.`" .$DBtrigger ."`=" .$trigger;
  }
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $query  .=" AND l.value_type IN(";
  for($i=0;$i<count($valueTypeArray);$i++){
    $query.=$valueTypeArray[$i];
    if($i+1<count($valueTypeArray))
      $query.=", ";
  }
  $query  .=")";
  $query  .=" AND l.spell=a.id";
  $query  .=" AND spell=" .$_GET['spell'] .";";
  
  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  $sumValue=$currentFocus->value;
  $countValue=$currentFocus->count;
  $spellName=$currentFocus->ability_name_en;
  $spellID=$currentFocus->spell;
  

  // Print Table Header
?>
  <p><?php echo $focusString[0];?> <?php echo $focusString[1];?> by <?php echo $spellName;?>: <?php echo number_format($sumValue, 0, ',', '.');;?>
    <table class="border">
      <tr>
        <th>Position</th>
        <th>Type</th>
        <th>#</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>AVG</th>
        <th>Min</th>
        <th>Max</th></tr>
<?php

  // Get Value Ranking
  $query   =" SELECT a.combat_en, l. value_type, SUM(l.value) AS sum, COUNT(l.value) AS quantity, AVG(l.value) as avg, MIN(l.value) as min, MAX(l.value) as max";
  $query  .=" FROM combat_log l, combat_action a";
  $query  .=" WHERE l.value_type=a.combatID ";
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }

  $query  .="AND l.`event`=" .$_GET['event'];
  if($_GET['focus']>1 && $_GET['focus']<9) {
    $query  .=" AND l.`" .$DBtrigger ."`='" .$trigger ."'";
  }
  $query  .=" AND l.value_type IN(";
  for($i=0;$i<count($valueTypeArray);$i++){
    $query.=$valueTypeArray[$i];
    if($i+1<count($valueTypeArray))
      $query.=", ";
  }
  $query  .=") ";
  $query  .="AND l.spell=" .$_GET['spell'] ." ";
  $query  .="GROUP BY l.value_type ";
  $query  .="ORDER BY quantity DESC;";
  $ranking_result=executeQuery($DBconnection, $query);
  $rankRows=$ranking_result->num_rows;
 
  for($i=1;$i<=$rankRows;$i++) {
    $currentRanking=$ranking_result->fetch_object();

    ?><tr><td align="right"><?php echo $i?></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $trigger;?>&focus=<?php echo $_GET['focus'];?>&filter1=<?php echo $currentRanking->value_type;?>&spell=<?php echo $spellID;?>&event=<?php echo $_GET['event'];?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>&encounter=<?php echo $_GET['encounter'];?>" ><?php echo $currentRanking->combat_en;?></a></td>
    <td align="right"><?php echo $currentRanking->quantity;?></td>
    <td align="right"><?php echo number_format(($currentRanking->quantity/$countValue*100), 2, ',', ".");?> %</td>
    <td align="right"><?php echo number_format(($currentRanking->sum), 0, ",", ".");?></td>
    <td align="right"><?php echo number_format(($currentRanking->avg), 0, ",", ".");?></td>
    <td align="right"><?php echo number_format(($currentRanking->min), 0, ',', '.');?></td>
    <td align="right"><?php echo number_format(($currentRanking->max), 0, ',', '.');?></td></tr>

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
  $query   ="SELECT c.char_name_de, l." .$DBtarget_char ." AS src, IFNULL(SUM(l.value), 0) AS sum, COUNT(l.value) AS quantity, MIN(l.value) AS min, AVG(l.value) AS avg, Max(l.value) AS max ";
  $query  .="FROM combat_log l, `character` c ";
  $query  .="WHERE l.`" .$DBtarget_char ."`= c.id ";
  $query  .=" AND l.`event`=" .$_GET['event'];
  if($_GET['focus']>1 && $_GET['focus']<9) {
    $query  .=" AND l.`" .$DBtrigger_char ."`='" .$trigger ."'";
  }
  if($_GET['start'] && $_GET['end']) {
    $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
    $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
  }
  $query  .=" AND l.value_type IN(";
  for($i=0;$i<count($valueTypeArray);$i++){
    $query.=$valueTypeArray[$i];
    if($i+1<count($valueTypeArray))
      $query.=", ";
  }
  $query  .=") ";
  $query  .="AND l.value>0 ";
  $query  .="AND l.spell=" .$_GET['spell'];
  $query  .=" GROUP BY src ";
  $query  .="ORDER BY sum DESC;";
  //echo $query;
  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;

  for($i=1;$i<=$numrows;$i++) {
    $currentFocus=$result->fetch_object();
    
    ?><tr><td align="right"><?php echo $i;?></td>
    <td><?php echo $currentFocus->char_name_de;?></td>
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
