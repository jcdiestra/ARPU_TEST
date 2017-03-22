<html>
<div>

<?php

global $campaign_id;
$campaign_id = $_POST['campaign_id'];  // Storing Selected Value In Variable


global $campaign_id;
$campaign_id_2 = $_POST['campaign_id_2'];  // Storing Selected Value In Variable

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
	include "reports_others/summary_2_campaign_dao.php";
	include "reports_others/result_2_campaign.php";
}

if ($report_type=="cancellation")
{	
	include "reports_others/cancellation_2_campaign_dao.php";
	include "reports_others/result_2_campaign.php";
}

if ($report_type=="collectionrate")
{	
	include "reports_others/cr_2_campaign_dao.php";
	include "reports_others/result_2_campaign.php";
}

if ($report_type=="arpu")
{	
	include "reports_others/arpu_2_campaign_dao.php";
	include "reports_others/result_2_campaign.php";
}

if ($report_type=="arpuroi")
{	
	include "reports_others/arpuroi_2_campaign_dao.php";
	include "reports_others/result_2_campaign.php";
}

?>



</div>

</html>


