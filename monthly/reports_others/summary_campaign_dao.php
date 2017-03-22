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
$country_name;



/////////

$result = mysql_query("
select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid
and campaignid=".$campaign_id.";")
or die(mysql_error());    
$row = mysql_fetch_array( $result );
$country_name = $row['countryname']."-".$row['operatorname']."-".$row['productname']."-".$row['keyword'];
$roi_formula = $row['roi_formula'];
  
//// get data for summary

$sql="
select t1.year,t1.month,cpa,t1.day_user as 'Total Users',total_col as 'Collect $',net_users as 'Net Users', 
round(cpa*t1.day_user,2) as 'investment $',
net_col 'Net Collect $',
round(net_col*100/(cpa*t1.day_user),2) as 'Paid %'
from
(
select year(date) as year,month(date) as month,sum(day_users) day_user,
round(sum(total_collections),2) as total_col,
round(".$roi_formula."(sum(total_collections),rs_operator,opex,tax,rs_partner,others),2) as net_col,
sum(net_users) as net_users
from collections c
join campaign cp
on c.campaignid=cp.campaignid
where c.campaignid=".$campaign_id."
group by year(date),month(date)
) as t1
left join
(select year,month,cpa from cpa_monthly 
where campaignid=".$campaign_id.") as t2
on t1.year=t2.year and t1.month=t2.month;";

$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["year"];
      $dataY1=number_format($row["month"]);
	  $dataX2=$row["cpa"];
	  $dataY2=number_format($row["Total Users"]);
	  $dataY3=number_format($row["Collect $"]);
	  $dataY4=number_format($row["Net Users"]);
	  $dataY5=number_format($row["investment $"]);
	  $dataY6=number_format($row["Net Collect $"]);
	  $dataY7=number_format($row["Paid %"]);
      //add to data array

      $dataX0array[$i]=$dataX;
	  $dataY1array[$i]=$dataY1;
	  $dataY2array[$i]=$dataY2;
	  $dataY3array[$i]=$dataY3;
	  $dataY4array[$i]=$dataY4;
	  $dataY5array[$i]=$dataY5;
	  $dataY6array[$i]=$dataY6;
	  $dataY7array[$i]=$dataY7;
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataX,$dataY1,$dataX2,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}


  
 /* 
  
  
//get data from database
$sql="SELECT date as Date, inmediate_cancellations as 'Inmediate Cancellations', total_cancellations as 'Total Cancellations' 	
FROM cancellation_stats where Year(Date)=".$year." and Month(Date)=".$month." and id_country=".$country." order by Date asc;";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Date"];
      $dataY1=$row["Total Cancellations"];
	  $dataY2=$row["Inmediate Cancellations"];
      //add to data array

      $dataX0array[$i]=$dataX;
	  $dataY1array[$i]=$dataY1;
	  $dataY2array[$i]=$dataY2;
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataX,$dataY2,$dataY1);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}
*/

?>




