  <h4>Mana gain</h4>

<?php
  // Damage Done
  $query="SELECT IFNULL(SUM(l.value), 0) AS mana FROM combat_log l WHERE l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(16);";
  $result=executeQuery($DBconnection, $query);
  $currentFocus=$result->fetch_object();
  $manaGain=$currentFocus->mana;

  
?>
  <p>Mana gain: <?php echo number_format($manaGain, 0, ',', '.');;?>
    <table>
      <tr>
        <td>Position</td>
        <td>Spell</td>
        <td>Relativ</td>
        <td>Absolute</td>
        <td>Quantity</td>
        <td>AVG</td>
        <td>Min</td>
        <td>Max</td></tr>
<?php

  // Healing Done by Spells
  $query="SELECT l.spell, SUM(l.value) AS sum, COUNT(l.value) AS quantity, a.combat_en, MIN(l.value) AS min, AVG(l.value) as avg,  MAX(l.value) AS max FROM combat_log l, combat_action a WHERE l.value_type=a.combatID AND l.`event`=" .$_GET['event'] ." AND l.`trigger`='" .$_GET['trigger'] ."' AND l.value_type IN(16) GROUP BY value_type, l.spell ORDER BY sum DESC;";
  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;
  
  for($i=1;$i<=$numrows;$i++) {
    $currentFocus=$result->fetch_object();

    ?><tr><td align="right"><?php echo $i;?></td>
    <td><?php echo $currentFocus->spell;?></td>
    <td align="right"><?php echo number_format(($currentFocus->sum/$manaGain*100), 2, ',', ".");?> %</td>
    <td align="right"><?php echo number_format(($currentFocus->sum), 0, ',', ".");?></td>
    <td align="right"><?php echo number_format(($currentFocus->quantity), 0, ",", ".");?></td>
    <td align="right"><?php echo number_format(($currentFocus->avg), 2, ',', '.');?></td>
    <td align="right"><?php echo number_format($currentFocus->min, 0, ',', '.');?></td>
    <td align="right"><?php echo number_format($currentFocus->max, 0, ',', '.');?></td></tr>
    <?php
    $value[$i]=number_format($currentFocus->sum/$manaGain*100, 2, ".", "");
  }
?>

    </table>
  </p>
  <p>
"Restore Mana" is a synonyme for "Mana Potion".
  </p>

    <img src="piechart.php?<?php for($j=1;$j<=$i;$j++){echo $j ."=" .$value[$j] ."&"; } ?>" >
