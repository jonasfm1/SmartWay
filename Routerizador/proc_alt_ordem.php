<?php
include_once "essence/conecta.php";
$array_rotas = $_POST['arrayordem'];


$cont_ordem = 1;

foreach($array_rotas as $id_rota){
	
    $result_rotas = mysql_query("UPDATE rotas SET ordem = $cont_ordem WHERE id = $id_rota");
    //$resultado_rotas = mysql_query($con, $result_rotas);
    $cont_ordem++;
    
}
echo "<span style='color: green;'>ORDEM ALTERADA COM SUCESSO!</span>";