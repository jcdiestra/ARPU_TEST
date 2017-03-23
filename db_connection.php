<?php

$link = mysql_connect('localhost', 'root', '')
   or die('Could not connect: ' . mysql_error()); // Conexión Juancass
/*$link = mysql_connect('localhost', 'admin', 'lamarksql')
   or die('Could not connect: ' . mysql_error()); // Conexión Diego*/
     
mysql_select_db('arpu_report') or die('Could not select database');


?>