<?php

include 'db_connection.php';
  
//get data from database DATA DE LOS SITES
$query="SELECT * FROM cpa_weekly ORDER BY ID DESC";
$resultado = mysql_query($query) or die('Query failed: ' . mysql_error());

$rows = mysqli_fetch_array($resultado);
?>