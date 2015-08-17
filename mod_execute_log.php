<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['submit']=="Show") {
      ?>
        <table>
          <tr>
            <th>Line</th>
            <th>Log</th></tr>
      <?php
              
      $userdatei = fopen("upload/" .$_POST['ddlLogFile'] ,"r");
      for($i=1;$i<=10;$i++){
        $zeile = fgets($userdatei,1024);
        ?><tr><td><?php echo $i;?></td><td><?php echo $zeile;?></td></tr><?php
      }
      fclose($userdatei);
      ?></table><?php

    }


    if($_POST['submit']=='Execute') {
      //$logfile="upload/" .$_POST['ddlLogFile'];

      //$fileLocation="/home/riekerts/cowrean_logs/alpha/";
      //include "logLauncher/main.php";
      var_dump($_POST);
      $fp = fopen('upload.txt', 'w');
      fwrite($fp, $_POST['ddlLogFile']);
      fclose($fp);
      system("php5 run.php");
    }
    
  }
?>



<form action="main.php?left=7&top=1&right=0" method="post" >
  <table>
    <tr>
      <td colspan="2">
<?php
// Der Punkt steht für das Verzeichnis, in der auch dieses
// PHP-Programm gespeichert ist
$verzeichnis = "upload/";
 
// Text, ob ein Verzeichnis angegeben wurde
if ( is_dir ( $verzeichnis ))
{
    // öffnen des Verzeichnisses
    if ( $handle = opendir($verzeichnis) )
    {

        ?> <select name="ddlLogFile" > <?php
        // einlesen der Verzeichnisses
        while (($file = readdir($handle)) !== false)
        {
            // list only ".log" files
            $tmp=explode(".", $file, 2);
            if($tmp[1]=="log") {
              ?><option><?php echo $file; ?></option><?php
            }
            
        }
        closedir($handle);
        ?></select><?php
    }
}
?>
      </td></tr>
    <tr>
      <td><input type="submit" value="Show" name="submit"></td>
      <td><input type="submit" value="Execute" name="submit"></td></tr>
  </table>
</form>
