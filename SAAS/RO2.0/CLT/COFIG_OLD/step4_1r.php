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
  height: 16px;
  width: 580px;
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
	if($qual_rota=="google"){
		$muda_javascript = "js/mapa_cadd.js";

		
	} else {
		
		$muda_javascript = "js/mapa_cadd.js";
	}
	

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

		//	$reordenar[$conta1] =  $row_veiculos["reordenado"];

			
			//echo ($concatena_carro[$conta1]);
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
	$inicio = $_GET["inicio"];
	$final = $_GET["final"];
	
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
<body class="container-fluid" ng-controller="listagemIndexControl" onload="$(layer).scrollTop(sessionStorage.a);">

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
			$id_visita1[$conta8] = $row9["id"];
			echo '"' . $id_visita1[$conta8] . '", ';  		
			$conta9++;
}
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

 </div>
  


  <div id="apDiv14c">
 
  <div id="layer">
	  
  <div class="div" id="div" name="div">
  <br><br>
	<br><br><br><br>
	<form id="reordenar_pedido" action="step4_order.php" method="POST">
	<textarea id="ordem_entregas" name="ordem_entregas" rows="4" cols="50" hidden="hidden"></textarea>
	
	</form>
	
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-bottom: 8px; width:100%" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="color:#000000;">
            <strong><font size="4">&nbsp;RESUMO DAS ROTAS</font></strong>
		
			</td>
			<td style="width: 30px;">
				
<form action="scripts.php?acao=reordenar_rotas" id="reordenar" name='reordenar' method="post">
<textarea name="xxx" rows="3" id="xxx" hidden="hidden"></textarea>
<textarea name="yyy" rows="3" id="yyy" hidden="hidden"></textarea>
<textarea name="zzz" rows="3" id="zzz" hidden="hidden"></textarea>
<textarea name="qqq" rows="3" id="qqq"  hidden="hidden"></textarea>
<textarea name="kkk" rows="3" id="kkk" hidden="hidden" ></textarea>
<textarea name="www" rows="3" id="www" hidden="hidden"></textarea>
<textarea name="eee" rows="3" id="eee" hidden="hidden"></textarea>
<textarea name="ultimao" rows="3" id="ultimao" hidden="hidden"></textarea>
<textarea name="ultimao_2" rows="3" id="ultimao_2" hidden="hidden"></textarea>
<textarea name="ultimao_3" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="id_visita" rows="3" id="ultimao_3" hidden="hidden"></textarea>
<textarea name="inicio" rows="3" id="inicio"  hidden></textarea>
<textarea name="final" rows="3" id="final" hidden></textarea>


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


<?php

$query_q = "select nome_veiculo, SUM(peso) AS peso_total, SUM(volume) AS volume_total, SUM(valor) AS valor_total, reordenar from rotas group by nome_veiculo order by nome_veiculo ASC";

$rs_q = mysql_query($query_q);

while($row_q = mysql_fetch_array($rs_q)){

$automovel = $row_q["nome_veiculo"];

$id_automovel = $row_q["id"];

$total = mysql_num_rows($produtos);

$peso_total = $row_q["peso_total"];
$volume_total = $row_q["volume_total"];
$valor_total = $row_q["valor_total"];

$reordenar_verifica = $row_q["reordenar"];



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
?>

<table border="1" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 580px">
  <tbody>
    <tr height="50px">
     <td  align="left" width="100%" style="font-weight:bold;background-color: #ECECEC" colspan="11"><font color="#000000" size="3">
		 
	 <p style="color:black"> <img src="<?php echo $concatena_carro;  ?>" width="20px" height="17px"> &nbsp;<?php echo $automovel; ?></p></font>
		
	</td>

     </tr>

  </tbody>
</table>
<table " border="1" cellspacing="0" cellpadding="0" style="width: 580px;height:5px;border-color: <?php echo $cor ?>;" >
  <tbody>
    <tr >
     <td  align="left" width="100%" style="font-weight:bold;background-color: <?php echo $cor ?>;" colspan="5"><font color="#000000" size="3">
	
	</td>
     </tr>

  </tbody>
</table>


<?php


$query = "select * from rotas where nome_veiculo = '$automovel' ORDER BY nome_rota, ordem ASC";
$rs = mysql_query($query);
$conta = 0;
//$lista_cores_tabela = ["#FFF000", "#edfddd", "#edfdff", "#FFF000"];


  
$num_rows = mysql_num_rows($rs);
?>
  
	  
  
<table border='0.5' cellpadding="0" cellspacing="0" height="40px" style=" border-color: #d3d5d6;background-color: #ECECEC;color: black;font-weight: bold;width: 580px;" class="bordasimples">
          <tr>      
         	   <td width="15px" nowrap      align="left"></td>		
			   <td width="40px" nowrap     align="left">PEDIDO</td>
			   <td width="40px" nowrap     align="left">COD.CLI</td>	 
			   <td width="70px" nowrap    >CLIENTE</td>
			   <td width="70px" nowrap    >ENDEREÇO</td>
			   <td width="40px" nowrap     align="left">BAIRRO</td>
			   <td width="40px" nowrap    >CIDADE</td> 	
			   <td width="40px"nowrap     align="left">TEMPO</td>
			   <td width="30px" nowrap     align="left">DIST.</td> 
			   <td width="40px" nowrap     align="left">OBS.</td>
			   <td width="10px" nowrap     align="left"></td>  
				</tr>
             </table>
                
			



<div id="msg"></div>

<div id="<?php echo $automovel ?>" class="list-group">
<?php
$id_cliente= array();
$dist =0;
$tempo_t=0;
$soma_dist=0;

while($row = mysql_fetch_array($rs)){

	$conta = $conta + 1;
	$ordemvazia = $row["ordem"];
	$nome_carro = $row["nome_rota"];
	$veiculo_qual = $row["veiculo"];
	$center_lat1 = $row["lat"];
	$center_lng1 = $row["lgn"];
	$id_primary =  $row["id"];

//ABREVIANDO///////
$max = 10;
$max1 = 23;
$max2 = 7;
$max3 = 9;
$max4 = 17;
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
	        
	<table border=0.5 cellpadding="0" cellspacing="0" class="bordasimples" style="width: 580px;">
        <tr>					
				<td width="15px" nowrap><strong><?php echo  substr_replace($row['ordem'], (strlen($row['ordem']) > $max6 ? '' : ''), $max6);  ?></strong></td>						
				<td width="40px" nowrap ><?php echo substr_replace($row['codigo_pedido'], (strlen($row['codigo_pedido']) > $max2 ? '...' : ''), $max2); ?></td>	
				<td width="40px" nowrap><?php echo  substr_replace($row['codigo_cliente'], (strlen($row['codigo_cliente']) > $max2 ? '...' : ''), $max2);  ?></td>
				<td width="70px" nowrap title="<?php echo $row['nome_cliente']  ?>"> <?php echo  substr_replace($row['nome_cliente'], (strlen($row['nome_cliente']) > $max ? '...' : ''), $max);  ?></td>
				<td width="70px" nowrap title="<?php echo $row['endereco']  ?>"> <?php echo substr_replace($row['endereco'], (strlen($row['endereco']) > $max ? '...' : ''), $max); ?></td>
				<td width="40px" nowrap title="<?php echo $row['bairro']  ?>" ><?php echo substr_replace($row['bairro'], (strlen($row['bairro']) > $max5 ? '...' : ''), $max5); ?></td>
                <td width="40px" nowrap title="<?php echo $row['cidade']  ?>"><?php echo substr_replace($row['cidade'], (strlen($row['cidade']) > $max5 ? '...' : ''), $max5); ?></td> 			
        		<td width="40px" nowrap  >
<?php
if($reordenar_verifica==1){
	echo "<font color='#CC0000'>" . substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max) . "</font>";
} else {
	echo substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max);
}	
?>
				</td>
				<td width="30px" nowrap >
					


<?php
if($reordenar_verifica==1){
	echo "<font color='#CC0000'>" . substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2) . "</font>";
} else {
	 echo substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2); 
}	

					$soma_dist = $soma_dist + $row['distancia'];
				?>	

				</td>	
				<td width="40px" nowrap  title="<?php echo $row['obs_pedido']  ?>"><?php echo substr_replace($row['obs_pedido'], (strlen($row['obs_pedido']) > $max5 ? '...' : ''), $max5); ?></td>   
				<td width="10px" nowrap  title="Zoom">
				<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $row["lat"]; ?>,<?php echo $row["lgn"]-0.10; ?>));map.setZoom(13);infobox(<?php echo $row["lat"]; ?>, <?php echo $row["lgn"]; ?>, '<?php echo $row['nome_cliente']; ?>');"><i class="material-icons" style="font-size:10px;color:black">my_location</i></a>
				</td>   
		
			</tr>
        </table>
               
	</div>


  

<?php

  }

?>
  </div>
  
<?php
$soma_retorno = $dist - $soma_dist;
?>
<br><br>
<table width="630px" border="0" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 580px;">
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

<table width="630px" border="0" cellspacing="2" cellpadding="2" class="bordasimples" style="width: 580px;">
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

<input type="submit" name="submit" id="submit" value="RECALCULAR" onClick="alerta();"/>  
<?php
}

?>




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


<div id="div16"></div>

	

   
</div>



 







 
<!-- Arquivo de inicialização do mapa -->
<script src="<?php echo $muda_javascript; ?>"></script>


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