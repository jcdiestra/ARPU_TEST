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
select t1.year as Year,t1.month as Month,day_users as 'Total users',
round(c1*100/day_users,2) 'Immediate',
round(c7*100/day_users,2) '7',
round((c14-c7)*100/day_users,2) '14',
round((c21-c14)*100/day_users,2) '21',
round((c28-c21)*100/day_users,2) '28',
round((c30-c28)*100/day_users,2) '30',
round((c30+c1)*100/day_users,2) 'T30',
round((c60-c30)*100/(day_users-c1-c30),2) '60',
round((c90-c60)*100/(day_users-c1-c60),2) '90',
round((c120-c90)*100/(day_users-c1-c90),2) '120',
round((c150-c120)*100/(day_users-c1-c120),2) '150',
round((c180-c150)*100/(day_users-c1-c150),2) '180',
round((c210-c180)*100/(day_users-c1-c180),2) '210',
round((c240-c210)*100/(day_users-c1-c210),2) '240',
round((c270-c240)*100/(day_users-c1-c240),2) '270',
round((c300-c270)*100/(day_users-c1-c270),2) '300',
round((c330-c300)*100/(day_users-c1-c300),2) '330', 
round((c360-c330)*100/(day_users-c1-c330),2) '360'
from
(select year(date) year,month(date) month, 
sum(inmediate_cancellations) as c1, sum(7_days_cancellations) -sum(inmediate_cancellations) c7, sum(14_days_cancellations)-sum(inmediate_cancellations) c14, 
sum(21_days_cancellations)-sum(inmediate_cancellations) c21, sum(28_days_cancellations)-sum(inmediate_cancellations) c28, sum(30_days_cancellations)-sum(inmediate_cancellations) c30, 
sum(60_days_cancellations)-sum(inmediate_cancellations) c60, sum(90_days_cancellations)-sum(inmediate_cancellations) c90, sum(120_days_cancellations)-sum(inmediate_cancellations) c120, 
sum(150_days_cancellations)-sum(inmediate_cancellations) c150, sum(180_days_cancellations)-sum(inmediate_cancellations) c180, sum(210_days_cancellations)-sum(inmediate_cancellations) c210, 
sum(240_days_cancellations)-sum(inmediate_cancellations) c240, sum(270_days_cancellations)-sum(inmediate_cancellations) c270, sum(300_days_cancellations)-sum(inmediate_cancellations) c300, 
sum(330_days_cancellations)-sum(inmediate_cancellations) c330, sum(360_days_cancellations)-sum(inmediate_cancellations) c360, sum(total_cancellation)-sum(inmediate_cancellations) total
from cancellations
where campaignid=".$campaign_id."
group by year(date),month(date)) as t1
join 
(select * from users_monthly where 
campaignid=".$campaign_id.") as t2
on t1.year=t2.year and t1.month=t2.month;";

$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Year"];
      $dataY1=number_format($row["Month"]);
	  $dataY2=number_format($row["Total users"]);
	  $dataY3=number_format($row["Immediate"],2);
	  $dataY4=number_format($row["7"],2);
	  $dataY5=number_format($row["14"],2);
	  $dataY6=number_format($row["21"],2);
	  $dataY7=number_format($row["28"],2);
	  $dataY8=number_format($row["30"],2);
	  $dataY9=number_format($row["T30"],2);
	  $dataY10=number_format($row["60"],2);
	  $dataY11=number_format($row["90"],2);
	  $dataY12=number_format($row["120"],2);
	  $dataY13=number_format($row["150"],2);
	  $dataY14=number_format($row["180"],2);
	  $dataY15=number_format($row["210"],2);
	  $dataY16=number_format($row["240"],2);
	  $dataY17=number_format($row["270"],2);
	  $dataY18=number_format($row["300"],2);
	  $dataY19=number_format($row["330"],2);
	  $dataY20=number_format($row["360"],2);
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
	  $dataArrayTotal[$i]=array($dataX,$dataY1,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19,$dataY20);
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




