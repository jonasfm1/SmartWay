<?php
$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="HtMQZhAwCNzeaAfT"; //replace with database password 
$db_name="cadd_monitoramento"; //replace with database name
 

$userlogin = $_GET['id'];


//echo $userlogin;
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");



$sql = "SELECT rota FROM rotas WHERE login='".$userlogin."'"." GROUP BY rota"; 
$result = mysql_query($sql);
$json = array();


if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas_nome'][]=$row;
}
}


mysql_close($con);
echo json_encode($json); 

?>