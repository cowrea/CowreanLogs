<?php
  //include_once "lib/function.php";
  //include_once "conf/conf.php";
  
  // Get Seperator
  include "logLauncher/get_seperator.php";




  //Read File
  $file =fopen($logfile, "r");

  //echo "<br>\nfile";
  //var_dump($logfile);
  $you    =explode("_", $logfile, 3);
  $head   =$you[1];
  $you    =explode(".log", $you[2],2);
  $you    =$you[0];

  //echo "<br>\n you";
  //var_dump($you);

  //echo "<br>\n head";
  var_dump($head);

  while(!feof($file)) {
   
    // Read Row
    $buffer =fgets($file);

    // Print Row if Debug=true
    if($debug)
      echo $buffer;
   
    // set values to null 
    $spell="";
    $target="";
    $value="";
    $school="";
    $value_type="";
    

    // explode Row into Variables
    $month  = explode("/", $buffer,     2);
    $day    = explode(" ", $month[1],   2);
    $hour   = explode(":", $day[1],     2);
    $minute = explode(":", $hour[1],    2);
    $second = explode(".", $minute[1],  2);
    
    // delete Millisecond
    $fu= explode(" ", $second[1],  2);

    $trigger= explode($seperator[0], $fu[1], 2);


    // get seperator
    for($i=1;$fu[1]==$trigger[0] && $i<count($seperator);$i++) {
        $trigger= explode($seperator[$i], $fu[1], 2);
    }


    $tmp    ="";    
    $tmp   = explode("Your", $trigger[0], 2);

    if($tmp[0]!=$trigger[0]) {
      $trigger[0] = $you ."'s " .$tmp[1];
    }
   

    // delete forwarding Space
    $trigger[0]=ltrim($trigger[0]);

    // delete following Space
    $trigger[0]=chop($trigger[0]);


    // spellname after "'s"
    $tmp        = explode("'s", $trigger[0], 2);
    $trigger[0] = $tmp[0];
    $spell[0]   = ltrim($tmp[1]);




    // interprete sepperator
    switch($i) {
        case 1:
            $value      = explode(" ", ltrim($trigger[1]), 2);
            $value[0]   = rtrim($value[0]);
            $value_type = explode(" ", ltrim($value[1]), 2);
            $target     = explode(" ", ltrim($value_type[1]), 2);
            $target     = explode(" ", ltrim($target[1]), 2);
            $tmp        = explode("'s", $target[0], 2);                 // delete 's
            $target[0]  = $tmp[0];
            $spell      = explode(".", ltrim($target[1]), 2);
            $school[0]  = 0;

            break;
        case 2  : $spell[0]   = $trigger[0];
                  $target     = explode(".", ltrim($trigger[1]), 2);
                  $trigger[0] = "NULL";
                  $value[0]   = 0;
                  $value_type[0]=0;
                  $school[0]  = 0;

            break;
        case 15 :
        case 4  : $spell      = explode(".", ltrim($trigger[1]), 2);
                  $school[0]  = 0;
                  $target[0]  = $trigger[0];
                  $trigger[0] = "NoBody";
                  $value[0]   = 0;
                  $value_type[0]=0;
                  break;


        case 5  : $spell      = explode(" ", ltrim($trigger[1]), 2);
                  $spell      = explode(".", ltrim($spell[0]), 2);
                  break;


        case 6  : $value      = explode(" ", ltrim($trigger[1]), 2);
                  $school     = explode(" ", ltrim($value[1]), 2);
                  $target     = explode("to ", $school[1], 2);
                  $target     = explode(".", $target[1], 2);
                  $value_type[0]=1;
                  break;

        case 8  :
        case 7  : $spell      = explode(": ", $trigger[1], 2);
                  $spell[0]   = ltrim($spell[0]);
                  break;
        case 25 : 
        case 10 :
                  $tmp        = explode(" ", $trigger[1], 2);
                  $target     = explode("dodges.", $tmp[1],2);
                  $value_type[0] ="dodges";
                  if($tmp[1]==$target[0]){
                    $target   = explode("parries.", $tmp[1],2);
                    $value_type[0]="parries";
                  }
                  $value[0]   = 0;
                  $spell[0]   ="Autohit";
                  $school[0]  ="Physical";
                  break;

        case 41 :
        case 44 :
        case  3 :
        case 11 :
        case 12 :
        case 13 : $target     = explode("for", $trigger[1], 2);
                  $value      = explode(".", ltrim($target[1]), 2);
                  $target[0]  = trim($target[0]);

                  $tmp        = explode(" ", $value[0], 2);
                  $school     = explode(" ", $tmp[1], 2);

                  if($school[0]=="")
                      $school[0]  = "Physical";
                  else
                      $value    = explode(" ", $value[0], 2);
                  $value_type[0]= 1;
                  break;

        case 14:  $value[0]   =0;
                  $value_type[0]=6;
                  $target= explode("by", ltrim($trigger[1]), 2);
                  $target= explode(".", ltrim($target[1]), 2);
                  $school[0]="Physical";
                  break;  
        case 28 :
        case 16 : $target     = explode(".", ltrim($trigger[1]), 2);
                  $value[0]   =0;
                  $value_type[0]=9;
                  $school[0]    =1;
                  break;
        case 17 : $value      = explode(" ", ltrim($trigger[1]), 2);
                  $school     = explode(" ", ltrim($value[1]), 2);
                  $value_type = explode(" ", ltrim($school[1]), 2);
                  $target     = explode(" ", ltrim($value_type[1]), 2);
                  $target     = explode("'s", ltrim($target[1]), 2);
                  
                  // if you're the trigger
                  if(!$target[1]) {
                    $target     = explode("your", ltrim($target[0]), 2);
                    $target[0]  = $you;
                  }
                  
                  $spell      = explode(".", ltrim($target[1]), 2);

                  $tmp        = $trigger[0];
                  $trigger[0] = $target[0];
                  $target[0]  = $tmp;
                  break;
        case 36:
        case 18:  $target[0] =0;
                  $value[0]   =-1;
                  $value_type[0]=20;
                  $value2[0]  =0;
                  $value2_type[0]=0;
                  $spell[0]="Dies";
                  $school[0]=0;
                  break;
        case 19:  $value[0]   =0;
                  $value_type[0]=7;
                  $school[0]="Physical";
                  break;
        case 20:
        case 21:  // Useless Log-Value
        case 22:
        case 23:
        case 29:   
        case 31:
        case 32:
        case 38:
          break;
  
        case 24:  $value[0]   =0;
                  $value_type[0]=8;
                  $target     = explode(" ", ltrim($trigger[1]), 2);
                  $target     = explode(" ", ltrim($target[1]), 2);
                  $target     = explode(".", ltrim($target[0]), 2);
                  $school[0]  = "Physical";
          break;
/*
        case 25 : $target     = explode(" dodges.", ltrim($trigger[1]), 2);
                  if($target=="")
                    echo ">>parrie<<\n";
                  $value[0]   =0;
                  $value_type[0]=8;
                  $school[0]  =0;
          break;
*/
        case 26:  $target     = explode(".", ltrim($trigger[1]), 2);
                  $value[0]   =0;
                  $value_type[0]=9;
                  $school[0]  =1;
          break;
        case 27:  // "fails" 
          break;
        case 30:  // no Log-File-String found
          break;
        case 33:
        case 34:  $value      = explode(" ", ltrim($trigger[1]), 2);
                  $value_type[0]=21;
                  $spell[0]   = "Falldamage";
                  $school[0]  = 1;
          break;
        case 37:  // No Log-File-String found
          break;
        case 39:  // No Log-File-String found
          break;

        case 40 : $value      = explode(" ", ltrim($trigger[1]), 2);
                  $school     = explode(" ", ltrim($value[1]), 2);
                  $value_type = explode(" ", ltrim($school[1]), 2);
                  $target     = explode(" ", ltrim($value_type[1]), 2);
                  $target     = explode("'s", ltrim($target[1]), 2);
                  $spell      = explode(".", ltrim($target[1]), 2);

                  // Switch Target with Trigger
                  $tmp        = $target[0];
                  $target[0]  = $trigger[0];
                  $trigger[0] = $tmp;
                  break;
/*
        case 44:
        case 41 : $target     = explode(" for", trim($trigger[1]), 2);
                  $value      = explode(".", $target[1], 2);
                  $value_type[0]=1;
                  $school[0]=1;
                  break;
*/
        case 43 : $value      = explode(" ", ltrim($trigger[1]), 2);
                  $school     = explode(" ", ltrim($value[1]), 2);
                  $target     = explode("to ", $school[1], 2);
                  $target     = explode(".", $target[1], 2);
                  $value_type[0]=1;
                  break;
    }

    switch($i) {
        case 3  : $spell= explode("critically", $spell[0], 2);
                  $value_type[0]    =15;
                  $school[0]        =0;
                  break;
        case 11 : $tmp              = explode("(", $value[1], 2);
                  $tmp              = explode(")", $tmp[1], 2);
                  if($tmp[0]=="glancing")
                    $value_type[0]=3;
                  if($tmp[0]=="crushing")
                    $value_type[0]=22;
                  break;
        case 12 : $value_type[0]    =2;
                  break;
        case 13 : $value_type[0]    =13;
                  $school[0]        =0;
                  break;
        case 44 : $value_type[0]    =2;
        case 41 : $target           =$you;
                  $tmp              = explode("(", $value[1], 2); 
                  $tmp              = explode(")", $tmp[1], 2); 
                  if($tmp[0]=="glancing")
                    $value_type[0]=3;
                  if($tmp[0]=="crushing")
                    $value_type[0]=22;
                  break;
    }

    // spell School
    switch($school[0]) {
        case "Physical" :
        case "physical" : $school[0]=1;
                          break;
        case "Holy":
        case "holy":      $school[0]=2;
                          break;
        case "Arcane":
        case "arcane":    $school[0]=3;
                          break;
        case "Fire":
        case "fire":      $school[0]=4;
                          break;
        case "Nature":
        case "nature":    $school[0]=5;
                          break;
        case "Frost":
        case "frost":     $school[0]=6;
                          break;
        case "Shadow":
        case "shadow":    $school[0]=7;
                          break;


    }


    // replace value_type string by int

    switch($value_type[0]) {
        case "hits" :       $value_type[0]=1;
                            break;
        case "damage" :     // choose if dot or hit
                            if($i==17) {
                                $value_type[0]=19;
                            }
                            else {
                                $value_type[0]=1;
                            }
                            break;
        case "resisted" :   $value_type[0]=6;
                            break;
        case "parries"  :   $value_type[0]=7;
                            break;
        case "dodges" :
        case "dodged" :     $value_type[0]=8;
                            break;
        case "Heal" :       $value_type[0]=13;
                            break;
        case "health":      $value_type[0]=14;
                            $tmp          =$trigger[0];
                            $trigger[0]   =$target[0];
                            $target[0]    =$tmp;
                            break;
        case "Crit Heal":   $value_type[0]=15;
                            break;
        case "Mana" :       $value_type[0]=16;
                            break;
        case "Energy":      $value_type[0]=18;
                            break;
        case "Rage":        $value_type[0]=17;
                            break;
    }


    // if miss and no spell specified, it have to be an autohit
    if($school[0]==1 && $spell[0]=="")
        $spell[0]="Autohit";


    // Reflect
    if($i==6 || $i==43) {
        // Nagelring
        if($value[0]==3 && $school[0]==3) {
            $spell[0]="Nagelring";
        }
        // Retribution Aura
        if($school[0]==2) {
            $spell[0]="Retribution Aura";
        }
        // Thorns
        if($school[0]==5) {
            $spell[0]="Thorns";
        }
        // Essence of the Pure Flame
        if($school[0]==4 && $value[0]==13) {
          $spell[0]=="Essence of the Pure Flame";
        }
    }


    // Replace You by name given from log-file

    if($target[0]=="You" || $target[0]=="you")
      $target[0]=$you;

    if($trigger[0]=="You" || $trigget[0]=="you") {
      $trigger[0]=$you;
    }

    if ($i!=5 || $i!=9) {
        if($debug) {
            echo $buffer;
            echo "Day=$day[0]|\n";
            echo "Month=$month[0]|\n";
            echo "Hour=$hour[0]|\n";
            echo "Minute=$minute[0]|\n";
            echo "Second=$second[0]|\n";
            echo "Trigger=$trigger[0]|\n";
            echo "Seperator=" .$seperator[$i-1] ."|\n";
            echo "target=$target[0]|\n";
            echo "value=$value[0]|\n";
            echo "value_type=$value_type[0]|\n";
            echo "school=$school[0]|\n";
            echo "spell=$spell[0]|\n";
            echo "rest=$target[1]|\n";

            echo "\n";
        }
        //open db
        $DBConnection=openDB();

        $query ="INSERT INTO tmp_combat_log ";
        $query.="(`timestamp`,`trigger`, target, `separator`, `value`, value_type, value2, value2_type, spell, damage_school, event) ";
        $query.="VALUES ('" .date('Y') ."-" .$month[0] ."-" .$day[0] ."-" .$hour[0] .":" .$minute[0] .":" .$second[0] ."', \"" .$trigger[0] ."\", \"" .$target[0] ."\", ". $i .", " .$value[0] .", ".$value_type[0] .", 0 ,0, \"" .$spell[0] ."\", " .$school[0] .", " .$event .");";

        //echo "------------\n";
        //echo $buffer ."\n";
        //echo $query ."\n";



        $result=executeQuery($DBConnection, $query);
    }
  }


//echo $seperator[5] ."\n";  
?>
