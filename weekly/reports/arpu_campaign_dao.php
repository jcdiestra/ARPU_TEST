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

  
//// get data for summary

$sql="
select t1.week_date as 'Week date', round(1+((datediff(t1.week_date,init))/7),0) 'Week #',day_users as 'Total Users',
round(1d/(day_users),3) as '1st ARP',
round(7d/(day_users),3) as '7 ARP',
round(14d/(day_users),3) as '14 ARP',
round(21d/(day_users),3) as '21 ARP',
round(28d/(day_users),3) as '28 ARP',
round(30d/(day_users),3) as '30 ARP',
round(60d/(day_users),3) as '60 ARP',
round(90d/(day_users),3) as '90 ARP',
round(120d/(day_users),3) as '120 ARP',
round(150d/(day_users),3) as '150 ARP',
round(180d/(day_users),3) as '180 ARP',
round(210d/(day_users),3) as '210 ARP',
round(240d/(day_users),3) as '240 ARP',           
round(270d/(day_users),3) as '270 ARP',  
round(300d/(day_users),3) as '300 ARP',
round(330d/(day_users),3) as '330 ARP',  
round(360d/(day_users),3) as '360 ARP'    
from
(select STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W') as week_date,cp.start_date as init,
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
collections c
join campaign cp
on cp.campaignid=c.campaignid
where cp.campaignid=".$campaign_id."
group by STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W')) as t1
left join
(select week_date,sum(day_users) as day_users
from users_weekly
where campaignid=".$campaign_id."
group by week_date) as t3
on t1.week_date=t3.week_date
where t1.week_date>=init;";


$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Week date"];
	  $dataX2=$row["Week #"];
	  $dataY2=number_format($row["Total Users"]);
	  $dataY3=number_format($row["1st ARP"],3);
	  $dataY4=number_format($row["7 ARP"],3);
	  $dataY5=number_format($row["14 ARP"],3);
	  $dataY6=number_format($row["21 ARP"],3);
	  $dataY7=number_format($row["28 ARP"],3);
	  $dataY8=number_format($row["30 ARP"],3);
	  $dataY9=number_format($row["60 ARP"],3);
	  $dataY10=number_format($row["90 ARP"],3);
	  $dataY11=number_format($row["120 ARP"],3);
	  $dataY12=number_format($row["150 ARP"],3);
	  $dataY13=number_format($row["180 ARP"],3);
	  $dataY14=number_format($row["210 ARP"],3);
	  $dataY15=number_format($row["240 ARP"],3);
	  $dataY16=number_format($row["270 ARP"],3);
	  $dataY17=number_format($row["300 ARP"],3);
	  $dataY18=number_format($row["330 ARP"],3);
	  $dataY19=number_format($row["360 ARP"],3);
      //add to data array

      $dataX0array[$i]=$dataX;
	  $dataY2array[$i]=$dataY2;
	  $dataY3array[$i]=$dataY3;
	  $dataY4array[$i]=$dataY4;
	  $dataY5array[$i]=$dataY5;
	  $dataY6array[$i]=$dataY6;
	  $dataY7array[$i]=$dataY7;
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataX,$dataX2,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}



?>




