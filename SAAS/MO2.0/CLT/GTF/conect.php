<?php
$host = "localhost";
$username = "root";
$password = "HtMQZhAwCNzeaAfT";
$database = "mo_demo";
$connection = mysql_connect($host, $username, $password, $database) or die(mysql_error());
mysql_select_db($database) or die (mysql_error());
