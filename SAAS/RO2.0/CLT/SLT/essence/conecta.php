<?php
include ('session.php'); 


$dbname="ro_" . $logado; // Indique o nome do banco de dados que será aberto
$dbname1="cadd";

$usuario="root"; // Indique o nome do usuário que tem acesso
$password="HtMQZhAwCNzeaAfT"; // Indique a senha do usuário

//1º passo – Conecta ao servidor MySQL
if(!($id = mysql_connect("127.0.0.1",$usuario,$password)))
{

    ?>
    <script>
    window.location.href="../../index.php";
    </script>
    <?php
    
exit;
}

//2º passo – Seleciona o Banco de Dados
if(!($con=mysql_select_db($dbname,$id))) {

?>
<script>
window.location.href="../../index.php";
</script>
<?php

exit;
}
?>