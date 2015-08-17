<?php 
  if($_GET['spell']!='') {
    include "mod_focus_spell_overview.php";
    exit;
  }
  
  //$valueTypeArray = array (13, 15, 14);
  //$valueTypeArray = array (1, 2, 19, 3);
  //$focusString    = array ("Healing", "Done");


  // Ask Database for Sum of Healing, Damage, etc.
  $query   ="SELECT IFNULL(SUM(l.value), 0) AS value ";
  $query  .="FROM combat_log l ";
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
  $query  .=");";
  
  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  $sumValue=$currentFocus->value;
  

  // Print Table Header
?>
  <h3><?php echo $focusString[0];?> <?php echo $focusString[1];?>: <?php echo number_format($sumValue, 0, ',', '.');;?></h3>

  <p><h4><?php echo $focusString[0];?> <?php echo $focusString[1];?>: Abilities</h4>
    <table class="border">
      <tr>
        <th></th>
        <th colspan=5>General</th>
        <th colspan=4>Hit</th>
        <th colspan=4>Crit</th>
        <th colspan=4>Tick</th></tr>
      <tr>
        <th>Position</th>
        <th>Spell</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>#</th>
        <th>AVG</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>#</th>
        <th>AVG</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>#</th>
        <th>AVG</th>
        <th>Relativ</th>
        <th>Total</th>
        <th>#</th>
        <th>AVG</th></tr>
<?php

  // Get Value Ranking
  $query   ="SELECT s.ability_name_en AS spell, SUM(l.value) AS sum, COUNT(l.value) AS quantity, AVG(l.value) as avg, s.id AS spellid ";
  $query  .="FROM combat_log l, combat_action a, ability s ";
  $query  .="WHERE l.value_type=a.combatID ";
  $query  .="AND l.spell=s.id ";
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
  $query  .=" AND l.value>0 ";
  $query  .="GROUP BY l.spell ORDER BY sum DESC;";
  $ranking_result=executeQuery($DBconnection, $query);
  $rankRows=$ranking_result->num_rows;
 
  //echo $query;

  for($i=1;$i<=$rankRows;$i++) {
    $currentRanking=$ranking_result->fetch_object();

    ?><tr><td align="right"><?php echo $i?></td>
    <td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $trigger;?>&focus=<?php echo $_GET['focus'];?>&filter1=<?php echo $_GET['filter1'];?>&spell=<?php echo $currentRanking->spellid;?>&event=<?php echo $_GET['event'];?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];?>&encounter=<?php echo $_GET['encounter'];?>" ><?php echo $currentRanking->spell;?></a></td>
    <td align="right"><?php echo number_format(($currentRanking->sum/$sumValue*100), 2, ',', ".");?> %</td>
    <td align="right"><?php echo number_format(($currentRanking->sum), 0, ',', ".");?></td>
    <td align="right"><?php echo number_format(($currentRanking->quantity), 0, ",", ".");?></td>
    <td align="right"><?php echo number_format(($currentRanking->avg), 2, ',', '.');?></td>
      <?php
          // Get Crit, Hit and Tick Values
          $query  ="SELECT l.spell, SUM(l.value) AS sum, COUNT(l.value) AS quantity, MIN(l.value) AS min, AVG(l.value) as avg, MAX(l.value) AS max, value_type ";
          $query  .="FROM combat_log l, combat_action a ";
          $query  .="WHERE l.value_type=a.combatID ";
          if($_GET['start'] && $_GET['end']) {
            $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
            $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
          }

          $query  .="AND l.`event`=" .$_GET['event'];
          if($_GET['focus']>1 && $_GET['focus']<9) {
            $query  .=" AND l.`" .$DBtrigger ."`='" .$trigger ."'";
          }
          $query  .=" AND l.spell='" .$currentRanking->spellid;
          $query  .="' AND l.value_type IN(";
            for($j=0;$j<count($valueTypeArray);$j++){
              $query.=$valueTypeArray[$j];
              if($j+1<count($valueTypeArray))
              $query.=", ";
            }
          $query  .=")";
          $query  .=" GROUP BY l.spell, value_type ";
          $query  .="ORDER BY value_type ASC;";
          $valueType_result=executeQuery($DBconnection, $query);
          $valueType_rows=$valueType_result->num_rows;
          
            $currentValueType=$valueType_result->fetch_object();
          
            if($currentValueType->value_type==$valueTypeArray[0]) {
            
              ?>
              <td align="right"><?php echo number_format($currentValueType->sum/$currentRanking->sum*100, 2, ',', '.');?> %</td>
              <td align="right"><?php echo number_format($currentValueType->sum, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->quantity, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->avg, 0, ',', '.');?></td>
              <?php
              $valueType_rows--;
              if($valueType_rows>0)
                $currentValueType=$valueType_result->fetch_object();
            }
            else {
              for($j=0;$j<4;$j++){
                ?><td align="right">0</td><?php
              }
            }


            if($currentValueType->value_type==$valueTypeArray[1]) {

              ?>
              <td align="right"><?php echo number_format($currentValueType->sum/$currentRanking->sum*100, 2, ',', '.');?> %</td>
              <td align="right"><?php echo number_format($currentValueType->sum, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->quantity, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->avg, 0, ',', '.');?></td>
              <?php
              $valueType_rows--;
              if($valueType_rows<0)
                $currentValueType=$valueType_result->fetch_object();
            }
            else {
              for($j=0;$j<4;$j++){
                ?><td align="right">0</td><?php
              }
            }



            if($currentValueType->value_type==$valueTypeArray[2]) {

              ?>
              <td align="right"><?php echo number_format($currentValueType->sum/$currentRanking->sum*100, 2, ',', '.');?> %</td>
              <td align="right"><?php echo number_format($currentValueType->sum, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->quantity, 0, ',', '.');?></td>
              <td align="right"><?php echo number_format($currentValueType->avg, 0, ',', '.');?></td>
              <?php
              $currentValueType=$valueType_result->fetch_object();
            }
            else {
              for($j=0;$j<4;$j++){
                ?><td align="right">0</td><?php
              }
            }

        ?>

    </tr>







    <?php
    $value[$i]=number_format($currentRanking->sum/$sumValue*100, 2, ".", "");
  }
?>

    </table>
  
    <?php if($value[1]>0) {?>
      <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" >
    <?php } ?>
  </p>
  <p><h4><?php echo $focusString[0];?> <?php echo $focusString[1];?> to targets</h4>
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
  $query  .="GROUP BY src ";
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
  <?php if($value[1]!=null) { ?>
    <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" >
  </p>
  <?php } 
  

    $query   ="SELECT SUM(value) AS sum, l.damage_school, s.description, AVG(value) AS avg, COUNT(value) AS count, MIN(value) as min, MAX(value) max";
    $query  .=" FROM combat_log l, damage_school s ";
    $query  .=" WHERE l.damage_school=s.id ";
    $query  .=" AND l." .$DBtrigger ."=" .$_GET['trigger'] ." ";
    if($_GET['start'] && $_GET['end']) {
      $query  .= " AND l.timestamp >= '" .$_GET['start'] ."'";
      $query  .= " AND l.timestamp < '" .$_GET['end'] ."'";
    }
    $query  .=" AND event=" .$_GET['event'];
    $query  .=" AND l.value_type IN(";
      for($i=0;$i<count($valueTypeArray);$i++){
        $query.=$valueTypeArray[$i];
        if($i+1<count($valueTypeArray))
           $query.=", ";
    }
    $query  .=")";

    $query  .=" GROUP BY l.damage_school";
    $query  .=" ORDER BY sum DESC;";

    $result=executeQuery($DBconnection, $query);
    $numrows=$result->num_rows;
  ?>
  <p>
    <h3><?php echo $focusString[0];?> <?php echo $focusString[1];?>: Schools</h3>
    <table class="border">
      <tr>
        <th>Position</th>
        <th>School</th>
        <th>Relativ</th>
        <th>Absolut</th>
        <th>#</th>
        <th>AVG</th>
        <th>Min</th>
        <th>Max</th></tr>

  <?php
    $value=array(0);
    for($i=1;$i<=$numrows;$i++) {
      $currentfocus=$result->fetch_object();
      $value[$i]=number_format($currentfocus->sum/$sumValue*100, 2, ".", "");

      ?><tr><td><?php echo $i; ?></td>
      <td><?php echo $currentfocus->description;?></td>
      <td align="right"><?php echo $value[$i];?>%</td>
      <td align="right"><?php echo number_format($currentfocus->sum, 0, ',', ".");?></td>
      <td align="right"><?php echo number_format($currentfocus->count, 0, ',', ".");?></td>
      <td align="right"><?php echo number_format($currentfocus->avg, 2, ',', ".");?></td>
      <td align="right"><?php echo number_format($currentfocus->min, 0, ',', ".");?></td>
      <td align="right"><?php echo number_format($currentfocus->max, 0, ',', ".");?></td></tr>
      <?php
    }
  ?>

    </table>
      <?php if($value[1]!=null) { ?>
        <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" > 
      <?php } ?>
      

  </p>

        
      
        
