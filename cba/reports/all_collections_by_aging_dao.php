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

//// get data for summary

$sql="
select t1.Year, t1.Month,
1M, 2M, 3M,4M,5M,6M,7M,8M,9M,10M,11M,12M,13M,14M,15M,16M,17M,18M,19M,20M,21M,22M,23M,24M,25M, 
(25plus+total) as 25plus, (totalcollections+total) as TotalCollections
from(
select year(date) as Year,month(date) as Month,
round(sum(1M),2) 1M, 
round(sum(2M),2) 2M, 
round(sum(3M),2) 3M, 
round(sum(4M),2) 4M, 
round(sum(5M),2) 5M, 
round(sum(6M),2) 6M, 
round(sum(7M),2) 7M, 
round(sum(8M),2) 8M, 
round(sum(9M),2) 9M, 
round(sum(10M),2) 10M, 
round(sum(11M),2) 11M, 
round(sum(12M),2) 12M, 
round(sum(13M),2) 13M, 
round(sum(14M),2) 14M, 
round(sum(15M),2) 15M, 
round(sum(16M),2) 16M, 
round(sum(17M),2) 17M, 
round(sum(18M),2) 18M, 
round(sum(19M),2) 19M, 
round(sum(20M),2) 20M, 
round(sum(21M),2) 21M, 
round(sum(22M),2) 22M, 
round(sum(23M),2) 23M, 
round(sum(24M),2) 24M, 
round(sum(25M),2) 25M, 
round(sum(25Plus),2) 25plus, 
round(sum(totalcollections),2) as totalcollections
from collections_by_aging ca 
join site s
on s.siteid=ca.siteid
where (ca.keyword not in ('basic2completo','basic2ingles','basicto1000','frmig','ivrspmig','sms21000','sms2com','sms2eng','smsspmig')
or ca.keyword is null)
and year(date)=".$year." and countryname='".$country."' and operatorname='".$operator."'
group by year(date),month(date)) as t1
join
(select year(date) year,month(date) month, round(sum(totalcollections),2) as total 
from collections_by_aging ca 
join site s
on s.siteid=ca.siteid
where ca.keyword in ('basic2completo','basic2ingles','basicto1000','frmig','ivrspmig','sms21000','sms2com','sms2eng','smsspmig')
and year(date)=".$year." and countryname='".$country."' and operatorname='".$operator."'
group by year(date),month(date)) as t2
on (t1.year=t2.year and t1.month=t2.month);";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
$numfields = mysql_num_fields($result); 
$num_rows = mysql_num_rows($result);
$i=0;

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $dataX=$row["Year"];
      $dataY1=number_format($row["Month"]);
	  $dataY2=number_format($row["1M"]);
	  $dataY3=number_format($row["2M"],1);
	  $dataY4=number_format($row["3M"],1);
	  $dataY5=number_format($row["4M"],1);
	  $dataY6=number_format($row["5M"],1);
	  $dataY7=number_format($row["6M"],1);
	  $dataY8=number_format($row["7M"],1);
	  $dataY9=number_format($row["8M"],1);
	  $dataY10=number_format($row["9M"],1);
	  $dataY11=number_format($row["10M"],1);
	  $dataY12=number_format($row["11M"],1);
	  $dataY13=number_format($row["12M"],1);
	  $dataY14=number_format($row["13M"],1);
	  $dataY15=number_format($row["14M"],1);
	  $dataY16=number_format($row["15M"],1);
	  $dataY17=number_format($row["16M"],1);
	  $dataY18=number_format($row["17M"],1);
	  $dataY19=number_format($row["18M"],1);
	  $dataY20=number_format($row["19M"],1);
	  $dataY21=number_format($row["20M"],1);
	  $dataY22=number_format($row["21M"],1);
	  $dataY23=number_format($row["22M"],1);
	  $dataY24=number_format($row["23M"],1);
	  $dataY25=number_format($row["24M"],1);
	  $dataY26=number_format($row["25M"],1);
	  $dataY27=number_format($row["25plus"],1);
	  $dataY28=number_format($row["TotalCollections"],1);
      
	  ///Array X Dimensional:
	  $dataArrayTotal[$i]=array($dataX,$dataY1,$dataY2,$dataY3,$dataY4,$dataY5,$dataY6,$dataY7,$dataY8,$dataY9,$dataY10,$dataY11,$dataY12,
	  $dataY13,$dataY14,$dataY15,$dataY16,$dataY17,$dataY18,$dataY19,
	  $dataY20,$dataY21,$dataY22,$dataY23,$dataY24,$dataY25,$dataY26,$dataY27,$dataY28);
	  //echo $dataArrayTotal[$i][0]; echo "</br>";
	  $i++;	  
	  
  }
  
}



?>