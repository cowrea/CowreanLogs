
        <form action="main.php?top=1&left=9" <?php /* main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $currentChar->trigger;?>&filter1=<?php echo $currentChar->char_name_de;?>&focus=1<?php if($_GET['encounter']){?>&encounter=<?php echo $_GET['encounter'];}?>&<?php if($_GET['start'] && $_GET['end']){?>&start=<?php echo $_GET['start'];?>&end=<?php echo $_GET['end'];}?>*/?> method="post" >

<?php
  // Open Database
  $DBconnection=openDB();





  // ddlRaid
  $query="SELECT id, name, DATE_FORMAT(`start`, '%Y.%m.%d') AS 'date',  DATE_FORMAT(`start`, '%H:%i:%S') AS 'start', DATE_FORMAT(`end`, '%H:%i:%S') AS 'end' FROM `event` ORDER BY date DESC, start DESC;";

  $result=executeQuery($DBconnection, $query);

?>
  <select name="ddlRaid">

<?php
  $numrows=$result->num_rows;

  for($i=1;$i<=$numrows;$i++) {
    $currentRaid=$result->fetch_object();


    ?><option <?php if($currentRaid->id==$_GET['event']) { ?>selected="selected" <?php } ?>>
      <?php 
      echo $currentRaid->name;?> <?php echo $currentRaid->date;?> | <?php echo $currentRaid->id;?>
      </option>
    <?php
    /*
    <td><?php echo $currentRaid->date;?></td>
    <td><?php echo $currentRaid->start;?></td>
    <td><?php echo $currentRaid->end;?></td></tr>
    <?php
    */
  }


  ?></select><?php







// ddlChar
  $query="SELECT c.char_name_de, l.`trigger` FROM combat_log l, `character` c WHERE c.id=l.`trigger` AND c.char_name_de NOT LIKE '% %' AND l.`event`=" .$_GET['event'] ." AND c.encounter IS NULL GROUP BY l.`trigger` ORDER BY char_name_de ASC;";
  
  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;
  
  ?>
    <select name="ddlChar" >  
    <option>All Chars</option>
  <?php
  

  for($i=0;$i<$numrows;$i++) {
    $currentChar=$result->fetch_object();
    ?>
    
        <option <?php if($currentChar->trigger==$_GET['trigger']) {?>selected="selected" <?php }?>>
        <?php echo $currentChar->char_name_de;?> | <?php echo $currentChar->trigger;?>
        </option>

    <?php
  }


  $query="SELECT c.char_name_de, l.`trigger` FROM combat_log l, `character` c WHERE c.id=l.`trigger` AND c.char_name_de LIKE '% %' AND l.`event`=" .$_GET['event'] ." GROUP BY l.`trigger` ORDER BY char_name_de ASC;";

  $result=executeQuery($DBconnection, $query);
  $numrows=$result->num_rows;
  

  for($k=0;$k<$numrows;$k++) {
    $currentChar=$result->fetch_object();
    ?>
      
        <option>
        <?php echo $currentChar->char_name_de;?> | <?php echo $currentChar->trigger;?>
        </option>

    <?php
}


    ?></select><?php



// ddlEncounter
  $tar=2;

  $DBconnection=openDB();

  $query="SELECT e.name, DATE_FORMAT(e.`start`, '%Y.%m.%d') AS 'date' FROM event e WHERE e.id=" .$_GET['event'] .";";

  $result=executeQuery($DBconnection, $query);


  $currentRaid=$result->fetch_object();

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

  ?>
    <select name="ddlEncounter" >
    <option>Whole Raid</option>
  <?php

  for($i=1;$i<=$numrows;$i++) {
    $currentChar=$result->fetch_object();
    ?>
    <option <?php if($currentChar->trigger==$_GET['encounter']) { ?> selected="selected" <?php } ?>><?php echo $currentChar->char_name_de;?> | <?php echo $currentChar->trigger;?></option><?php

  } 
  ?>
    </select>



<?php 
      //add start and end to URL
?>
      <input type="hidden" name=hiStart value="<?php echo $_GET['start'];?>" />
      <input type="hidden" name=hiEnd value="<?php echo $_GET['end'];?>" />

<?php
      // add focus
?>
      <input type="hidden" name=hiFocus value="<?php echo $_GET['focus'];?>" />

      <input type="hidden" name="hiCount" value=<?php echo $i+$j;?> /><input type="submit" value="submit" />
      </form>

























