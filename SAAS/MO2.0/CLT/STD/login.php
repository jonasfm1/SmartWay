<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST['username'];
$password = $_POST['password'];

require_once('dbConnect.php');

$sql = "select * from usuario where login='$username' and senha='$password'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));

if(isset($check)){
echo "success";
date_default_timezone_set('America/Sao_Paulo');
$query_where1 = "UPDATE usuario SET ultimo_acesso='" . date("Y-m-d H:i:s") . "' WHERE login='$username'";
$check2 = mysqli_fetch_array(mysqli_query($con,$query_where1));

}else{
echo "Nome de usuario ou senha invalida";
}

}else{
echo "Tente outra vez";
}