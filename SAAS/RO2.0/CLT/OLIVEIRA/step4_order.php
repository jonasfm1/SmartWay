<?php
include_once "essence/conecta.php";
$array_rotas = $_POST['ordem_entregas'];

//echo $array_rotas;

$cont_ordem = 1;

$arr = explode(',', $array_rotas); // transforma a string em array.
//print_r ($arr[0]);

$pieces = explode("_", $arr[0]);
//echo $pieces[0];

$arrN = array();


foreach($arr as $item){

    $valor = explode('_', $item); 
    $arrN[$cont_ordem] = $valor[1];
    //echo $valor[1];
    $result_rotas = mysql_query("UPDATE rotas SET ordem = $cont_ordem, tempo='00:00:00', distancia='0.00', reordenar=1 WHERE id = $valor[1] and nome_veiculo='$pieces[0]'");
    $resultado_rotas = mysql_query($con, $result_rotas);
    $cont_ordem++;
}



?>
	<SCRIPT language="JavaScript">
 //event.preventDefault();
   
    window.history.back();
    sessionStorage.a = mySidenav.scrollTop;
	//window.location.href="step4_1r.php?imgsel=<?php echo $qual_tipo_rota ?>&inicio=<?php echo $inicio ?>&final=<?php echo $final ?><?php echo $guarda_linha_check; ?>";
	
	</SCRIPT>

