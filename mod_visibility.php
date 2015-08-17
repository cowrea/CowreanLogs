<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
}
  $dbConnection = openDB();

  $query  = " SELECT name, start, end, active, TIMEDIFF(end, start) AS diff FROM event;";

  $result = executeQuery($dbConnection, $query);

  var_dump($result);

  $numRows=$result->num_rows;
  ?>
    <form action="main.php?left=8&top=1&right=0" method="post">
      <table>
        <tr>
          <th>Pos.</th>
          <th>Instanz</th>
          <th>Start</th>
          <th>End</th>
          <th>Duration</th>
          <th>Visibility</th></tr>
  <?php
  for($i=0;$i<$numRows;$i++) {
    $currentRaid=$result->fetch_object();
    ?><tr><td><?php echo $i+1;
    ?></td><td><?php echo $currentRaid->name;
    ?></td><td><?php echo $currentRaid->start;
    ?></td><td><?php echo $currentRaid->end;
    ?></td><td><?php echo $currentRaid->diff; 
    ?></td><td><input type="checkbox" name="cb<?php echo $i+1;?>" <?php
      if($currentRaid->active==1) {
        ?> checked="checked" <?php
      }
      ?> /></td></tr><?php
    
  }
  ?>
      </table>
      <input type="submit" value="Update">
    </form>
    
