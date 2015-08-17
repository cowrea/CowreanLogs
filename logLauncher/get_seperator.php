<?php

  $connectionObject=openDB();

  $Query  = " SELECT s.seperator_string, s.trigger_position ";
  $Query .= " FROM seperator s;";

  $result=executeQuery($connectionObject, $Query);


  $num_Rows=$result->num_rows;


  for($i=0;$i<$num_Rows;$i++) {
    $currentWord=$result->fetch_object();
    $seperator[$i]=$currentWord->seperator_string;
    $trigger_positionQ[$i]=$currentWord->trigger_position;

    if($debug)
      echo $seperator[$i] ."\n";
    
  }




?>

