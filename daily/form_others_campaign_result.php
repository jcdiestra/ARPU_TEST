<html>
<div>

<?php

global $campaign_id;
$campaign_id = $_POST['campaign_id'];  // Storing Selected Value In Variable

global $date_1;
$date_1 = $_POST['date1'];

global $date_2;
$date_2 = $_POST['date2'];

////debug
//echo '<script language="javascript">alert("'.$campaign_id.'");</script>'; 
///

//global $campaign_id_2;
//$campaign_id_2 = $_POST['campaign_id_2'];  // Storing Selected Value In Variable

//global $keyword;
//$keyword= $_POST['keyword'];  // Storing Selected Value In Variable


global $report_type;
$report_type = $_POST['report'];  // Storing Selected Value In Variable

if ($report_type=="summary")
{	
	include "reports_others/summary_campaign_dao.php";
	include "reports_others/result_campaign.php";
}

if ($report_type=="cancellation")
{	
	include "reports_others/cancellation_campaign_dao.php";
	include "reports_others/result_campaign.php";
}

if ($report_type=="collectionrate")
{	
	include "reports_others/cr_campaign_dao.php";
	include "reports_others/result_campaign.php";
}

if ($report_type=="arpu")
{	
	include "reports_others/arpu_campaign_dao.php";
	include "reports_others/result_campaign.php";
}

if ($report_type=="arpuroi")
{	
	include "reports_others/arpuroi_campaign_dao.php";
	include "reports_others/result_campaign.php";
}

?>



</div>

</html>


