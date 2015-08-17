<?php
  if(!$_SESSION['Login'])
    include "mod_admin_login.php";
  else {
    ?>
      <table>
        <tr><td><a href="logout.php">Logout</a></td></tr>
        <tr><td><a href="main.php?left=6&top=1&right=0" >Upload Log-File</a></td></tr>
        <tr><td><a href="main.php?left=7&top=1&right=0" >Write Log-File into Database</a></td></tr>
        <tr><td><a href="main.php?left=8&top=1&right=0" >Edit Visibility</a></td></tr>
      </table>
    <?php
          
  }
?>
