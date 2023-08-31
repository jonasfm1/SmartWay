<?php
$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password="HtMQZhAwCNzeaAfT"; //replace with database password 
$db_name="cadd_monitoramento"; //replace with database name
 

$userlogin = $_GET['id'];
$rotaselecionada= $_GET['rota'];

//echo $userlogin;
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT id,sequencia,rota,status,nome,cidade FROM rotas WHERE rota='".$rotaselecionada."' AND login='".$userlogin."' ORDER BY rota, sequencia"; 
$result = mysql_query($sql);
$json = array();
 
if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['rotas'][]=$row;
}
}
mysql_close($con);
echo json_encode($json); 
?>