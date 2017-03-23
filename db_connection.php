<?php

/*$link = mysql_connect('localhost', 'id1077953_admin', '123456')
   or die('Could not connect: ' . mysql_error()); // Conexión PRODUCCION*/

/*$link = mysql_connect('localhost', 'root', '')
   or die('Could not connect: ' . mysql_error()); // Conexión Juancass*/
$link = mysql_connect('192.168.0.10', 'admin', 'lamarksql')
   or die('Could not connect: ' . mysql_error()); // Conexión Diego
     
mysql_select_db('arpu_report') or die('Could not select database');


?>