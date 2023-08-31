<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login_split = $_POST['login'];
$split = array();
$split = explode("@", $login_split);

$login = $split[1];
//echo $login;

$user = $split[0];
//echo $user;
$senha = $_POST['senha'];
//$nivel = "";

// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.



$bd= "mo_" . $login;


$dbname="$bd"; // Indique o nome do banco de dados que será aberto
$usuario="root"; // Indique o nome do usuário que tem acesso
$password="HtMQZhAwCNzeaAfT"; // Indique a senha do usuário

//1º passo – Conecta ao servidor
if(!($id = mysql_connect("127.0.0.1",$usuario,$password)))
{
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador SERVIDOR.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0001";
?>
<script>
window.location = "error_01.php";
</script>

<?php

exit;
}

//2º passo – Seleciona o Banco de Dados
if(!($con=mysql_select_db($dbname,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MYSQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN - ERRO-RC0002";
?>
<script>
window.location = "error_02.php";
</script>

<?php

exit;

}




$data_now = date('Y-m-d H:i:s');


// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysql_query("SELECT * from usuario where login='$user' and senha='$senha'");


$dados = mysql_fetch_array($result);
$nivel =$dados['nivel'];
$import =$dados['import_rotas'];
$ordem_table = $dados['ordem_table'];

$chave = $dados["chave"];




/*if(! $retval )
{
//  die('Could not update data: ' . mysql_error());
}*/
//echo "Updated data successfully\n";
//mysql_close($conn);


/*while($sql = mysql_fetch_array($result)){
//$nivel = $sql["nivel"];
$id_user = $sql["id_user"];
} */


	
//echo $nivel;
if($nivel!=2){
	
if(mysql_num_rows($result) > 0){
$sql = "UPDATE usuario SET ultimo_acesso='$data_now' WHERE login='$usuario'";

$rs_deleta = mysql_query($sql);

$_SESSION['login'] = $login;
$_SESSION['user'] = $user;
$_SESSION['senha'] = $senha;
$_SESSION['nivel'] = $nivel;
$_SESSION['import_rotas'] = $import;

$_SESSION['ordem_table'] = $ordem_table;

$_SESSION['chave'] = $chave;



//$_SESSION['id_user'] = $id_user;

header('location:home.php');
} else {
	
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
alert("Usuário ou Senha incorretos!");
window.location.href="index.php";

</SCRIPT>
	<?php

unset ($_SESSION['login']);
unset ($_SESSION['user']);
unset ($_SESSION['senha']);
unset ($_SESSION['nivel']);
unset ($_SESSION['import_rotas']);

unset ($_SESSION['ordem_table']);
unset ($_SESSION['chave']);
//unset ($_SESSION['id_user']);
session_destroy();
//header('location:index.php');

} 


} else {
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
alert("Acesso não permitido!");
window.location.href="index.php";

</SCRIPT>
<?php
}

?>
