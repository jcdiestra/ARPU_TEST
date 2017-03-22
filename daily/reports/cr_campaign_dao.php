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


/////////////////////

$result = mysql_query("
select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid
and campaignid=".$campaign_id.";")
or die(mysql_error());    
$row = mysql_fetch_array( $result );
$country_name = $row['countryname']."-".$row['operatorname']."-".$row['productname']."-".$row['keyword'];

  
//////////////// get data for summary

$sql="
select t1.date as 'Date',day_users as 'Total Users',
round(1d*100/(day_users*price),2) as CR1,
round(7d*100/(day_users*price*7),2) as CR7,
round(14d*100/(day_users*price*14),2) as CR14,
round(21d*100/(day_users*price*21),2) as CR21,
round(28d*100/(day_users*price*28),2) as CR28,
round(30d*100/(day_users*price*30),2) as CR30,
round(60d*100/(day_users*price*60),2) as CR60,
round(90d*100/(day_users*price*90),2) as CR90,
round(120d*100/(day_users*price*120),2) as CR120,
round(150d*100/(day_users*price*150),2) as CR150,
round(180d*100/(day_users*price*180),2) as CR180,
round(210d*100/(day_users*price*210),2) as CR210,
round(240d*100/(day_users*price*240),2) as CR240,           
round(270d*100/(day_users*price*270),2) as CR270,  
round(300d*100/(day_users*price*300),2) as CR300,
round(330d*100/(day_users*price*330),2) as CR330,  
round(360d*100/(day_users*price*360),2) as CR360    
from
(select date, price, 
	sum(net_users) ,
	round(sum(first_day_colllections) ,2) 1d,
	round(sum(7_days) ,2) as 7d,
	round(sum(14_days) ,2) 14d,
	round(sum(21_days) ,2) 21d,
	round(sum(28_days) ,2) 28d,
	round(sum(30_days) ,2) 30d,
	round(sum(60_days) ,2) 60d,
	round(sum(90_days) ,2) 90d,
	round(sum(120_days) ,2) 120d,
	round(sum(150_days) ,2) 150d,
	round(sum(180_days) ,2) 180d,
	round(sum(210_days) ,2) 210d,
	round(sum(240_days) ,2) 240d,
	round(sum(270_days) ,2) 270d,
	round(sum(300_days) ,2) 300d,
	round(sum(330_days) ,2) 330d,
	round(sum(360_days) ,2) 360d,
	round(sum(total_collections) ,2) total
from
collections
join campaign
on collections.campaignid=campaign.campaignid
where collections.campaignid=".$campaign_id."
and date between '".$date_1."' and '".$date_2."'
group by date) as t1
left join
(select date,sum(day_users) as day_users
from users_daily
where campaignid=".$campaign_id."
and date between '".$date_1."' and '".$date_2."'
group by date) as t3
on t1.date=t3.date;";

$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Date"];
	  $dataY2=number_format($row["Total Users"]);
	  $dataY3=number_format($row["CR1"],2);
	  $dataY4=number_format($row["CR7"],2);
	  $dataY5=number_format($row["CR14"],2);
	  $dataY6=number_format($row["CR21"],2);
	  $dataY7=number_format($row["CR28"],2);
	  $dataY8=number_format($row["CR30"],2);
	  $dataY9=number_format($row["CR60"],2);
	  $dataY10=number_format($row["CR90"],2);
	  $dataY11=number_format($row["CR120"],2);
	  $dataY12=number_format($row["CR150"],2);
	  $dataY13=number_format($row["CR180"],2);
	  $dataY14=number_format($row["CR210"],2);
	  $dataY15=number_format($row["CR240"],2);
	  $dataY16=number_format($row["CR270"],2);
	  $dataY17=number_format($row["CR300"],2);
	  $dataY18=number_format($row["CR330"],2);
	  $dataY19=number_format($row["CR360"],2);
      //add to data array

      $dataX0array[$i]=$dataX;
	  $dataY2array[$i]=$dataY2;
	  $dataY3array[$i]=$dataY3;
	  $dataY4array[$i]=$dataY4;
	  $dataY5array[$i]=$dataY5;
	  $dataY6array[$i]=$dataY6;
	  $dataY7array[$i]=$dataY7;
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataX,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}



?>




