<?php
$con = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die(header("Location: error_01.php"));
$select = mysql_select_db("cadd") or die(header("Location: error_02.php"));

//$con = mysql_connect("mysql02.rccaddesign.com", "rccaddesign3", "cooper123") or die ("Sem conexão com o servidor");
//$select = mysql_select_db("rccaddesign3") or die("Sem acesso ao DB, Entre em contato com o Administrador!");

?>