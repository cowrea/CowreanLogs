<?php
  session_start();
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="format/format.css" />
  <title>Cowrean Logs</title>
</head>
<body>
<?php
  include "lib/function.php";
  include "conf/conf.php";

  $top    = $_GET['top'];
  $left   = $_GET['left'];
  $right  = $_GET['right'];




  switch($top){
    case 0:
      break;
    case 1: $top="mod_navigation.php";
      break;
    case 2: $top="mod_navigation_raid.php";
  }

  switch($left) {
    case 0:
      break;
    case 1:   $left="mod_filter_char.php";
      break;
    case 2:   $left="mod_filter_raid.php";
      break;
    case 3:   $left="mod_start.php";
      break;
    case 4:   $left="mod_admin.php";
      break;
    case 5:   $left="mod_create_account.php";
      break;
    case 6:   $left="mod_upload.php";
      break;
    case 7:   $left="mod_execute_log.php";
      break;
    case 8:   $left="mod_visibility.php";
      break;
    case 9:   $left="mod_forwarding.php";
      break;
    case 10:  $left="mod_navigation_raid.php";
      break;
  }

  switch($right) {
    case 0:
      break;
    case 1: $right="mod_focus.php";
      break;
    case 2: $right="mod_compare.php";
      break;
  }
?>

<h1>Cowrean Logs 0.9.7</h1>


<table>
  <tr>
    <td><?php if($_GET['top']>0) {include $top;}?></td></tr>
    <td><?php if($_GET['left']>0) {include $left;}?></td>
  <tr valign="top">
    <?php /*<td><?php if($_GET['left']>0) {include $left;}?></td> */ ?>
    <td><?php if($_GET['right']>0) {include $right;}?></td></tr>
</table>
</body>
</html>
