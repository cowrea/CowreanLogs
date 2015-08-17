<?php
  $DBconnection=openDB();

  $query   =  "INSERT INTO event ";
  $query  .=  "(name, start, end) ";
  $query  .=  "VALUES ('Uploading', NOW(), NOW());";

  echo "uploading...";

  $tmp=executeQuery($DBconnection, $query);

  $query  = "SELECT id FROM event WHERE name='Uploading';";

  $event  = executeQuery($DBconnection, $query);
  $event  = $event->fetch_object();
  $event  = $event->id;
 
?>
