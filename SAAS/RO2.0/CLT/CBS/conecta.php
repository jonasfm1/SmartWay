<?php
include ('session.php'); 


$dbname=$logado; // Indique o nome do banco de dados que será aberto
$dbname1="cadd";

$usuario="root"; // Indique o nome do usuário que tem acesso
$password="HtMQZhAwCNzeaAfT"; // Indique a senha do usuário

//1º passo – Conecta ao servidor MySQL
if(!($id = mysql_connect("127.0.0.1",$usuario,$password)))
{
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0001";
exit;
}

//2º passo – Seleciona o Banco de Dados
if(!($con=mysql_select_db($dbname,$id))) {

echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0002";
header('location:index.php');

exit;
}




?>