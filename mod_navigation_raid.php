<?php

  $tar=2;
  include "mod_navigation.php";
/*
  No need atm, Shows each Encounter with some URLs


  $DBconnection=openDB();

  $query="SELECT e.name, DATE_FORMAT(e.`start`, '%Y.%m.%d') AS 'date' FROM event e WHERE e.id=" .$_GET['event'] .";";

  $result=executeQuery($DBconnection, $query);


  $currentRaid=$result->fetch_object();

  ?><table>
      <tr>
        <td>
      <table>
      <tr><th>Encounter</th></tr>
    <?php 
  $query   ="SELECT c.id AS `trigger`, c.char_name_de, c.encounter ";
  $query  .="FROM combat_log l, `event` e, `character` c, instanz i ";
  $query  .="WHERE l.`event`=e.id ";
  $query  .="AND l.`trigger`=c.id ";
  $query  .="AND l.`event`=" .$_GET['event'];
  $query  .=" AND e.name=i.english ";
  $query  .="AND c.encounter>0 ";
  $query  .="GROUP BY char_name_de ";
  $query  .="ORDER BY encounter ASC;";

  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;


  for($i=1;$i<=$numrows;$i++) {
    $currentChar=$result->fetch_object();
    ?>
      
      <tr>
        <td><?php echo $i;?></td>
<td><a href="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $currentChar->trigger;?>&focus=1&encounter=<?php echo $currentChar->trigger;?>"><?php echo $currentChar->char_name_de;?></a></td></tr>


  
<?php } ?>

</table>
</td>
        <td><h2><?php echo $currentRaid->name;?> <?php echo $currentRaid->date;?></h2></td></tr>
    </table>


<? */

?>
