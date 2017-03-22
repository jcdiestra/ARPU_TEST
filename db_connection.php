<?php

$link = mysql_connect('192.168.0.12', 'admin', 'lamarksql')
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('arpu_report') or die('Could not select database');


?>