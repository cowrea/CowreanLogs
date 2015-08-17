<?php


  $DBconnection=openDB();

  $query="SELECT id, name, DATE_FORMAT(`start`, '%Y.%m.%d') AS 'date',  DATE_FORMAT(`start`, '%H:%i:%S') AS 'start', DATE_FORMAT(`end`, '%H:%i:%S') AS 'end' FROM `event` ORDER BY date DESC, start DESC;";

  $result=executeQuery($DBconnection, $query);

?>
  <table>
    <tr>
      <th>Position</th>
      <th>Description</th>
      <th>Date</th>
      <th>Beginn</th>
      <th>End</th></tr>

<?php
  $numrows=$result->num_rows;

  for($i=1;$i<=$numrows;$i++) {
    $currentRaid=$result->fetch_object();

    
    ?><tr><td><?php echo $i;?></td>
    <td><a href="main.php?top=2&left=1&right=0&event=<?php echo $currentRaid->id;?>" ><?php echo $currentRaid->name;?></a></td>
    <td><?php echo $currentRaid->date;?></td>
    <td><?php echo $currentRaid->start;?></td>
    <td><?php echo $currentRaid->end;?></td></tr>
    <?php
  }

?>
  </table>
  
<?php
?>
