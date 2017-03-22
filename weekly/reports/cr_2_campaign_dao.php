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
select t1.week_date as 'Week date',t3.day_users as 'Total Users',round(1+((datediff(t1.week_date,init))/7),0) 'Week #',
round(1d*100/(day_users*price),2) as CR1,
round(7d*100/(day_users*price*1),2) as CR7,
round(14d*100/(day_users*price*2),2) as CR14,
round(21d*100/(day_users*price*3),2) as CR21,
round(28d*100/(day_users*price*4),2) as CR28,
round(30d*100/(day_users*price*4.29),2) as CR30,
round(60d*100/(day_users*price*8.57),2) as CR60,
round(90d*100/(day_users*price*12.86),2) as CR90,
round(120d*100/(day_users*price*17.14),2) as CR120,
round(150d*100/(day_users*price*21.43),2) as CR150,
round(180d*100/(day_users*price*25.71),2) as CR180,
round(210d*100/(day_users*price*30),2) as CR210,
round(240d*100/(day_users*price*34.29),2) as CR240,           
round(270d*100/(day_users*price*38.57),2) as CR270,  
round(300d*100/(day_users*price*42.86),2) as CR300,
round(330d*100/(day_users*price*47.14),2) as CR330,  
round(360d*100/(day_users*price*51.43),2) as CR360    
from
(select STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W') as week_date, price, 
	start_date as init,
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
group by STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W') ) as t1
left join
(select week_date,sum(day_users) as day_users
from users_weekly
where campaignid=".$campaign_id."
group by week_date) as t3
on t1.week_date=t3.week_date
where t1.week_date>=init
;";



$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Week date"];
      $dataX2=$row["Week #"];
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
	  $dataArrayTotal[$i]=array($dataX,$dataX2,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



$dataArrayTotal_2=array();
$country_name_2;


/////////////////////

$result_2 = mysql_query("
select campaignid,countryname,operatorname,productname,campaign.*
from site
join campaign
where site.siteid=campaign.siteid
and campaignid=".$campaign_id_2.";")
or die(mysql_error());    
$row = mysql_fetch_array( $result_2 );
$country_name_2 = $row['countryname']."-".$row['operatorname']."-".$row['productname']."-".$row['keyword'];

  
//////////////// get data for summary


$sql="
select t1.week_date as 'Week date',t3.day_users as 'Total Users',round(1+((datediff(t1.week_date,init))/7),0) 'Week #',
round(1d*100/(day_users*price),2) as CR1,
round(7d*100/(day_users*price*1),2) as CR7,
round(14d*100/(day_users*price*2),2) as CR14,
round(21d*100/(day_users*price*3),2) as CR21,
round(28d*100/(day_users*price*4),2) as CR28,
round(30d*100/(day_users*price*4.29),2) as CR30,
round(60d*100/(day_users*price*8.57),2) as CR60,
round(90d*100/(day_users*price*12.86),2) as CR90,
round(120d*100/(day_users*price*17.14),2) as CR120,
round(150d*100/(day_users*price*21.43),2) as CR150,
round(180d*100/(day_users*price*25.71),2) as CR180,
round(210d*100/(day_users*price*30),2) as CR210,
round(240d*100/(day_users*price*34.29),2) as CR240,           
round(270d*100/(day_users*price*38.57),2) as CR270,  
round(300d*100/(day_users*price*42.86),2) as CR300,
round(330d*100/(day_users*price*47.14),2) as CR330,  
round(360d*100/(day_users*price*51.43),2) as CR360    
from
(select STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W') as week_date, price, 
	start_date as init,
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
where collections.campaignid=".$campaign_id_2."
group by STR_TO_DATE(concat(yearweek(date,1),' monday'),'%X%V %W') ) as t1
left join
(select week_date,sum(day_users) as day_users
from users_weekly
where campaignid=".$campaign_id_2."
group by week_date) as t3
on t1.week_date=t3.week_date
where t1.week_date>=init
;";



$result_2 = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields_2 = mysql_num_fields($result_2); 
$num_rows_2 = mysql_num_rows($result_2);
$i=0;

if ($result_2) {
  while ($row = mysql_fetch_assoc($result_2)) {
      $dataX=$row["Week date"];
      $dataX2=$row["Week #"];
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

	  ///Array X Dimensional:
	  $dataArrayTotal_2[$i]=array($dataX,$dataX2,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}


?>




