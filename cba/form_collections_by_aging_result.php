<html>

<div>



<?php

global $country;
$country = $_POST['country'];  // Storing Selected Value In Variable

global $operator;
$operator = $_POST['operator'];  // Storing Selected Value In Variable

global $system;
$system = $_POST['system'];  // Storing Selected Value In Variable

global $year;
$year = $_POST['year'];  // Storing Selected Value In Variable



if ($system=="Kantoo")
{	
	include "reports/kantoo_collections_by_aging_dao.php";
	include "reports/result_collections_by_aging.php";
}

if ($system=="Disney")
{	
	include "reports/disney_collections_by_aging_dao.php";
	include "reports/result_collections_by_aging.php";
}

if($system == "Kantoo+Disney")
{
	include "reports/all_collections_by_aging_dao.php";
	include "reports/result_collections_by_aging.php";
}

?>



</div>



</html>





