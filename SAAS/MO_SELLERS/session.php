<?php  

session_start();
ini_set('max_execution_time',12000);


if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['user']);
	unset($_SESSION['senha']);
	unset($_SESSION['nivel']);
	unset ($_SESSION['id']);
	unset ($_SESSION['import_rotas']);

	//header('location:index.php');
	
	}else{

$logado = $_SESSION['login'];
$nivel_acesso = $_SESSION['nivel'];
$id_user =$_SESSION['id'];
$user = $_SESSION['user'];
$import = $_SESSION['import_rotas'];

$ordem_table = $_SESSION['ordem_table'];

}




//echo $nome_user;

?>