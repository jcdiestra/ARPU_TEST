<?php

include 'db_connection.php';

$dataarray=array();
$dataX0array=array(); 
$dataX1array=array();
$dataX2array=array();

$dataArrayTotal=array();
  
//get data from database DATA DE LOS SITES


$sql="select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid and campaignid!=0
and (operatorname!='Vivo' or productname like '%viole%')";


$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
	  $data=$row["campaignid"];
      $dataX0=$row["countryname"];
      $dataX1=$row["operatorname"];
	  $dataX2=$row["productname"];
	  $dataX3=$row["keyword"];
	  $dataX4=$row["campaign_type"];

      //add to data array
	  $dataarray[$i]=$data;	
      $dataX0array[$i]=$dataX0;
	  $dataX1array[$i]=$dataX1;
	  $dataX2array[$i]=$dataX2;
	  $dataX3array[$i]=$dataX3;

	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($data,$dataX0,$dataX1,$dataX2,$dataX3,$dataX4);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}


//get data from database DATA DE LAS CAMPAÑAS
/*
$sql="SELECT campaign.id,country, keyword, start_date from campaign inner join 
site
on campaign.id_site=site.id
";

$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;



$dataX0array2=array(); 
$dataX1array2=array();
$dataX2array2=array();

$dataArrayTotal2=array();

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
	  
	  $dataX0=$row["id"];
      $dataX1=$row["country"];
      $dataX3=$row["keyword"];
	  $dataX2=$row["start_date"];

      //add to data array
	  
      $dataX0array2[$i]=$dataX0;
	  $dataX1array2[$i]=$dataX1;
	  $dataX2array2[$i]=$dataX2;

	  ///Array X Dimensional:
	  $dataArrayTotal2[$i]=array($dataX0,$dataX1,$dataX3,$dataX2);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
} */


?>