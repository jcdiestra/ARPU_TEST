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



$dataX0array_2=array(); 
$dataY1array_2=array();
$dataY2array_2=array();
$dataY3array_2=array();
$dataY4array_2=array();
$dataY5array_2=array();
$dataY6array_2=array();
$dataY7array_2=array();
$dataArrayTotal_2=array();
$country_name_2;
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


$result = mysql_query("
select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid
and campaignid=".$campaign_id_2.";")
or die(mysql_error());    
$row = mysql_fetch_array( $result );
$country_name_2 = $row['countryname']."-".$row['operatorname']."-".$row['productname']."-".$row['keyword'];
  
//// get data for summary

$sql="
	select t1.year,t1.month,t3.day_users,total_col as 'Collect $',net_users as 'Net Users', 
	round(cpa*t3.day_users,2) as 'investment $',
	net_col 'Net Collect $',
	round(net_col*100/(cpa*t3.day_users),2) as 'Paid %'
	from
	(
	select year(date) as year,month(date) as month,sum(day_users) day_user,
	round(sum(total_collections),2) as total_col,
	round(sum(total_collections*rs_operator*(1-opex)*(1-tax)),2) as net_col,
	sum(net_users) as net_users
	from collections c
	left join campaign cp
	on c.campaignid=cp.campaignid
	where c.campaignid=".$campaign_id."
	group by year(date),month(date)
	) as t1
	left join
	(select year,month,cpa from cpa_monthly 
	where campaignid=".$campaign_id.") as t2
	on t1.year=t2.year and t1.month=t2.month
	left join
	(select * from users_monthly where 
	campaignid=".$campaign_id.") as t3
	on t1.year=t3.year and t1.month=t3.month";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["year"];
      $dataY1=number_format($row["month"]);
	  $dataY2=number_format($row["day_users"]);
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
	  $dataArrayTotal[$i]=array($dataX,$dataY1,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}
///////////////////////////////////////////////////////////////////
//// get data for summary_2

$sql="
select t1.year,t1.month,t3.day_users,total_col as 'Collect $',net_users as 'Net Users', 
round(cpa*t3.day_users,2) as 'investment $',
net_col 'Net Collect $',
round(net_col*100/(cpa*t3.day_users),2) as 'Paid %'
from
(
select year(date) as year,month(date) as month,sum(day_users) day_user,
round(sum(total_collections),2) as total_col,
round(sum(total_collections*rs_operator*(1-opex)*(1-tax)),2) as net_col,
sum(net_users) as net_users
from collections c
join campaign cp
on c.campaignid=cp.campaignid
where c.campaignid=".$campaign_id_2."
group by year(date),month(date)
) as t1
left join
(select year,month,cpa from cpa_monthly 
where campaignid=".$campaign_id_2.") as t2
on t1.year=t2.year and t1.month=t2.month
left join
(select * from users_monthly where 
campaignid=".$campaign_id_2.") as t3
on t1.year=t3.year and t1.month=t3.month";
$result_2 = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields_2 = mysql_num_fields($result_2); 
$num_rows_2 = mysql_num_rows($result_2);
$i=0;

if ($result_2) {
  while ($row = mysql_fetch_assoc($result_2)) {
      $dataX_2=$row["year"];
      $dataY1_2=number_format($row["month"]);
	  $dataY2_2=number_format($row["day_users"]);
	  $dataY3_2=number_format($row["Collect $"]);
	  $dataY4_2=number_format($row["Net Users"]);
	  $dataY5_2=number_format($row["investment $"]);
	  $dataY6_2=number_format($row["Net Collect $"]);
	  $dataY7_2=number_format($row["Paid %"]);
      //add to data array

      $dataX0array_2[$i]=$dataX_2;
	  $dataY1array_2[$i]=$dataY1_2;
	  $dataY2array_2[$i]=$dataY2_2;
	  $dataY3array_2[$i]=$dataY3_2;
	  $dataY4array_2[$i]=$dataY4_2;
	  $dataY5array_2[$i]=$dataY5_2;
	  $dataY6array_2[$i]=$dataY6_2;
	  $dataY7array_2[$i]=$dataY7_2;
	  ///Array X Dimensional:
	  $dataArrayTotal_2[$i]=array($dataX_2,$dataY1_2,$dataY2_2,$dataY3_2,$dataY4_2,$dataY5_2,$dataY6_2,$dataY7_2);
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




