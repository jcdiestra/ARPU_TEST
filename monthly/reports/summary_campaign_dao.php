<?php

include '../db_connection.php';
 

$dataArrayTotal=array();
$country_name;



////////////////////////////////////////////////////////////////////////////////////////////////////////

$result = mysql_query("
select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid
and campaignid=".$campaign_id.";")
or die(mysql_error());    
$row = mysql_fetch_array( $result );
$country_name = $row['countryname']."-".$row['operatorname']."-".$row['productname']."-".$row['keyword'];

  
///////////////////////////////////////////////////////////////////////////////////// get data for summary

$sql="
	select t1.year,t1.month,cpa,t3.day_users,total_col as 'Collect $',net_users as 'Net Users', 
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
	  $dataX2=$row["cpa"];
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
	  $dataArrayTotal[$i]=array($dataX,$dataY1,$dataX2,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}



?>




