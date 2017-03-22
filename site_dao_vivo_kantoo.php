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
where site.siteid=campaign.siteid and campaignid!=0 and operatorname='Vivo'
and productname not like '%violetta%';";

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


?>