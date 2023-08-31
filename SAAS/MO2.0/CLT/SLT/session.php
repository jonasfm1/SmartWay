<?php  

session_start();
ini_set('max_execution_time',12000);


if((!isset ($_SESSION['user_m']) == true) and (!isset ($_SESSION['senha_m']) == true))
{
	unset($_SESSION['login_m']);
	unset($_SESSION['user_m']);
	unset($_SESSION['senha_m']);
	unset($_SESSION['nivel_m']);
	unset ($_SESSION['id']);
	unset ($_SESSION['import_rotas']);
	unset ($_SESSION['ordem_table']);
	unset ($_SESSION['chave']);


	//header('location:index.php');
	
	}else{

$logado = $_SESSION['login_m'];
$nivel_acesso = $_SESSION['nivel_m'];
$id_user =$_SESSION['id'];
$user = $_SESSION['user_m'];
$import = $_SESSION['import_rotas'];

$ordem_table = $_SESSION['ordem_table'];
$chave =$_SESSION['chave']  ;

}




//echo $nome_user;

?>