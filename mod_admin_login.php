<?php
  /************************************************************************
  * login.php                                                             *
  *************************************************************************
  *                                                                       *
  * This File is an modified Copy of (23.02.2015  15:38)                  *
  * http://wiki.selfhtml.org/wiki/PHP/Anwendung_und_Praxis/Loginsystem    *
  *                                                                       *
  * This File executs itself with an POST-Method.                         *
  * If it's opened by itself it checks the given accountdata and          *
  * compare it to the dataset given from the database selected in         *
  * "conf/conf.php". If these Values are identical it opens an session    *
  * and sets some Variables needed for an authentified loggin.            *
  *                                                                       *
  * Otherwise it returns a HTML-Mask with a Request for ID and            *
  * Password. The only way for getting Access to the other Parts          *
  * of this Project is a matching couple of ID and Passwort...            *
  *                                                                       *
  *                                                            I hope ^_^ *
  *                                                                       *
  *************************************************************************
  *                                                                       *
  * Steffen Riekert                                                       *
  * Joma-Polytec GmbH                                                     *
  * 03.02.2015 - 31.03.2015                                               *
  *                                                                       *
  ************************************************************************/


  include_once "lib/function.php";
  include_once "conf/conf.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    
    
    $_SESSION['UserID'] = $_POST['username'];
    $_SESSION['Passwd'] = $_POST['passwort'];
    $_SESSION['Passwd'] = cryptPassword($_SESSION['Passwd']);     // hashed password

    // code Steffen
    $mQuery ='SELECT a.id, a.accountname, a.password, a.admin, a.firstname, a.lastname, a.mail, r.description ';
    $mQuery.='FROM account a, account_rank r ';
    $mQuery.='WHERE a.admin = r.id AND a.accountname = "';
    $mQuery.= $_SESSION['UserID'] .'";';

    if($_SESSION['debug'])
      echo $mQuery;



    // Connectionobject
    $dbConnection=  openDB();

    $userResult= executeQuery($dbConnection, $mQuery);

    // Check if Result is empty
      $userResult= $userResult->fetch_object();

    $_SESSION['Firstname']  = $userResult->firstname;
    $_SESSION['Lastname']   = $userResult->lastname;
    $_SESSION['Mail']       = $userResult->mail;
    $_SESSION['Account']    = $userResult->accountname;
    $_SESSION['AdminFlag']  = $userResult->admin;
    $_SESSION['UserID']     = $userResult->id;
    
    
    // if ID and Passwd don't match --> forward to start.php
    $errorCode=checkAccount($_SESSION['UserID'], $_SESSION['Passwd']);
    // End code

  if($_SESSION['debug']) {
    $tmp = "echo '" .$errorCode ."' > /var/www/log.txt";
    system($tmp);
  }

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    // Benutzername und Passwort werden überprüft
    if ($errorCode==0) {
      $_SESSION['Login'] = true;
      
      
      // Weiterleitung zur geschützten Startseite
      if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        
        if (php_sapi_name() == 'cgi') {
          header('Status: 303 See Other');
        }
        else {
          header('HTTP/1.1 303 See Other');
        }
      }
      
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/main.php?left=4&right=0&top=1');
      forwarding_to('0', 'main.php?left=4&right=0&top=1');
      exit;
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
  <link rel="stylesheet" type="text/css" href="format/format.css" />
  <title>Anmeldeformular</title>
</head>
<body>

  <h1>Login</h1>


  <form action="main.php?left=4&right=0&top=1" method="post">
    <table>
      <tr>
        <th>Accountname:</th>
        <td><input type="text" name="username" /></td></tr>
      <tr>
        <th>Passwort:</th>
        <td><input type="password" name="passwort" /></td></tr>
    
      <tr>
        <td><input type="submit" value="Login" /></td></tr>
      <tr>
        <td colspan=2>New Account? Register <a href="main.php?top=1&left=5" >here</a></td></tr>
    </table>
  </form>
</body>
</html>
