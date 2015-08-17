<?php
  include_once "conf/conf.php";

  function multiexplode ($delimiters,$string, $size) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready, $size);
    return  $launch;
}






  function return_to_main() {
    ?>
    <a href="main.php?<?=SID?>"  ><input type="button" value="Zur&uuml;ck" /></a>
    <?php
  }

  function print_html_header($title) {
  
    // Code http://aktuell.de.selfhtml.org/artikel/php/loginsystem/     auth.php
    include_once "auth.php";
    // end
    ?>
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="format/format.css" />
        <title><?php echo $title;?>
        </title>
      </head>
      <body>
    <?php
  }

  function check_login() {
    $success=true;
    if(!$_SESSION['Login']) {
      // no id set --> end file
      forwarding_to(5, 'start.php');
      $success=false;
    }

    // if one check fails --> end file
    if(!$success)
      exit;
  }



  function clear_sessionvariables() {
    $_SESSION['UserID']    =null;
    $_SESSION['Passwd']    =null;
    $_SESSION['Passwd']    =null;
    $_SESSION['Login']     =false;
    $_SESSION['Firstname'] =null;
    $_SESSION['Lastname']  =null;
    $_SESSION['PersNr']    =null;
    $_SESSION['Chipnr']    =null;
  }

  function check_if_active($userID) {
    $Query='SELECT active from account where id=' .$userID .';';
    $connectionObject=openDB();
    $result=executeQuery($connectionObject, $Query);
    $currentUser=$result->fetch_object();

    if($currentUser->active==1)
      return true;
    else
      return false;
  }


  function checkPasswd($userID, $passwd) {
    $Query= 'SELECT password FROM account WHERE id=' .$userID .';';

    $connectionObject=openDB();
    $result=executeQuery($connectionObject, $Query);
    $currentUser=$result->fetch_object();
    
    if($passwd==$currentUser->password)
      return true;
    else
      return false;
  }

  function checkAccount($userID, $passwd) {
    if(!check_if_active($userID))
      return 3;
    if(!checkPasswd($userID, $passwd))
      return 2;
  }




  function forwarding_to($delay, $destination) {
    echo  '<meta http-equiv="refresh" content="' .$delay .'; URL=' .$destination .'">';
    echo '<p>Sie werden binnen ' .$delay .' Sekunden weitergeleitet. Sollte dies nicht funktionieren so klicken sie <a href="' .$destination .'?<?=SID?>">hier</a></p>';
  }


  function dropdownlist($start, $end, $selected) {
    for($i=$start;$i<=$end;$i++) {
      ?>
      <option value="<?php echo "$i"; ?>" 
      <?php if($i==$selected) {
            ?> selected="selected" <?php
            }
            ?>><?php echo "$i"; ?></option>
      <?php

    }
  }

  function ddlDate(array $start, $selected) {
    for($i=1;$i<=7;$i++) {
    ?>
      <option  value="<?php echo $i; ?>" style="text-align&#58; right;"><?php 
        echo germanDayName($start[3]+$i) ;echo ", den " .($i+$start[0]) .".$start[1].$start[2]" ;
        if($start[0]+$i==days_in_this_month($start[1])) {     // set day to 0 if it's the last day of thismonth
          $start[0]=0-$i;
          if($start[1]==12) {                                 // set month to 0 and year to next year if it's last day of this year
            $start[1]=1;
            $start[2]++;
          }
          else
            $start[1]++;
        }
          //echo germanDayName($start[3]+$i) ;echo ", den " .($i+$start[0]) .".$start[1].$start[2]" ;

    ?>
      </option>
    
    <?php
    }
  }


  function openDB() {
  include "conf/conf.php";
  $dbConnection=  new mysqli($mServer, $mUser, $mPwd, $mDatabase);

    return $dbConnection;
  }

  function closeDB($ConnectionObject) {
    $ConnectionObject->close;
  }


  function executeQuery($dbConnection, $Query) {
    $result =  $dbConnection -> query($Query); 
    return $result;
  }


  function cryptPassword($input) {
    include "conf/conf.php";
    echo ">>" .$mCrypt ."<<";
    return hash($mCrypt, $input);
  }

  function germanDayName($day) {
    $day%=7;
    switch($day) {
      case 0: return 'Sonntag';
        break;
      case 1: return 'Montag';
        break;
      case 2: return 'Dienstag';
        break;
      case 3: return 'Mittwoch';
        break;
      case 4: return 'Donnerstag';
        break;
      case 5: return 'Freitag';
        break;
      case 6: return 'Samstag';
        break;
    }
  }


  function getTomorrow($day, $month, $year){
    $day++;
    if($day>days_in_this_month($month)) {
      $day=1;
      $month++;
      if($month==13) {
        $month=1;
        $year++;
      }


    //return array ($day, $month, $year);
    }
    

    return $Day .'.' .$Month .'.' .$Year;
  }

  function getError_exception($errorCode) {
    
    $errorString= '';
    switch($errorCode) {
      case 1: $errorString= 'Es wurde keine Chipnummer und oder Passwort eingegeben!';
              forwarding_to(5, 'start.php');
        break;
      case 2: $errorString= 'Chipnummer und Passwort stimmen  nicht &uumlberein!';
              forwarding_to(5, 'start.php');
        break;
      case 3: $errorString= 'Ihr Account ist inaktiv! Bitte melden Sie sich bei einem <a href="impressum.php" >Administrator</a>';
              forwarding_to(5, 'impressum.php');
        break;
      case 4: $errorString='Ihre neu gew&auml;hlten Passw&ouml;rter sind nicht identisch!';
              forwarding_to(5, 'password.php');
        break;
      case 5: $errorString='Mindestens eine Eingabe war leer!';
              forwarding_to(5, 'password.php');
        break;
      case 6: $errorString='Ihr aktuelles Passwort ist falsch!';
              forwarding_to(5, 'password.php');
        break;

    }
    return $errorString;
  }

  function printErrors($errorCode) {
    ?>
      <h1>Fehler</h1>
      <p>
    <?php
      echo getError_exception($errorCode);
    ?>
      </p>
    <?php
  }

  function days_in_this_month($month) {
    switch($month) {
      case 1:
      case 3: 
      case 5:
      case 7:
      case 8:
      case 10:
      case 12:  return 31;
        break;

      case 4:
      case 6:
      case 9:
      case 11:  return 30;
        break;
 
      case 2:   if(date('L'))   
                  return 29;
                else
                  return 28;
        break;
    }
  }

  function sum_days_till_end_of_month($month) {
    $dayOfTheYear = date('z');
    $daysPassed=0;


    switch($month) {
      case 12:  $daysPassed+=31;          // Dec passed
      case 11:  $daysPassed+=30;          // Nov passed
      case 10:  $daysPassed+=31;          // Oct passed
      case  9:  $daysPassed+=30;          // Sep passed
      case  8:  $daysPassed+=31;          // Aug passed
      case  7:  $daysPassed+=31;          // Jul passed
      case  6:  $daysPassed+=30;          // Jun passed
      case  5:  $daysPassed+=31;          // Mai passed
      case  4:  $daysPassed+=30;          // Apr passed
      case  3:  $daysPassed+=31;          // Mar passed
      case  2:  $daysPassed+=28;          // Feb passed
                if(date('L')==1)          // If leap-year --> 1 day more passed
                  $daysPassed++;
      case  1:  $daysPassed+=31;          // Jan passed
        break;
    }

    return $daysPassed;
  }





?>
