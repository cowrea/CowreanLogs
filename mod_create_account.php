<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DBconnection=openDB();

    // Check if account exist
    $query="SELECT accountname FROM account WHERE accountname='" .$_POST['tfAccountname'] ."';";
    $result=executeQuery($DBconnection, $query);
   

    // Check if passwords are identical
    if($_POST['tfPassword1']==$_POST['tfPassword2'] && $_POST['tfPassword1'])
      echo "true";
    else 
      echo "false";

    // Hash password
    $password= hash('md5', $_POST['tfPassword1']);

 
    if($result->num_rows==0) {
      $query="INSERT INTO account (accountname, password, firstname, lastname, mail) VALUES ('" .$_POST['tfAccountname'] ."', '" .$password ."', '" .$_POST['tfFirstname'] ."', '" .$_POST['tfLastname'] ."', '" .$_POST['tfMail'] ."');";

      $result=executeQuery($DBconnection, $query);
      ?><h4>Account Created</h4><?php
    }
    else {
      ?><h4>Account allready exist!</h4><?php
    }
  }
?>

<h3>Create Account<h3>
<form action="main.php?top=1&left=5" method="post">
  <table>
    <tr>
      <td>Accountname</td>
      <td><input type="text" size="10" name="tfAccountname" /></td></tr>
    <tr>
      <td>Password</td>
      <td><input type="password" size="10" name="tfPassword1" /></td></tr>
    <tr>
      <td>Repeat Password</td>
      <td><input type="password" size="10" name="tfPassword2" /></td></tr>
    <tr>
      <td>Firstname</td>
      <td><input type="text" size="10" name="tfFirstname" /></td></tr>
    <tr>
      <td>Lastname</td>
      <td><input type="text" size="10" name="tfLastname" /></td></tr>
    <tr>
      <td>Mail</td>
      <td><input type="text" size="10" name="tfMail" /></td></tr>
  </table>
<input type="submit" name="submit" value="Create">
</form>


