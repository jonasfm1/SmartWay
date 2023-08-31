<?php  

session_start();
ini_set('max_execution_time',12000);


if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	unset($_SESSION['nivel']);
	unset ($_SESSION['id_user']);
	unset ($_SESSION['chave']);
	header('location:index.php');
	}else{

$logado = $_SESSION['login'];
$senha = $_SESSION['senha'];
$nivel_acesso = $_SESSION['nivel'];
$id_user =$_SESSION['id_user']  ;
$chave =$_SESSION['chave']  ;
}




//echo $nome_user;

?>