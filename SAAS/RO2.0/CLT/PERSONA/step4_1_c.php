<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/step4_1.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	
<?php 
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
	
	
$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}


$inicio = $_GET["inicio"];
$final = $_GET["final"];



?>



<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>

<script type='text/javascript' src="control/timer.js"></script>


<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

	function alerta(){
		
		document.salvala.action = "scripts.php?acao=cadastra_rotas";
	}
	   


function acao2(rota, veiculo) {

document.getElementById("Paginax").style.display = "block";

var teste = "altera_ordem.php?rota="+ rota + "&veiculo=" + veiculo;

document.getElementById("pag2x").src = teste; 

topFunction();

}



(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});

function goBack() {
    window.history.back()
}



</SCRIPT>



    <?php
	


	
	$conta1= 0;
	/////////////////////////////////////////////////////////////	
	$query_veiculos = "select * from veiculos";
   	$rs1_veiculos = mysql_query($query_veiculos);
		
		while($row_veiculos = mysql_fetch_array($rs1_veiculos)){
			$id_veiculo[$conta1] = $row_veiculos["id"];			
			$nome_veiculo[$conta1] = $row_veiculos["nome"];
			$tipo[$conta1] = $row_veiculos["tipo"];		
			$icone[$conta1] = $row_veiculos["type_icon"];
			
			if($icone[$conta1] == "red1"){
			$cor[$conta1] = "#900000";				
			}
			if($icone[$conta1] == "red2"){
			$cor[$conta1] = "#e20016";				
			}
			if($icone[$conta1] == "blue1"){
			$cor[$conta1] = "#00f0ff";				
			}							
			if($icone[$conta1] == "blue2"){
			$cor[$conta1] = "#003cff";				
			}	
			if($icone[$conta1] == "green1"){
			$cor[$conta1] = "#42ff00";				
			}	
			if($icone[$conta1] == "green2"){
			$cor[$conta1] = "#00760b";				
			}
			if($icone[$conta1] == "green3"){
			$cor[$conta1] = "#03f385";				
			}
			if($icone[$conta1] == "purple1"){
			$cor[$conta1] = "#7200ff";				
			}
			if($icone[$conta1] == "purple2"){
			$cor[$conta1] = "#340058";				
			}
			if($icone[$conta1] == "orange"){
			$cor[$conta1] = "#ff7800";				
			}
			if($icone[$conta1] == "brown"){
			$cor[$conta1] = "#9c5100";				
			} 
			if($icone[$conta1] == "yellow"){
			$cor[$conta1] = "#ffbc00";				
			} 
    
			$concatena_carro[$conta1] = "imgs/" . $tipo[$conta1] . "_" . $icone[$conta1] . ".png";

			$reordenar[$conta1] =  $row_veiculos["reordenado"];

			
			//echo ($concatena_carro[$conta1]);
			$conta1++; 
		
		}
		?>
        
		<script type="text/javascript">
		id_veiculo = <?php echo json_encode($id_veiculo) ?>;		
		nome_veiculo = <?php echo json_encode($nome_veiculo) ?>;
		concatena_carro = <?php echo json_encode($concatena_carro) ?>;			
		color_carro = <?php echo json_encode($cor) ?>;	
		reordenar = <?php echo json_encode($reordenar) ?>;	
	
		</script>

	<?php





	/////////////////////////////////////////////////////////////

?>

 

</head>
<div class="jquery-waiting-base-container"></div>
<body >


<form name="roteiriza" action="step4_1.php" method="post">
  <div id="apDiv13b">
   <?php
   
$i=0;
 
   if(!empty($_GET['check_list1'])){
    foreach($_GET['check_list1'] as $report_id){
       // echo $report_id;
       $arr[$i] = $report_id;
//print_r($arr[$conta]);


$query_new = "select * from rotas where veiculo=$arr[$i]";

  

$rs_new = mysql_query($query_new);
$rs_new1 = mysql_query($query_new);
$rs_new2 = mysql_query($query_new);
$rs_new3 = mysql_query($query_new);	
$rs_new6 = mysql_query($query_new);	
$rs_new7 = mysql_query($query_new);
$rs_new8 = mysql_query($query_new);		
$rs_new9 = mysql_query($query_new);		
//$num_rows = mysql_num_rows($rs_new1);
//echo $num_rows;
$codigo_cliente1 ="";
$nome_cliente1 ="";
$lat_cliente1 ="";
$lgn_cliente1 ="";
$contatena_valores ="";
$veiculo_cliente1="";
$codigo_pedido1="";
$obs_pedido1="";
$id_visita1="";

$conta2 = 0;
$conta3 = 0;	
$conta4 = 0;
$conta6 = 0;	
$conta7 = 0;	
$conta8 = 0;
$conta9 = 0;
?>

<div id="waypoints<?php echo $i; ?>" class="div_transparente">
<?php
while($row2 = mysql_fetch_array($rs_new)){
        
        $lat_cliente1[$conta2] = $row2["lat"];
        $lgn_cliente1[$conta2] = $row2["lgn"];
        $contatena_valores[$conta2] =  '"' . $row2["lat"] . ", " . $row2["lgn"] . '"';	 
        $contatena_valores[$conta2] = $contatena_valores[$conta2] . ", ";
        //echo '"' . $inicio . '", ';
        echo ($contatena_valores[$conta2]);
        $conta2++;	 	
}
        
?>
</div>  
<div id="veiculo<?php echo $i; ?>" class="div_result">
<?php
while($row3 = mysql_fetch_array($rs_new1)){ 	
        $codigo_cliente1[$conta3] = $row3["id"];
    //	$nome_cliente1[$conta3] = $row3["nome_cliente"];	
    //	$veiculo_cliente1[$conta3] = $row3["veiculo"];
        echo '"' . $codigo_cliente1[$conta3] . '", ';  		
        $conta3++;

}
?>
</div>

<div id="carro<?php echo $i; ?>" class="div_result">
<?php
while($row4 = mysql_fetch_array($rs_new2)){ 		
        $veiculo_cliente1[$conta4] = $row4["veiculo"];
        echo '"' . $veiculo_cliente1[$conta4] . '", ';  		
        $conta4++;

}
//$novo = var_dump($veiculo_cliente1[$conta4]);
//echo $novo;  	
?>
</div>
<div id="nome_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row5 = mysql_fetch_array($rs_new3)){ 	
        $nome_cliente1[$conta5] = $row5["nome_cliente"];
        echo '"' . $nome_cliente1[$conta5] . '", ';  		
        $conta5++;

}
?>
</div>
<div id="endereco_cliente<?php echo $i; ?>" class="div_result">
<?php
while($row6 = mysql_fetch_array($rs_new6)){ 	
        $endereco_cliente[$conta6] = $row6["endereco"];
        echo '"' . $endereco_cliente[$conta6] . '", ';  		
        $conta6++;

}
?>
</div>
<div id="codigo_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row7 = mysql_fetch_array($rs_new7)){ 	
        $codigo_pedido1[$conta7] = $row7["codigo_pedido"];
        echo '"' . $codigo_pedido1[$conta7] . '", ';  		
        $conta7++;
}
?>
</div>
<div id="obs_pedido<?php echo $i; ?>" class="div_result">
<?php
while($row8 = mysql_fetch_array($rs_new8)){ 	
        $obs_pedido1[$conta8] = $row8["obs_pedido"];
        echo '"' . $obs_pedido1[$conta8] . '", ';  		
        $conta8++;
}
?>
</div>
<div id="id_visita<?php echo $i; ?>" class="div_result">
<?php
while($row9 = mysql_fetch_array($rs_new9)){ 	
        $id_visita1[$conta9] = $row9["id"];
        echo '"' . $id_visita1[$conta9] . '", ';  		
        $conta9++;
}
?>
</div>
<?php



    $i++;
    }
} 




 


$contala = count($arr);


?>

<script type="text/javascript">
	veiculo_numero_js = <?php echo json_encode($contala) ?>;
</script>
<input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" value="<?php echo $inicio ?>" />                   
<input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $final ?>"  /> 
</div>
</form>


<div id="apDiv11">

<div id="load" >
<div id="box" class="box"></div>
</div>



  <div id="apDiv14c_hidden">
 
    <div id="map-canvas"></div>
   
    </div>
    
</div>




</div>




	<div id="div16"></div>
 
<!-- Arquivo de inicialização do mapa -->
<?php

$transp_query = "select * from rotas where tipo_rota='c'";  
$rs_transp = mysql_query($transp_query);
$num_rows1 = mysql_num_rows($rs_transp);
//echo $num_rows1;



if($num_rows1==0){

	$rotas_final = "select veiculo from rotas group by veiculo";
	$rotas_final = mysql_query($rotas_final);

	while($row = mysql_fetch_array($rotas_final)){

		$caminhao = $row["veiculo"];

		$rotas .= "&rotas[]=".  $caminhao;

	}

	?>
	<meta http-equiv="refresh" content="0; URL='step4_1r.php?imgsel=<?php echo $qual_rota ?>&inicio=<?php echo $inicio ?>&final=<?php echo $final ?><?php echo $rotas; ?>'"/>
<?php
} else {

?>
<script src="js/mapa_best.js"></script>

<?php
}
?>
</div>


  <table border="0" style="width: 100%; height:100%" cellpadding="0" cellspacing="0">
<tr>
  
<td style="font-size: 11px;text-align: right;">

<form action="scripts.php?acao=cadastra_rotas_cadd" name="salvala" id="salvala" method="POST">
<textarea name="xxx" rows="3" id="xxx" hidden="hidden"></textarea>
<textarea name="yyy" rows="3" id="yyy"  hidden="hidden"></textarea>
<textarea name="zzz" rows="3" id="zzz"  hidden="hidden"></textarea>
<textarea name="qqq" rows="3" id="qqq" hidden="hidden" ></textarea>
<textarea name="kkk" rows="3" id="kkk" hidden="hidden" ></textarea>
<textarea name="www" rows="3" id="www" hidden="hidden"></textarea>
<textarea name="eee" rows="3" id="eee"  hidden="hidden"></textarea>
<textarea name="ultimao" rows="3" id="ultimao" hidden="hidden"></textarea>
<textarea name="ultimao_2" rows="3" id="ultimao_2" hidden="hidden"></textarea>
<textarea name="ultimao_3" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="id_visita" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="inicio" rows="3" id="inicio"  hidden></textarea>
<textarea name="final" rows="3" id="final" hidden></textarea>

<textarea name="qual_tipo_rota" rows="3" id="qual_tipo_rota"  hidden="hidden"><?php echo $qual_rota ?></textarea>

<textarea name="check_list[]" rows="3" id="check_list"  hidden="hidden"><?php echo $_GET['check_list']; ?></textarea>


</form>


</td>
</tr>

  </table>


</body>
</html>