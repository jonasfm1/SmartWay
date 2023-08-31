<?php
include ('session.php'); 

include ('essence/conecta.php');
ini_set('max_execution_time',12000);


$result=mysql_query('select * from rotas');

while($row = mysql_fetch_array($result))
{

    $code = $row['codigo_cliente'];

    echo $code;
}
?>