<?php
include_once "essence/conecta.php";
$array_rotas = $_POST['arrayordem'];

//echo $array_rotas;
$cont_ordem = 1;

foreach($array_rotas as $id_rota){
	
    $result_rotas = mysql_query("UPDATE rotas SET ordem = $cont_ordem, tempo='00:00:00', distancia='0.00', reordenar=1 WHERE id = $id_rota");
    //$resultado_rotas = mysql_query($con, $result_rotas);
    $cont_ordem++;
   
    
}
//echo "<span style='color: green;'>REORDENADO!</span>";