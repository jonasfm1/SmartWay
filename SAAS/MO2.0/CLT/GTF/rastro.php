<?php
	$f = fopen('RASTRO.txt', 'a');
	
	fwrite($f, strtolower($_POST['usuario']).";");
        fwrite($f, $_POST['locx'].";");
	fwrite($f, $_POST['locy'].";");
        fwrite($f, $_POST['dtEt']."\r\n");
	
	fclose($f);
	
	echo 'Dados enviados com sucesso';





$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="HtMQZhAwCNzeaAfT"; //replace with database password 
$db_name="cadd_monitoramento"; //replace with database name


$log=strtolower($_POST['usuario']);
$x=$_POST['locx'];
$y=$_POST['locy'];
$dth=$_POST['dtEt'];



$time = strtotime($dth);

$date = date('Y-m-d',$time);
$hora = date('H:i:s',$time);



$conn=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
	
$sql = "INSERT rastro SET login='$log',x='$x',y='$y',dth='$hora', day='$date'"; 
$rs = mysql_query($sql);


?>