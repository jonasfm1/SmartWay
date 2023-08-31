<?php
include ('session.php');


$bd= "mo_" . $logado;

$dbname="$bd"; // Indique o nome do banco de dados que será aberto
$usuario="root"; // Indique o nome do usuário que tem acesso
$password="HtMQZhAwCNzeaAfT"; // Indique a senha do usuário

//1º passo – Conecta ao servidor MySQL
if(!($id = mysql_connect("127.0.0.1",$usuario,$password)))
{
//echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0002";
header('location:../../error_01.php');
exit;
}

//2º passo – Seleciona o Banco de Dados
if(!($con=mysql_select_db($dbname,$id))) {

//echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0002";
header('location:../../error_02.php');
exit;
//

}

?>