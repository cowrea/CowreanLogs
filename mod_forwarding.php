<?php


  $event=explode(" | ", $_POST['ddlRaid'], 2);


  $destination="main.php?top=2&left=1&right=1&event=" .$event[1];
  
  // Set trigger
  if($_POST['ddlChar']!='All Chars') {
    $trigger=explode(" | ", $_POST['ddlChar'], 2);
    $destination.="&trigger=" .$trigger[1];
  }


  // Set Encounter
  if($_POST['ddlEncounter']!='Whole Raid') {
    $encounter= explode(" | ", $_POST['ddlEncounter'], 2);
    $destination.="&encounter=" .$encounter[1];
  }

  // Set Focus
  if($_POST['hiFocus']) {
    $destination.="&focus=" .$_POST['hiFocus'];
  }
  else {
    $destination.="&focus=1";
  }


  // Set Start and End
  if($_POST['ddlEncounter']!='Whole Raid') {
    if($_POST['hiStart'] && $_POST['hiEnd']) {
      $destination.="&start=" . $_POST['hiStart'];
      $destination.="&end=" .$_POST['hiEnd'];
    }
  }

  //echo $destination;
  //echo "\n<br>";
  //var_dump($_POST);
  forwarding_to(0, $destination); 
  //var_dump($_POST);
?><p>Instant <a href="<?php echo $destination;?>">forward</a></p><?php

?>
