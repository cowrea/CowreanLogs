<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get Checked Boxes
    $j=0;
    for($i=0;$i<$_POST['hiCount'];$i++) {
      if($_POST['cb' .$i]) {
        $cb[$j]=$i;
        $j++;
      }
    }
    echo "test";
    print_r($cb);
    $url="main.php?top=" .$_GET['top'] ."&left=" .$_GET['left'] ."&right=" .$_GET['right'] ."&event=" .$_GET['event'];

    for($i=0;$i<$j;$i++) {
      $url .= "&name" .$i ."=" .$_POST['hiName' .$cb[$i]];
      $url .= "&id" .$i ."=" .$_POST['hiID' .$cb[$i]];
    }
    forwarding_to("0" ,$url);
  } 


  $url="main.php?top=" .$_GET['top'] ."&left=" .$_GET['left'] ."&right=" .$_GET['right'] ."&event=" .$_GET['event'];
  for($i=0;$_GET['id' .$i];$i++) {
    $url.= "&name" .$i ."=" .$_GET['name' .$i] ."&id" .$i ."=" .$_GET ['id' .$i];
  }
?>
  <h3>Compare</h3>
  <table>
    <tr>
      <td><a href="<?php echo $url;?>&focus=2" >Healing Done</a></td>
      <?php /*<td><a href="<?php echo $url;?>&focus=3" >Healing Taken</a></td> */?>
      <td><a href="<?php echo $url;?>&focus=4" >Damage Done</a></td>
      <?php /*<td><a href="<?php echo $url;?>&focus=5" >Damage Taken</a></td>
      <td><a href="<?php echo $url;?>&focus=6" >Mana Gain</a></td>
      <td><a href="<?php echo $url;?>&focus=7" >Energy gain</a></td>
      <td><a href="<?php echo $url;?>&focus=8" >Rage gain</a></td>
      <td><a href="<?php echo $url;?>&focus=9" >Deaths</a></td></tr>*/?>
  </table>
  <table>
    <tr>
      <td>
  <ul>
<?php
  for($i=0;$_GET['id' .$i];$i++) {
    switch($i) {
      case 0: $color="#FF00BF";
        break;
      case 1: $color="Orange";
        break;
    }

    ?><font color="<?php echo $color;?>" ><li><?php echo $_GET['name' .$i];?></li></font><?php
  }
?>
  <li><a href="main.php?top=<?php echo $_GET['top'];?>&left=<?php echo $_GET['left'];?>&right=<?php echo $_GET['right'];?>&event=<?php echo $_GET['event'];?>&name0=<?php echo $_GET['name1'];?>&id0=<?php echo $_GET['id1'];?>&name1=<?php echo $_GET['name0'];?>&id1=<?php echo $_GET['id0'];?>&focus=<?php echo $_GET['focus'];?>" >Switch targets</a></li></ul>
    </table>

<?php
  switch($_GET['focus']) {
    case 2: ?><img src="linegraph.php?event=<?php echo $_GET['event'];?>&id0=<?php echo $_GET['id0'];?>&id1=<?php echo $_GET['id1'];?>&query=3&1=14&2=15&3=16" /><?php
      break;
    case 3:
      break;
    case 4: ?><img src="linegraph.php?event=<?php echo $_GET['event'];?>&id0=<?php echo $_GET['id0'];?>&id1=<?php echo $_GET['id1'];?>&query=3&1=1&2=2&3=3&4=4&5=5&6=6&7=7&8=8&9=9&10=10&11=19" /><?php

      break;
    case 5:
      break;
    case 6:
      break;
    case 7:
      break;
    case 8:
      break;
    case 9:
      break;
  }
?>
