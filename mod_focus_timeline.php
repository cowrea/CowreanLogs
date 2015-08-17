<?php
$start="";
$end="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $switch= array ('ddlStartHour', 'ddlStartMinute', 'ddlStartSecond', 'ddlEndHour', 'ddlEndMinute', 'ddlEndSecond');

  for($i=0;$i<6;$i++){
    if($i<3) {
      $start.=str_pad($_POST[$switch[$i]], 2, '0', STR_PAD_LEFT);
    }
    else {
      $end.=str_pad($_POST[$switch[$i]], 2, '0', STR_PAD_LEFT);
    }
  }
}


  $query  = "SELECT LPAD(l.value, 5, '0') AS value, l.timestamp
FROM combat_log l
WHERE l.target = '" .$_GET['trigger'] ."'
AND l.value_type IN(14,15,16)
ORDER BY l.timestamp ASC limit 500;";

  $dbConnection=openDB();
  $result = executeQuery($dbConnection, $query);
  $numrows=$result->num_rows;



  for($i=0;$i<$numrows;$i++) {
    $currentRow=$result->fetch_object();
    $value[$i]=$currentRow->value;
  }


  ?>
  <form method="post" action="main.php?top=2&left=1&right=1&event=<?php echo $_GET['event'];?>&trigger=<?php echo $_GET['trigger'];?>&focus=9&filter1=<?php echo $_GET['filter1'];?>" >
    <p>Set custom period of time<br />
      <select name="ddlStartHour" >
      <?php if($_POST['ddlStartHour']!="")$select=$_POST['ddlStartHour']; else $select=18; dropdownlist(0, 23, $select);?>
      </select>:
      <select name="ddlStartMinute" >
      <?php if($_POST['ddlStartMinute']!="")$select=$_POST['ddlStartMinute']; else $select=50; dropdownlist(0,59, $select);?>
      </select>:
      <select name="ddlStartSecond" >
      <?php if($_POST['ddlStartSecond']!="")$select=$_POST['ddlStartSecond']; else $select=0; dropdownlist(0,59,$select);?>
      </select> - 
      <select name="ddlEndHour" >
      <?php if($_POST['ddlEndHour']!="")$select=$_POST['ddlEndHour']; else $select=23; dropdownlist(0, 23, $select);?>
      </select>:
      <select name="ddlEndMinute" >
      <?php if($_POST['ddlEndMinute']!="")$select=$_POST['ddlEndMinute']; else $select=10; dropdownlist(0,59, $select);?>
      </select>:
      <select name="ddlEndSecond" >
      <?php if($_POST['ddlEndSecond'])$select=$_POST['ddlEndSecond']; else $select=0; dropdownlist(0,59,$select);?>
      </select>
      <br />
      <br />
      <input type="submit" value="Submit" >
    </p>
  </form>
  <p>
    <h4>Done</h4>
    <img src="linegraph.php?query=2&target=<?php echo $_GET['trigger'];?>&event=<?php echo $_GET['event'];?>&start=<?php echo $start;?>&end=<?php echo $end;?>"><br/>
    <font color="#FF00BF" >Purple=Damage Done</font><br>
    <font color="orange" >Orange=Heal Done</font><br>
  </p>

  <p>
    <h4>Taken</h4>
  <img src="linegraph.php?query=1&target=<?php echo $_GET['trigger'];?>&event=<?php echo $_GET['event'];?>&start=<?php echo $start;?>&end=<?php echo $end;?>"><br/>
    <font color="FF00BF" >Purple=Damage Taken</font><br>
    <font color="orange" >Orange=Heal Taken</font><br>
  </p>

  <?php
?>
