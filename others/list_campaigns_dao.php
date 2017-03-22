<?php

include '../db_connection.php';
 
$dataX0array=array(); 
$dataY1array=array();
$dataY2array=array();
$dataY3array=array();
$dataY4array=array();
$dataY5array=array();
$dataY6array=array();
$dataY7array=array();
$dataArrayTotal=array();


/////////

  
//// get data about Campaigns
$sql="
select Countryname as Country,s.OperatorName as Operator,s.ProductName as Product,description,
campaign_type 'Type',price as Price,round(rs_operator*100,0) as 'RS_Operator %', round(rs_partner*100,0) as 'RS_Partner %'
, round(opex*100,0)  as 'OPEX %', round(tax*100,2) as 'TAX %',routine_comment as 'ROI Formula'
from campaign cp
join site s
on cp.siteid=s.siteid
join (SELECT specific_name,routine_comment FROM INFORMATION_SCHEMA.ROUTINES 
WHERE specific_name LIKE '%roi%' 
ORDER BY ROUTINE_NAME) as t1
on roi_formula=specific_name;";


$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataY1=$row["Country"];
	  $dataY2=$row["Operator"];
	  $dataY3=$row["Product"];
	  $dataY4=$row["description"];
	  $dataY5=$row["Type"];
	  $dataY6=$row["Price"];
	  $dataY7=$row["RS_Operator %"];
	  $dataY8=$row["RS_Partner %"];
	  $dataY9=$row["OPEX %"];
	  $dataY10=$row["TAX %"];
	  $dataY11=$row["ROI Formula"];
      //add to data array

	  $dataY1array[$i]=$dataY1;
	  $dataY2array[$i]=$dataY2;
	  $dataY3array[$i]=$dataY3;
	  $dataY4array[$i]=$dataY4;
	  $dataY5array[$i]=$dataY5;
	  $dataY6array[$i]=$dataY6;
	  $dataY7array[$i]=$dataY7;
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataY1,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}



?>




