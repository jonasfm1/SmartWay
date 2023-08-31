<?php
$bd= "mo_" . $logado;
$con = mysql_connect("localhost", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
$select = mysql_select_db("$bd") or 

//die("Sem acesso ao DB, Entre em contato com o Administrador!");

header('location:index.php');

//$con = mysql_connect("mysql02.rccaddesign.com", "rccaddesign3", "cooper123") or die ("Sem conexão com o servidor");
//$select = mysql_select_db("rccaddesign3") or die("Sem acesso ao DB, Entre em contato com o Administrador!");

?>