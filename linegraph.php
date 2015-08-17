<?php

include"lib/function.php";
include ("/usr/share/jpgraph/jpgraph-3.5.0b1/src/jpgraph.php");
include ("/usr/share/jpgraph/jpgraph-3.5.0b1/src/jpgraph_line.php");
include ("/usr/share/jpgraph/jpgraph-3.5.0b1/src/jpgraph_date.php");

$intervall=1;
if($_GET['start'] && $_GET['end']) {
  $start=$_GET['start'];
  $end=$_GET['end'];
  $periodOfTime="AND TIME(l.timestamp) >= " .$start ." AND TIME(l.timestamp) <= " .$end ." ";
  
  $start=date('Y-m-d ') .$start[0] .$start[1] .":" .$start[2] .$start[3] .":" .$start[4] .$start[5];
  $end=date('Y-m-d ') .$end[0] .$end[1] .":" .$end[2] .$end[3] .":" .$end[4] .$end[5];

  $diff=strtotime(($end-$start));
/*
  if($diff<=    10) {
    if($diff<=   600) {
      if($diff<=  1800) {
      $intervall=120;
      }
      $intervall=10;
    }
    $intervall=0.05;
  }*/
}

//$intervall=0.1;
$ydata[0] =0;
$ydata2[0]=0;

  $ydata=$value;

for($i=1;$_GET[$i];$i++) {

  $tmp        = $_GET[$i];
  $length     = strlen($tmp);
  $length    /=4;

  for($j=0;$j<$length;$j++) {
    $ydata[$j]= substr($tmp, 0, 4);
    $tmp      = substr($tmp,4);
  }
}

if($_GET['query']==1) {
  //Damage Taken
  $query       =" SELECT LPAD(sum(l.value)/" .$intervall .", 5, '0') AS value, UNIX_TIMESTAMP(l.timestamp) AS timestamp, round(UNIX_TIMESTAMP(timestamp)/" .$intervall .") AS zeitstempel ";
  $query      .=" FROM combat_log l ";
  $query      .=" WHERE l.target = '" .$_GET['target'] ."' ";
  $query      .= $periodOfTime;
  $query      .=" AND l.event=" .$_GET['event'];
  $query      .=" AND l.value_type IN(1,2,3,4,5,6,7,8,9,10,19)";
  $query      .=" GROUP BY zeitstempel ";
  $query      .=" ORDER BY l.timestamp ASC;";
  $dbConnection=openDB();
  $result = executeQuery($dbConnection, $query);
  $numrows=$result->num_rows;

$j=0;

  for($i=0;$i<$numrows;$i++) {
    $currentRow=$result->fetch_object();

    if($i>0) {
      for(;$currentRow->timestamp>$xdata[$i-1+$j]+$intervall;$j++) {
        $ydata[$i+$j]=0;
        $xdata[$i+$j]=$xdata[$i-1+$j]+$intervall;
      }
    }
    
    $ydata[$i+$j]=$currentRow->value;
    $xdata[$i+$j]=$currentRow->timestamp;
  

//    $ydata[$i]=$currentRow->value;
//    $xdata[$i]=$currentRow->timestamp;
  }  

  //Healing Taken
  $query       =" SELECT LPAD((sum(l.value)/" .$intervall ."), 5, '0') AS value, UNIX_TIMESTAMP(l.timestamp) AS timestamp, round(UNIX_TIMESTAMP(timestamp)/" .$intervall .") AS zeitstempel ";
  $query      .=" FROM combat_log l ";
  $query      .=" WHERE l.target = '" .$_GET['target'] ."' ";
  $query      .= $periodOfTime;
  $query      .=" AND l.event=" .$_GET['event'];
  $query      .=" AND l.value_type IN(14,15,16)";
  $query      .=" GROUP BY zeitstempel ";
  $query      .=" ORDER BY l.timestamp ASC;";
  $dbConnection=openDB();
  $result = executeQuery($dbConnection, $query);
  $numrows=$result->num_rows;


$j=0;

  for($i=0;$i<$numrows;$i++) {
    $currentRow=$result->fetch_object();

    if($i>0) {
      for(;$currentRow->timestamp>$xdata2[$i-1+$j]+$intervall;$j++) {
        $ydata2[$i+$j]=0;
        $xdata2[$i+$j]=$xdata2[$i-1+$j]+$intervall;
      }
    }

    $ydata2[$i+$j]=$currentRow->value;
    $xdata2[$i+$j]=$currentRow->timestamp;


//    $ydata2[$i]=$currentRow->value;
//    $xdata2[$i]=$currentRow->timestamp;
  }


  // Generate empty String if Nothing is given
  if($ydata[0]==0)
    $xdata[0]=$xdata2[0];
  if($ydata2[0]==0)
    $xdata2[0]=$xdata[0];


  

}


if($_GET['query']==2) {
  //Damage done
  $query       =" SELECT sum(l.value)/" .$intervall ." AS value, UNIX_TIMESTAMP(l.timestamp) AS timestamp, ROUND(UNIX_TIMESTAMP(timestamp)/" .$intervall .") AS zeitstempel ";
  $query      .=" FROM combat_log l ";
  $query      .=" WHERE l.`trigger` = '" .$_GET['target'] ."' ";
  $query      .= $periodOfTime;
  $query      .=" AND l.event=" .$_GET['event'];
  $query      .=" AND l.value_type IN(1,2,3,4,5,6,7,8,9,10,19)";
  $query      .=" GROUP BY zeitstempel ";
  $query      .=" ORDER BY l.timestamp ASC;";
  $dbConnection=openDB();
  $result = executeQuery($dbConnection, $query);
  $numrows=$result->num_rows;

  
$j=0;

  for($i=0;$i<$numrows;$i++) {
    $currentRow=$result->fetch_object();

    if($i>0) {
      for(;$currentRow->timestamp>$xdata[$i-1+$j]+$intervall;$j++) {
        $ydata[$i+$j]=0;
        $xdata[$i+$j]=$xdata[$i-1+$j]+$intervall;
      }
    }

    $ydata[$i+$j]=$currentRow->value;
    $xdata[$i+$j]=$currentRow->timestamp;
  }

  //Healing done
  $query       =" SELECT sum(l.value)/" .$intervall ." AS value, UNIX_TIMESTAMP(l.timestamp) AS timestamp, round(UNIX_TIMESTAMP(timestamp)/" .$intervall .") AS zeitstempel ";
  $query      .=" FROM combat_log l ";
  $query      .=" WHERE l.`trigger` = '" .$_GET['target'] ."' ";
  $query      .= $periodOfTime;
  $query      .=" AND l.event=" .$_GET['event'];
  $query      .=" AND l.value_type IN(14,15,16)";
  $query      .=" GROUP BY zeitstempel ";
  $query      .=" ORDER BY l.timestamp ASC;";
  $dbConnection=openDB();
  $result = executeQuery($dbConnection, $query);
  $numrows=$result->num_rows;



 
$j=0;

  for($i=0;$i<$numrows;$i++) {
    $currentRow=$result->fetch_object();

    if($i>0) {
      for(;$currentRow->timestamp>$xdata2[$i-1+$j]+$intervall;$j++) {
        $ydata2[$i+$j]=0;
        $xdata2[$i+$j]=$xdata2[$i-1+$j]+$intervall;
      }
    }

    $ydata2[$i+$j]=$currentRow->value;
    $xdata2[$i+$j]=$currentRow->timestamp;

  }


 
  // Generate empty String if Nothing is given
  if($ydata==0 ||$xdata==0)
    $xdata[0]=$xdata2[0];
  if($ydata2==0 || $xdata2==0)
    $xdata2[0]=$xdata[0];

}

if($_GET['query']==3) {

  for($i=1;$_GET[$i];$i++){
    $valueTypeArray[$i-1]=$_GET[$i];
  }
    for($k=0;$k<$_GET['id' .$k];$k++) {
    $target=$_GET['id' .$k];


    //Healing done
    $query       =" SELECT sum(l.value)/" .$intervall ." AS value, UNIX_TIMESTAMP(l.timestamp) AS timestamp, round(UNIX_TIMESTAMP(timestamp)/" .$intervall .") AS zeitstempel ";
    $query      .=" FROM combat_log l ";
    $query      .=" WHERE l.`trigger` = '" .$target ."' ";
    $query      .= $periodOfTime;
    $query      .=" AND l.value_type IN(";
    for($i=0;$i<count($valueTypeArray);$i++){
      $query.=$valueTypeArray[$i];
      if($i+1<count($valueTypeArray))
      $query    .=", ";
    }
    $query      .=")";
    $query      .=" AND l.event=". $_GET['event'];
    $query      .=" GROUP BY zeitstempel ";
    $query      .=" ORDER BY l.timestamp ASC;";
    $dbConnection=openDB();
    $result = executeQuery($dbConnection, $query);
    $numrows=$result->num_rows;


  $j=0;

    for($i=0;$i<$numrows;$i++) {
      $currentRow=$result->fetch_object();

      if($i>0) {
        for(;$currentRow->timestamp>$xdata[$i-1+$j]+$intervall;$j++) {
          $ydata[$i+$j]=0;
          $xdata[$i+$j]=$xdata[$i-1+$j]+$intervall;
        }
      }

      $ydata[$i+$j]=$currentRow->value;
      $xdata[$i+$j]=$currentRow->timestamp;


    }

    switch($k)  {
      case 0: $tmpx=$xdata;
              $tmpy=$ydata;
        break;
      case 1: $xdata2=$xdata;
              $ydata2=$ydata;
              $xdata=$tmpx;
              $ydata=$tmpy;
        break;
    }
  }
}


    // Generate empty String if Nothing is given
    if($ydata[0]==0)
      $xdata[0]=$xdata2[0];
    if($ydata2[0]==0)
      $xdata2[0]=$xdata[0];














//echo $query;

//print_r($xdata);
//print_r($ydata);

// Die Werte der 2 Linien in ein Array speichern
//$ydata = array(11,3,8,12,5,1,9,13,5,7, 22);
//$ydata2 = array(1,19,15,7,22,14,5,9,21,13,50);


// Grafik generieren und Grafiktyp festlegen
$graph = new Graph(1000,600,"auto");    
//$graph->SetScale("textlin");
$graph->SetScale('datlin');

// Die Zwei Linien generieren 
$lineplot=new LinePlot($ydata, $xdata);

$lineplot2=new LinePlot($ydata2, $xdata2);

// Die Linien zu der Grafik hinzufügen
$graph->Add($lineplot);
$graph->Add($lineplot2);


// Set the angle for the labels to 90 degrees
$graph->xaxis->SetLabelAngle(90);


// Grafik Formatieren
$graph->img->SetMargin(50,20,40,100);
$graph->title->Set("CowreanLogs");
$graph->xaxis->title->Set("Time");
$graph->yaxis->title->Set("Damage / Heal");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

$lineplot->SetWeight(2);

$lineplot2->SetWeight(2);

$graph->yaxis->SetWeight(2);
//$graph->SetShadow();

// Color
// Background Color
$graph->SetMarginColor('black:0.6'); 
$graph->SetFrame(true,'black:0.6',1);

// Title Color
$graph->title->SetColor("green");

// Graph Color
$lineplot->SetColor("#FF00BF");
$lineplot2->SetColor("orange");

// Axis Color
$graph->yaxis->SetColor("red");
$graph->xaxis->SetColor("red");

// Grid Lines
$graph -> SetGridDepth (DEPTH_FRONT); 
$graph -> xgrid -> Show(true, false); 
$graph -> ygrid -> Show(true, false);
$graph->ygrid->SetColor('gray');
$graph->xgrid->SetColor('gray'); 
$graph->ygrid->SetFill(false,'#000000@0.5','#FFFFFF@0.5'); 
//$graph->ygrid->SetLineStyl2e('dashed'); 
$graph->ygrid->SetWeight(1); 

$graph->SetBackgroundGradient('blue','navy:0.5',GRAD_HOR,BGRAD_PLOT);



// Grafik anzeigen
$graph->Stroke();
?>
