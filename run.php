<?php
  include "lib/function.php";

  $filename = "upload.txt";
  $handle = fopen($filename, "r");
  $logfile ="upload/" .fread($handle, filesize($filename));
  fclose($handle);
    
  echo $logfile;
  //$logfile="upload/20150810_ZG_Pallandox.log"; //"upload/" .$_POST['ddlLogFile'];

  $fileLocation="/home/riekerts/cowrean_logs/alpha/";
  include "logLauncher/main.php";

      


?>
