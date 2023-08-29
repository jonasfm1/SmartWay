<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = "";
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
include ('control/conecta.php'); 


$data_now = date("F j, Y, g:i a"); 


// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysql_query("SELECT * from usuario where nome='$login' and senha='$senha'");

$sql = "UPDATE usuario
        SET ultimo_acesso='$data_now'
        WHERE nome='$login'";

$retval = mysql_query( $sql, $con );
if(! $retval )
{
//  die('Could not update data: ' . mysql_error());
}
//echo "Updated data successfully\n";
//mysql_close($conn);


while($sql = mysql_fetch_array($result)){
$nivel = $sql["nivel"];
$id_user = $sql["id_user"];
$chave = $sql["chave"];
} 

if(mysql_num_rows($result) > 0 ){
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['nivel'] = $nivel;
$_SESSION['id_user'] = $id_user;
$_SESSION['chave'] = $chave;
header('location:home.php');
}
else{
	
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
alert("Usuário ou Senha incorretos!");
window.location.href="index.php";

</SCRIPT>
	<?php

unset ($_SESSION['login']);
unset ($_SESSION['senha']);
unset ($_SESSION['nivel']);
unset ($_SESSION['id_user']);
unset ($_SESSION['chave']);
session_destroy();
//header('location:index.php');


	
	}

?>
