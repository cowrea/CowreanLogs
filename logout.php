<?php
  /************************************************************************
  * logout.php                                                            *
  *************************************************************************
  *                                                                       *
  * This File is a modified version of (23.02.2015 15:38)                 *
  * http://wiki.selfhtml.org/wiki/PHP/Anwendung_und_Praxis/Loginsystem    *
  *                                                                       *
  * It kills an Session and forwards the User to the Login-Screen         *
  *                                                                       *
  *************************************************************************
  *                                                                       *
  * Cowrea                                                                *
  *                                                                       *
  * 03.02.2015 - 31.03.2015                                               *
  *                                                                       *
  ************************************************************************/

  //include_once "lib/function.php";
  //check_login();

  session_start();
  session_destroy();

  $hostname = $_SERVER['HTTP_HOST'];
  $path = dirname($_SERVER['PHP_SELF']);

  header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/main.php?top=1&left=3&right=0');
?>
