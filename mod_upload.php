<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$err=0;
$FileType  = explode(".", $_FILES['upload_log_file']['name'], 2);
$FileType  = $FileType[1];

var_dump($FileType);
var_dump($_POST);

// check if name set
if(!$_POST['tfCharname']){
 echo "FU!";
}

// add forwarding 0 to ddlDay
if($_POST['ddlDay']<10)
  $_POST['ddlDay']= "0" .$_POST['ddlDay'];

// add forwarding 0 to ddlMonth
if($_POST['ddlMonth']<10)
  $_POST['ddlMonth']= "0" .$_POST['ddlMonth'];

// split instanzname into long and short strings
$longName=explode(" | ", $_POST['ddlInstanz'], 2);
$shortName=$longName[1];
$longName=$longName[0];

// Limit File Size to 30 MB
if ($_FILES["fileToUpload"]["size"] > 30000000) {
  echo "Sorry, your file is too large.";
  $err = 10;
}

// Limit File Type to ".txt" Files
if($FileType != "txt" && $FileType != "TXT" && $FileType != "log" && $FileType != "LOG" ) {
    echo "Sorry, only TXT & LOG files are allowed.";
    $err = 11;
}

// Rename Log-File (WoWCombatLog.txt --> YYYYMMDD_ShortString_Autor.log
if($err==0){
  if(move_uploaded_file(@$_FILES["upload_log_file"]["tmp_name"], "upload/" .$_POST['ddlYear'] .$_POST['ddlMonth'] .$_POST['ddlDay']. "_" .$shortName ."_" .$_POST['tfCharname'] .".log")) {
  var_dump($_FILES);
  //if(move_uploaded_file(@$_FILES["upload_log_file"]["tmp_name"], @$_FILES["upload_log_file"]["name"])) {
      echo "Die Datei wurde erfolgreich hochgeladen!";
      //forwarding_ro(3, "main.php?top=1&left=6&right=0");
    }
    else {
      echo "Es trat ein Fehler auf!";
      //forwarding_to(3, "main.php?top=1&left=6&right=0");
    }
  }
}
var_dump($_FILES);
?>
<form action="main.php?left=6&right=0&top=1" method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Datei ausw&auml;hlen:</td>
      <td><input type="file" name="upload_log_file"></td></tr>
    <tr>
      <td>Datum</td>
      <td>
        <select name="ddlDay" ><?php dropdownlist(1, 31, date('j'));?></select>
        <select name="ddlMonth" > <?php dropdownlist(1, 12, date('n'));?></select>
        <select name="ddlYear"  > <?php dropdownlist(2006, date('Y'), date('Y')); ?></select></td></tr>
    <tr>
      <td>Raid</td>
      <td>
        <select name="ddlInstanz" >
        <?php
          $dbConnection=openDB();
          $query=" SELECT english, shortcut FROM instanz ORDER BY english ASC;";

          $result=executeQuery($dbConnection, $query);
          $numRows=$result->num_rows;
          
          for($i=0;$i<$numRows;$i++) {
            $currentInstanz=$result->fetch_object();
            ?><option><?php echo $currentInstanz->english;?> | <?php echo $currentInstanz->shortcut;?></option><?php
          }
        ?></select></td></tr>
    <tr>
      <td>Charname</td>
      <td><input type="text" name="tfCharname" /></td></tr>
      
    <tr>
      <td><input type="submit" name="Upload" /> </td></tr>
  </table>
</form>
