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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <!-- Latest Sortable -->
  <script src="js/Sortable.js"></script>

  <style id="jsbin-css">
.tinted {
	background-color: #2867b2 !important;
}

.selected {
  background-color: #2867b2 !important;
  border: solid #2867b2 1px !important;
  z-index: 1 !important;
  color:#FFF;
  height: 10px;
  width: 100%;
}


#legenda_zoom{
    
	font-size:13px;
	line-height:15px;
	padding-top:10px;
	padding-left:10px;
	padding-bottom:10px;
	color: #000;
	text-align: center;
	}
	

</style>
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





$qual_rota = $_GET["imgsel"];



/*	if($qual_rota=="google"){
		$muda_javascript = "js/mapa_cadd.js";

		
	} else {
		
		$muda_javascript = "js/mapa_cadd.js";
	}
	*/

	$nome_rota = $_GET["rota"];
	
	$veiculo = $_GET["veiculo"];

	//$ordenou = $_GET["ordenou"];


?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script LANGUAGE="JavaScript">

	


function show_alert() {
  alert("Clique no botão Calcular!");
}			

						
				function secondsToHms(d) {
				d = Number(d);
			 	var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
				return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
				
				}
						
				
                        (function($) {
                        $.fn.waiting = function(options) {
                        options = $.extend({modo: 'normal'}, options);
                        this.fadeOut(options.modo);
                        return this;
                        };
                        })(jQuery);;

                      
			
						
function Submit() {
	//div_recal.style.visibility='hidden';
	document.getElementById("submit").submit();



}
setTimeout("Submit()",1000) //Tempo em milisegundos ou seja 1000 é 1 segundo

function alerta(){
	//$(mySidenav).scrollTop(0);
		sessionStorage.clear();
	//	document.reordenar.action = "scripts.php?acao=reordenar_rotas";
		document.getElementById("reordenar").submit(); 
		
		
		
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


function infobox(lat,lgn, nome){

var ponto = new google.maps.LatLng(lat, lgn);


var contentString = 
			'<div id="legenda_zoom">'+
            '<strong>' + nome + '</strong>'+
            '</div>';
 
        var var_infowindow = new google.maps.InfoWindow({
            content: contentString,
			position: ponto,
			pixelOffset: new google.maps.Size(0, -62)
          });
		  
	
		var_infowindow.open(map);	
	
	
}

function Mudarestado_fechado(el) {
    var display = document.getElementById(el).style.display;
	if(display === "none"){
		
        document.getElementById(el).style.display = 'block';
		
	} else {
        document.getElementById(el).style.display = 'none';
		
	}
	}
	

function Mudarestado(el) {
    var display = document.getElementById(el).style.display;

	
    if(display === "none"){
		
        document.getElementById(el).style.display = 'block';
		
	} else {
        document.getElementById(el).style.display = 'none';
		
	}
	}
	
</SCRIPT>
<?php


	///controle painel
	$query_where1 = "UPDATE passo SET ok='no' WHERE id='5'";
	$rs_where1 = mysql_query($query_where1);	
	$conta1= 0;
	/////////////////////////////////////////////////////////////	
	$query_veiculos = "select * from veiculos";
   	$rs1_veiculos = mysql_query($query_veiculos);	
		while($row_veiculos = mysql_fetch_array($rs1_veiculos)){
			$id_veiculo[$conta1] = $row_veiculos["id"];			
			$nome_veiculo[$conta1] = $row_veiculos["nome"];
			$tipo[$conta1] = $row_veiculos["tipo"];		
			$icone[$conta1] = $row_veiculos["type_icon"];			
			if($icone[$conta1] == "red1"){$cor[$conta1] = "#900000";}
			if($icone[$conta1] == "red2"){$cor[$conta1] = "#e20016";}
			if($icone[$conta1] == "blue1"){$cor[$conta1] = "#00f0ff";}							
			if($icone[$conta1] == "blue2"){$cor[$conta1] = "#003cff";}	
			if($icone[$conta1] == "green1"){$cor[$conta1] = "#42ff00";}	
			if($icone[$conta1] == "green2"){$cor[$conta1] = "#00760b";}
			if($icone[$conta1] == "green3"){$cor[$conta1] = "#03f385";}
			if($icone[$conta1] == "purple1"){$cor[$conta1] = "#7200ff";}
			if($icone[$conta1] == "purple2"){$cor[$conta1] = "#340058";}
			if($icone[$conta1] == "orange"){$cor[$conta1] = "#ff7800";}
			if($icone[$conta1] == "brown"){$cor[$conta1] = "#9c5100";} 
			if($icone[$conta1] == "yellow"){$cor[$conta1] = "#ffbc00";} 
    		$concatena_carro[$conta1] = "imgs/" . $tipo[$conta1] . "_" . $icone[$conta1] . ".png";
			$conta1++; 
		}
		?>
        
<script type="text/javascript">
		id_veiculo = <?php echo json_encode($id_veiculo) ?>;	
		nome_veiculo = <?php echo json_encode($nome_veiculo) ?>;
		concatena_carro = <?php echo json_encode($concatena_carro) ?>;		
		color_carro = <?php echo json_encode($cor) ?>;	
		//reordenar = <?php echo json_encode($reordenar) ?>;	
</script>

	<?php


	/////////////////////////////////////////////////////////////

	$conta_fora_new = 0;
	$conta_fora1_new = 0;

	$conta = 0;
	$conta1_new = 0;

	
	$soma=0;
	foreach($_GET['rotas'] as $lista_rotas){
		$array_das_rotas[$soma] = $lista_rotas;

		$soma++;
	}
	//print_r($array_das_rotas);


     foreach($_GET['rotas'] as $report_id){
		 
		$arr[$conta] = $report_id;			
		//seleciona todos valores
		$query1 = "select * from clientes where veiculo=$arr[$conta] and ativo=0 order by veiculo";
   	    $rs1 = mysql_query($query1);
		
		while($row = mysql_fetch_array($rs1)){	
			$codigo_cliente[$conta1_new] = $row["codigo_cliente"];
			$nome_cliente[$conta1_new] = $row["nome"];		
			$veiculo_cliente[$conta1_new] = $row["veiculo"];		
			$query_tipo = "select * from veiculos where id=$veiculo_cliente[$conta1_new]";
			$query_tipo = mysql_query($query_tipo);	
			// Tirando o while
			$dados = mysql_fetch_array($query_tipo);
			// Exibição
			$tipo= $dados['tipo'];
			$nome_veiculo = $dados['nome'];
			//echo $tipo;
			$lat_cliente[$conta1_new] = $row["latitude_cad"];
			$lgn_cliente[$conta1_new] = $row["longitude_cad"];
			$endereco_cliente[$conta1_new] = $row["endereco"];
			$bairro_cliente[$conta1_new] = $row["bairro"];		
			$cep_cliente[$conta1_new] = $row["cep"];			
			$cidade_cliente_fora[$conta1_new] = $row["cidade"];			
			$codigo_pedido[$conta1_new] = $row["codigo_pedido"];
			$obs_pedido[$conta1_new] = $row["obs_pedido"];			
			$temposervico_cliente[$conta1_new] = $row["tempo_servico"];			
			$peso_cliente[$conta1_new] = $row["peso"];
			$volume_cliente[$conta1_new] = $row["volume"];
			$valor_cliente[$conta1_new] = $row["valor"];		
			$setor_cliente[$conta1_new] = $row["setor"];
			$loja[$conta1_new] = $row["loja"];
			$data_entrega[$conta1_new] = $row["data_entrega"];
			$cod_vendedor[$conta1_new] = $row["cod_vendedor"];
			$vendedor[$conta1_new] = $row["vendedor"];
			$cod_produto[$conta1_new] = $row["cod_produto"];
			$produto[$conta1_new] = $row["produto"];
			$uf[$conta1_new] = $row["estado"];
			$cod_cancao[$conta1_new] = $row["cod_cancao"];
			$conta1_new++; 		
		}
		$conta++;

     }

?>


</head>
<div class="jquery-waiting-base-container"></div>
<body class="container-fluid" ng-controller="listagemIndexControl" onload="$(layer).scrollTop(sessionStorage.a); ">

<?php include ('base2.php'); ?>

<form name="roteiriza" action="step4_1r.php" method="post">
  <div id="apDiv13b">
   <?php
 
    for($i=0;$i<count($arr1);$i++){
	$sql_fora = "select * from rotas where veiculo=$arr1[$i] order by ordem";
	$rs_sql = mysql_query($sql_fora);
	$rs_sql1 = mysql_query($sql_fora);
	$rs_sql2 = mysql_query($sql_fora);
	$rs_sql3 = mysql_query($sql_fora);
	$rs_sql4 = mysql_query($sql_fora);
	$rs_sql5 = mysql_query($sql_fora);
	//echo $arr1[$i];
	$lat_cliente_fora="";
	$lgn_cliente_fora="";
	$nome_cliente_fora="";
	$codigo_cliente_fora ="";
	$veiculo_cliente_fora = "";
	$codigo_pedido_fora="";
	$obs_pedido_fora="";
	//////////////////////////////////
	//////////////////////////////////
	$conta_fora = 0;
	$conta_fora1 = 0;
	$conta_fora2 = 0;
	$conta_fora3 = 0;
	$conta_fora4 = 0;
	$conta_fora5 = 0;

	////////////////////////////////////////////////
	////////////////////////////////////////////////
}
 

  	$contala = count($arr);
	
	//$veiculo_cliente = array_unique($veiculo_cliente);
	//var_dump($veiculo_cliente);
	//print implode(',', array_unique(array_filter(explode(',', $result))));
	
 for($i=0;$i<count($arr);$i++){
	$query_new = "select * from rotas where veiculo=$arr[$i] order by ordem";
	$rs_new = mysql_query($query_new);
	$rs_new1 = mysql_query($query_new);
	$rs_new2 = mysql_query($query_new);
	$rs_new3 = mysql_query($query_new);	
	$rs_new6 = mysql_query($query_new);	
	$rs_new7 = mysql_query($query_new);
	$rs_new8 = mysql_query($query_new);		
	$rs_new9 = mysql_query($query_new);		


	$query_veiculo = "select * from veiculos where id=$arr[$i]";
	$rs_veiculo = mysql_query($query_veiculo);

	$dados = mysql_fetch_array($rs_veiculo);

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
			$id_visita1[$conta8] = $row9["id"];
			echo '"' . $id_visita1[$conta8] . '", ';  		
			$conta9++;
}
?>
 </div>
 <div id="local_final<?php echo $i; ?>" class="div_result">
<?php
$final_x = $dados['local_final'];
echo $final_x;

?>
 </div>
 <div id="local_inicio<?php echo $i; ?>" class="div_result">
<?php
$inicio_x = $dados['local_inicio'];
echo $inicio_x;

?>
 </div>

<?php
}
?>

<script type="text/javascript">
	veiculo_numero_js = <?php echo json_encode($contala) ?>;
	
</script>
<input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" value="<?php echo $inicio ?>" />                   
<input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $final ?>"  /> 
</div>
</form>
<div id="apDiv11">


<div id="apDiv14c_mapa">
 
<div id="map-canvas"></div>

 <div id="apDiv14c">
 
 <div id="layer">
	 
 <div class="div" id="div" name="div">
 <br><br>
   <br><br><br><br>
   <form id="reordenar_pedido" action="step4_order.php" method="POST">
   <textarea id="ordem_entregas" name="ordem_entregas" rows="4" cols="50" hidden="hidden"></textarea>

   
   </form>
   
 <table border="0" cellpadding="0" cellspacing="0" align="left" style="padding-bottom: 8px; width:100%" >
	   <tr>
		   
	   
		   <td align="left" valign="middle" nowrap="nowrap" style="color:#000000;">
		   <strong><font size="4">&nbsp;RESUMO DAS ROTAS</font></strong>
	   
		   </td>
		   <td style="width: 30px;">
			   
<form action="scripts.php?acao=reordenar_rotas" id="reordenar" name='reordenar' method="post">
<textarea name="xxx" rows="3" id="xxx" hidden='hidden'></textarea>
<textarea name="yyy" rows="3" id="yyy"  hidden='hidden'></textarea>
<textarea name="zzz" rows="3" id="zzz"  hidden='hidden'></textarea>
<textarea name="qqq" rows="3" id="qqq"  hidden='hidden' ></textarea>
<textarea name="kkk" rows="3" id="kkk"  hidden='hidden' ></textarea>
<textarea name="www" rows="3" id="www"  hidden='hidden'></textarea>
<textarea name="eee" rows="3" id="eee"  hidden='hidden'></textarea>
<textarea name="ultimao" rows="3" id="ultimao" hidden='hidden' ></textarea>
<textarea name="ultimao_2" rows="3" id="ultimao_2" hidden='hidden' ></textarea>
<textarea name="ultimao_3" rows="3" id="ultimao_3" hidden='hidden' ></textarea>
<textarea name="id_visita" rows="3" id="ultimao_3" hidden='hidden' ></textarea>
<textarea name="inicio" rows="3" id="inicio"  hidden='hidden' ></textarea>
<textarea name="final" rows="3" id="final" hidden='hidden' ></textarea>

<textarea name="zoom_volta" rows="3" id="zoom_volta" hidden></textarea>
<textarea name="loc_volta" rows="3" id="loc_volta" hidden></textarea>


</form>

   
	   </td>
	   
	  </tr>
	  <tr>
	   <td style="height: 20px;">  <hr size = 1 width = '200px' color="#ECECEC"></td>
	   <td>
			   
	   </td>
		   
	  </tr>
	   </table>
   
	 
	   <br> <br><br> <br>

<script>


</script>
<?php

$query_q = "select nome_veiculo, SUM(peso) AS peso_total, SUM(volume) AS volume_total, SUM(valor) AS valor_total, reordenar, veiculo, concat(lat) from rotas group by nome_veiculo order by nome_veiculo ASC";
$rs_q = mysql_query($query_q);

$reordena_array = array();

while($row_q = mysql_fetch_array($rs_q)){

$automovel = $row_q["nome_veiculo"];
$id_automovel = $row_q["id"];
$total = mysql_num_rows($produtos);
$peso_total = $row_q["peso_total"];
$volume_total = $row_q["volume_total"];
$valor_total = $row_q["valor_total"];
$reordenar_verifica = $row_q["reordenar"];

array_push($reordena_array, $reordenar_verifica);

$nome_auto = $row_q["veiculo"];

$query_icone = "select tipo, type_icon from veiculos where nome='$automovel'";														
$query_icone = mysql_query($query_icone);
$dados = mysql_fetch_array($query_icone);
$tipo =  $dados["tipo"];		
$icone =  $dados["type_icon"];	

if($icone == "red1"){$cor = "#900000";}
if($icone == "red2"){$cor = "#e20016";}
if($icone == "blue1"){$cor = "#00f0ff";}							
if($icone == "blue2"){$cor = "#003cff";}	
if($icone == "green1"){$cor = "#42ff00";}	
if($icone == "green2"){$cor = "#00760b";}
if($icone == "green3"){$cor = "#03f385";}
if($icone == "purple1"){$cor = "#7200ff";}
if($icone == "purple2"){$cor = "#340058";}
if($icone == "orange"){$cor = "#ff7800";}
if($icone == "brown"){$cor = "#9c5100";	} 
if($icone == "yellow"){$cor = "#ffbc00";} 

$concatena_carro = "imgs/" . $tipo . "_" . $icone . ".png";

//$qual_check = $_POST["scales" . $automovel];
//$qual_ae = $_POST["nome_route"];
//echo $qual_check;
?>

<table border="1" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 100%;">
 <tbody>
   <tr height="50px">
	<td  align="left" width="100%" style="font-weight:bold;background-color: #ECECEC" colspan="11"><font color="#000000" size="3">

	<p style="color:black; padding-left:5px"> <img src="<?php echo $concatena_carro;  ?>" width="20px" height="17px"> &nbsp;<?php echo $automovel; ?></p></font>

   </td>

	</tr>

 </tbody>
</table>


<?php


$query = "select * from rotas where nome_veiculo = '$automovel' ORDER BY nome_rota, ordem ASC";
$rs = mysql_query($query);
$conta = 0;
//$lista_cores_tabela = ["#FFF000", "#edfddd", "#edfdff", "#FFF000"];

$abre_fecha = $automovel . "_abre";

$num_rows = mysql_num_rows($rs);

?>
<script>

$(document).ready(function() {
   Mudarestado_fechado('<?php echo $abre_fecha ?>');
});




</script>  


<span style="width: 100%;"> <button id="hamburger" style="background-color:<?php echo $cor ?>; border:1px solid <?php echo $cor ?> ;" type="button" onclick="Mudarestado('<?php echo $abre_fecha ?>');">ORDENAR</button></span>



<div  class="menu_x" id="<?php echo $abre_fecha ?>" name="<?php echo $abre_fecha ?>" hidden>


<table cellpadding="0" cellspacing="0" height="40px" style=" border-color: #d3d5d6;background-color: #ECECEC;color: black;font-weight: bold;width: 100%; font-size:9px" >
		 <tr>      
			   <td nowrap  style="width: 5%;"    align="left"></td>		
			  <td nowrap   style="width: 10%;"  align="left">PEDIDO</td>
			  <td nowrap  style="width: 10%;"   align="left">COD.CLI</td>	 
			  <td  nowrap style="width: 18%;"   >CLIENTE</td>
			  <td nowrap  style="width: 18%;"  >ENDEREÇO</td>
			  <td  nowrap style="width: 8%;"    align="left">BAIRRO</td>
			  <td nowrap  style="width: 7%;"  >CIDADE</td> 	
			  <td  nowrap style="width: 10%;"    align="left">TEMPO</td>
			  <td nowrap  style="width: 5%;"   align="left">DIST.</td> 
			  <td  nowrap  style="width: 7%;"   align="left">OBS.</td>
			  <td   nowrap style="width: 2%;"    align="left"></td>  
			   </tr>
			</table>
			   

<div id="msg"></div>

<div id="<?php echo $automovel ?>" class="list-group">
<?php
$id_cliente= array();
$dist =0;
$tempo_t=0;
$soma_dist=0;
$concat_lat = "";
$concat_lgn = "";

while($row = mysql_fetch_array($rs)){

   $conta = $conta + 1;
   $ordemvazia = $row["ordem"];
   $nome_carro = $row["nome_rota"];
   $veiculo_qual = $row["veiculo"];
   $center_lat1 = $row["lat"];
   $center_lng1 = $row["lgn"];
   $id_primary =  $row["id"];
   $concat_lat .=  $row["lat"] . ";";
   $concat_lgn .=  $row["lgn"] . ";";

//ABREVIANDO///////
$max = 13;
$max1 = 10;
$max2 = 7;
$max3 = 9;
$max4 = 10;
$max5 = 5;
$max6 = 4;
///////////

	   $query_todos = "select * from veiculos where id='$veiculo_qual'";														
	   $rs_todos = mysql_query($query_todos);

			   while($row_todos = mysql_fetch_array($rs_todos)){
			   $queme = $row_todos["nome"];
			   $queme_transp = $row_todos["transportadora"];
			   $inicio =$row_todos["local_inicio"];
			   $final = $row_todos["local_final"];

			   $dist =  $row_todos["distancia_total"];
			   $tempo_t = $row_todos["tempo_total"];
			   }
   
?>

<div id=<?php echo $automovel . "_" . $row['id']; ?> class="list-group-item">
		   
   <table border=0.5 cellpadding="0" cellspacing="0"  style="width: 100%;">
	   <tr>					
			   <td style="width: 5%;" nowrap ><strong><?php echo  substr_replace($row['ordem'], (strlen($row['ordem']) > $max6 ? '' : ''), $max6);  ?></strong></td>						
			   <td style="width: 10%;"  nowrap ><?php echo substr_replace($row['codigo_pedido'], (strlen($row['codigo_pedido']) > $max2 ? '...' : ''), $max2); ?></td>	
			   <td style="width: 10%;" nowrap><?php echo  substr_replace($row['codigo_cliente'], (strlen($row['codigo_cliente']) > $max2 ? '...' : ''), $max2);  ?></td>
			   <td style="width: 18%;" nowrap title="<?php echo $row['nome_cliente']  ?>"> <?php echo  substr_replace($row['nome_cliente'], (strlen($row['nome_cliente']) > $max ? '...' : ''), $max);  ?></td>
			   <td style="width: 18%;" nowrap title="<?php echo $row['endereco']  ?>"> <?php echo substr_replace($row['endereco'], (strlen($row['endereco']) > $max ? '...' : ''), $max); ?></td>
			   <td style="width: 8%;" nowrap title="<?php echo $row['bairro']  ?>" ><?php echo substr_replace($row['bairro'], (strlen($row['bairro']) > $max5 ? '...' : ''), $max5); ?></td>
			   <td  style="width: 7%;" nowrap title="<?php echo $row['cidade']  ?>"><?php echo substr_replace($row['cidade'], (strlen($row['cidade']) > $max5 ? '...' : ''), $max5); ?></td> 			
			   <td style="width: 10%;" nowrap  >
<?php
if($reordenar_verifica==1){
   echo "<font color='#CC0000'>" . substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max) . "</font>";
} else {
   echo substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max);
}	
?>
</td>
<td style="width: 5%;" nowrap >
<?php
if($reordenar_verifica==1){
   echo "<font color='#CC0000'>" . substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2) . "</font>";
} else {
	echo substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2); 
}	

$soma_dist = $soma_dist + $row['distancia'];
			   ?>	

			   </td>	
			   <td  nowrap style="width: 7%;" title="<?php echo $row['obs_pedido']  ?>"><?php echo substr_replace($row['obs_pedido'], (strlen($row['obs_pedido']) > $max5 ? '...' : ''), $max5); ?></td>   
			   <td nowrap style="width: 2%;" title="Zoom">
			   <a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["lat"]; ?>,<?php echo $row["lgn"]; ?>));map.setZoom(15);infobox(<?php echo $row["lat"]; ?>, <?php echo $row["lgn"]; ?>, '<?php echo $row['nome_cliente']; ?>');"><i class="material-icons" style="font-size:10px;color:black">my_location</i></a>
			   </td>   
	   
		   </tr>
	   </table>
			  
   </div>
<?php

 }

?>

 </div>

 </div>
 
<?php
$soma_retorno = $dist - $soma_dist;
?>
<br>
<table border="0" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 100%;">
 <tbody>

 <tr style="background-color: #ECECEC;text-align: center;height: 20px;"> 
	 
	  <td ><font color="#000000" size="1"> <strong>PESO TOTAL</strong></td>     
	<td><font color="#000000" size="1"> <strong>VOLUME TOTAL</strong></td>  
	<td  ><font color="#000000" size="1"> <strong>VALOR TOTAL</strong></td>
	<td  ><font color="#000000" size="1"> <strong>RETORNO</strong></td>     
	<td  ><font color="#000000" size="1"> <strong>DISTÂNCIA TOTAL</strong></td>  
	<td ><font color="#000000" size="1"> <strong>TEMPO TOTAL</strong></td>
   </tr>
   <tr style="height: 20px;"> 
	 
	 <td ><font color="#000000" size="1"><?php echo  $peso_total; ?></td>     
   <td   ><font color="#000000" size="1"><?php echo  $volume_total; ?></td>  
   <td  ><font color="#000000" size="1"><?php echo  $valor_total; ?></td>
   <td >
   
<?php
if($reordenar_verifica==1){
?>
<font color="#CC0000" size="1">0</font>
<?php
} else {
?>
<font color="#000000" size="1"><?php echo $soma_retorno . " Km"; ?></font>
<?php
}
?>	
</td> 
   <td >
	   
	   <?php
if($reordenar_verifica==1){
?>
<font color="#CC0000" size="1">0</font>
<?php
} else {
?>
<font color="#000000" size="1"><?php echo $dist . " Km"; ?></font>
<?php
}
   
?>
   
   </td>  
   <td >

<?php
if($reordenar_verifica==1){
?>
<font color="#CC0000" size="1">0</font>
<?php
} else {
?>
<font color="#000000" size="1"><?php echo $tempo_t; ?></font>
<?php
}	
?>
</td>
  </tr>
 </tbody>
</table>

<table  border="0" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 100%;">
 <tbody>
   <tr >
	<td  align="left" width="100%" style="font-weight:bold;background-color: #ECECEC;" colspan="5"><font color="#000000" size="3">
   
   </td>
	</tr>

 </tbody>
</table>


<?php
if($reordenar_verifica==1){

?>

<script>

$(document).ready(function() {
   Mudarestado_fechado('<?php echo $abre_fecha ?>');
   volta();
});




</script>  

<input type="submit" name="submit" id="submit" value="RECALCULAR" onClick="alerta();"/>  
<?php
}

?>


<input type="text" id='lista_<?php echo $nome_auto ?>' name='lista_lat' value='<?php echo $concat_lat; ?>' hidden>
<input type="text" id='lista_lgn_<?php echo $nome_auto ?>' name='lista_lgn' value='<?php echo $concat_lgn; ?>' hidden>
<br><br><br>
<script>
Sortable.create(<?php echo $automovel ?>, {

 multiDrag: true,
 selectedClass: "selected",
 animation: 150
});
</script>

<?php

}

?>
</div>

</div>

</div>
  


<div id="div16"></div>


 
<!-- Arquivo de inicialização do mapa -->
<script>


////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
//////////////////////MAPA ROTAS             ////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

var styles = [
	{
		"featureType": "landscape",
		"stylers": [
			{
				"hue": "#0095FF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 44
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.highway",
		"stylers": [
			{
				"hue": "#6200FF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 61.39999999999998
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#00FF1A"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 51.19999999999999
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"hue": "#0067FF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 52
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "water",
		"stylers": [
			{
				"hue": "#0067FF"
			},
			{
				"saturation": 90
			},
			{
				"lightness": 6.6000000000000085
			},
			{
				"gamma": 1
			}
		]
	},
	{
		"featureType": "poi",
		"stylers": [
			{
				"hue": "#001EFF"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 52
			},
			{
				"gamma": 1
			}
		]
	}
];


    // Initialise some variablesS
    var num, map, data, data1, data2, data3, datax, datay, data_endereco, data_codigopedido, data_obspedido;
    var requestArray = [], renderArray = [];
	var h;
 	var options1 = [];
	inicio = document.getElementById('txtEnderecoPartida').value;
	final = document.getElementById('txtEnderecoChegada').value;

//	veiculo_linhas = document.getElementById('nome_route').value;
//	alert(veiculo_linhas);

	var jsonArray={}, jsonArray1 = {}, jsonArray2 = {}, jsonArray3 = {}, jsonArray4 = {}, jsonArray5 = {}, jsonArray6 = {}, jsonArray7 = {}, jsonArray8 = {}, jsonArray9 = {};
	bounds = new google.maps.LatLngBounds();

 	for (var h = 0; h < veiculo_numero_js; h++) {
		
	 var numero = h.toString();
	 waypoints = "waypoints";
	 waypoints_concatena = waypoints.concat(numero);  
	 num_cli = "veiculo";
	 cliente_concatena = num_cli.concat(numero); 	 
	 num_cli_nome = "nome_cliente";
	 cliente_nome_concatena = num_cli_nome.concat(numero); 	 	 
	 num_carro = "carro";
	 carro_nome_concatena = num_carro.concat(numero); 	 
	 endereco_cli = "endereco_cliente";
	 endereco_cli_concatena = endereco_cli.concat(numero); 	
	 codigo_pedido = "codigo_pedido";
	 codigo_pedido_concatena = codigo_pedido.concat(numero);		 
	 obs_pedido = "obs_pedido";
	 obs_pedido_concatena = obs_pedido.concat(numero); 
	 
	 local_final = "local_final";
	 local_final_concatena = local_final.concat(numero); 

	 local_inicio = "local_inicio";
	 local_inicio_concatena = local_inicio.concat(numero); 

	 
	var rota_concatena = document.getElementById(waypoints_concatena).innerHTML;
	var cli_concatena = document.getElementById(cliente_concatena).innerHTML;	
	var cliente_nome_concatena = document.getElementById(cliente_nome_concatena).innerHTML;
	var carro_nome_concatena = document.getElementById(carro_nome_concatena).innerHTML;
	var endereco_cli_concatena = document.getElementById(endereco_cli_concatena).innerHTML;
	var codigo_pedido_concatena = document.getElementById(codigo_pedido_concatena).innerHTML;
	var obs_pedido_concatena = document.getElementById(obs_pedido_concatena).innerHTML;

	var local_final_concatena = document.getElementById(local_final_concatena).innerHTML;
	var local_inicio_concatena = document.getElementById(local_inicio_concatena).innerHTML;

	var rota_concatena_nome = eval('[' + rota_concatena + ']');
	var cliente_concatena_nome = eval('[' + cli_concatena + ']');	
	var cliente_concatena_nome_ok = eval('[' + cliente_nome_concatena + ']');		
	var carro_concatena_nome = eval('[' + carro_nome_concatena + ']');	
	var endereco_cli_concatena = eval('[' + endereco_cli_concatena + ']');	
	var codigo_pedido_concatena = eval('[' + codigo_pedido_concatena + ']');	
	var obs_pedido_concatena = eval('[' + obs_pedido_concatena + ']');	
	var rota = waypoints_concatena;
	var cliente = cliente_concatena_nome;
	var cliente_nome = cliente_concatena_nome_ok;	
	var carro_nome = carro_nome_concatena;
	var endereco_cliente = endereco_cli_concatena;
	var codigo_ped = codigo_pedido_concatena;
	var obs_ped = obs_pedido_concatena;
	
    jsonArray[h] = rota_concatena_nome;
	jsonArray1[h] = cliente_concatena_nome;
	jsonArray2[h] = cliente_concatena_nome_ok;
	jsonArray3[h] = carro_concatena_nome;
	jsonArray4[h] = rota_concatena_nome;
	jsonArray5[h] = endereco_cli_concatena;
	jsonArray6[h] = codigo_pedido_concatena;
	jsonArray7[h] = obs_pedido_concatena;

	jsonArray8[h] = local_final_concatena;

	jsonArray9[h] = local_inicio_concatena;

 }

/////ORDENAR VALOR INVERTE///////////////
function sortfunction_inverte(b, a){
	return (a.distancia - b.distancia);
}	
/////ORDENAR VALOR ///////////////
function sortfunction(a, b){
  			 	return (a.distancia - b.distancia);
}	
	
////////////////////////////////////////////////////////////////////
///SETA
		var iconsetngs = {
   		 path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
};
		
////////////////////////////////////////////////////////////////////
	
	
function generateRequests(){
	document.getElementById('xxx').value ="";	
	document.getElementById('yyy').value ="";						
	document.getElementById('zzz').value ="";	
	document.getElementById('eee').value ="";	
	document.getElementById('www').value ="";				
	document.getElementById('ultimao').value ="";						
	document.getElementById('ultimao_2').value ="";	
	document.getElementById('ultimao_3').value ="";	
    processRequests();  	
}


function secondsToHms(d) {
				d = Number(d);
			 	var h = Math.floor(d / 3600);
				var m = Math.floor(d % 3600 / 60);
				var s = Math.floor(d % 3600 % 60);
				return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
}
				
		
function processRequests(){
var i = 0;
junta_veiculo = [];
var lista_distancia=[];
var lista_tempo=[];	
var novo_haversine=[];		
				 
for (var cliente in jsonArray1){
//alert(h);
	//alert(cliente);
	var meu_distancia = [];
	meu_distancia[i] = [];	

	var meu_tempo = [];
	meu_tempo[i] = [];
		
				 /// ESVAZIA
				 array_distancia_total= 0;
				 total_tempo=0;
				 total_tempo_guarda=0;
				 retorna_base = 0;
				 
///////////////////////////////////////////////////////////////////
			    data = jsonArray[cliente];
				data1 = jsonArray1[cliente];
				data2 = jsonArray2[cliente];
				datax = jsonArray4[cliente];
				data_endereco = jsonArray5[cliente];
				data_codigopedido = jsonArray6[cliente];
				data_obspedido = jsonArray7[cliente];
				data_id = jsonArray3[cliente];				
				data3 = jsonArray3[cliente];
///////////////////////////////////////////////////////////////////
	
		 		 var waypts = [];        
           	     
            	 var lastpoint;			           		
            	 limit = data.length;		
			
				 guarda_haversine=[];
				 guarda_haversine2=[];
				 
				 
				 values_inicio=inicio.split(',');
				 one_inicio_d=values_inicio[0];
				 two_inicio_d=values_inicio[1];	

				 values_inicio=jsonArray9[cliente].split(',');
				 inicio_lat=values_inicio[0];
				 inicio_lgn=values_inicio[1]; 
				 
				

				 
				
///////////////////////////////////////////////////////////////////
		
for (var waypoint0 = 0; waypoint0 < limit; waypoint0++) {
	
			 if (data[waypoint0] === lastpoint){
                    // Duplicate of of the last waypoint
                    continue;
             }                
                // Prepare the lastpoint for the next loop
               lastpoint = data[waypoint0];
				
			    waypts.push({
                    location: data[waypoint0],
                    stopover: true
                });
	
				values_final=data[waypoint0].split(',');
				one_final_d=values_final[0];
				two_final_d=values_final[1];

	
		
	
		  		var novaArr1 = data3[waypoint0];
			
	///PEGA VEICULO, COR....../////////////////////////////////////////////////////////////////////////
	
			for (var n1 = 0; n1 < id_veiculo.length; n1++) {
				 			
				if(id_veiculo[n1] == novaArr1){
					junta_concatena_carro = concatena_carro[n1];
					junta_cor_veiculo = color_carro[n1];
					junta_nome_veiculo = nome_veiculo[n1];			
				}	
			
			}
			
		//	alert(inicio_lat);
		//	alert(inicio_lgn);
	//////////// PRIMEIRO SORTEIO ESCOLHER O PRIMEIRO PONTO MAIS PROXIMO //////////////////////////////
	
				// CRIAR O ARRAY DAS LINHA
	 			guarda_haversine2.push({
						"distancia": haversine(inicio_lat, inicio_lgn, one_final_d, two_final_d),
						"local": datax[waypoint0],
						"id_veiculo": data_id[waypoint0],
						"veiculo": data1[waypoint0], 
						"cliente": data2[waypoint0],	
						"endereco": data_endereco[waypoint0], 
						"codigo_pedido": data_codigopedido[waypoint0], 
						"obs_pedido": data_obspedido[waypoint0],
						"qual_veiculo": junta_concatena_carro,
						"cor_veiculo": junta_cor_veiculo,
						"quem_veiculo": junta_nome_veiculo,
				 });
	
}		
///////////////////////////////////////////////////////////////////



		
		//alert(split_local_ok2);
		
		var novo_haversine=[];
		novo_haversine=guarda_haversine2;	
		var one_inicio_guardado, two_inicio_guardado;
	
		///////////////PRIMEIRO PONTO///////////////////////////////////////
		guarda_primeiroponto = novo_haversine[0].local;
		guarda_primeiroponto_veiculo = novo_haversine[0].qual_veiculo;
		guarda_primeiroponto_nomeveiculo = novo_haversine[0].cliente;	
    	guarda_primeiroponto_distancia = novo_haversine[0].distancia;
		guarda_primeiroponto_codigo_cliente = novo_haversine[0].id_veiculo;
		guarda_primeiroponto_codigo_pedido = novo_haversine[0].codigo_pedido;
		guarda_primeiroponto_codigo_id_cliente = novo_haversine[0].veiculo;

			if(guarda_primeiroponto_distancia > 40){
						
						total_tempo_guarda = guarda_primeiroponto_distancia / 0.7;
				
						} else {
						
						total_tempo_guarda = guarda_primeiroponto_distancia / 0.4;
			}
			
		
		split_inicio_guardado1=guarda_primeiroponto.split(',');
		one_inicio_guardado1=split_inicio_guardado1[0];
		two_inicio_guardado1=split_inicio_guardado1[1];

		/////MARKER PRIMEIRO PONTO//////////////////////////	
		 			icone_first = guarda_primeiroponto_veiculo;
					latlng_first = new google.maps.LatLng(one_inicio_guardado1, two_inicio_guardado1);	
					
					
		////////MARKER PRIMEIRO PONTO NUMEROS ENCIMA//////////////////////////	
					marker = new MarkerWithLabel({
    				position: latlng_first,
     				map: map,
					icon: icone_first,
    				optimized: true,
					clickable: true,	
							
					labelContent: "1",
      				labelAnchor: new google.maps.Point(12, 64),
       				labelClass: 'labels', // the CSS class for the label
					labelInBackground: true,
					labelStyle: {opacity: 0.90}
					});

					conta_numeros_marker = 1;

					array_segura_lista_clientes = Array();	

while (novo_haversine.length > 0) {


		conta_numeros_marker++;
		
		/////GUARDA PRIMEIRO VALOR DO ARRAY PARA COMPARAR//////////////////////	
		guarda_inicio = novo_haversine[0].local;
		guarda_inicio_cor = novo_haversine[0].cor_veiculo;
		
		split_inicio_guardado=guarda_inicio.split(',');
		one_inicio_guardado=split_inicio_guardado[0];
		two_inicio_guardado=split_inicio_guardado[1];

		/////EXCLUI PRIMEIRO VALOR DO ARRAY
		novo_haversine.splice(0, 1);
		
		
		limite_haversine = novo_haversine.length;
		
		var novo_sorteio = [];

		////////////////////////////////////////////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////	
		///SOMENTE UM RESULTADO ///////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////
		
		if (limite_haversine==0) {
							

		} else {
		
		
		////////////////////////////////////////////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////	
		///MAIS DE UM RESULTADO ///////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////
			
			
		for (var waypoint2 = 0; waypoint2 < limite_haversine; waypoint2++) {
		

		values_final1=novo_haversine[waypoint2].local.split(',');
		one_final_d2=values_final1[0];
		two_final_d2=values_final1[1];
	
		
		novo_sorteio_distancia=novo_haversine[waypoint2].distancia;
		novo_sorteio_local=novo_haversine[waypoint2].local;
		novo_sorteio_id_veiculo=novo_haversine[waypoint2].id_veiculo;
		novo_sorteio_veiculo=novo_haversine[waypoint2].veiculo;
		novo_sorteio_cliente=novo_haversine[waypoint2].cliente;
		novo_sorteio_endereco=novo_haversine[waypoint2].endereco;		
		novo_sorteio_codigo_pedido=novo_haversine[waypoint2].codigo_pedido;	
		novo_sorteio_obs_pedido=novo_haversine[waypoint2].obs_pedido;	
		novo_sorteio_qual=novo_haversine[waypoint2].qual_veiculo;
		novo_sorteio_cor_veiculo=novo_haversine[waypoint2].cor_veiculo;	
		novo_sorteio_quem_veiculo=novo_haversine[waypoint2].quem_veiculo;	
					
		maisum1 = waypoint2 + 1;	
		
		
		//////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		/// TODOS REGISTROS FORA O PRIMEIRO PARA SORTIAR NOVAMENTE O MAIS PERTO DO MAIS PERTO 
		/////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		
	
			novo_sorteio.push({
  		    			"distancia": haversine(one_inicio_guardado, two_inicio_guardado, one_final_d2, two_final_d2),
						"local": novo_sorteio_local,
						"id_veiculo": novo_sorteio_id_veiculo,
						"veiculo": novo_sorteio_veiculo, 					
						"cliente": novo_sorteio_cliente,	
						"endereco": novo_sorteio_endereco,
						"codigo_pedido": novo_sorteio_codigo_pedido,
						"obs_pedido": novo_sorteio_obs_pedido,
						"qual_veiculo": novo_sorteio_qual,
						"cor_veiculo": novo_sorteio_cor_veiculo,
						"quem_veiculo": novo_sorteio_quem_veiculo					
			 			});
						
	
			}
			
		
		}
		
		
		///MAIS DE UM RESULTADO ////FINAL///////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////	

		novo_haversine = novo_sorteio;
		array_segura_lista_clientes.push(novo_sorteio[0]);
		

		/// MARKER FINAL//////////////////////////////////////////////////	

		split_final = jsonArray8[cliente].split(',');
		final_lat = split_final[0];
		final_lgn = split_final[1];

		//alert(jsonArray8[cliente]);
	

		if(novo_haversine.length===1){
				segura_ai_cor= novo_sorteio[0].cor_veiculo;
		}
		
		if(novo_haversine.length===0){
				segura_ai_cor= undefined;
		}
		

		
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////			
		//ULTIMA LINHA //////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		
		if (novo_haversine.length===0) {
			
			//alert(segura_ai_cor);
			/////////// SOMENTE UM RESULTADO DE UM PONTO ////////////////////////
			if(segura_ai_cor===undefined){
				
					var line_novaordem1 = new google.maps.Polyline({
   					path: [new google.maps.LatLng(one_inicio_guardado, two_inicio_guardado), new google.maps.LatLng(final_lat, final_lgn)],
   					strokeColor: guarda_inicio_cor,
   					strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	     			icons: [{
         			icon: iconsetngs,
        			offset: '100%'}]
					});	
					 
					distancia_final= haversine(one_inicio_guardado, two_inicio_guardado, final_lat, final_lgn);		
					
					
					
						if(distancia_final > 40){
						total_tempo += distancia_final / 0.7;
						tempo_cada_um = 	distancia_final / 0.7;
						} else {
						total_tempo += distancia_final / 0.4;
						tempo_cada_um = 	distancia_final / 0.4;
						}
						
						
					array_distancia_total += distancia_final * 1.33; 
					
					bounds.extend(marker.position);
					
			/////////// SOMENTE UM RESULTADO DE UM PONTO ////FIM/////////////////
			
				
			} else {
				/*
					var line_novaordem1 = new google.maps.Polyline({
   					path: [new google.maps.LatLng(one_final_maisperto, two_final_maisperto), new google.maps.LatLng(one_final_ok1, two_final_ok1)],
   					strokeColor: segura_ai_cor,
   					strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	     			icons: [{
         			icon: iconsetngs,
        			offset: '100%'}]
					});	 
					*/
					distancia_final= haversine(one_final_maisperto, two_final_maisperto, final_lat, final_lgn);	
					
					
						if(distancia_final > 40){
						total_tempo +=  distancia_final / 0.7;
						tempo_cada_um = distancia_final / 0.7;								
						} else {
						total_tempo += distancia_final / 0.4;
						tempo_cada_um = distancia_final / 0.4;	
						}
						
					array_distancia_total += distancia_final * 1.33;
				
					
			}
			
			
		
		} else {		
	
		//	alert(novo_haversine[0].local);
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/// TODAS LINHAS NOVAS//////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////
	
			split_local_maisperto=novo_haversine[0].local.split(',');
			one_final_maisperto=split_local_maisperto[0];
			two_final_maisperto=split_local_maisperto[1];	
		

// Check if the element is selected/checked
//if(checkBox=='on') {
	
					var line_novaordem = new google.maps.Polyline({
   					path: [new google.maps.LatLng(one_inicio_guardado, two_inicio_guardado), new google.maps.LatLng(one_final_maisperto, two_final_maisperto)],
   		 			strokeColor: novo_sorteio[0].cor_veiculo,
   					strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	    			icons: [{
        			icon: iconsetngs,
        			offset: '100%'}]
		 			});
//} else {
	//alert("NO");
	

//}


			distancia_todos = haversine(one_inicio_guardado, two_inicio_guardado, one_final_maisperto, two_final_maisperto);	
	
			if(distancia_todos > 40){
				total_tempo +=  distancia_todos / 0.7;
				tempo_cada_um = 	distancia_todos / 0.7;
				
			} else {
				total_tempo +=  distancia_todos / 0.4;
				tempo_cada_um = distancia_todos / 0.4;
			}
	
			
			array_distancia_total += distancia_todos * 1.33;
			meu_distancia[i].push(distancia_todos);
			meu_tempo[i].push(secondsToHms(tempo_cada_um));


		}		
	

		////////////////////////////////////		
	///  MARKER DISTRIBUIDORA INICIAL
		split_inicio=inicio.split(',');
		one_inicio=split_inicio[0];
		two_inicio=split_inicio[1];
		one_final=one_inicio_guardado1;
		two_final=two_inicio_guardado1;					

		////////////////////////////////////	
		
	 	var contentString1 = "<div id='info'><h1><p id='legenda1'>Ponto Inicial</h1></p></div>";
	 	var contentString2 = "<div id='info'><h1><p id='legenda1'>Ponto Final</h1></p></div>";
		
		var infowindow1 = new google.maps.InfoWindow({
    	content: contentString1
  		});
		
		var infowindow2 = new google.maps.InfoWindow({
    	content: contentString2
  		});
		
			//alert(array_segura_lista_clientes.cliente);
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	///MARKERS DISTRIBUIDORAS//////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	//	MARKER INICIAL/////////////////////////////////////////////////////////////////////////////
					icone = "imgs/icon_start.png";
					latlng = new google.maps.LatLng(inicio_lat, inicio_lgn);	
					marker0 = new google.maps.Marker({
    				position: latlng,
     				map: map,
					icon: icone,
    				optimized: true,
					clickable: false,			
 					});
	//	MARKER FINAL/////////////////////////////////////////////////////////////////////////////
					icone1 = "imgs/icon_finish.png";				
					latlng1 = new google.maps.LatLng(final_lat, final_lgn);
					marker1 = new google.maps.Marker({
    				position: latlng1,
     				map: map,
					icon: icone1,
    				optimized: true,
					clickable: false,							
 					});	
					
	
	////////////////////////////////////////////////////////////////////////////////////////////
	
	//LINHA INICIO//////////////////////////////////////////////////////////////////////////////
	
	
					var line_novaordem = new google.maps.Polyline({
   		 			path: [new google.maps.LatLng(inicio_lat, inicio_lgn), new google.maps.LatLng(one_final, two_final)],
   		 			strokeColor: guarda_inicio_cor,
   		 			strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	     			icons: [{
         			icon: iconsetngs,
         			offset: '100%'}]
		 			});

					}
	
	

		distancia_inicio = haversine(inicio_lat, inicio_lgn, one_final, two_final);

			if(distancia_inicio > 40){
				total_tempo +=  distancia_inicio / 0.7;			
				tempo_cada_um = 	distancia_inicio / 0.7;
			} else {
				total_tempo +=  distancia_inicio / 0.4;
				tempo_cada_um = 	distancia_inicio / 0.4;
			}
	
			array_distancia_total += distancia_inicio * 1.33;
			
			
			//alert(total_tempo);


//////////////////////////////////////////////////////////////
	
			var novaArr = data3.filter(function(este, i) {
				return data3.indexOf(este) === i;  
				
			});
			
			
			for (var n = 0; n < id_veiculo.length; n++) {
			
				if(id_veiculo[n] == novaArr){
					junta_veiculo.push({
          			veiculo: concatena_carro[n],
					cor: color_carro[n],
					nome_veiculo: nome_veiculo[n],
					id_do_veiculo:id_veiculo[n],
          	 	});
			
	
 ///////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////
 ////////////  LISTA LADO ESQUERDO DA TELA   ///////////////
 ///////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////	
 

						var datay = array_segura_lista_clientes;	
						var meu_array_iddocara= [];
						meu_array_iddocara[i]= [];					
						var meu_array = [];
						meu_array[i] = [];					
						var meu_array2 =[];
						meu_array2[i] = [];
						var meu_endereco =[];
						meu_endereco[i] = [];					
						var meu_pedido = [];
						meu_pedido[i] = [];						
						var meu_obs = [];
						meu_obs[i] = [];										
						var meu_iddoveiculo = [];
						meu_iddoveiculo[i] = [];						
						var meu_ordem = [];
						meu_ordem[i] = [];	
						var meu_rota = [];
						meu_rota[i] = [];					
						var ultima_veiculo = [];
						ultima_veiculo[i] = [];				
						var ultima_distancia = [];
						ultima_distancia[i] = [];				
						var ultima_tempo = [];
						ultima_tempo[i] = [];
						
		
				// MULTIPLICA MAIS 1.1 NO DISTANCIA 
				total_distanciasomada = array_distancia_total;
				////////////////////////
				
				
		
				////FUNCAO SEGUNDOS//////
	 			segundos = total_tempo;
				////////////////////////
	
		
				var vistitaae = "visita" + [i];

	
				// valor input recebe
				ultima_veiculo[i].push(array_distancia_total.toFixed(1));
				ultima_distancia[i].push(junta_veiculo[i].id_do_veiculo);
				ultima_tempo[i].push(secondsToHms(segundos));
		
				document.getElementById('div16').innerHTML += "<div id=" + vistitaae + ">";
				
 
	///////////////////////////////////////////////////////////
			
	///looping ordenado
	data_ok = data3.length - 1;
	//menos o primeiro////
	////////////////////// PRIMEIRA VISITA VALORES //////////////////////////////
	
	
	 guarda_primeiroponto_distancia= guarda_primeiroponto_distancia * 1.33;

			ii = i+1;
	
			document.getElementById('xxx').value += guarda_primeiroponto_codigo_id_cliente + ",";	
			document.getElementById('yyy').value += 1 + ",";						
			document.getElementById('zzz').value += guarda_primeiroponto_codigo_cliente + ",";	
			document.getElementById('eee').value += guarda_primeiroponto_codigo_pedido + ",";	
			document.getElementById('www').value += ii + ",";	
			document.getElementById('inicio').value = inicio;	
			document.getElementById('final').value = final;	
									
			lista_distancia.push(guarda_primeiroponto_distancia.toFixed(1));	
			lista_tempo.push(secondsToHms(total_tempo_guarda));

			//lista_latlgn_linhas = [];
		//	lista_veiculo_linhas = [];
				
				
	////////////////////// PRIMEIRA VISITA VALORES  FIM //////////////////////////////
				
	for (var w = 0; w < data_ok; w++) {
							ordem = w;	
							meu_array_iddocara[i].push(datay[ordem].veiculo);	
							meu_array[i].push(datay[ordem].cliente);
							meu_array2[i].push(datay[ordem].local);
							meu_endereco[i].push(datay[ordem].endereco);
							meu_pedido[i].push(datay[ordem].codigo_pedido);
							meu_obs[i].push(datay[ordem].obs_pedido);							
							meu_iddoveiculo[i].push(datay[ordem].id_veiculo);				
							somai = i+1;				
							meu_rota[i].push(somai);
							ww = w + 1;
							www=ww+1 ;
							meu_ordem[i].push(ww);												
							nx = ww.toString();					
							meu_distancia[i][w]= meu_distancia[i][w] * 1.33;		
							lista_distancia.push(meu_distancia[i][w].toFixed(1));									
							lista_tempo.push(meu_tempo[i][w]);	
							
							icone = junta_veiculo[i].veiculo;
							latlng = meu_array2[i][w];
							 // first 123
							 var lat = latlng.replace(/\s*\,.*/, '');
							 // second 456
      						 var lng = latlng.replace(/.*,\s*/, '');
       						 var locate = new google.maps.LatLng(parseFloat(lat), parseFloat(lng)); 
							  
							marker = new MarkerWithLabel({
    						position: locate,
     						map: map,
							icon: icone,
    						optimized: true,
							clickable: true,	
							
							 labelContent: www,
      						 labelAnchor: new google.maps.Point(12, 64),
       						 labelClass: 'labels', // the CSS class for the label
							 labelInBackground: true,
							 labelStyle: {opacity: 0.90}	

							 
 							});
						
							 bounds.extend(marker.position);
							 //alert(bounds);

		

				document.getElementById('yyy').value += www + ",";
				document.getElementById('xxx').value += meu_array_iddocara[i][w] + ",";							
				document.getElementById('zzz').value += meu_iddoveiculo[i][w] + ",";							
				document.getElementById('www').value += meu_rota[i][w] + ",";
				document.getElementById('eee').value += meu_pedido[i][w] + ",";
				document.getElementById('inicio').value = inicio;	
				document.getElementById('final').value = final;	


				//alert(datay[ordem].id_veiculo);
				//alert(datay[ordem].local);

			//	lista_latlgn_linhas.push(datay[ordem].local);
			//	lista_veiculo_linhas.push(datay[ordem].id_veiculo);

				

}


////////////////valor do retorno em km///////////////////////////
 				retorna_base = distancia_final * 1.33;
////////////////valor do retorno em km///////////////////////////
 		
				ultima_veiculo[i].push(total_distanciasomada.toFixed(2));
				ultima_distancia[i].push(junta_veiculo[i].id_do_veiculo);
				ultima_tempo[i].push(secondsToHms(segundos));		
				
				document.getElementById('ultimao').value += ultima_veiculo[i] + ",";
				document.getElementById('ultimao_2').value += ultima_distancia[i] + ",";
				document.getElementById('ultimao_3').value += ultima_tempo[i] + ",";

				
	}	
	
}

		
	///////////////////////////////////////////////////////////
			
	///looping ordenado
	data_ok = data3.length - 1;
	
    	var offsetX = 0.40;

		////POSICIONAMENTO DO ZOOM NA PAGINA ////////
	//	locate1 = new google.maps.LatLng(parseFloat(one_inicio), parseFloat(two_inicio- offsetX));
			
	
		//map.setCenter(locate1);



	//	map.setOptions({
    //	zoom: 8
   	//	});

google.maps.event.addListener(map, 'zoom_changed', function() {
    var zoom_volta = map.getZoom();
	var previousPosition = map.getCenter();
	document.getElementById("loc_volta").value = previousPosition;
	document.getElementById("zoom_volta").value = zoom_volta;

});


google.maps.event.addListener(map, 'drag', function() {
    var zoom_volta = map.getZoom();
	var previousPosition = map.getCenter();
	document.getElementById("loc_volta").value = previousPosition;
	document.getElementById("zoom_volta").value = zoom_volta;

});

		////POSICIONAMENTO DO ZOOM NA PAGINA ////////
			
										
			document.getElementById('qqq').value = lista_distancia;			
			document.getElementById('kkk').value = lista_tempo;

			/// EXCLUI O PRIMEIRO DA LISTA ////////
			datay.splice(0, w);     
            nextRequest();

				 		
}		


function nextRequest(){
            // mais i
            i++;
            if(i >= guarda_haversine2.length){  
				
                return;
				
            }
           
	}
}

let line_novaordem;

  // Called Onload
  function volta() {

	var xx = document.getElementById('loc_volta').value;
	var yy = document.getElementById('zoom_volta').value;

	var xx = xx.replace('(', '');
	var xx = xx.replace(')', '');
	
	let arr = xx.split(',');
	var yy = parseInt(yy);


var mapOptions = {
   center: new google.maps.LatLng(arr[0], arr[1]),
	zoom: 15,
	 zoomControl: true,
	  zoomControlOptions: {
			style: google.maps.ZoomControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
	mapTypeControl: false,
	streetViewControl: false,
	disableDefaultUI: true,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	styles: styles
};

map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

//var TrafficLayer = new google.maps.TrafficLayer();
  //TrafficLayer.setMap(map);

		map.setOptions({
    	zoom: yy
   		});

// Start the request making
generateRequests();


}
    // Called Onload
    function init() {

        var mapOptions = {
           //center: new google.maps.LatLng(-25.4561432, -49.3058715905099),
           // zoom: 8,
			 zoomControl: true,
		 	 zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
            mapTypeControl: false,
			streetViewControl: false,
			disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: styles
        };
            
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		//var TrafficLayer = new google.maps.TrafficLayer();
  		//TrafficLayer.setMap(map);
  
        // Start the request making
        generateRequests();

		//map.fitBounds(-25.4561432, -49.3058715905099, -25.4561432, -49.3058715905099);

		map.fitBounds(bounds);

		
		//document.forms["salvala"].submit();

    }

</script>

	<?php

	//print_r($reordena_array);

	$key = array_search(1, $reordena_array); // $key = 2;
	echo $key;

if($key!== false){

?>

<script>
google.maps.event.addDomListener(window, 'load', volta);

</script> 

<?php
} else {
?>

<script>

google.maps.event.addDomListener(window, 'load', init);
</script> 

<?php
}
?>

	<script>

	function removeLine() {
		line_novaordem.setVisible(false);
		line_novaordem.setMap(null);
		//init();
		//line[i].setVisible(false);
		alert("okkkk");

}

	
function getElements() {
	
	var xx = document.getElementById('loc_volta').value;
	var yy = document.getElementById('zoom_volta').value;
	
	var xx = xx.replace('(', '');
	var xx = xx.replace(')', '');
	//alert(xx);

	

		map.setOptions({
		center: new google.maps.LatLng(xx),
    	zoom: yy
   		});
	
			

   	}
	
    //var resultado = choices.join(';');
    //alert(resultado);

	


	
	function savePosition(map, z) {
		
		
		document.getElementById("loc_volta").value = previousPosition;
		document.getElementById("zoom_volta").value = z;
		alert(previousPosition);
		alert(z);
		
	  }
	 




	

///formula de HAVERSINE//////////////	 
function haversine() {
       var radians = Array.prototype.map.call(arguments, function(deg) { return deg/180.0 * Math.PI; });
       var lat1 = radians[0], lon1 = radians[1], lat2 = radians[2], lon2 = radians[3];
       var R = 6372.8; // km
       var dLat = lat2 - lat1;
       var dLon = lon2 - lon1;
       var a = Math.sin(dLat / 2) * Math.sin(dLat /2) + Math.sin(dLon / 2) * Math.sin(dLon /2) * Math.cos(lat1) * Math.cos(lat2);
       var c = 2 * Math.asin(Math.sqrt(a));
       return R * c;
}
///////////////////////////////////
///////////////////////////////////MARKER LABEL ////////////////////////////
function MarkerLabel_(marker, crossURL, handCursorURL) {
	this.marker_ = marker;
	this.handCursorURL_ = marker.handCursorURL;
  
	this.labelDiv_ = document.createElement("div");
	this.labelDiv_.style.cssText = "position: absolute; overflow: hidden;";
  
  
	this.eventDiv_ = document.createElement("div");
	this.eventDiv_.style.cssText = this.labelDiv_.style.cssText;
  
	// This is needed for proper behavior on MSIE:
	this.eventDiv_.setAttribute("onselectstart", "return false;");
	this.eventDiv_.setAttribute("ondragstart", "return false;");
  
	// Get the DIV for the "X" to be displayed when the marker is raised.
	this.crossDiv_ = MarkerLabel_.getSharedCross(crossURL);
  }
  
  // MarkerLabel_ inherits from OverlayView:
  MarkerLabel_.prototype = new google.maps.OverlayView();
  
  
  MarkerLabel_.getSharedCross = function (crossURL) {
	var div;
	if (typeof MarkerLabel_.getSharedCross.crossDiv === "undefined") {
	  div = document.createElement("img");
	  div.style.cssText = "position: absolute; z-index: 1000002; display: none;";
	  // Hopefully Google never changes the standard "X" attributes:
	  div.style.marginLeft = "-8px";
	  div.style.marginTop = "-9px";
	  div.src = crossURL;
	  MarkerLabel_.getSharedCross.crossDiv = div;
	}
	return MarkerLabel_.getSharedCross.crossDiv;
  };
  
  
  MarkerLabel_.prototype.onAdd = function () {
	var me = this;
	var cMouseIsDown = false;
	var cDraggingLabel = false;
	var cSavedZIndex;
	var cLatOffset, cLngOffset;
	var cIgnoreClick;
	var cRaiseEnabled;
	var cStartPosition;
	var cStartCenter;
	// Constants:
	var cRaiseOffset = 20;
	var cDraggingCursor = "url(" + this.handCursorURL_ + ")";
  
	// Stops all processing of an event.
	//
	var cAbortEvent = function (e) {
	  if (e.preventDefault) {
		e.preventDefault();
	  }
	  e.cancelBubble = true;
	  if (e.stopPropagation) {
		e.stopPropagation();
	  }
	};
  
	var cStopBounce = function () {
	  me.marker_.setAnimation(null);
	};
  
	this.getPanes().overlayImage.appendChild(this.labelDiv_);
	this.getPanes().overlayMouseTarget.appendChild(this.eventDiv_);
	// One cross is shared with all markers, so only add it once:
	if (typeof MarkerLabel_.getSharedCross.processed === "undefined") {
	  this.getPanes().overlayImage.appendChild(this.crossDiv_);
	  MarkerLabel_.getSharedCross.processed = true;
	}
  
	this.listeners_ = [
	  google.maps.event.addDomListener(this.eventDiv_, "mouseover", function (e) {
		if (me.marker_.getDraggable() || me.marker_.getClickable()) {
		  this.style.cursor = "pointer";
		  google.maps.event.trigger(me.marker_, "mouseover", e);
		}
	  }),
	  google.maps.event.addDomListener(this.eventDiv_, "mouseout", function (e) {
		if ((me.marker_.getDraggable() || me.marker_.getClickable()) && !cDraggingLabel) {
		  this.style.cursor = me.marker_.getCursor();
		  google.maps.event.trigger(me.marker_, "mouseout", e);
		}
	  }),
	  google.maps.event.addDomListener(this.eventDiv_, "mousedown", function (e) {
		cDraggingLabel = false;
		if (me.marker_.getDraggable()) {
		  cMouseIsDown = true;
		  this.style.cursor = cDraggingCursor;
		}
		if (me.marker_.getDraggable() || me.marker_.getClickable()) {
		  google.maps.event.trigger(me.marker_, "mousedown", e);
		  cAbortEvent(e); // Prevent map pan when starting a drag on a label
		}
	  }),
	  google.maps.event.addDomListener(document, "mouseup", function (mEvent) {
		var position;
		if (cMouseIsDown) {
		  cMouseIsDown = false;
		  me.eventDiv_.style.cursor = "pointer";
		  google.maps.event.trigger(me.marker_, "mouseup", mEvent);
		}
		if (cDraggingLabel) {
		  if (cRaiseEnabled) { // Lower the marker & label
			position = me.getProjection().fromLatLngToDivPixel(me.marker_.getPosition());
			position.y += cRaiseOffset;
			me.marker_.setPosition(me.getProjection().fromDivPixelToLatLng(position));
			// This is not the same bouncing style as when the marker portion is dragged,
			// but it will have to do:
			try { // Will fail if running Google Maps API earlier than V3.3
			  me.marker_.setAnimation(google.maps.Animation.BOUNCE);
			  setTimeout(cStopBounce, 1406);
			} catch (e) {}
		  }
		  me.crossDiv_.style.display = "none";
		  me.marker_.setZIndex(cSavedZIndex);
		  cIgnoreClick = true; // Set flag to ignore the click event reported after a label drag
		  cDraggingLabel = false;
		  mEvent.latLng = me.marker_.getPosition();
		  google.maps.event.trigger(me.marker_, "dragend", mEvent);
		}
	  }),
	  google.maps.event.addListener(me.marker_.getMap(), "mousemove", function (mEvent) {
		var position;
		if (cMouseIsDown) {
		  if (cDraggingLabel) {
			// Change the reported location from the mouse position to the marker position:
			mEvent.latLng = new google.maps.LatLng(mEvent.latLng.lat() - cLatOffset, mEvent.latLng.lng() - cLngOffset);
			position = me.getProjection().fromLatLngToDivPixel(mEvent.latLng);
			if (cRaiseEnabled) {
			  me.crossDiv_.style.left = position.x + "px";
			  me.crossDiv_.style.top = position.y + "px";
			  me.crossDiv_.style.display = "";
			  position.y -= cRaiseOffset;
			}
			me.marker_.setPosition(me.getProjection().fromDivPixelToLatLng(position));
			if (cRaiseEnabled) { // Don't raise the veil; this hack needed to make MSIE act properly
			  me.eventDiv_.style.top = (position.y + cRaiseOffset) + "px";
			}
			google.maps.event.trigger(me.marker_, "drag", mEvent);
		  } else {
			// Calculate offsets from the click point to the marker position:
			cLatOffset = mEvent.latLng.lat() - me.marker_.getPosition().lat();
			cLngOffset = mEvent.latLng.lng() - me.marker_.getPosition().lng();
			cSavedZIndex = me.marker_.getZIndex();
			cStartPosition = me.marker_.getPosition();
			cStartCenter = me.marker_.getMap().getCenter();
			cRaiseEnabled = me.marker_.get("raiseOnDrag");
			cDraggingLabel = true;
			me.marker_.setZIndex(1000000); // Moves the marker & label to the foreground during a drag
			mEvent.latLng = me.marker_.getPosition();
			google.maps.event.trigger(me.marker_, "dragstart", mEvent);
		  }
		}
	  }),
	  google.maps.event.addDomListener(document, "keydown", function (e) {
		if (cDraggingLabel) {
		  if (e.keyCode === 27) { // Esc key
			cRaiseEnabled = false;
			me.marker_.setPosition(cStartPosition);
			me.marker_.getMap().setCenter(cStartCenter);
			google.maps.event.trigger(document, "mouseup", e);
		  }
		}
	  }),
	  google.maps.event.addDomListener(this.eventDiv_, "click", function (e) {
		if (me.marker_.getDraggable() || me.marker_.getClickable()) {
		  if (cIgnoreClick) { // Ignore the click reported when a label drag ends
			cIgnoreClick = false;
		  } else {
			google.maps.event.trigger(me.marker_, "click", e);
			cAbortEvent(e); // Prevent click from being passed on to map
		  }
		}
	  }),
	  google.maps.event.addDomListener(this.eventDiv_, "dblclick", function (e) {
		if (me.marker_.getDraggable() || me.marker_.getClickable()) {
		  google.maps.event.trigger(me.marker_, "dblclick", e);
		  cAbortEvent(e); // Prevent map zoom when double-clicking on a label
		}
	  }),
	  google.maps.event.addListener(this.marker_, "dragstart", function (mEvent) {
		if (!cDraggingLabel) {
		  cRaiseEnabled = this.get("raiseOnDrag");
		}
	  }),
	  google.maps.event.addListener(this.marker_, "drag", function (mEvent) {
		if (!cDraggingLabel) {
		  if (cRaiseEnabled) {
			me.setPosition(cRaiseOffset);
  
			me.labelDiv_.style.zIndex = 1000000 + (this.get("labelInBackground") ? -1 : +1);
		  }
		}
	  }),
	  google.maps.event.addListener(this.marker_, "dragend", function (mEvent) {
		if (!cDraggingLabel) {
		  if (cRaiseEnabled) {
			me.setPosition(0); // Also restores z-index of label
		  }
		}
	  }),
	  google.maps.event.addListener(this.marker_, "position_changed", function () {
		me.setPosition();
	  }),
	  google.maps.event.addListener(this.marker_, "zindex_changed", function () {
		me.setZIndex();
	  }),
	  google.maps.event.addListener(this.marker_, "visible_changed", function () {
		me.setVisible();
	  }),
	  google.maps.event.addListener(this.marker_, "labelvisible_changed", function () {
		me.setVisible();
	  }),
	  google.maps.event.addListener(this.marker_, "title_changed", function () {
		me.setTitle();
	  }),
	  google.maps.event.addListener(this.marker_, "labelcontent_changed", function () {
		me.setContent();
	  }),
	  google.maps.event.addListener(this.marker_, "labelanchor_changed", function () {
		me.setAnchor();
	  }),
	  google.maps.event.addListener(this.marker_, "labelclass_changed", function () {
		me.setStyles();
	  }),
	  google.maps.event.addListener(this.marker_, "labelstyle_changed", function () {
		me.setStyles();
	  })
	];
  };
  
  
  MarkerLabel_.prototype.onRemove = function () {
	var i;
	this.labelDiv_.parentNode.removeChild(this.labelDiv_);
	this.eventDiv_.parentNode.removeChild(this.eventDiv_);
  
	// Remove event listeners:
	for (i = 0; i < this.listeners_.length; i++) {
	  google.maps.event.removeListener(this.listeners_[i]);
	}
  };
  
  
  MarkerLabel_.prototype.draw = function () {
	this.setContent();
	this.setTitle();
	this.setStyles();
  };
  
  MarkerLabel_.prototype.setContent = function () {
	var content = this.marker_.get("labelContent");
	if (typeof content.nodeType === "undefined") {
	  this.labelDiv_.innerHTML = content;
	  this.eventDiv_.innerHTML = this.labelDiv_.innerHTML;
	} else {
	  this.labelDiv_.innerHTML = ""; // Remove current content
	  this.labelDiv_.appendChild(content);
	  content = content.cloneNode(true);
	  this.eventDiv_.appendChild(content);
	}
  };
  
  
  MarkerLabel_.prototype.setTitle = function () {
	this.eventDiv_.title = this.marker_.getTitle() || "";
  };
  
  
  MarkerLabel_.prototype.setStyles = function () {
	var i, labelStyle;
  
	// Apply style values from the style sheet defined in the labelClass parameter:
	this.labelDiv_.className = this.marker_.get("labelClass");
	this.eventDiv_.className = this.labelDiv_.className;
  
	// Clear existing inline style values:
	this.labelDiv_.style.cssText = "";
	this.eventDiv_.style.cssText = "";
	// Apply style values defined in the labelStyle parameter:
	labelStyle = this.marker_.get("labelStyle");
	for (i in labelStyle) {
	  if (labelStyle.hasOwnProperty(i)) {
		this.labelDiv_.style[i] = labelStyle[i];
		this.eventDiv_.style[i] = labelStyle[i];
	  }
	}
	this.setMandatoryStyles();
  };
  
  
  MarkerLabel_.prototype.setMandatoryStyles = function () {
	this.labelDiv_.style.position = "absolute";
	this.labelDiv_.style.overflow = "hidden";
	// Make sure the opacity setting causes the desired effect on MSIE:
	if (typeof this.labelDiv_.style.opacity !== "undefined" && this.labelDiv_.style.opacity !== "") {
	  this.labelDiv_.style.MsFilter = "\"progid:DXImageTransform.Microsoft.Alpha(opacity=" + (this.labelDiv_.style.opacity * 100) + ")\"";
	  this.labelDiv_.style.filter = "alpha(opacity=" + (this.labelDiv_.style.opacity * 100) + ")";
	}
  
	this.eventDiv_.style.position = this.labelDiv_.style.position;
	this.eventDiv_.style.overflow = this.labelDiv_.style.overflow;
	this.eventDiv_.style.opacity = 0.01; // Don't use 0; DIV won't be clickable on MSIE
	this.eventDiv_.style.MsFilter = "\"progid:DXImageTransform.Microsoft.Alpha(opacity=1)\"";
	this.eventDiv_.style.filter = "alpha(opacity=1)"; // For MSIE
  
	this.setAnchor();
	this.setPosition(); // This also updates z-index, if necessary.
	this.setVisible();
  };
  
  
  MarkerLabel_.prototype.setAnchor = function () {
	var anchor = this.marker_.get("labelAnchor");
	this.labelDiv_.style.marginLeft = -anchor.x + "px";
	this.labelDiv_.style.marginTop = -anchor.y + "px";
	this.eventDiv_.style.marginLeft = -anchor.x + "px";
	this.eventDiv_.style.marginTop = -anchor.y + "px";
  };
  
  
  MarkerLabel_.prototype.setPosition = function (yOffset) {
	var position = this.getProjection().fromLatLngToDivPixel(this.marker_.getPosition());
	if (typeof yOffset === "undefined") {
	  yOffset = 0;
	}
	this.labelDiv_.style.left = Math.round(position.x) + "px";
	this.labelDiv_.style.top = Math.round(position.y - yOffset) + "px";
	this.eventDiv_.style.left = this.labelDiv_.style.left;
	this.eventDiv_.style.top = this.labelDiv_.style.top;
  
	this.setZIndex();
  };
  
  MarkerLabel_.prototype.setZIndex = function () {
	var zAdjust = (this.marker_.get("labelInBackground") ? -1 : +1);
	if (typeof this.marker_.getZIndex() === "undefined") {
	  this.labelDiv_.style.zIndex = parseInt(this.labelDiv_.style.top, 10) + zAdjust;
	  this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex;
	} else {
	  this.labelDiv_.style.zIndex = this.marker_.getZIndex() + zAdjust;
	  this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex;
	}
  };
  
  /**
   * Sets the visibility of the label. The label is visible only if the marker itself is
   * visible (i.e., its visible property is true) and the labelVisible property is true.
   * @private
   */
  MarkerLabel_.prototype.setVisible = function () {
	if (this.marker_.get("labelVisible")) {
	  this.labelDiv_.style.display = this.marker_.getVisible() ? "block" : "none";
	} else {
	  this.labelDiv_.style.display = "none";
	}
	this.eventDiv_.style.display = this.labelDiv_.style.display;
  };
  
  function MarkerWithLabel(opt_options) {
	opt_options = opt_options || {};
	opt_options.labelContent = opt_options.labelContent || "";
	opt_options.labelAnchor = opt_options.labelAnchor || new google.maps.Point(0, 0);
	opt_options.labelClass = opt_options.labelClass || "markerLabels";
	opt_options.labelStyle = opt_options.labelStyle || {};
	opt_options.labelInBackground = opt_options.labelInBackground || false;
	if (typeof opt_options.labelVisible === "undefined") {
	  opt_options.labelVisible = true;
	}
	if (typeof opt_options.raiseOnDrag === "undefined") {
	  opt_options.raiseOnDrag = true;
	}
	if (typeof opt_options.clickable === "undefined") {
	  opt_options.clickable = true;
	}
	if (typeof opt_options.draggable === "undefined") {
	  opt_options.draggable = false;
	}
	if (typeof opt_options.optimized === "undefined") {
	  opt_options.optimized = false;
	}
	opt_options.crossImage = opt_options.crossImage || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/drag_cross_67_16.png";
	opt_options.handCursor = opt_options.handCursor || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/closedhand_8_8.cur";
	opt_options.optimized = false; // Optimized rendering is not supported
  
	this.label = new MarkerLabel_(this, opt_options.crossImage, opt_options.handCursor); // Bind the label to the marker
  
	// Call the parent constructor. It calls Marker.setValues to initialize, so all
	// the new parameters are conveniently saved and can be accessed with get/set.
	// Marker.set triggers a property changed event (called "propertyname_changed")
	// that the marker label listens for in order to react to state changes.
	google.maps.Marker.apply(this, arguments);
  }
  
  // MarkerWithLabel inherits from <code>Marker</code>:
  MarkerWithLabel.prototype = new google.maps.Marker();
  
  /**
   * Overrides the standard Marker setMap function.
   * @param {Map} theMap The map to which the marker is to be added.
   * @private
   */
  MarkerWithLabel.prototype.setMap = function (theMap) {
  
	// Call the inherited function...
	google.maps.Marker.prototype.setMap.apply(this, arguments);
  
	// ... then deal with the label:
	this.label.setMap(theMap);
  };
  
  
  ////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////


</script>


<div id="footer" name="footer" class="footer">
  
  <table border="0" style="width: 100%; height:100%" cellpadding="0" cellspacing="0">
<tr>
  <td style="font-size: 11px;text-align: left;">
  <input type='submit' name='submit' value='VOLTAR' onclick="location.href='step4.php';" />
  </td>
  
<td style="font-size: 11px;text-align: right;">

<?php
$avanca = "select reordenar from rotas where reordenar=1";
$avanca = mysql_query($avanca);

$verifica = mysql_fetch_assoc($avanca);

if($verifica==0) {

?>
<form action="step5.php" name="salvala1" id="salvala1" method="POST">

<input type='submit' value='AVANÇAR' />
</form>

<?php

}
?>

</td>
</tr>

</table>
 
</div>
</body>
</html>