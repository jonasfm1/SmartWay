<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv_3.css">
<link rel="stylesheet" type="text/css" href="css/step3_novao.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="js/jquery.dragtable.js"></script>


  <script src="js/logger.js"></script>
  <link rel="stylesheet" type="text/css" href="css/dragtable.css" />

<!-- Tablesorter: theme -->
<link class="theme" rel="stylesheet" href="css/theme.blue.css">
<link rel="stylesheet" href="css/dragtable.mod.css">

<!-- Tablesorter script: required -->
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>
<script src="js/extras/jquery.dragtable.mod.js"></script>


<?php
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>

<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/flutuante.js"></script>


<?php



$posx = $_GET["posx1"];
$posy = $_GET["posy1"];

$controle_nav = $_GET["control"];



if($posx==0 AND $posy==0){
	$posx= 5;
	$posy= 0;	
}

	$posx_tools= 0;
	$posy_tools= 0;	


	//MENU LAYERS
	$posx_layers= 204;
	$posy_layers= 44;	



	$posx_filtro= 204;
	$posy_filtro= 0;	


	$posx_filtro_setor= 402;
	$posy_filtro_setor= 0;

		//MENU DIA
		$posx_dia= 600;
		$posy_dia= 0;


		//MENU TRANSPORTADORA
		$posx_transp= 798;
		$posy_transp= 0;

				//MENU TRANSPORTADORA
				$posx_placa= 994;
				$posy_placa= 0;
?>


<script LANGUAGE="JavaScript">


function local_novo() {
	
	document.getElementById("Pagina_loc_novo").style.display = "block";
	
var teste = "step3_newloc.php?";

var form = document.getElementById("frm");

var radios = $("input[name='loc_nova[]']:checked:visible");
var engine = "";
var array_check = [];

for (var i=0; i < radios.length; i++) {
 if (radios[i].checked) {
     engine = "check_list%5B%5D=" + radios[i].value + "&";
     array_check.push(engine);
    teste = teste + engine;
     //break;
 }


}
	
document.getElementById("pag1_loc_novo").src = teste;


}


function mostraDIVa(){

document.getElementById("Paginaa").style.display = "block";

var zoom2 = document.getElementById("zoom2").value;
var zoom_x2 = document.getElementById("zoom_x2").value;

var posX = document.getElementById("posX").value;
var posY = document.getElementById("posY").value;

var posX_tools = document.getElementById("posX_tools").value;
var posY_tools = document.getElementById("posY_tools").value;

var posX_layers = document.getElementById("posX_layers").value;
var posY_layers = document.getElementById("posY_layers").value;

var pesox = document.getElementById("pesox").value;
var volumex = document.getElementById("volumex").value;
var valorx = document.getElementById("valorx").value;

var equipe_poligonox = document.getElementById("equipe_poligonox").value;
var veiculo_tirax = document.getElementById("veiculo_tirax").value;
var peso_veiculo_tirax = document.getElementById("peso_veiculo_tirax").value;

var volume_veiculo_tirax = document.getElementById("volume_veiculo_tirax").value;
var valor_veiculo_tirax = document.getElementById("valor_veiculo_tirax").value;
var endereco_clientex = document.getElementById("endereco_clientex").value;


var peso2x = document.getElementById("peso2x").value;
var volume2x = document.getElementById("volume2x").value;
var valor2x = document.getElementById("valor2x").value;


var teste = "escolher_veiculo_new.php?pesox=" + pesox + "&volumex=" + volumex + "&valorx=" + valorx + "&zoom2=" + zoom2 + "&zoom_x2=" + zoom_x2 + "&posX=" + posX + "&posY=" + posY + "&posX_tools=" + posX_tools + "&posY_tools=" + posY_tools + "&posX_layers=" + posX_layers + "&posY_layers=" + posY_layers + "&equipe_poligonox="+ equipe_poligonox + "&veiculo_tirax=" + veiculo_tirax + "&peso_veiculo_tirax=" + peso_veiculo_tirax + "&volume_veiculo_tirax=" + volume_veiculo_tirax + "&valor_veiculo_tirax=" + valor_veiculo_tirax + "&endereco_clientex=" + endereco_clientex;


document.getElementById("pag1x").src = teste;

	}	
	
	
function block() {

document.getElementById("block").style.display = "block";

var teste = "step3_block.php";

document.getElementById("pag1_block").src = teste; 

}

	
function editar(campo) {

document.getElementById("editar").style.display = "block";

var teste = "step3_editar.php?codigo=" + campo;

document.getElementById("pag1_editar").src = teste; 


}


function geo(campo) {


document.getElementById("geo").style.display = "block";

var teste = "step3_gm.php?id=" + campo;

document.getElementById("pag1_geo").src = teste; 


}

	

function mostraDIVb(){

document.getElementById("Paginab").style.display = "block";

var zoom = document.getElementById("zoom").value;
var zoom_x = document.getElementById("zoom_x").value;

var posX_1 = document.getElementById("posX_1").value;
var posY_1 = document.getElementById("posY_1").value;
var posX_tools1 = document.getElementById("posX_tools1").value;
var posY_tools1 = document.getElementById("posY_tools1").value;
var posX_layers1 = document.getElementById("posX_layers1").value;
var posY_layers1 = document.getElementById("posY_layers1").value;




var teste = "escolher_veiculo.php?" + "zoom=" + zoom + "&zoom_x=" + zoom_x + "&posX_1=" + posX_1 + "&posY_1=" + posY_1 + "&posX_tools1=" + posX_tools1 + "&posY_tools1=" + posY_tools1 + "&posX_layers1=" + posX_layers1 + "%posY_layers1=" + posY_layers1;


document.getElementById("pag1y").src = teste;

	}	



$(document).ready(function(){
  var elementOffset = $('#apDiv14c').offset({top:<?php echo $posy ?>,left:<?php echo $posx ?>});

  var checkboxes = $("#mySidenav input:checkbox");


	checkboxes.prop('checked', false);


});

$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable2').offset({top:<?php echo $posy_filtro ?>,left:<?php echo $posx_filtro ?>});
});


$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable4').offset({top:<?php echo $posy_filtro_setor ?>,left:<?php echo $posx_filtro_setor ?>});
});

$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable7').offset({top:<?php echo $posy_dia ?>,left:<?php echo $posx_dia ?>});
});


$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable_transp').offset({top:<?php echo $posy_transp ?>,left:<?php echo $posx_transp ?>});
});

$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable_placa').offset({top:<?php echo $posy_placa ?>,left:<?php echo $posx_placa ?>});
});

//alert(document.documentElement.clientWidth);

<?php 
if ($posy_tools!= 0 AND $posx_tools!= 0){
?>
$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable1').offset({top:<?php echo $posy_tools ?>,left:<?php echo $posx_tools ?>});
});
<?php
} else {
?>
troca_left = document.documentElement.clientWidth - 63;

$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable1').offset({top:40,left:troca_left});
});
	
<?php	
}
?>
$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable').offset({top:<?php echo $posy_layers ?>,left:<?php echo $posx_layers ?>});
});


// TOOLS /////////////////////////////////
$(init1);

function init1() {
	
  $('#makeMeDraggable1').draggable( {
	   drag: function(){
            var offset = $(this).offset();
            var xPos_tools = offset.left;
            var yPos_tools = offset.top;			
			document.getElementById("posX_tools").value = xPos_tools;
			document.getElementById("posY_tools").value = yPos_tools;
			
			document.getElementById("posX_tools2").value = xPos_tools;
			document.getElementById("posY_tools2").value = yPos_tools;		
			
        },		
    	containment: '#content',
    	cursor: 'move',
		scroll: false,
    	snap: '#content'
  });

}


// VEICULO ESCOLHIDO /////////////////////////////////



var previousPosition;
function savePosition(map, z) {
  previousPosition = map.getCenter();
  
  document.getElementById("zoom").value = previousPosition;
  document.getElementById("zoom_x").value = z;
  //alert(previousPosition);
}
function savePosition1(map, z) {
  previousPosition = map.getCenter();
  
  document.getElementById("zoom1").value = previousPosition;
  document.getElementById("zoom_x1").value = z;
  //alert(previousPosition);
}
function savePosition2(map, z) {
  previousPosition = map.getCenter();
  
  document.getElementById("zoom2").value = previousPosition;
  document.getElementById("zoom_x2").value = z;
  //alert(previousPosition);
}
function savePosition3(map, z) {
  previousPosition = map.getCenter();
  
  document.getElementById("zoom3").value = previousPosition;
  document.getElementById("zoom_x3").value = z;
  //alert(previousPosition);
}


window.mapapiloaded = function () {
        console.log('$.ajax done: use google.maps');
        createusinggmaps();
    };

    $.ajax({
        url: 'http://maps.google.com/-maps/api/js?v=3.2&sensor=true&region=it&async=2&callback=mapapiloaded',
        dataType: 'script',
        timeout: 5000, 
        success: function () {
            console.log('$.ajax progress: waiting for mapapiloaded callback');
        },
        error: function () {
            console.log('$.ajax fail: use osm instead of google.maps');
            createusingosm();
        }
    });


function confirmavolta(aURL) {

//if(confirm('Você tem certeza que deseja voltar ao Passo 2? Todos os veículos perderam os agrupamentos de clientes!')) {

location.href = aURL;

//target=ver;

//}

}


function confirmaExclusao2(aURL) {

if(confirm('Você tem certeza que deseja excluir esse pedido do Sistema?')) {

location.href = aURL;

//target=ver;

}

}


function confirmaExclusao1(aURL) {

if(confirm('Você tem certeza que deseja excluir todas as visitas de todos os veículos?')) {

location.href = aURL;

//target=ver;

}

}

function confirmaExclusao_soveiculo(aURL) {


mapZoom=map.getZoom();
//alert(mapZoom); 
savePosition(map, mapZoom);


if(confirm('Você tem certeza que deseja excluir todas as visitas do veículo selecionado?')) {

location.href = aURL;

//target=ver;

}

}


var styles = [
	{
		"featureType": "landscape",
		"stylers": [
			{
				"hue": "#767676"
			},
			{
				"saturation": -100
			},
			{
				"lightness": 0
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
				"hue": "#5f3902"
			}
			
			
			
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#5f3902"
			}
		
		]
	},
	
	{
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "100"
            },
            {
                "lightness": "-14"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "lightness": "12"
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

	function alerta(){
		var conta_volta=0
		
		for (var m = 0; m < veiculo_js.length; ++m) {
			if(veiculo_js[m]==null){
				conta_volta = conta_volta+ 1;	
			}
			if(conta_volta == veiculo_js.length){
			//apDiv17_poligono.style.visibility= 'hidden' ;
			alert("Selecione um veiculo e agrupe os clientes com a ferramento Polígono!");
			
			return false;
			} else {
			
			//apDiv17_poligono.style.visibility= 'visible' ; 	
			}
	
		}
		
	}
	
	function mostraDIV(){
		document.getElementById("Pagina").style.display = "block";
		mapZoom=map.getZoom();
		 //alert(mapZoom); 
		savePosition(map, mapZoom);
		
            var offset_01 = $("#makeMeDraggable").offset();
            var xPos_layers_01 = offset_01.left;
			var yPos_layers_01 = offset_01.top;
			document.getElementById("posX_layers1").value = xPos_layers_01;
			document.getElementById("posY_layers1").value = yPos_layers_01;
	
			
			var offset_02 = $("#makeMeDraggable1").offset();
            var xPos_tools_01 = offset_02.left;
			var yPos_tools_01 = offset_02.top;
			document.getElementById("posX_tools1").value = xPos_tools_01;
			document.getElementById("posY_tools1").value = yPos_tools_01;
			
			var offset_03 = $("#apDiv14c").offset();
            var xPos_01 = offset_03.left;
			var yPos_01 = offset_03.top;
			document.getElementById("posX_1").value = xPos_01;
			document.getElementById("posY_1").value = yPos_01;


	}
	

	   
(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container1").waiting({modo:"slow"});
});



</SCRIPT>
<?php 

$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}



//  CONTROLE PASSO  //////////////////////////////////////////////////////////
$query_where = "UPDATE passo SET ok='yes' WHERE (id='1' OR id='2' OR id='3')";
$rs_where = mysql_query($query_where);
//  CONTROLE PASSO  //////////////////////////////////////////////////////////

$zoom1 = $_GET["zoom"];
$zoom1 = str_replace("(","", $zoom1);
$zoom1 = str_replace(")","", $zoom1);

$zoom2 = $_GET["z"];

//echo $zoom2;

//////////////////////////////////
$query1 = "select * from veiculos where roteirizado!='sim'";														
$rs1 = mysql_query($query1);
$mrk_cnt1 = 0;
$mkt_conta_veiculos_ativos= 0;
//////////////////////////////////
	while($row1 = mysql_fetch_array($rs1)){

	$equipe[$mrk_cnt1] = $row1["equipe"];
	$equipe_id[$mrk_cnt1] = $row1["equipe_id"];
	$type_icon[$mrk_cnt1]  = $row1["type_icon"];
	$poligono[$mrk_cnt1]  = $row1["poligono"];
	$nome1[$mrk_cnt1] = $row1["nome"];
	$tipo[$mrk_cnt1] = $row1["tipo"];
	$type_icone[$mrk_cnt1] = $row1["type_icon"];
	$id_veiculo[$mrk_cnt1] = $row1["id"];
	$peso_inicial[$mrk_cnt1] = $row1["peso"];
	$volume_inicial[$mrk_cnt1] = $row1["volume"];
	$valor_inicial[$mrk_cnt1] = $row1["valor"];

	$icone_veiculo[$mrk_cnt1] = $tipo[$mrk_cnt1] . "_" . $type_icon[$mrk_cnt1]  .  ".png";
	$tamanha_array_icon = count($type_icon);
	
	//////////////////////////////////
	if ($equipe[$mrk_cnt1]=="yes"){
		$iparr = split ("\,", $equipe_id[$mrk_cnt1]);
		$tamanha_array = count($iparr);		
		$mkt_conta_veiculos_ativos++;
	}		
	
	//echo $mkt_conta_veiculos_ativos;	
	$mrk_cnt1++; 
	//echo ($mrk_cnt1);

	}

////////QUANDO VOLTA VEICULOS////////////////

$veiculo1 = $_GET["nome"];
$peso1 = $_GET["peso"];
$tipo1 = $_GET["tipo"];
$volume1 = $_GET["volume"];
$valor1 = $_GET["valor"];
$id1 = $_GET["id"];
$result_peso = $_GET["result_peso"];
$result_volume = $_GET["result_volume"];
$result_valor = $_GET["result_valor"];
$porc_peso = $_GET["porc_peso"];
$porc_volume = $_GET["porc_volume"];
$porc_valor = $_GET["porc_valor"];
$cor_veiculo_resgate = $_GET["corveiculo"];
$peso_resgate = $_GET["peso"];
$volume_resgate = $_GET["volume"];
$valor_resgate = $_GET["valor"];
$numero_resgate = $_GET["numero"];
$numero_resgate_visitas = $_GET["numero_visitas"];

?>


<?php

//SESSOES

$_SESSION["urlred"] = $_SERVER["REQUEST_URI"];


if(!empty($_POST['classificacao'])){
	$_SESSION['classificacao'] = $_POST['classificacao'];
}

if(!empty($_POST['regiao_itabom'])){
	$_SESSION['regiao_itabom'] = $_POST['regiao_itabom'];
}


if(!empty($_POST['dia'])){
	$_SESSION['dia'] = $_POST['dia'];
}

if(!empty($_POST['transportadora'])){
	$_SESSION['transportadora'] = $_POST['transportadora'];
}
$segura_transp = $_SESSION['transportadora'];

if(!empty($_POST['veiculos'])){
	$_SESSION['veiculos'] = $_POST['veiculos'];
}

$segura_veiculo = $_SESSION['veiculos'];

// PLACAS

if(!empty($_SESSION['veiculos']) && count($_SESSION['veiculos']) ){

	$campo0 = $_SESSION["veiculos"];
	$string0 = '"' . implode('","', $campo0) . '"';
	
}else{
	$string0="";
}

if($string0==""){
    $completa1 = "";
} else {

	if(preg_match('/outros/i', $string0)){
		$string0 = $string0 . '," "';
		
	}
	
	$conta_campos = count($campo0);

	$completa1 = " AND ";

	for ($i = 0; $i < $conta_campos; $i++) {
 			if($conta_campos==1){

				$completa1 = " AND quais_veiculos" .   " LIKE ('%$campo0[$i]%')";
				//$completa4 .= ")";
 			} else {

				if($i == ($conta_campos-1)){

					$completa1 .=  "quais_veiculos" . " LIKE ('%$campo0[$i]%')";
				} else {
					$completa1 .=  "quais_veiculos" . " LIKE ('%$campo0[$i]%') AND ";

				}
				
				
			}

			
		
		//$completa3 .= " AND " . $campo0[$i] . "='1'";

	}

	//echo $completa4;

    
}



// TRANSPORATDORA

if(!empty($_SESSION['transportadora']) && count($_SESSION['transportadora']) ){

	$campo0 = $_SESSION["transportadora"];
	$string0 = '"' . implode('","', $campo0) . '"';
	
}else{
	$string0="";
}

if($string0==""){
    $completa4 = "";
} else {

	if(preg_match('/outros/i', $string0)){
		$string0 = $string0 . '," "';
		
	}
	
	$conta_campos = count($campo0);

	$completa4 = " AND ";

	for ($i = 0; $i < $conta_campos; $i++) {
 			if($conta_campos==1){

				$completa4 = " AND transportadoras" .   " LIKE ('%$campo0[$i]%')";
				//$completa4 .= ")";
 			} else {

				if($i == ($conta_campos-1)){

					$completa4 .=  "transportadoras" . " LIKE ('%$campo0[$i]%')";
				} else {
					$completa4 .=  "transportadoras" . " LIKE ('%$campo0[$i]%') AND ";

				}
				
				
			}

			
		
		//$completa3 .= " AND " . $campo0[$i] . "='1'";

	}

	//echo $completa4;

    
}


// DIA

if(!empty($_SESSION['dia']) && count($_SESSION['dia']) ){

	$campo0 = $_SESSION["dia"];
	$string0 = '"' . implode('","', $campo0) . '"';
	
}else{
	$string0="";
}

if($string0==""){
    $completa3 = "";
} else {

	if(preg_match('/outros/i', $string0)){
		$string0 = $string0 . '," "';
		
	}
	
	$conta_campos = count($campo0);

	$completa3 = " AND (";

	for ($i = 0; $i < $conta_campos; $i++) {
 			if($conta_campos==1){

				$completa3 = " AND ( " . $campo0[$i] . "='1'";
				$completa3 .= ")";
 			} else {

				if($i == ($conta_campos-1)){

					$completa3 .=  $campo0[$i] . "='1' )";
				} else {
					$completa3 .=  $campo0[$i] . "='1' OR ";

				}
				
				
			}

			
		
		//$completa3 .= " AND " . $campo0[$i] . "='1'";

	}

//	echo $completa3;

    
}


// regiao_itabom

if(!empty($_SESSION['regiao_itabom']) && count($_SESSION['regiao_itabom']) ){

	
	$campo0 = $_SESSION["regiao_itabom"];
	$string0 = '"' . implode('","', $campo0) . '"';
	
}else{
	$string0="";
}

if($string0==""){
    $completa2 = "";
} else {

	if(preg_match('/outros/i', $string0)){
		$string0 = $string0 . '," "';
		
	}
    $completa2 = " AND regiao_itabom in($string0) ";
}



// CLASSIFICACAO

if(!empty($_SESSION['classificacao']) && count($_SESSION['classificacao']) ){

	$campo0 = $_SESSION["classificacao"];
	$string0 = '"' . implode('","', $campo0) . '"';
	
}else{
	$string0="";
}

if($string0==""){
    $completa0 = "";
} else {

	if(preg_match('/outros/i', $string0)){
		$string0 = $string0 . '," "';
		
	}
    $completa0 = " AND classificacao in($string0) ";
}

//////////////////////////////////

$query ="SELECT * FROM clientes WHERE roteirizado!='sim' AND ativo=0" . $completa0 . $completa1 . $completa2 . $completa3  .  $completa4 . " order by codigo DESC";
$rs = mysql_query($query);

?>

<style>

  table.bordasimples1 {
	border-collapse: collapse;
	border-color: #ECECEC;

	font-size: 10px;

  
	
	}

  table.bordasimples1 tr {
	  border-color: #CCC;
	  
	}

table.bordasimples1 td {

font-size: 10px;
padding-left: 10px;
text-align: left;

}

#fechar {
	position: absolute;
	left: 210px;
	top: 50px;
	width: 10px;
	height: 10px;
	z-index: 99999;

	}

</style>





<body>



<div id="capaefectos" name="capaefectos" style="background-color: #FFFF;" hidden>
<hr style="border: none; width:100%; height: 35px" color="#2867b1">

<div name="view" id="view">
<br>

<div name="table_pedidos" id="table_pedidos">
<table border="1" class="bordasimples1" style="width:200px;" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#ECECEC" height="34" style="color:#000000;" > 
<font color="#000000"><strong><span>PEDIDO</strong></font>
</td>
<td bgcolor="#ECECEC" height="34" style="color:#000000;" > 
<font color="#000000"><i class="material-icons" style="font-size:13px">location_on</i></font>
</td>
</tr>

<?php
$query1 = "select * from clientes where data_agendado!='0000-00-00' AND roteirizado!='sim' AND ativo=0" . $completa0 . $completa1 . $completa2 . $completa3.  $completa4;															
$rs1 = mysql_query($query1);

$hoje = date('Y-m-d');

while($row1 = mysql_fetch_array($rs1)){	
    $cod_pedido = $row1["codigo_pedido"];
    $data_agenda = $row1["data_agendado"];
    $lat = $row1["latitude_cad"];
    $lgn = $row1["longitude_cad"];

	$nome_cliente = $row1["nome"];
?>


<?php
if($data_agenda==$hoje){
    ?>
<tr>
<td  style="color:#000000; width:80%" > 

    <?php
    echo $cod_pedido;
    ?>

</td>
<td style="color:#000000; " > 

<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lgn; ?>));map.setZoom(15);infobox(<?php echo $lat; ?>, <?php echo $lgn; ?>, '<?php echo 'Pedido:'. $cod_pedido . " - " . $nome_cliente; ?>');tempofora();"><i class="material-icons" style="font-size:14px">search</i></a>

</td>
</tr>

    <?php
} 

?>



<?php
}
?>

</table>  
</div>

</div>
<br><br>



</div>


<div id="fechar" name="fechar">
<a href="#" id="ocultar"><i class="material-icons" style="font-size:20px; color:#FFF">cancel</i></a>
</div>

<?php
$mrk_cnt = 0;
$conta_orfans=0;
$conta_ocupado=0;	
$_conta_faltando_peso=0;												
//////////CLIENTES///////////




while($row = mysql_fetch_array($rs)){
	$lat_cad[$mrk_cnt] = $row["latitude_cad"];
	$lng_cad[$mrk_cnt] = $row["longitude_cad"];
	$confianca_cad[$mrk_cnt] = $row["confianca_cad"];
	$nome[$mrk_cnt] = $row["nome"];
	$peso[$mrk_cnt] = $row["peso"];
	$volume[$mrk_cnt] = $row["volume"];
	$valor[$mrk_cnt] = $row["valor"];
	$id_cliente[$mrk_cnt] = $row["codigo_cliente"];
	$veiculo[$mrk_cnt] = $row["veiculo"];
	$setor[$mrk_cnt] = $row["regiao_itabom"];
	$gsetor[$mrk_cnt] = $row["setor_grupo"];
	$endereco_cli[$mrk_cnt] = $row["codigo"];
	$endereco_cli_mesmo[$mrk_cnt] = $row["endereco"];	
	$end_menor[$mrk_cnt] = mb_strimwidth($row["endereco"], 0, 50, "..."); 
	$bairro[$mrk_cnt] = $row["bairro"];
	$cidade[$mrk_cnt] = $row["cidade"];
	$premium[$mrk_cnt] = $row["premium"];	
	$codigo_pedido[$mrk_cnt] = $row["codigo_pedido"];	
	$obs_pedido[$mrk_cnt] = $row["obs_pedido"];	
	$obs_pedido1[$mrk_cnt] = mb_strimwidth($row["obs_pedido"], 0, 50, "..."); 
	$ocupado[$mrk_cnt] = $row["veiculo"];

	$classificacao[$mrk_cnt]=$row["classificacao"];

	$cep[$mrk_cnt]=$row["cep"];

	

	$data_mysql = explode('-', $row["data_agendado"]);


$day   = $data_mysql[2];
$month = $data_mysql[0];
$year  = $data_mysql[1];

$data_formatada = $data_mysql[2] . '-' . $data_mysql[1] . '-' . $data_mysql[0];
$data_agendado[$mrk_cnt] = $data_formatada;

	$obs_agendado[$mrk_cnt] = $row["obs_agendado"];
	$obs_agendado_title[$mrk_cnt] = mb_strimwidth($row["obs_agendado"], 0, 50, "..."); 

	$setor[$mrk_cnt] = $row["regiao_itabom"];

	//echo $endereco_cli[$mrk_cnt];
	if($veiculo[$mrk_cnt]==NULL){
		$conta_orfans++;
		$_conta_faltando_peso+=$peso[$mrk_cnt];
	}

		if($ocupado[$mrk_cnt]!=""){
		$conta_ocupado++;
		$soma_peso += $peso[$mrk_cnt];
		$soma_volume += $volume[$mrk_cnt];
		$soma_valor += $valor[$mrk_cnt];

		}

	//////////////////////////////////
	//////////////////////////////////
	$mrk_cnt++; 

}

//////////////////////////////////
?>

<script type="text/javascript">

zoom_js = <?php echo json_encode($zoom1) ?>;
zoom_js_x = <?php echo json_encode($zoom2) ?>;
zoom_js_x = parseInt(zoom_js_x);
novoArray =[];
novoArray = zoom_js.split(',');
//alert (novoArray[0]);
lat_js = <?php echo json_encode($lat_cad) ?>;
lng_js = <?php echo json_encode($lng_cad) ?>;
nome_js = <?php echo json_encode($nome) ?>;
peso_js = <?php echo json_encode($peso) ?>;
setor_js = <?php echo json_encode($setor) ?>;
volume_js = <?php echo json_encode($volume) ?>;
valor_js = <?php echo json_encode($valor) ?>;
id_cliente_js = <?php echo json_encode($id_cliente) ?>;
veiculo_js = <?php echo json_encode($veiculo) ?>;
poligono_js = <?php echo json_encode($poligono) ?>;
endereco_js = <?php echo json_encode($endereco_cli) ?>;
premium_js = <?php echo json_encode($premium) ?>;
obs_js = <?php echo json_encode($obs_pedido) ?>;
codigo_pedido_js = <?php echo json_encode($codigo_pedido) ?>;
classifica_js = <?php echo json_encode($classificacao) ?>;
cep_js = <?php echo json_encode($cep) ?>;
///////// Vindo do select Veiculo
id_icon = <?php echo json_encode($id1) ?>;
type_icon = <?php echo json_encode($cor_veiculo_resgate) ?>;
tipo = <?php echo json_encode($tipo1) ?>;

peso_resgate = <?php echo json_encode($peso_resgate) ?>;
volume_resgate = <?php echo json_encode($volume_resgate) ?>;
valor_resgate = <?php echo json_encode($valor_resgate) ?>;
numero_resgate = <?php echo json_encode($numero_resgate) ?>;
numero_resgate_visitas = <?php echo json_encode($numero_resgate_visitas) ?>;

/////////
equipe_tabela_veiculos = <?php echo json_encode($equipe_id) ?>;
nomes_veiculos = <?php echo json_encode($nome1) ?>;
poligono_tabela_veiculos = <?php echo json_encode($poligono) ?>;
tipo_tabela_veiculos = <?php echo json_encode($tipo) ?>;

type_icon_tabela_veiculos = <?php echo json_encode($type_icone) ?>;
equipe_yes_tabela_veiculos = <?php echo json_encode($equipe) ?>;
id_tabela_veiculos = <?php echo json_encode($id_veiculo) ?>;
peso_inicial = <?php echo json_encode($peso_inicial) ?>;
volume_inicial = <?php echo json_encode($volume_inicial) ?>;
valor_inicial = <?php echo json_encode($valor_inicial) ?>;

	  var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF'];
      var selectedColor;
      var colorButtons = {};

      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
         // selectedShape = null;
        }
      }

      function setSelection(shape) {
       // clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function deleteSelectedShape() {
       // if (selectedShape) {
          selectedShape.setMap(null);
		 
		  
		//  return false;
	    //location.reload(); 
		//apDiv17a.style.visibility= 'hidden' ; 
		//apDiv17_poligono.style.visibility= 'visible' ; 
		
		document.getElementById('delete-button2').style.visibility = 'hidden';
		document.getElementById('criar_poligono').style.visibility = 'visible';
		
		
		  drawingManager.setOptions({ drawingControl: false }); 
     //  }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          
            selectedShape.set('fillColor', color);
         
        }
      }

 var layers=[];
	  
	
		
//////////////CONTROLE DE LAYERS ////////////////////////

function Applealert(i, s, x) {   

   
//s.checked = true;
   
if(s.checked == true)      
{  
  layers[i] = new google.maps.KmlLayer({
   		 url: x,
    	 map: map, preserveViewport: true 
  		 });	
  ///alert("Dentro");      
} 

if(s.checked == false)      
{  
  layers[i].setMap(null);    
//alert("Fora");      
}  

}  


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


//////////////CONTROLE DE LAYERS ////////////////////////


      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

      function buildColorPalette() {
         var colorPalette = document.getElementById('color-palette');
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
         selectColor(colors[0]);
       }
	 
		 
      function initialize() {
		// apDiv17a.style.visibility= 'hidden'; 
		// apDiv17.style.visibility= 'hidden';
		 
		 document.getElementById('delete-button2').style.visibility = 'hidden';
		 document.getElementById('mao_tool').style.visibility = 'hidden';
		 document.getElementById('delete_now').style.visibility = 'hidden';
	
		 
		 
		// apDiv17_orange.style.visibility= 'hidden'; 
		 
		 if ((id_icon == null) || (id_icon == "")) {
			//apDiv17_orange_volta.style.visibility= 'hidden';	
			 document.getElementById('volta_verde').style.visibility = 'hidden';
			 document.getElementById('delete_now').style.visibility = 'hidden';		
		} else {
			document.getElementById('volta_verde').style.visibility = 'visible';
			document.getElementById('delete_now').style.visibility = 'visible';
			//apDiv17_orange_volta.style.visibility= 'visible';
		}
	 
	 	if(novoArray[0]=='' || novoArray[1]==''){
		
		novoArray[0]=-23.214519678758165;
		novoArray[1]=-47.27577745856284;
		zoom_js_x = 9;
		}
	 
	 
       	  map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: zoom_js_x,
		  zoomControl: true,
		  zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.RIGHT_BOTTOM
                },
	
          center: new google.maps.LatLng(novoArray[0], novoArray[1]),
		  styles: styles,
		  disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }); 
	 
	/*  layers[0] = new google.maps.KmlLayer("http://187.84.234.155:8080/RO1.3/kml/grandesp_ok3.kmz",
  {
    preserveViewport: true
  });*/
  
  		
  layers_fixo = new google.maps.KmlLayer({
   		 url: 'http://www.caddsaas.com.br/SAAS/RO2.0/KMZ/sp_distrito_red.kmz',
    	 map: map, preserveViewport: true 
  		 });
 
	 	/* var ctaLayer = new google.maps.KmlLayer({
   		 url: 'http://187.84.234.155:8080/RO1.3/kml/grandesp_ok3.kmz',
    	 map: map, preserveViewport: true 
  		 });*/
		
		// savePosition(map);
        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true,
		  draggable: false,
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          polygonOptions: polyOptions,
		  map: map,
		  drawingControl: false,
  				drawingControlOptions: {
  					position: google.maps.ControlPosition.TOP_CENTER,
					drawingModes: [
					google.maps.drawing.OverlayType.POLYGON
					]
				},
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
			
            if (e.type != google.maps.drawing.OverlayType.MARKER) {
			 //newShape.setMap(null);
            // Switch back to non-drawing mode after drawing a shape.
			
            //drawingManager.setDrawingMode(null);
            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
            newShape = e.overlay;
            newShape.type = e.type;
			
            google.maps.event.addListener(newShape, "click", function() {
			
		    setSelection(newShape);
            } );	
            setSelection(newShape);
          } 
		 
   // polygon = new google.maps.Polygon({path:soma_poligono, clickable:true, editable: true, strokeWeight: 0, fillOpacity: 0.45,});
  //  newShape.setMap(map);
drawingManager.setOptions({
drawingControl: false

});
//apDiv17a.style.visibility= 'visible' ;
//apDiv17_mao.style.visibility= 'hidden' ;
apDiv17_marker.style.visibility= 'hidden' ;

document.getElementById('mao_tool').style.visibility = 'hidden';
document.getElementById('criar_poligono').style.visibility = 'hidden';
document.getElementById('delete-button2').style.visibility = 'visible';

		


drawingManager.setDrawingMode(null);
        });
		
        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
		
        buildColorPalette();
		
		///////contruindo pontos
	marker = [];
	mrktx = [];
	mrktXy = [];
	infowindow = [];
	
<?php
//SELECT * FROM cliente WHERE CPF IN (SELECT B.CPF FROM cliente B GROUP BY B.CPF HAVING COUNT(*) > 1)
//	$query_agrupar = "select * from clientes where codigo_cliente in(select B.codigo_cliente from clientes B group by B.codigo_cliente having count(*)>1)";
	$query_agrupar = "select *, COUNT(codigo_cliente) AS Qtd, SUM(peso) AS Qtd_peso, SUM(volume) AS Qtd_volume, SUM(valor) AS Qtd_valor from clientes where roteirizado!='sim' AND ativo=0 " . $completa0 . $completa1 . $completa2 . $completa3 .  $completa4 . "group by codigo_cliente having count(codigo_cliente)>1";
	$query_agrupar = mysql_query($query_agrupar);
	
	$iex=1000000000;

	while($row_x = mysql_fetch_array($query_agrupar)){
		$i_conta++;
		
		$icon_novo_nome[$iex] = $row_x["nome"];
		$icon_novo[$iex] = $row_x["codigo_cliente"];
		$icon_novo_lat[$iex] = $row_x["latitude_cad"];
		$icon_novo_lgn[$iex] = $row_x["longitude_cad"];
		$quanto = $row_x["Qtd"];
		$quanto_peso = $row_x["Qtd_peso"];
		$quanto_volume = $row_x["Qtd_volume"];
		$quanto_valor = $row_x["Qtd_valor"];
		
		//echo $icon_novo[$ie];
		echo "pointXy$iex = new google.maps.LatLng($icon_novo_lat[$iex],$icon_novo_lgn[$iex]);\n";	
    	echo "mrktxXy$iex = \"<div id='box_map'><h1><p id='legenda1'>$icon_novo_nome[$iex]</div>\";";
		echo "infowindowXy$iex = new google.maps.InfoWindow({content: mrktxXy$iex});\n";
    	echo "marker$iex = new google.maps.Marker({label:''+$quanto, position: pointXy$iex, map: map, title: ''+'$icon_novo_nome[$iex]'+' • PESO: '+$quanto_peso+' • VOLUME: '+$quanto_volume+' • VALOR: '+$quanto_valor , zIndex: 5200,  icon: 'imgs/alert_icon.png',});\n";
		//echo "marker$iex = nnew google.maps.MarkerImage('{{STATIC_URL}}img/icon-pin'+($iex)+'.png');\n";

		echo "google.maps.event.addListener(marker$iex,
         'click',  function() {
   		     infowindowXy$iex.open(map,marker$iex);
          });\n";
		
		$iex++;
		
	//	echo "aMapLabel = new MapLabel({text: '+$quanto, position: new google.maps.LatLng(pointXy$iex),strokeColor: '#000000', map: map, fontSize: 15, minZoom: 16,strokeWeight: 10, fillWeight: 5, zIndex: 5200,align: 'center'});\n";
		
	}
	
/////////PONTOS//////////////
$query_pontos = mysql_query("select * from pontos");														
$ie= 999999;
//////////////////////////////////
while($row = mysql_fetch_array($query_pontos)){
	
	$nome_cad_pontos[$ie] = $row["nome"];
	$lat_cad_pontos[$ie] = $row["latitude"];
	$lng_cad_pontos[$ie] = $row["longitude"];


	
		echo "pointX$ie = new google.maps.LatLng($lat_cad_pontos[$ie],$lng_cad_pontos[$ie]);\n";	
    	echo "mrktxX$ie = \"<div id='box_map'><h1><p id='legenda1'>$nome_cad_pontos[$ie]</div>\";";
        echo "infowindowX$ie = new google.maps.InfoWindow({content: mrktxX$ie});\n";
        // ICONE ESPECIAL DA SEDE
            //    if ($nome_cad_pontos[$ie]=='SEDE ECB'){
                    
                    echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$nome_cad_pontos[$ie]', icon: 'imgs/icon_start_cofig.png',});\n";
        //        } else {
                  //  echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$nome_cad_pontos[$ie]', icon: 'imgs/truckhome.png',});\n";
                    
        //        }
       // 
        
        
                
                echo "google.maps.event.addListener(marker$ie,
                 'click',  function() {
                        infowindowX$ie.open(map,marker$ie);
                  });\n";
                  
		  $ie++;
}


		$max = 40;
		$string_menor = array();
		

					
for ($i = 0; $i < $mrk_cnt; $i++){


		$string_menor[$i] = mb_strimwidth($nome[$i], 0, $max, "...");
	
		if($veiculo[$i] == NULL){
	
		if($premium[$i] !='' or $premium[$i] !="0" or $premium[$i]!=null ){

	
		echo "point$i = new google.maps.LatLng($lat_cad[$i],$lng_cad[$i]);\n";
		
    	echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i] - <strong>VOLUME:</strong> $volume[$i] - <strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$end_menor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_pedido[$i]'><strong>OBS.: </strong>$obs_pedido1[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$data_agendado[$i]'><strong>DATA AGENDADO: </strong>$data_agendado[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_agendado[$i]'><strong>OBS.AGENDADO: </strong>$obs_agendado_title[$i]</td></tr><tr><td></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$setor[$i]'><strong>REGIÃO: </strong>$setor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(codigo_pedido_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
		echo "infowindow$i = new google.maps.InfoWindow({content: mrktx$i});\n";
		////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
		echo "google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});\n";
	  	echo "google.maps.event.addListener(infowindow$i, 'domready', function() {\n";
		echo "var iwOuter = $('.gm-style-iw')\n";
		echo "var iwBackground = iwOuter.prev()\n";
		echo "iwBackground.children(':nth-child(2)').css({'display' : 'none'})\n";
   		echo "iwBackground.children(':nth-child(4)').css({'display' : 'none'})\n";
		echo "})\n";
		////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map,  label: {

		  }, title: '$nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i]• VALOR: $valor[$i] • OBS.: $obs_pedido[$i] • DATA INCLUSÃO: $classificacao[$i] • CEP: $cep[$i]', icon: 'imgs/$premium[$i].png',});\n";
		
		echo "google.maps.event.addListener(marker[$i],
         'click',  function() {
   		     infowindow$i.open(map,marker[$i]);
          });\n";

		  
			
		} else {
			
		echo "point$i = new google.maps.LatLng($lat_cad[$i],$lng_cad[$i]);\n";
		
    	
			
    	echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i] - <strong>VOLUME:</strong> $volume[$i] - <strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$end_menor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_pedido[$i]'><strong>OBS.: </strong>$obs_pedido1[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$data_agendado[$i]'><strong>DATA AGENDADO: </strong>$data_agendado[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_agendado[$i]'><strong>OBS.AGENDADO: </strong>$obs_agendado_title[$i]</td></tr><tr><td></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$setor[$i]'><strong>REGIÃO: </strong>$setor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(codigo_pedido_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
	
		echo "infowindow$i = new google.maps.InfoWindow({content: mrktx$i});\n";
			////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
		echo "google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});\n";
	  	echo "google.maps.event.addListener(infowindow$i, 'domready', function() {\n";
		echo "var iwOuter = $('.gm-style-iw')\n";
		echo "var iwBackground = iwOuter.prev()\n";
		echo "iwBackground.children(':nth-child(2)').css({'display' : 'none'})\n";
   		echo "iwBackground.children(':nth-child(4)').css({'display' : 'none'})\n";
		echo "})\n";
		////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
		
    		
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map,  label: {

		  },
			title: '$nome_veiculo - $nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i] • VALOR: $valor[$i] • OBS.: $obs_pedido[$i] • DATA INCLUSÃO: $classificacao[$i] • CEP: $cep[$i]', icon: 'imgs/$imagem_mapa',});\n";
		echo "google.maps.event.addListener(marker[$i],
         'click',  function() {
   		     infowindow$i.open(map,marker[$i]);
          });\n";
			
			
		}
		
		 // echo "bounds.extend(point$i.position);\n";
		} else {
		//////////////////////////////////
		$query_tipo = "select * from veiculos where id='$veiculo[$i]'";	
		$query_tipo = mysql_query($query_tipo);
	
													
		//$rs_tipo = mysql_query($query_tipo);
		
		// Tirando o while
		$dados = mysql_fetch_array($query_tipo);
		
	
		$tipo_veiculo = $dados["tipo"];
		$icon_veiculo = $dados["type_icon"];
		$imagem_mapa = $tipo_veiculo .  "_" . $icon_veiculo . ".png";
		$nome_veiculo = $dados["nome"];
		
		//$mrk_cnt2 = 0;
		//////////////////////////////////
		
	  	echo "point$i = new google.maps.LatLng($lat_cad[$i],$lng_cad[$i]);\n";
		
		  echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i] - <strong>VOLUME:</strong> $volume[$i] - <strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$end_menor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_pedido[$i]'><strong>OBS.: </strong>$obs_pedido1[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$data_agendado[$i]'><strong>DATA AGENDADO: </strong>$data_agendado[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$obs_agendado[$i]'><strong>OBS.AGENDADO: </strong>$obs_agendado_title[$i]</td></tr><tr><td></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px' title='$setor[$i]'><strong>REGIÃO: </strong>$setor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(codigo_pedido_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
		
		echo "infowindow$i = new google.maps.InfoWindow({content: mrktx$i});\n";
		////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
		echo "google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});\n";
	  	echo "google.maps.event.addListener(infowindow$i, 'domready', function() {\n";
		echo "var iwOuter = $('.gm-style-iw')\n";
		echo "var iwBackground = iwOuter.prev()\n";
		echo "iwBackground.children(':nth-child(2)').css({'display' : 'none'})\n";
   		echo "iwBackground.children(':nth-child(4)').css({'display' : 'none'})\n";
		echo "})\n";
		////////////// BOX ESPECIAL /////////////////////////////////////////////////////////////		
		
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map, label: {

		  },
		   title: '$nome_veiculo - $nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i] • VALOR: $valor[$i] • OBS.: $obs_pedido[$i] • DATA INCLUSÃO: $classificacao[$i] • CEP: $cep[$i]', icon: 'imgs/$imagem_mapa',});\n";
		echo "google.maps.event.addListener(marker[$i],
         'click',  function() {
   		     infowindow$i.open(map,marker[$i]);
          });\n";	
		 

			}
	//echo "map.setCenter(new google.maps.LatLng($lat_cad[$i],$lng_cad[$i]));\n";
	
	//echo "marker[$i].push(mrktx$i);"

	
	} 
?>
		var bounds = new google.maps.LatLngBounds();
		
		
	
	// novoArray[0]=;
	//	novoArray[1]=-47.27577745856284;
		if(novoArray[0]==-23.214519678758165 || novoArray[1]==-47.27577745856284){
					//alert('eita');

					for(i=0;i<marker.length;i++) {
						bounds.extend(marker[i].getPosition());
						//alert(marker[i].getPosition());
					}	

					map.fitBounds(bounds);

		} else {
					
				//	alert('oiiiii');
					//
				

		}



}


/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function poligono_aciona(){
	
	 drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON); 
	// apDiv17_poligono.style.visibility= 'hidden' ; 
	 document.getElementById('criar_poligono').style.visibility = 'hidden';
	 document.getElementById('mao_tool').style.visibility = 'visible';
	// apDiv17_mao.style.visibility= 'visible' ; 
	
} 
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function mao_aciona(){
	
	drawingManager.setDrawingMode(null);
	//apDiv17_poligono.style.visibility= 'visible' ; 
	//apDiv17_mao.style.visibility= 'hidden' ; 
	document.getElementById('criar_poligono').style.visibility = 'visible';
	document.getElementById('mao_tool').style.visibility = 'hidden';
} 
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
 function DeleteMarkers() {
        for (var i = 0; i < marker.length; i++) {
			marker[i].setMap(null);

        }
  };

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

  function ShowMarkers() {
	
	conta = -1;
	
	guarda_codigo_pedido = [];
	guarda_peso = [];
	guarda_volume = [];
	guarda_valor = [];
	guarda_marker = [];
	guarda_icone= [];
	guarda_veiculo=[];	
	guarda_endereco=[];	
	guarda_marker_ativo=[];
	guarda_peso_paratirar=[];
	guarda_volume_paratirar=[];
	guarda_valor_paratirar=[];
	guarda_endereco_ativo=[];
	guarda_veiculo_paratirar=[];
	guarda_setor=[];
	guarda_obs=[];
	premium=[];
	guarda_cla=[];
	guarda_cep=[];
	numero_visitas=[];

	var total_peso = 0;
	var total_volume = 0;
	var total_valor = 0;
	var contaae = 0;
	var contaae_tira = 0;
	//alert(numero_resgate);
	

        for (var i = 0; i < marker.length; i++) {
			
			marker[i].setMap(null);
			point = new google.maps.LatLng(lat_js[i], lng_js[i]);		
			pasta = "imgs/"
			junta_veiculo = pasta.concat(tipo, "_",type_icon, ".png"); 		
			conta = conta + 1;
			
				guarda_marker[conta] = id_cliente_js[i];
			    guarda_peso[conta] = peso_js[i];
				guarda_volume[conta] = volume_js[i];
				guarda_valor[conta] = valor_js[i];
				guarda_veiculo[conta] = veiculo_js[i];
				guarda_endereco[conta] = endereco_js[i];				
				guarda_setor[conta] = setor_js[i];				
				premium[conta] = premium_js[i];			
				guarda_codigo_pedido[conta] = codigo_pedido_js[i];	
				guarda_obs[conta] = obs_js[i];
				guarda_cla[conta] = classifica_js[i];
				guarda_cep[conta] = cep_js[i];
				//alert(guarda_endereco);
				
				
////////////////////////////////////////////////////////////////////////////////////
// O PONTO ESTA DENTRO DO POLIGONO CRIADO
////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
				if (newShape.Contains(point)) {
				
				document.getElementById('endereco_cliente').value = guarda_endereco[i];
				var junta_title = nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i] + ' • OBS: ' + guarda_obs[i] + ' • DATA INCLUSÃO: ' + guarda_cla[i] + ' • CEP: ' + guarda_cep[i];
				
			
				
				if ((id_icon == null) || (id_icon == "")) {
					
		
			marker[i] = new google.maps.Marker({position: point, map: map,  label: {
		
		  },
		  title: junta_title, icon: 'imgs/pickup_camper_on.png',});	
					
					
				}else {
					marker[i] = new google.maps.Marker({position: point, map: map, label: {

		  },title: junta_title, icon: junta_veiculo});			
				}
			//	marker[i] = new google.maps.Marker({position: point, map: map, title: nome_js[i], icon: 'imgs/pickup_camper_out.png',});
						
						
					
		
			///////////////VEICULO LIVRE OU VEICULO ESCOLHIDO///////////////
					if ((id_icon == null) || (id_icon == "")) {
						apDiv17_orange.style.visibility= 'visible';
						apDiv17.style.visibility= 'hidden';
					} else {
						apDiv17_orange.style.visibility= 'hidden';
						apDiv17.style.visibility= 'visible';
						
						//apDiv17_orange_volta.style.visibility= 'visible';
					}
			///////////////VEICULO LIVRE OU VEICULO ESCOLHIDO///////////////
			
			
				
////////////////////////////////////////////////////////////////////////////////////
//O PONTO JA FOI ESCOLHIDO ANTERIORMENTE DO MESMO VEICULO
////////////////////////////////////////////////////////////////////////////////////
				if (veiculo_js[i]!=null){
					
					
					total_peso += Math.abs(guarda_peso[i]); 
     				total_volume += Math.abs(guarda_volume[i]);  
     			    total_valor += Math.abs(guarda_valor[i]); 
					
					//alert("O PONTO JA FOI ESCOLHIDO ANTERIORMENTE");
					contaae = contaae + 1;
					
					guarda_endereco_ativo[contaae] = guarda_endereco[i];	
					document.getElementById('endereco_cliente').value = guarda_endereco_ativo;
						
					guarda_marker_ativo[contaae] = guarda_marker[i];	
					document.getElementById('equipe_poligono').value = guarda_marker_ativo;					
					document.getElementById('tipo').value = tipo;
					document.getElementById('type_icon').value = type_icon;
					document.getElementById('peso2').value = peso_resgate;
					document.getElementById('volume2').value = volume_resgate;
					document.getElementById('valor2').value = valor_resgate;
					
					document.getElementById('equipe_poligonox').value = guarda_marker_ativo;					
					document.getElementById('tipox').value = tipo;
					document.getElementById('type_iconx').value = type_icon;
					document.getElementById('peso2x').value = peso_resgate;
					document.getElementById('volume2x').value = volume_resgate;
					document.getElementById('valor2x').value = valor_resgate;
					
					//alert(guarda_marker_ativo[contaae]);	
////////////////////////////////////////////////////////////////////////////////////
//  SE PERTENCER A OUTRO VEICULO 
////////////////////////////////////////////////////////////////////////////////////						
					if(id_icon!=veiculo_js[i]){
					contaae_tira = contaae_tira + 1;
					guarda_peso_paratirar[contaae_tira]= guarda_peso[i];
					guarda_volume_paratirar[contaae_tira]= guarda_volume[i];
					guarda_valor_paratirar[contaae_tira]= guarda_valor[i];
					guarda_veiculo_paratirar[contaae_tira]= guarda_veiculo[i]; 
					//alert(guarda_veiculo[i]);
					document.getElementById('peso_veiculo_tira').value = guarda_peso_paratirar;
					document.getElementById('volume_veiculo_tira').value = guarda_volume_paratirar;
					document.getElementById('valor_veiculo_tira').value = guarda_valor_paratirar;
					document.getElementById('veiculo_tira').value = guarda_veiculo_paratirar;
					document.getElementById('endereco_cliente').value = guarda_endereco_ativo;					
					document.getElementById('equipe_poligono').value = guarda_marker_ativo;					
					document.getElementById('tipo').value = tipo;
					document.getElementById('type_icon').value = type_icon;
					document.getElementById('peso2').value = peso_resgate;
					document.getElementById('volume2').value = volume_resgate;
					document.getElementById('valor2').value = valor_resgate;
					
					
					document.getElementById('peso_veiculo_tirax').value = guarda_peso_paratirar;
					document.getElementById('volume_veiculo_tirax').value = guarda_volume_paratirar;
					document.getElementById('valor_veiculo_tirax').value = guarda_valor_paratirar;
					document.getElementById('veiculo_tirax').value = guarda_veiculo_paratirar;
					document.getElementById('endereco_clientex').value = guarda_endereco_ativo;					
					document.getElementById('equipe_poligonox').value = guarda_marker_ativo;					
					document.getElementById('tipox').value = tipo;
					document.getElementById('type_iconx').value = type_icon;
					document.getElementById('peso2x').value = peso_resgate;
					document.getElementById('volume2x').value = volume_resgate;
					document.getElementById('valor2x').value = valor_resgate;

					segura_visitas = id_cliente_js[i];			    
					numero_visitas.push(segura_visitas);

				    var array = numero_visitas;
					var unico = array.filter(function(elem, index, self) {
    				return index === self.indexOf(elem);
					});
					document.getElementById("visitas2").value = unico.length;
					
					}
					 
				} else {
////////////////////////////////////////////////////////////////////////////////////
//  O PONTO NAO FOI ESCOLHIDO ANTERIORMENTE
////////////////////////////////////////////////////////////////////////////////////	
					total_peso += Math.abs(guarda_peso[i]);
				

     				total_volume += Math.abs(guarda_volume[i]);  
     			    total_valor += Math.abs(guarda_valor[i]); 
					contaae = contaae + 1;
									
					guarda_endereco_ativo[contaae] = guarda_endereco[i];

					segura_visitas = id_cliente_js[i];			    
					numero_visitas.push(segura_visitas);

				    var array = numero_visitas;
					var unico = array.filter(function(elem, index, self) {
    				return index === self.indexOf(elem);
					});
					document.getElementById("visitas2").value = unico.length;

					guarda_marker_ativo[contaae] = guarda_marker[i];	
					document.getElementById('endereco_cliente').value = guarda_endereco_ativo;
					document.getElementById('equipe_poligono').value = guarda_marker_ativo;
					document.getElementById('tipo').value = tipo;
					document.getElementById('type_icon').value = type_icon;
					document.getElementById('peso2').value = peso_resgate;
					document.getElementById('volume2').value = volume_resgate;
					document.getElementById('valor2').value = valor_resgate;		
					
					document.getElementById('endereco_clientex').value = guarda_endereco_ativo;
					document.getElementById('equipe_poligonox').value = guarda_marker_ativo;
					document.getElementById('tipox').value = tipo;
					document.getElementById('type_iconx').value = type_icon;
					document.getElementById('peso2x').value = peso_resgate;
					document.getElementById('volume2x').value = volume_resgate;
					document.getElementById('valor2x').value = valor_resgate;	
					
				
					}
					


				 }  else {
				
////////////////////////////////////////////////////////////////////////////////////					
// O PONTO ESTA FORA DO POLIGONO CRIADO			
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////// 
				if (veiculo_js[i]!=null){
					
////////////////////////////////////////////////////////////////////////////////////					
//O PONTO JA PERTENCE AO VEICULO DO NOVO POLIGONO		
////////////////////////////////////////////////////////////////////////////////////	
						if (id_icon == veiculo_js[i]){	
	
						for (var g = 0; g < id_tabela_veiculos.length; g++) {
							if(veiculo_js[i]==id_tabela_veiculos[g]){
							pasta1 = "imgs/"
							junta_veiculo1 = pasta1.concat(tipo_tabela_veiculos[g], "_",type_icon_tabela_veiculos[g], ".png"); 
						
							
							var junta_title = nomes_veiculos[g] + '-' + nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i]  + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i] + ' • OBS: ' + guarda_obs[i] + ' • DATA INCLUSÃO: ' + guarda_cla[i] + ' • CEP: ' + guarda_cep[i];
							marker[i] = new google.maps.Marker({position: point, map: map,  label: {

		  },title:  junta_title, icon: junta_veiculo1});	
							total_peso += Math.abs(guarda_peso[i]);  
     						total_volume += Math.abs(guarda_volume[i]);  
     			    		total_valor += Math.abs(guarda_valor[i]);  

							contaae = contaae + 1;
							guarda_marker_ativo[contaae] = guarda_marker[i];	
											
							guarda_endereco_ativo[contaae] = guarda_endereco[i];	
							
							document.getElementById('endereco_cliente').value = guarda_endereco_ativo;
							document.getElementById('equipe_poligono').value = guarda_marker_ativo;
							document.getElementById('tipo').value = tipo;
							document.getElementById('type_icon').value = type_icon;
							document.getElementById('peso2').value = peso_resgate;
							document.getElementById('volume2').value = volume_resgate;
							document.getElementById('valor2').value = valor_resgate;			
							
							document.getElementById('endereco_clientex').value = guarda_endereco_ativo;
							document.getElementById('equipe_poligonox').value = guarda_marker_ativo;
							document.getElementById('tipox').value = tipo;
							document.getElementById('type_iconx').value = type_icon;
							document.getElementById('peso2x').value = peso_resgate;
							document.getElementById('volume2x').value = volume_resgate;
							document.getElementById('valor2x').value = valor_resgate;								
							}
						}
	
							} else {
								
////////////////////////////////////////////////////////////////////////////////////	
////O PONTO ESTA FORA DO POLIGONO CRIADO E PERTENCE A OUTRO GRUPO	
////////////////////////////////////////////////////////////////////////////////////	 
							for (var s = 0; s < id_tabela_veiculos.length; s++) {	 
								if(veiculo_js[i]==id_tabela_veiculos[s]){ 
								
							pasta2 = "imgs/"
							junta_veiculo2 = pasta2.concat(tipo_tabela_veiculos[s], "_",type_icon_tabela_veiculos[s], ".png"); 
							contaae_tira = contaae_tira + 1;
							
							var junta_title = nomes_veiculos[s] + '-' + nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i] + ' • OBS: ' + guarda_obs[i] + ' • DATA INCLUSÃO: ' + guarda_cla[i] + ' • CEP: ' + guarda_cep[i];
							
							marker[i] = new google.maps.Marker({position: point, map: map, label: {

		  },title:  junta_title, icon: junta_veiculo2});	
							//alert("O PONTO ESTA FORA DO POLIGONO CRIADO E PERTENCE A OUTRO GRUPO");
							
							}
						}
								
				}
							 
						
////////////////////////////////////////////////////////////////////////////////////					
//O PONTO NAO FOI USADO AINDA	
//////////////////////////////////////////////////////////////////////////////////// 
				} else {
					
					var junta_title = nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i] + ' • OBS: ' + guarda_obs[i] + ' • DATA INCLUSÃO: ' + guarda_cla[i] + ' • CEP: ' + guarda_cep[i];
					
					if(premium[i]!='' || premium[i]!="0"){
						//alert(premium[i]);
						linkado = "imgs/" + premium[i] + ".png";
					marker[i] = new google.maps.Marker({position: point, map: map, title: junta_title, icon: linkado,});	
					} else {							
					marker[i] = new google.maps.Marker({position: point, map: map, title: junta_title, icon: "imgs/pickup_camper_pin.png"});	
					
					}
						
					document.getElementById('equipe_poligono').value = guarda_marker_ativo;
					document.getElementById('endereco_cliente').value = guarda_endereco_ativo;					
					document.getElementById('tipo').value = tipo;
					document.getElementById('type_icon').value = type_icon;
					document.getElementById('peso2').value = peso_resgate;
					document.getElementById('volume2').value = volume_resgate;
					document.getElementById('valor2').value = valor_resgate;					
					document.getElementById('equipe_poligonox').value = guarda_marker_ativo;
					document.getElementById('endereco_clientex').value = guarda_endereco_ativo;					
					document.getElementById('tipox').value = tipo;
					document.getElementById('type_iconx').value = type_icon;
					document.getElementById('peso2x').value = peso_resgate;
					document.getElementById('volume2x').value = volume_resgate;
					document.getElementById('valor2x').value = valor_resgate;	
					
					var array = numero_visitas;
					var unico = array.filter(function(elem, index, self) {
    				return index === self.indexOf(elem);
					});
					document.getElementById("visitas2").value = unico.length;

					
				}	
					
						
		}
		
		


			////////////////////////////////////////////////////////////////////////////////////	
			////////////////////////////////////////////////////////////////////////////////////	
			////////////////////////////////////////////////////////////////////////////////////	
			//marker[i] = new google.maps.Marker({position: point, map: map, title: nome_js[i], icon: "imgs/pickup_camper_pin.png"});
				 
			mrktx[i] = "<div id='box_map'>"+"<h1><p id='legenda1'>"+ nome_js[i]+"</p></h1><p id='legenda2'>Peso:"+ peso_js[i] + "<br />Volume:"+ volume_js[i]+ "<br />Valor:" + valor_js[i] + "</p></div>";
					
			//infowindow = infowindow + i;
			infowindow[i] = new google.maps.InfoWindow({
			content: mrktx[i]
			});
			
			
		google.maps.event.addListener(marker[i],
		 'click', function() {
				infowindow[i].open(map, marker[i]);
			});
        }
		
			
 		//Soma tudo
 		document.getElementById("peso").value = total_peso;
		document.getElementById("pesox").value = total_peso;
	 	document.getElementById("volume").value = total_volume;
		document.getElementById("volumex").value = total_volume;
		document.getElementById("valor").value = total_valor;
	    document.getElementById("valorx").value = total_valor;

	var simbolo_porcento = "%"
	// PESO
	 var peso_veiculo_escolhido = 0;
	 peso_veiculo_escolhido = document.getElementById('v_peso').value;	 
	 //alert(peso_veiculo_escolhido);	
	 var calcula_peso = 0;	
	 var calcula_peso_tira = 0;
	 if(peso_veiculo_escolhido!="?"){
		  calcula_peso = peso_veiculo_escolhido - total_peso;
		  
		  calcula_peso_tira = total_peso;	 
	 	  porcentagem = parseInt((total_peso/peso_veiculo_escolhido) * 100);
	 
	 } else {
		 calcula_peso_tira = total_peso;	 
	 	 porcentagem = 0;
	 }
	
	
	 
	// VOLUME
	 var volume_veiculo_escolhido = 0;
	 volume_veiculo_escolhido = document.getElementById('v_volume').value;	 
	 var calcula_volume = 0;	 
	 var calcula_volume_tira = 0;	
	 
	 if(volume_veiculo_escolhido!="?"){
	 calcula_volume = volume_veiculo_escolhido - total_volume;	
	 calcula_volume_tira = total_volume;	
	 porcentagem_volume = parseInt((total_volume/volume_veiculo_escolhido) * 100);  
	 } else {
	 calcula_volume_tira = total_volume;	
	 porcentagem_volume = 0;  
	 }
	
	 
	// VALOR
	 var valor_veiculo_escolhido = 0;
	 valor_veiculo_escolhido = document.getElementById('v_valor').value;	 
	 var calcula_valor = 0;	 
	 var calcula_valor_tira = 0;	
	 
	 if(valor_veiculo_escolhido!="?"){
	 calcula_valor = valor_veiculo_escolhido - total_valor;	
	 calcula_valor_tira = total_valor;
	 porcentagem_valor = parseInt((total_valor/valor_veiculo_escolhido) * 100);
		  
	 } else {
	 calcula_valor_tira = total_valor;
	 porcentagem_valor = 0;
	 }
	
	
	 if (calcula_peso>= 0) {
		document.getElementById('v_controle').value = calcula_peso.toFixed(2);	
		document.getElementById('v_controlex').value = calcula_peso_tira.toFixed(2);		 
		document.getElementById('v_porcentagem').value = porcentagem + simbolo_porcento; 
	

		if (porcentagem == 0){
		document.getElementById("carga").src="imgs/carga_1.png";	
		} 		
		if (porcentagem <= 16 && porcentagem > 0) {
		document.getElementById("carga").src="imgs/carga_2.png";	
	 	}
		if (porcentagem <= 32 && porcentagem > 16) {
		document.getElementById("carga").src="imgs/carga_3.png";	
	 	}
		if (porcentagem <= 48 && porcentagem > 32) {
		document.getElementById("carga").src="imgs/carga_4.png";	
	 	}
		if (porcentagem <= 64 && porcentagem > 48) {
		document.getElementById("carga").src="imgs/carga_5.png";	
	 	}
		if (porcentagem <= 80 && porcentagem > 64) {
		document.getElementById("carga").src="imgs/carga_6.png";	
	 	}
		if (porcentagem >= 81) {
		document.getElementById("carga").src="imgs/carga_7.png";	
	 	}
		} else {
		document.getElementById('v_controle').value = calcula_peso.toFixed(2);	
		document.getElementById('v_controlex').value = calcula_peso_tira.toFixed(2);	
		
		document.getElementById('v_porcentagem').value = porcentagem + simbolo_porcento; ;
		document.getElementById("carga").src="imgs/carga_over.png";			 
		} 
		
	 if (calcula_volume >= 0) {
		document.getElementById('v_volume1').value = calcula_volume.toFixed(2);	 
		document.getElementById('v_volume1x').value = calcula_volume_tira.toFixed(2);
		document.getElementById('v_porcentagem_volume').value = porcentagem_volume + simbolo_porcento; 
		
		if (porcentagem_volume == 0){
		document.getElementById("carga_volume").src="imgs/carga_1.png";	
		} 		
		if (porcentagem_volume <= 16 && porcentagem_volume > 0) {
		document.getElementById("carga_volume").src="imgs/carga_2.png";	
	 	}
		if (porcentagem_volume <= 32 && porcentagem_volume > 16) {
		document.getElementById("carga_volume").src="imgs/carga_3.png";	
	 	}
		if (porcentagem_volume <= 48 && porcentagem_volume > 32) {
		document.getElementById("carga_volume").src="imgs/carga_4.png";	
	 	}
		if (porcentagem_volume <= 64 && porcentagem_volume > 48) {
		document.getElementById("carga_volume").src="imgs/carga_5.png";	
	 	}
		if (porcentagem_volume <= 80 && porcentagem_volume > 64) {
		document.getElementById("carga_volume").src="imgs/carga_6.png";	
	 	}
		if (porcentagem_volume >= 81) {
		document.getElementById("carga_volume").src="imgs/carga_7.png";	
	 	}		 		 
	 } else {
		document.getElementById('v_volume1').value = calcula_volume.toFixed(2);	
		document.getElementById('v_volume1x').value = calcula_volume_tira.toFixed(2);
		document.getElementById('v_porcentagem_volume').value = porcentagem_volume + simbolo_porcento;
		document.getElementById("carga_volume").src="imgs/carga_over.png";
		 		 
	}
	 
	 	 if (calcula_valor >= 0) {
			 //alert Math.abs(calcula_valor);	
		document.getElementById('v_valor1').value = calcula_valor.toFixed(2);
		document.getElementById('v_valor1x').value = calcula_valor_tira.toFixed(2);
		
		document.getElementById('v_porcentagem_valor').value = porcentagem_valor + simbolo_porcento ;
		
		if (porcentagem_valor == 0){	
		document.getElementById("carga_valor").src="imgs/carga_1.png";	
		} 		
		if (porcentagem_valor <= 16 && porcentagem_valor > 0) {
		document.getElementById("carga_valor").src="imgs/carga_2.png";	
	 	}
		if (porcentagem_valor <= 32 && porcentagem_valor > 16) {
		document.getElementById("carga_valor").src="imgs/carga_3.png";	
	 	}
		if (porcentagem_valor <= 48 && porcentagem_valor > 32) {
		document.getElementById("carga_valor").src="imgs/carga_4.png";	
	 	}
		if (porcentagem_valor <= 64 && porcentagem_valor > 48) {
		document.getElementById("carga_valor").src="imgs/carga_5.png";	
	 	}
		if (porcentagem_valor <= 80 && porcentagem_valor > 64) {
		document.getElementById("carga_valor").src="imgs/carga_6.png";	
	 	}
		if (porcentagem_valor >= 81) {
		document.getElementById("carga_valor").src="imgs/carga_7.png";	
	 	}		 		 
	 } else {
		document.getElementById('v_valor1').value = calcula_valor.toFixed(2);
		document.getElementById('v_valor1x').value = calcula_valor_tira.toFixed(2);
		document.getElementById('v_porcentagem_valor').value = porcentagem_valor + simbolo_porcento;	 
		document.getElementById("carga_valor").src="imgs/carga_over.png";
		 		 
	} 
document.getElementById('visitas').value = contaae;



 
};
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function formulario(){
if ((id_icon == null) || (id_icon == "")) {
		alert("Por favor, escolha um veículo no botão 'Escolher veículo e carregar com clientes' ou escolha o 'Veículo Livre'!");
		//apDiv17.style.visibility= 'hidden';
	
	} else {
		atualiza_icones();	
		mapZoom=map.getZoom();
		savePosition1(map, mapZoom);
		
	/////////////////////////////////////////////////////////////////////////
	
	 /*		var offset_01x = $("#makeMeDraggable").offset();
            var xPos_layers_01x = offset_01x.left;
			var yPos_layers_01x = offset_01x.top;
			document.getElementById("posX_layers2").value = xPos_layers_01x;
			document.getElementById("posY_layers2").value = yPos_layers_01x;
	
			
			var offset_02x = $("#makeMeDraggable1").offset();
            var xPos_tools_01x = offset_02x.left;
			var yPos_tools_01x = offset_02x.top;
			document.getElementById("posX_tools2").value = xPos_tools_01x;
			document.getElementById("posY_tools2").value = yPos_tools_01x;
			
			var offset_03x = $("#apDiv14c").offset();
            var xPos_01x = offset_03x.left;
			var yPos_01x = offset_03x.top;
			document.getElementById("posX_2").value = xPos_01x;
			document.getElementById("posY_2").value = yPos_01x;*/
		
		
		///////////////////////////////////////////////////////////////////

		
		
		
		
		apDiv17.style.visibility= 'hidden'; 
		document.salvala.action = "scripts.php?acao=cadastra_equipe_veiculo";
		

	}
}
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function atualiza_icones() { 
//	if ((id_icon == null) || (id_icon == "")) {
		//alert("Por favor, escolha um veículo no botão 'Escolher Veículo'!");
	//} else {
			var polygonBounds = newShape.getPath();
			var coordinates = [];
	//Escolheram o veiculo!!!
	for(var i = 0 ; i < polygonBounds.length ; i++){
		
		
    	coordinates.push(polygonBounds.getAt(i).lat(), polygonBounds.getAt(i).lng());
		ShowMarkers();
		
		mapZoom=map.getZoom();
		 //alert(mapZoom); 
		savePosition2(map, mapZoom);
	
		
		
//	}
		
	  
}
		

}
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function load() {
   initialize();
	//atualiza_icones();  
}
 /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
  google.maps.Polygon.prototype.Contains = function(point) {
        
        var crossings = 0,
            path = this.getPath();

        // for each edge
        for (var i=0; i < path.getLength(); i++) {
            var a = path.getAt(i),
                j = i + 1;
            if (j >= path.getLength()) {
                j = 0;
            }
            var b = path.getAt(j);
            if (rayCrossesSegment(point, a, b)) {
                crossings++;
            }
        }

        // odd number of crossings?
        return (crossings % 2 == 1);

        function rayCrossesSegment(point, a, b) {
            var px = point.lng(),
                py = point.lat(),
                ax = a.lng(),
                ay = a.lat(),
                bx = b.lng(),
                by = b.lat();
            if (ay > by) {
                ax = b.lng();
                ay = b.lat();
                bx = a.lng();
                by = a.lat();
            }
            // alter longitude to cater for 180 degree crossings
            if (px < 0) { px += 360 };
            if (ax < 0) { ax += 360 };
            if (bx < 0) { bx += 360 };

            if (py == ay || py == by) py += 0.00000001;
            if ((py > by || py < ay) || (px > Math.max(ax, bx))) return false;
            if (px < Math.min(ax, bx)) return true;

            var red = (ax != bx) ? ((by - ay) / (bx - ax)) : Infinity;
            var blue = (ax != px) ? ((py - ay) / (px - ax)) : Infinity;
            return (blue >= red);

        }

     };
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
 $(function() {    

   $('#color3').colorPicker({pickerDefault: "ff0000", colors: ["ff0000", "ff7800", "42ff00", "7200ff", "00f0ff", "003cff",  "9c5100", "00760b", "ffbc00", "900000",  "340058", "03fe85"], transparency: true}); 

  });
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este pedido do veículo?')) {

location.href = aURL;

//target=ver;

}
}





$(document).ready(function(){
	$("#capaefectos").show("fast");
	$("#ocultar").hide("fast");

	
	$("#ocultar").click(function(event){
	  event.preventDefault();
	  $("#ocultar").hide(200);
	  $("#capaefectos").show();
	  $("#capaefectos").animate({top: "43px"});
	  $("#capaefectos").animate({left: "5px", left:"-250px"},{duration: 200,queue: false});
	
	 
	  $("#mostrar").show();
	});
 
	$("#mostrar").click(function(event){
	  event.preventDefault();
	
	  $("#ocultar").show(200);
	  $("#capaefectos").animate({top: "43px"});
	  $("#capaefectos").animate({left: "0px"} ,{duration: 200,queue: false});
	
	});
});

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

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


window.onload=function() {
toggleRow('row1');


};


function showRow(rowname){
	if (document.getElementById(rowname)) {
		document.getElementById(rowname).style.display = ''; 
	}
}

function hideRow(rowname){
	if (document.getElementById(rowname)) {
		document.getElementById(rowname).style.display = 'none';
	}
}

function toggleRow(rowname){
	if (document.getElementById(rowname)) {
		if (document.getElementById(rowname).style.display == 'none') {
			showRow(rowname)
		} else {
			hideRow(rowname)
		}
	}
}



</script>


</head>
<div class="jquery-waiting-base-container"></div>
<body onload='load();controla_nav();'>





<style>
	

#demo select {
  
  font-size: 10px;
 
  color:#000000;
  border:none;
  outline:none;
  display: inline-block;
  
  background-color:rgba(0, 0, 0, 0.0);

  cursor:pointer;
  width:48px;
  height:10px;


  
}

#demo option {
  line-height: 10px;
}





label {position:relative}
label:after {

  color:#FFF;

  right:8px; top:2px;
  padding:0 0 5px;
  
  position:absolute;
  pointer-events:none;
   
  font-size: 10px;
}
label:before {
  content:'';
  right:6px; top:2px;
  
  background:#589bd4;
  position:absolute;
  pointer-events:none;
  display:block;
}


*{margin:0;padding:0;} /* Tiny Reset */
ul.menu1 li{
 display:inline-block;
}
li.has-submenu ul{
 display:none;
 position:absolute;
}
li.has-submenu ul li{
 display:flex;
}
li.has-submenu:hover ul{
 display:block;
}
/* Visual */
ul.menu1{
 margin:2rem;
 display:flex;
}
ul.menu1 li a{
 text-decoration:none;
 background: #fff;
 border:1px solid #ddd;
 padding:1rem 2rem;
 margin-right:-1px;
 color:#333;
}
li.has-submenu ul{
 margin-top:.95rem;
}
ul.menu1 li a:hover{
 background:#eee;
}
li.has-submenu ul li a{
 min-width:100px;
}
li.has-submenu ul li{
 margin-bottom:-1px;
}
ul.menu1 li.has-menu{
 top:0;
}


.highlight {
    background-color: #589bd4;
    -moz-border-radius: 5px; /* FF1+ */
    -webkit-border-radius: 5px; /* Saf3-4 */
    border-radius: 5px; /* Opera 10.5, IE 9, Saf5, Chrome */
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* FF3.5+ */
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Saf3.0+, Chrome */
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7); /* Opera 10.5+, IE 9.0 */
}

.highlight {
    padding:1px 4px;
    margin:0 -4px;
}

/* override jQuery UI overriding Bootstrap */
.accordion .ui-widget-content a {
color: #337ab7;
}

caption {
/* override bootstrap adding 8px to the top & bottom of the caption */
padding: 0;
}
.ui-sortable-placeholder {
/* change placeholder (seen while dragging) background color */
background: #ddd;
}
div.table-handle-disabled {
/* optional red background color indicating a disabled drag handle */
background-color: rgba(255,128,128,0.5);
/* opacity set to zero for disabled handles in the dragtable.mod.css file */
opacity: 0.7;
}
/* fix cursor */
.tablesorter-blue .tablesorter-header {
cursor: default;
}
.sorter {
cursor: pointer;
}





</style>

<script type="text/javascript">




$(document).ready(function() {
    $('.defaultTable').dragtable();
  });


$(function () {
$('table')
// initialize dragtable FIRST!
.dragtable({
// *** new dragtable mod options ***
// this option MUST match the tablesorter selectorSort option!
sortClass: '.sorter',
// this function is called after everything has been updated
tablesorterComplete: function(table) {},

// *** original dragtable settings (non-default) ***
dragaccept: '.drag-enable',  // class name of draggable cols -> default null = all columns draggable

// *** original dragtable settings (default values) ***
revert: false,               // smooth revert
dragHandle: '.table-handle', // handle for moving cols, if not exists the whole 'th' is the handle
maxMovingRows: 40,           // 1 -> only header. 40 row should be enough, the rest is usually not in the viewport
excludeFooter: false,        // excludes the footer row(s) while moving other columns. Make sense if there is a footer with a colspan. */
onlyHeaderThreshold: 100,    // TODO:  not implemented yet, switch automatically between entire col moving / only header moving
persistState: null,          // url or function -> plug in your custom persistState function right here. function call is persistState(originalTable)
restoreState: null,          // JSON-Object or function:  some kind of experimental aka Quick-Hack TODO: do it better
exact: true,                 // removes pixels, so that the overlay table width fits exactly the original table width
clickDelay: 10,              // ms to wait before rendering sortable list and delegating click event
containment: null,           // @see http://api.jqueryui.com/sortable/#option-containment, use it if you want to move in 2 dimesnions (together with axis: null)
cursor: 'move',              // @see http://api.jqueryui.com/sortable/#option-cursor
cursorAt: false,             // @see http://api.jqueryui.com/sortable/#option-cursorAt
distance: 0,                 // @see http://api.jqueryui.com/sortable/#option-distance, for immediate feedback use "0"
tolerance: 'pointer',        // @see http://api.jqueryui.com/sortable/#option-tolerance
axis: 'x',                   // @see http://api.jqueryui.com/sortable/#option-axis, Only vertical moving is allowed. Use 'x' or null. Use this in conjunction with the 'containment' setting
beforeStart: $.noop,         // returning FALSE will stop the execution chain.
beforeMoving: $.noop,
beforeReorganize: $.noop,
beforeStop: $.noop
})
// initialize tablesorter
.tablesorter({
theme: 'blue',
// this option MUST match the dragtable sortClass option!
selectorSort: '.sorter',
widgets: ['zebra', 'filter', 'columns']
});
});
</script>
<script language="javascript">

function infobox(lat,lgn, nome){

var ponto = new google.maps.LatLng(lat, lgn);


var contentString = 
			'<div id="legenda_zoom">'+
            '<strong>' + nome + '</strong>'+
            '</div>';
 
        var var_infowindow = new google.maps.InfoWindow({
            content: contentString,
			position: ponto,
			pixelOffset: new google.maps.Size(0, -42)
          });
		  
	
		var_infowindow.open(map);	
	
	
}
	
function tempofora(){
	
 //Dispatch a click event.
 setTimeout(var_infowindow.close(map),100); 
}



</script>
<?php include ('base3.php'); ?>


<div id="mySidenav" class="sidenav">
  <div class="div_lateral" id="div_lateral" name="div_lateral">
  <br><br>
	<br><br>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style=padding-bottom: 8px; width:500px" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" style="width:500px; color:#000000;">
            <strong><font size="3">&nbsp;LISTA DE PEDIDOS &#x2756;
				
			<?php
			if($veiculo1!=''){
				if(round($porc_peso)>100){$cor_peso = "red";}
				if(round($porc_peso)<=100){$cor_peso = "green";}
				if(round($porc_peso)<=50){$cor_peso = "orange";}

				if(round($porc_volume)>100){$cor_volume = "red";}
				if(round($porc_volume)<=100){$cor_volume = "green";}
				if(round($porc_volume)<=50){$cor_volume = "orange";}

				if(round($porc_valor)>100){$cor_valor = "red";}
				if(round($porc_valor)<=100){$cor_valor = "green";}
				if(round($porc_valor)<=50){$cor_valor = "orange";}

				if(round($porc_peso)>120 OR round($porc_volume)>120 OR round($porc_valor)>120){
					?>
					<script>
						alert("Atenção!\nOs pedidos ultrapassaram a capacidade total do peso/volume/valor do veículo! Por favor, retire algum pedido do veículo <?php echo $veiculo1; ?>!");
	
					</script>
	
					<?php
				}
				
				$query = "select codigo, endereco, cidade, estado, cep, codigo_cliente, confianca_cad, latitude_cad, longitude_cad, endereco_cad, nome, veiculo, peso, volume, valor, codigo_pedido, obs_pedido, roteirizado, data_pedido, premium, data_agendado, obs_agendado, volume_l, regiao_itabom from clientes WHERE veiculo='$id1' $completa0 $completa1 $completa2 $completa3 $completa4 order by codigo_cliente";																
				$rs = mysql_query($query);
				$totalderegistros = mysql_num_rows($rs);

				echo $veiculo1 . "<font size='2'> &#x2756; PESO: </font>" . "<font style='color:$cor_peso'>" .round($porc_peso) . "%</font>" . "<font size='2'> &#x2756; VOLUME: </font>" . "<font style='color:$cor_volume'>" . round($porc_volume) . "%</font>" . "<font size='2'> &#x2756; VALOR: </font>" . "<font style='color:$cor_valor'>" . round($porc_valor) . "%</font>" . "<font size='2'> &#x2756; Pedidos: "  . $numero_resgate . " &#x2756; Visitas: " . $numero_resgate_visitas . "</font>";
			} else {
				$query = "select codigo, endereco, cidade, estado, cep, codigo_cliente, confianca_cad, latitude_cad, longitude_cad, endereco_cad, nome, veiculo, peso, volume, valor, codigo_pedido, obs_pedido, roteirizado, data_pedido, premium, data_agendado, obs_agendado, volume_l, regiao_itabom from clientes where roteirizado!='sim' $completa0 $completa1 $completa2 $completa3 $completa4 order by veiculo DESC, codigo_cliente ASC";																
				$rs = mysql_query($query);
				$totalderegistros = mysql_num_rows($rs);
				
				echo "Pedidos: " . $totalderegistros;

	
			}
			
			
			?></font></strong>
			</td>

		
	   </tr>
	   <tr style="height: 30px;">
			

			<td align="left" valign="middle" nowrap="nowrap" style="width:930px; color:#000000;">
            <hr size = 1 width ='934px' color="#ECECEC">
			</td>
		
		
	   </tr>

		</table>
		

        <br> <br>  
		
<?php

if ($veiculo1!=''){
?>

<table border="3"  class="tablesorter" style="width: 330px;">
<thead>
<tr style="height: 35px; background-color:#ECECEC">
<th style="width: 60px; " align="center"  class="drag-enable">
<strong>DADOS</strong>
	
		</th>

	<th align="center" class="drag-enable">
	<strong>PESO</strong>
	
	</th>
	<th align="center" class="drag-enable">
	<strong>VOLUME</strong>

	</th>
	<th align="center" class="drag-enable">
	<strong>VALOR</strong>

	</th>
</tr>
		</thead>
<tr >
<td style="padding-left: 5px;">
	<strong>VEÍCULO</strong>
	
		</td>

	<td align="center">

	<?php
	echo $peso1;
	?>
	</td>
	<td align="center">
	
	<?php
	echo $volume1;
	?>	
	</td>
	<td align="center">
	
	<?php
	echo $valor1;
	?>	
	</td>




</tr>
<tr>
<td style="padding-left: 5px;">
<strong>UTILIZADO</strong>
	
		</td>

		<td align="center">
	
	<?php
	echo $peso1 - $result_peso;
	?>
	</td >
	<td align="center">
	
	<?php
	echo $volume1 - $result_volume;
	?>	
	</td>
	<td align="center">
	
	<?php
	echo $valor1 - $result_valor;
	?>	
	</td>
	

	
</tr>

<tr >
<td style="padding-left: 5px;">
<strong>OCIOSO</strong>
	
		</td>
		<td align="center">
		<?php
	echo $result_peso;
	?>
	</td>
		<td align="center">
	
	<?php
	echo $result_volume;
	?>	
	</td>
	<td align="center">
	<?php
	echo $result_valor;
	?>	
	</td>
</tr>
</table>
<?php
		} 

?>

		<br>  <br>



<?php
	



?>


<table border="3" class="tablesorter" style="width: 930px;" >
<thead>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CÓDIGO PEDIDO"> 
<div align="center" nowrap='nowrap'>C.PED.</div>
</th>                                                       
<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:40px" class="drag-enable" title="CÓDIGO CLIENTE"> 
<div align="center" nowrap='nowrap'>C.C</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="NOME"> 
<div align="center" nowrap='nowrap'>NOME</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="ENDEREÇO"> 
<div align="center" nowrap='nowrap'>END.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CIDADE"> 
<div align="center" nowrap='nowrap'>CID.</div>
</th>
<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="UF"> 
<div align="center">UF</div>
</th>
<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CEP"> 
<div align="center">CEP</div>
</th>
<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="REGIÃO ITABOM"> 
<div align="center">REG.</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="PESO"> 
<div align="center" nowrap='nowrap'>P</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="CUBAGEM"> 
<div align="center" nowrap='nowrap'>V</div>
</th>
<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="VALOR"> 
<div align="center" nowrap='nowrap'>VA</div>
</th>

<th nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="OBS. CLIENTE"> 
<div align="center" nowrap='nowrap'>OBS.</div>
</th>

<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="ZOOM NO MAPA">
<div align="center" nowrap='nowrap' >Z</div>
</th>
<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EXCLUIR DO VEÍCULO"> 
<div align="center" nowrap='nowrap'>X</div>
</th>

<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="VEÍCULO"> 
<div align="center" nowrap='nowrap'>VC</div>
</th>

<th  nowrap="nowrap" headers="icone" bgcolor="#00000" style="color:#000000; width:10px" class="drag-enable" title="EXCLUIR PEDIDO DO SISTEMA"> 
<div align="center" nowrap='nowrap'></div>
</th>
</tr>
</thead>
<tbody>
	
<?php

//////////////////////////////
$conta_clie = 0;



$guarda_agendado = [];


while($row = mysql_fetch_array($rs)){
		$endereco = $row["endereco"];
		$cidade = $row["cidade"];
		$estado = $row["estado"];
		$cep = $row["cep"];
		$cod_cli =  $row["codigo_cliente"];
		$confianca = $row["confianca_cad"];
		$lat = $row["latitude_cad"];
		$lgn = $row["longitude_cad"];
		$end = $row["endereco_cad"];
		$nome_cliente_ei = $row["nome"];	
		//$soma_peso += $row["peso"];	
	//	$soma_volume += $row["volume"];	
	//	$soma_valor += $row["valor"];	
?>

<form method="GET" name="frm" id="frm" target="Pagina">


<tr bgcolor="#FFFFFF" nowrap='nowrap'>
<td align="center" nowrap='nowrap' > 
<?= $row["codigo_pedido"] ?>
</td>
<td align="center" id="id" nowrap="nowrap">
<span><font color="#FF0000"></font></span> 
<?= $row["codigo_cliente"] ?> </td>  
<td align="left" nowrap='nowrap' title="<?php echo $row["nome"]; ?>"> 

<?php 
//$row["nome"] 
echo mb_strimwidth($row["nome"], 0, 20, "...");
?></td>
<td align="left" id="endereco" title="<?php echo $row["endereco"]; ?>" nowrap='nowrap'> 
<?php
echo mb_strimwidth($row["endereco"], 0, 20, "..."); 
//$row["endereco"] 
?> </td>
<td align="left" nowrap='nowrap' title="<?php echo $row["cidade"] ?>"> 
<?php
 //$row["cidade"] 
 echo mb_strimwidth($row["cidade"], 0, 20, "..."); 
 ?>
 
</td>
<td align="center" nowrap='nowrap' title="<?php echo $row["estado"] ?>"> 
<?php 
echo mb_strimwidth($row["estado"], 0, 2, ""); 
?>
</td>
<td align="center" nowrap='nowrap' > 
<?= $row["cep"] ?>
</td>
<td align="left" nowrap='nowrap' title='<?= $row["regiao_itabom"] ?>'> 
<?php echo mb_strimwidth($row["regiao_itabom"], 0, 20, "...");  ?>

</td>
<td align="center" nowrap='nowrap' > 
<?= $row["peso"] ?>
</td>
<td align="center" nowrap='nowrap' > 
<?= $row["volume"] ?>
</td>
<td align="center" nowrap='nowrap' > 
<?= $row["valor"] ?>
</td>  

<td align="center" nowrap='nowrap' title="<?php echo $row["obs_pedido"] ?>" >
<?php
 //$row["obs_pedido"]
 echo mb_strimwidth($row["obs_pedido"], 0, 10, "..."); 
 ?>
</td>


<td align="center" nowrap='nowrap'  title="ZOOM NO PEDIDO"> 


<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lgn; ?>));map.setZoom(15);infobox(<?php echo $lat; ?>, <?php echo $lgn; ?>, '<?php echo $nome_cliente_ei; ?>');tempofora();"><i class="material-icons" style="font-size:14px">search</i></a>
</td>
<td align="center" nowrap='nowrap' title="EXCLUIR DO VEÍCULO"> 
<?php
// vinculado a veiculo ou nao
if($row["veiculo"] !=''){
// VEICULO ESCOLHIDO OU NAO
if($veiculo1 !=''){
?>
<a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_veiculo&id=<?php echo $row["codigo"] . "&veiculo=" . $row["veiculo"] . "&p=" . $row["peso"] . "&v=" . $row["volume"] . "&va=" . $row["valor"] . "&zoom=" . $zoom1 . "&z=" . $zoom2; ?>')"><i class="material-icons" style="font-size:14px">car_crash</i></a>
<?php
} else {
?>
<a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_veiculo_geral&id=<?php echo $row["codigo"] . "&veiculo=" . $row["veiculo"] . "&p=" . $row["peso"] . "&v=" . $row["volume"] . "&va=" . $row["valor"]. "&zoom=" . $zoom1 . "&z=" . $zoom2; ; ?>')"><i class="material-icons" style="font-size:14px">car_crash</i></a>
<?php
}
}
?>
</td>

<td align="center" nowrap='nowrap' >
<?php
$id_ve = $row["veiculo"];
$seleciona_nome_ve =  "SELECT * from veiculos where id='$id_ve'";
$seleciona_nome_ve = mysql_query($seleciona_nome_ve);
$dados1 = mysql_fetch_array($seleciona_nome_ve);

 //$row["obs_pedido"]
 echo $dados1['nome']; 
 ?>
</td>

<td align="center" nowrap='nowrap'  title="EXCLUIR PEDIDO DO SISTEMA">
<?php

// VEICULO ESCOLHIDO OU NAO
if($row["veiculo"] !=''){

if($veiculo1 !=''){
?>

<a href="javascript:confirmaExclusao2('scripts.php?acao=exclui_pedido_veiculo_individual&id=<?php echo $row["codigo"] . "&veiculo=" . $row["veiculo"] . "&p=" . $row["peso"] . "&v=" . $row["volume"] . "&va=" . $row["valor"]; ?>&cod_pedido=<?php echo $row["codigo_pedido"]; ?>&dt_inclusao=<?php echo $row["data_pedido"]; ?>')"><i class="material-icons" style="font-size:14px; color:#FF0000">remove_circle</i></a>

<?php
} else {
?>

<a href="javascript:confirmaExclusao2('scripts.php?acao=exclui_pedido_veiculo_geral&id=<?php echo $row["codigo"] . "&veiculo=" . $row["veiculo"] . "&p=" . $row["peso"] . "&v=" . $row["volume"] . "&va=" . $row["valor"]; ?>&cod_pedido=<?php echo $row["codigo_pedido"]; ?>&dt_inclusao=<?php echo $row["data_pedido"]; ?>')"><i class="material-icons" style="font-size:14px; color:#FF0000">remove_circle</i></a>


<?php
}

} else {
?>
<a href="javascript:confirmaExclusao2('scripts.php?acao=exclui_pedido&id=<?php echo $row["codigo"]; ?>&cod_pedido=<?php echo $row["codigo_pedido"]; ?>&dt_inclusao=<?php echo $row["data_pedido"]; ?>')"><i class="material-icons" style="font-size:14px; color:#FF0000">remove_circle</i></a>
<?php
}

?>
</td>
</tr> 

 <?php
 
 $conta_clie++;
 ?>

<?php
}
?>
</form>

</tbody>
		
</table>
<br>

<br><br>



  </div>
  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>


	</div>


	

<div class="container" id="makeMeDraggable2">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;" height="32">&nbsp;</td>
					<td width="15%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">date_range</span></td>

					<td width="85%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">CLASSIFICAÇÃO</td>
					
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="content" id='legendas_layer2'>
		
			<form action="" method="POST" name="yyy" id="yyy">
		
				<div id='layers1'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody> 
							<?php
								$query = "select * from classificacao";																
								$rs3 = mysql_query($query);	
								$i=0;							
								while($row3 = mysql_fetch_array($rs3)){

								$result[] = $row3["classificacao"];

								$query_n = "select * from clientes where classificacao='$result[$i]' and roteirizado!='sim' and ativo=0" . $completa0 . $completa1 . $completa2 . $completa3.  $completa4;																
								$rs_n = mysql_query($query_n);	
								$cont = mysql_num_rows($rs_n);						
								?>
								<tr>
								<?php
								if($cont>0){
								?>
					
								<td align="right" style="text-align: center"><input type="checkbox" id="<?php echo $result[$i];?>" name="classificacao[]" value="<?php echo $result[$i];?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left" title="<?php echo $result[$i];?>"><?php 
							//	echo $result[$i] . '(' . $cont . ')';
								echo mb_strimwidth($result[$i], 0, 10, "...") . '<b>(' . $cont . ')</b>';
								?></td>
								<?php
								}
								?>

								</tr>
								<?php

								$i++;

								}
							
							?>
								
							</br>
						</tbody>
					</table>
					
				</div>	
				
			</form>
		

		<input name="filtrar" id="filtrar" type="submit" value="FILTRAR" form="yyy"/><br>
		<form method ="POST" action="scripts.php?acao=limpa_filtro_step3" id="zzz">
		
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="zzz" onclick="limpa();"/>
		</form>
		
	</div>
</div>


<div class="container" id="makeMeDraggable4">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:0px">
			<tbody>
				<tr>
				<td align="right" bgcolor="#589bd4" style="text-align: left; font-weight: bold;" height="32">&nbsp;</td>
				<td width="20%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">group </span></td>
					<td width="80%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">REGIÃO ITABOM</td>
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="content" id='legendas_layer3'>
		
			<form method="POST" name="sss" id="sss">
		
				<div id='layers1'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 5px;">
						<tbody> 
							<?php
								$query_setor = "select * from regiao_itabom order by regiao ASC";															
								$rs3_setor = mysql_query($query_setor);	
								$i=0;							
								while($row3_setor = mysql_fetch_array($rs3_setor)){

								$result_setor[] = $row3_setor["regiao"];
								
								$query_n_setor = "select * from clientes where regiao_itabom='$result_setor[$i]' and roteirizado!='sim' and ativo=0" . $completa0 . $completa1 . $completa2.  $completa3.  $completa4;																
								$rs_n_setor = mysql_query($query_n_setor);	
								$cont_setor = mysql_num_rows($rs_n_setor);
								?>
								<tr>
								<?php
								if($cont_setor>0){
								?>
					
								<td align="right" style="text-align: center;"><input type="checkbox" id="<?php echo $result_setor[$i];?>" name="regiao_itabom[]" value="<?php echo $result_setor[$i];?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left;padding-left: 5px;" title="<?php echo $result_setor[$i];?>"><?php 
							//	echo $result[$i] . '(' . $cont . ')';
								echo mb_strimwidth($result_setor[$i], 0, 20, "...") . '<b>(' . $cont_setor . ')</b>';
								?></td>
							
								<?php
								}
								?>

								</tr>
								<?php

								$i++;

								}
							
							?>
								
							</br>
						</tbody>
					</table>
					
				</div>	
				
			</form>
		
            <input name="filtrar" id="filtrar" type="submit" value="FILTRAR" form="sss"/><br>
		
		<form method ="POST" action="scripts.php?acao=limpa_filtro_step3" id="mmm">
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="mmm" onclick="limpa();"/>
		</form>
		
	</div>
</div>


<div class="container" id="makeMeDraggable7">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:0px">
			<tbody>
				<tr>
				<td align="right" bgcolor="#589bd4" style="text-align: left; font-weight: bold;" height="32">&nbsp;</td>
				<td width="20%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">today </span></td>
					<td width="80%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">DIA DA SEMANA</td>
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="content" id='legendas_layer3'>
		
			<form method="POST" name="aaa" id="aaa">
		
				<div id='layers1'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 5px;">
						<tbody> 
							<?php
								$query_dia = "select * from dia_semana order by id ASC";																
								$rs3_dia = mysql_query($query_dia);	
								$i=0;	
								$cont_dia=0;						
								while($row3_dia = mysql_fetch_array($rs3_dia)){

								$dia[] = $row3_dia["dia"];
								$dia_abreviado = $row3_dia["abreviado"];
								
								$query_n_dia = "select * from clientes where $dia_abreviado='1' and roteirizado!='sim' and ativo=0" . $completa0 . $completa1 . $completa2.  $completa3.  $completa4;																
								$rs_n_dia = mysql_query($query_n_dia);	
								$cont_dia = mysql_num_rows($rs_n_dia);

								?>
								<tr>
								<?php
								if($cont_dia>0){
								?>
					
								<td align="right" style="text-align: center;"><input type="checkbox" id="<?php echo $dia[$i];?>" name="dia[]" value="<?php echo $dia_abreviado;?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left;padding-left: 5px;" title="<?php echo $dia[$i];?>"><?php 
							
								echo mb_strimwidth($dia[$i], 0, 20, "...") . '<b>(' . $cont_dia . ')</b>';
								?></td>
								
								<?php
								}
								?>

								</tr>
								<?php

								$i++;

								}
							
							?>
								
							</br>
						</tbody>
					</table>
					
				</div>	
				
			</form>
		
            <input name="filtrar" id="filtrar" type="submit" value="FILTRAR" form="aaa"/><br>
		
		<form method ="POST" action="scripts.php?acao=limpa_filtro_step3" id="qqq">	
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="qqq" onclick="limpa();"/>
		</form>
		
	</div>
</div>


<div class="container" id="makeMeDraggable_placa">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:0px">
			<tbody>
				<tr>
				<td align="right" bgcolor="#589bd4" style="text-align: left; font-weight: bold;" height="32">&nbsp;</td>
				<td width="20%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">today </span></td>
					<td width="80%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">PLACAS</td>
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="content" id='legendas_layer3'>
		
			<form method="POST" name="nnnz" id="nnnz">
		
				<div id='layers1'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 5px;">
						<tbody> 
							<?php
							$string_transp = '"' . implode('","', $segura_transp) . '"';
							if(preg_match('/outros/i', $string_transp)){
								$string_transp = $string_transp . '," "';
								
							}
							if(!empty($_SESSION['transportadora']) && count($_SESSION['transportadora']) ){
									$query_verifica_veiculos = "SELECT * from veiculos where transportadora in($string_transp) order by transportadora ASC";
								} else {
									$query_verifica_veiculos = "SELECT * from veiculos order by transportadora ASC";
								}
								
								//echo $query_verifica_veiculos;
								$rs_veiculos = mysql_query($query_verifica_veiculos);

							//echo $segura_transp[0];
								while($row_veiculos = mysql_fetch_array($rs_veiculos)){
									$veiculos_ok = $row_veiculos["nome"];
									$trs_ok = $row_veiculos["transportadora"];	

								//echo $transp_cliente . "<br>";

								$conta_ae1=0;
								$query_verifica_veiculos = "SELECT * from clientes where quais_veiculos LIKE '%$veiculos_ok%'" . $completa0 . $completa2.  $completa3 .  $completa4;
								//echo $query_verifica_veiculos;
								$rs_veiculos1 = mysql_query($query_verifica_veiculos);

								while($row_veiculos1 = mysql_fetch_array($rs_veiculos1)){

									//$veiculos_ok1 = $row_veiculos1["codigo_pedido"];	
									//echo $transp_ok . "<br>";
									$conta_ae1++;
									
								}
								?>
								<tr>
								<?php

								if($conta_ae1!=0){
									//echo  $transp_cliente . "(" . $conta_ae . ")" . "<br>";
									?>


								<td align="right" style="text-align: center;"><input type="checkbox" id="<?php echo $veiculos_ok;?>" name="veiculos[]" value="<?php echo $veiculos_ok;?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left;padding-left: 5px;" title="<?php echo $veiculos_ok;?>"><?php 
							
								echo mb_strimwidth($veiculos_ok, 0, 20, "...") . '<b>(' . $conta_ae1 . ')</b>' . '<b>' . " -- " . $trs_ok . '</b>';
								?></td>
								
<?php
								}

								?>
								</tr>
								<?php
									}
								
								
								
?>

								
								
							</br>
						</tbody>
					</table>
					
				</div>	
				
			</form>
		
            <input name="filtrar" id="filtrar" type="submit" value="FILTRAR" form="nnnz"/><br>
		
		<form method ="POST" action="scripts.php?acao=limpa_filtro_step3" id="iiiv">	
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="iiiv" onclick="limpa();"/>
		</form>
		
	</div>
</div>


<div class="container" id="makeMeDraggable_transp">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:0px">
			<tbody>
				<tr>
				<td align="right" bgcolor="#589bd4" style="text-align: left; font-weight: bold;" height="32">&nbsp;</td>
				<td width="20%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">today </span></td>
					<td width="80%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">TRANSPORTADORAS</td>
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="content" id='legendas_layer3'>
		
			<form method="POST" name="nnn" id="nnn">
		
				<div id='layers1'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 5px;">
						<tbody> 
							<?php
								$query_verifica_transp = "SELECT * from transportadora_itabom order by transportadora ASC";
								$rs_transp = mysql_query($query_verifica_transp);

								//echo $segura_veiculo[0];

							//echo $completa4;
								while($row_transp = mysql_fetch_array($rs_transp)){
									$transp_cliente = $row_transp["transportadora"];	

								//echo $transp_cliente . "<br>";

								$conta_ae=0;
								$query_verifica_transp1 = "SELECT * from clientes where transportadoras LIKE '%$transp_cliente%'"  . $completa0 . $completa1 . $completa2.  $completa3 .  $completa4;
								//echo $query_verifica_transp1;
								$rs_transp1 = mysql_query($query_verifica_transp1);

								while($row_transp1 = mysql_fetch_array($rs_transp1)){

									$transp_ok = $row_transp1["codigo_pedido"];	
									//echo $transp_ok . "<br>";
									$conta_ae++;
									
								}
								?>
								<tr>
								<?php

								if($conta_ae!=0){
									//echo  $transp_cliente . "(" . $conta_ae . ")" . "<br>";
									?>


								<td align="right" style="text-align: center;"><input type="checkbox" id="<?php echo $transp_cliente;?>" name="transportadora[]" value="<?php echo $transp_cliente;?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left;padding-left: 5px;" title="<?php echo $transp_cliente;?>"><?php 
							
								echo mb_strimwidth($transp_cliente, 0, 20, "...") . '<b>(' . $conta_ae . ')</b>';
								?></td>
								
<?php
								}

								?>
								</tr>
								<?php
									}
								
								
								
?>

								
								
							</br>
						</tbody>
					</table>
					
				</div>	
				
			</form>
		
            <input name="filtrar" id="filtrar" type="submit" value="FILTRAR" form="nnn"/><br>
		
		<form method ="POST" action="scripts.php?acao=limpa_filtro_step3" id="iii">	
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="iii" onclick="limpa();"/>
		</form>
		
	</div>
</div>



<div class ="container" id="makeMeDraggable" name="makeMeDraggable" onmouseout="return false"> 
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"   style="padding:0px; height:35px; width:80px;">
			<tbody>
				<tr>
				<td align="right" bgcolor="#589bd4" style="text-align: left; font-weight: bold;" height="32">&nbsp;</td>
				<td width="30%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">map </span></td>
					<td width="70%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">&nbsp;&nbsp;LAYER</td>
			</tr>
			</tbody>
		</table>	
	</div>  
    <div class="content" id='legendas_layer'>
		<div>
			<form action="#" method="post" name="yyy1" id="yyy1">
    			<div id='layers'>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 6px;">
						<tbody>  <p></p>
							<?php
							$con1 = mysql_connect("127.0.0.1", "root", "HtMQZhAwCNzeaAfT") or die ("Sem conexão com o servidor");
							$select1 = mysql_select_db("cadd") or die("Sem acesso ao DB, Entre em contato com o Administrador!");
							$query20 = "select * from layers where id_user='$id_user' order by id DESC";															
							$rs20 = mysql_query($query20);

							while($row20 = mysql_fetch_array($rs20)){

								$pega_nome = $row20['nome_layer'];
								$pega_id = "layer" . $row20['id'];
								$pega_arquivo = $row20['arquivo'];
							?>
	
		<tr>
			<td align="left" style="text-align: left; width:10%"><input type="checkbox" id="<?php echo $pega_id; ?>" onclick="Applealert(<?php echo $row20['id']; ?>, document.yyy1.<?php echo $pega_id; ?>, 'http://www.caddsaas.com.br/SAAS/RO2.0/KMZ/<?php echo $pega_arquivo; ?>');"/></td>
			<td  valign="middle" style="text-align: left">&nbsp;<?php 
			//echo $pega_nome; 
			echo mb_strimwidth($pega_nome, 0, 22, "...");
			?></td>
			</tr>

<?php
}
?>
</br>
	
</tbody>
</table>
</div>
</form>
</div>



</div>
</div>


<div class="container" id="apDiv14c">
<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px">
			<tbody>
				<tr>
					<td align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;" height="32">&nbsp;</td>
					<td width="20%" align="right" bgcolor="#589bd4" style="text-align: center; font-weight: bold;"><span class="material-icons" style="font-size: 16px;color:white">local_shipping </span></td>
					<td width="80%" align="left" bgcolor="#589bd4" style="text-align: left; font-weight: bold; color: white;">VEÍCULO</td>
			</tr>
			</tbody>
		</table>	
	</div>




	<div>
<div id="apDiv16">

<div id='layers2'>
			

<table width="100%" border="0"  cellspacing="0" cellpadding="0">
  <tr bgcolor="#ECECEC" style="text-align: center; font-weight: bold;" height="34" >
    <td><font color="#000000" style="font-weight:bold;">ICONE</font></td>
    <td><font color="#000000" style="font-weight:bold;">PLACA</font></td>
    <td><font color="#000000" style="font-weight:bold;">TIPO</font></td>
  </tr>
  <tr style="text-align: center;" height="44" bgcolor="#ffffff">
	<td><font color="#000000" style="font-weight:bold;">
	<?php if ($tipo1=="Moto"){ ?><img src="imgs/<?php echo "v06_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1=="Carreta"){ ?><img src="imgs/<?php echo "v05_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1=="Truck"){ ?><img src="imgs/<?php echo "v04_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1=="Toco"){ ?><img src="imgs/<?php echo "v03_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1=="Van"){ ?><img src="imgs/<?php echo "v02_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1=="Vuc"){ ?><img src="imgs/<?php echo "v01_" . $cor_veiculo_resgate . ".png";  ?>" height='20px'/><?php } ?>
  <?php if ($tipo1==""){ ?><img src="imgs/vx.png" height='20px'/><?php } ?>
	</font></td>
	<td><font color="#000000">
	<?php 
  if ($id1 == "" ){
	  echo "Livre"; 
	  } else { 
	  echo $veiculo1; 
	  } 
  
  ?>
	</font></td>
	<td><font color="#000000">
	<?php
    if ($id1 == "" ){
	  echo "?"; 
	  } else { 
	  echo $tipo1; 
	  } 
	
	
	?>
	</font></td>
  </tr>
  <tr bgcolor="#ECECEC" style="text-align: center; font-weight: bold; color:#000000" height="34" >
    <td>PESO</td>
    <td>VOLUME</td>
    <td>VALOR</td>
  </tr>

  <tr style="text-align: center; font-weight: bold; color:#000000" height="25" bgcolor="#FFFFFF">
    <td><font color="#000000" style="font-weight:bold;">  <input name="v_controlex" id="v_controlex" type="text" size="5" readonly="readonly" value="<?php 
   if ($id1 == "" ){
	  echo "?"; 
	  } else { 
 	 echo $peso_resgate - $result_peso; 


	  } 
  
  
  ?>" /></font></td>
    <td><font color="#000000" style="font-weight:bold;">  <input name="v_volume1x" id="v_volume1x" type="text" size="5" readonly="readonly" value="<?php 
   if ($id1 == "" ){
	  echo "?"; 
	  } else { 
  	  echo $volume_resgate - $result_volume;  
	  } 

  ?>" /></font></td>
    <td><font color="#000000" style="font-weight:bold;">    <input name="v_valor1x" id="v_valor1x" type="text" size="5" readonly="readonly" value="<?php 
  if ($id1 == "" ){
	  echo "?"; 
	  } else { 
	echo $valor_resgate - $result_valor;   
	  } 	

	
	?>" /></font></td>
  </tr>


  <tr style="text-align: center; font-weight: bold; color:#FFFFFF" height="70" bgcolor="#ffffff">
    <td>

	<div id="apDiv14_porcento_peso"><input name="v_porcentagem" id="v_porcentagem" type="text" size="10" readonly="readonly" value="<?php echo number_format($porc_peso, 0, ',', '.') . "%" ; ?>" /></div>
	<?php
	if ($porc_peso==0){
	?>
  <img src="imgs/carga_1.png" width="47" height="47" name="carga" id="carga" /></td>
  <?php	
	}
	if ($porc_peso<=16 && $porc_peso>0){
	?>
  <img src="imgs/carga_2.png" width="47" height="47" name="carga" id="carga" /></td>
  <?php	
		}
		
	if ($porc_peso<=32 && $porc_peso>16){
	?>
  <img src="imgs/carga_3.png" width="47" height="47" name="carga" id="carga" /></td>
  <?php	
		}
	if ($porc_peso<=48 && $porc_peso>32){
	?>
  <img src="imgs/carga_4.png" width="47" height="47" name="carga" id="carga" /></td>
  <?php	
	}
	if ($porc_peso<=64 && $porc_peso>48){
	?>
  <img src="imgs/carga_5.png"  width="47" height="47" name="carga" id="carga" /></td>
  <?php	
		}
	if ($porc_peso<=80 && $porc_peso>64){
	?>
  <img src="imgs/carga_6.png"  width="47" height="47" name="carga" id="carga" /></td>
  <?php	
		}	
	if ($porc_peso>80 && $porc_peso<=100){
	?>
  <img src="imgs/carga_7.png"  width="47" height="47" name="carga" id="carga" "/></td>
  <?php	
		}

	if ($porc_peso>100){
	?>
  <img src="imgs/carga_over.png"  width="47" height="47" name="carga" id="carga" /></td>
  <?php	
		}
	?>
  

	</td>
    <td>
	<div id="apDiv14_porcento_volume"><input name="v_porcentagem_volume" id="v_porcentagem_volume" type="text" size="10" readonly="readonly" value="<?php echo number_format($porc_volume, 0, ',', '.') . "%"; ?>" /></div>
	<?php
	if ($porc_volume==0){
	?>
	 <img src="imgs/carga_1.png" width="47" height="47" name="carga_volume" id="carga_volume"/></td>
    <?php	
	}
	if ($porc_volume<=16 && $porc_volume>0){
	?>
	 <img src="imgs/carga_2.png" width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
		}
		
	if ($porc_volume<=32 && $porc_volume>16){
	?>
	 <img src="imgs/carga_3.png" width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
		}
	if ($porc_volume<=48 && $porc_volume>32){
	?>
	 <img src="imgs/carga_4.png" width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
	}
	if ($porc_volume<=64 && $porc_volume>48){
	?>
	 <img src="imgs/carga_5.png"  width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
		}
	if ($porc_volume<=80 && $porc_volume>64){
	?>
	 <img src="imgs/carga_6.png"  width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
		}	
	if ($porc_volume>80 && $porc_volume<=100){
	?>
	 <img src="imgs/carga_7.png"  width="47" height="47" name="carga_volume" id="carga_volume"/></td>
    <?php	
		}

	if ($porc_volume>100){
	?>
	 <img src="imgs/carga_over.png"  width="47" height="47" name="carga_volume" id="carga_volume" /></td>
    <?php	
		}
	?>

	</td>
    <td>

  <div id="apDiv14_porcento_valor"><input name="v_porcentagem_valor" id="v_porcentagem_valor" type="text" size="10" readonly="readonly" value="<?php echo number_format($porc_valor, 0, ',', '.') . "%"; ?>" /></div>

	<?php
	if ($porc_valor==0){
	?>
	 <img src="imgs/carga_1.png" width="47" height="47" name="carga_valor" id="carga_valor"/></td>
    <?php	
	}
	if ($porc_valor<=16 && $porc_valor>0){
	?>
	 <img src="imgs/carga_2.png" width="47" height="47" name="carga_valor" id="carga_valor" /></td>
    <?php	
		}
		
	if ($porc_valor<=32 && $porc_valor>16){
	?>
	 <img src="imgs/carga_3.png" width="47" height="47" name="carga_valor" id="carga_valor" /></td>
    <?php	
		}
	if ($porc_valor<=48 && $porc_valor>32){
	?>
	 <img src="imgs/carga_4.png" width="47" height="47" name="carga_valor" id="carga_valor" /></td>
    <?php	
	}
	if ($porc_valor<=64 && $porc_valor>48){
	?>
	 <img src="imgs/carga_5.png"  width="47" height="47" name="carga_valor" id="carga_valor" /></td>
    <?php	
		}
	if ($porc_valor<=80 && $porc_valor>64){
	?>
	 <img src="imgs/carga_6.png"  width="47" height="47" name="carga_valor" id="carga_valor" /></td>
    <?php	
		}	
	if ($porc_valor>80 && $porc_valor<=100){
	?>
	 <img src="imgs/carga_7.png"  width="47" height="47" name="carga_valor" id="carga_valor"/></td>
    <?php	
		}

	if ($porc_valor>100){
	?>
	 <img src="imgs/carga_over.png"  width="47" height="47" name="carga_valor" id="carga_valor"/></td>
    <?php	
		}
	
	?>

	</td>

  </tr>
 
  <tr bgcolor="#ECECEC" style="text-align: center; font-weight: bold; color:#000000" height="34" >
    <td colspan="3">OCIOSO</td>
  </tr>
  <tr style="text-align: center; font-weight: bold; color:#FFFFFF" height="25" bgcolor="#FFFFFF">
    <td><font color="#000000" style="font-weight:bold;">  <input name="v_controle" id="v_controle" type="text" size="5" readonly="readonly" value="<?php 
   if ($id1 == "" ){
	  echo "?"; 
	  } else { 
 	 echo $result_peso; 
	  } 
  
  
  ?>" /></font></td>
    <td><font color="#000000" style="font-weight:bold;">  <input name="v_volume1" id="v_volume1" type="text" size="5" readonly="readonly" value="<?php 
   if ($id1 == "" ){
	  echo "?"; 
	  } else { 
  	  echo $result_volume;  
	  } 

  
  
  ?>" /></font></td>
    <td><font color="#000000" style="font-weight:bold;"><input name="v_valor1" id="v_valor1" type="text" size="5" readonly="readonly" value="<?php 
  if ($id1 == "" ){
	  echo "?"; 
	  } else { 
	echo $result_valor;   
	  } 	

	
	?>" /></font></td>
  </tr>
  <tr bgcolor="#ECECEC" style="text-align: center; font-weight: bold; color:#000000" height="34" >
	<td>VISITAS</td>
	<td>PEDIDOS</td>
	<td></td>
  </tr>
  <tr style="text-align: center; font-weight: bold; color:#FFFFFF" height="25" bgcolor="#FFFFFF">
    <td>	
		<input name="visitas2" id="visitas2" type="text" readonly="readonly" size="6" value="<?php 
   if ($id1 == "" ){
    echo "?"; 
	  } else { 
 	 echo $numero_resgate_visitas; 
	  } 
	  
	?>" /></td>
    <td>
	<input name="visitas" id="visitas" type="text" readonly="readonly" size="6" value="<?php 
   if ($id1 == "" ){
	  echo "?"; 
	  } else { 
 	 echo $numero_resgate; 
	  } 
	  
	?>" />
	</td>
    <td>

	</td>
  </tr>
  <tr>
	  <td colspan="3">

	  <input type='submit' value='ATUALIZAR' onclick="javascript:atualiza_icones()" style="width: 188px;"/>
	  </td>
  </tr>
</table>




</div>


	<div id="apDiv22_b">
<?php
	  if($conta_orfans==0 and $mkt_conta_veiculos_ativos==0){
	?>
	
    <script>
	alert('As Rotas foram finalizadas ou a filtragem não encontrou resultado! Escolha outro filtro ou insira mais pedidos no Passo 1! Verifique se existem pedidos desabilitados no Passo 2!');
    //window.location.href = 'step1.php';
	</script>
    <?php 
	
	}
	  ?>
  <table width="100%" border="0"  cellspacing="0" cellpadding="0" style="padding-left: 4px; padding-right: 2px;">
  <tr bgcolor="#FFFFFF" style="text-align: center;" height="34" >
    <td colspan="3"><font color="#000000" style="font-weight:bold;">DADOS GERAIS</font></td>

  </tr>

  <tr bgcolor="#ECECEC" style="text-align: center;" height="34" >
    <td><font color="#000000" style="font-weight:bold;">ROTAS</font></td>
    <td><font color="#000000" style="font-weight:bold;">ÓRFÃOS</font></td>
    <td><font color="#000000" style="font-weight:bold;">R/PESO</font></td>
  </tr>
  <tr style="text-align: center;" height="25" bgcolor="#FFFFFF">
    <td><font color="#000000" ><?php echo $mkt_conta_veiculos_ativos; ?></font></td>
    <td><font color="#000000"><?php echo $conta_orfans; ?></font></td>
    <td><font color="#000000" ><?php echo $_conta_faltando_peso; ?></font></td>
  </tr>
  <tr bgcolor="#ECECEC" style="text-align: center; font-weight: bold; color:#000000" height="34" >
    <td>PESO</td>
    <td>VOLUME</td>
    <td>VALOR</td>
  </tr>
  <tr style="text-align: center; color:#FFFFFF" height="25" bgcolor="#FFFFFF">
    <td><font color="#000000"><?php echo $soma_peso; ?></font></td>
    <td><font color="#000000" ><?php echo $soma_volume; ?></font></td>
    <td><font color="#000000"><?php echo $soma_valor; ?></font></td>
  </tr>
</table>



</div>
	

    
    <div id="apDiv14b">

      <input name="v_peso" id="v_peso" type="hidden" size="5" value="<?php 
	  if ($id1 == "" ){
	  echo "?"; 
	  } else { 
	  echo $peso1; 
	  } 
	  ?>" />
  <input name="v_volume" id="v_volume" type="hidden" size="5" value="<?php 
  	  if ($id1 == "" ){
	  echo "?"; 
	  } else { 
	  echo $volume1; 
	  } 
  ?>" />
  <input name="v_valor" id="v_valor" type="hidden" size="5" value="<?php 
  
  	 if ($id1 == "" ){
	  echo "?"; 
	  } else { 
 	 echo $valor1;
	  } 
  ?>" />
    
    </div>

   
  
    </div>

	<?php
if ($veiculo1!=''){
	?>
	<div id="apDiv17_lista"><input type="image" src="imgs/button_save_veiculo1.png" onclick="javascript:openNav();" alt="Lista de visitas"></div>
	
	
	<?php
} else {

	?>
	<div id="apDiv17_lista"><input type="image" src="imgs/button_save_veiculo1.png" onclick="javascript:openNav();" alt="Lista de visitas"></div>
	
	
	<?php

}
	?>
<div id="apDiv15"><div id="color-palette"></div></div>
<form action="" method="post" name="salvala" id="salvala">

<div id="apDiv17"><a href=""><input type="image" src="imgs/button_save_veiculo.png" onclick="formulario();" alt="Salvar alterações"></a>
    

<input type="hidden" id="posX2" name="posX2" size="5" value="<?php echo $posx; ?>"/>
<input type="hidden" id="posY2" name="posY2" size="5" value="<?php echo $posy; ?>"/>

<input type="hidden" id="posX_tools2" name="posX_tools2" size="5" value="<?php echo $posx_tools; ?>"/>
<input type="hidden" id="posY_tools2" name="posY_tools2" size="5" value="<?php echo $posy_tools; ?>"/>

<input type="hidden" id="posX_layers2" name="posX_layers2" size="5" value="<?php echo $posx_layers; ?>"/>
<input type="hidden" id="posY_layers2" name="posY_layers2" size="5" value="<?php echo $posy_layers; ?>"/>
</div>

  <input type="hidden" id="zoom1" name="zoom1" size="5"/>
  <input type="hidden" id="zoom_x1" name="zoom_x1" size="5"/>
  


  
       <input type="hidden" id="peso" name="peso" size="5"/>
       <input type="hidden" id="volume" name="volume" size="5"/>
       <input type="hidden" id="valor" name="valor" size="5"/>
       
       <input name="equipe_poligono" id="equipe_poligono" type="hidden" size="12" />
       <input name="veiculo_tira" size="12" id="veiculo_tira" type="hidden">
       <input name="peso_veiculo_tira" type="hidden" id="peso_veiculo_tira" value="" size="12" />
 	   <input name="volume_veiculo_tira" type="hidden" id="volume_veiculo_tira" value="" size="12" />    
	   <input name="valor_veiculo_tira" type="hidden" id="valor_veiculo_tira" value="" size="12" />
	   <input name="id_veiculo" id="id_veiculo" type="hidden" size="12" value="<?php echo $id1; ?>" />
	   <input name="tipo" id="tipo" type="hidden" size="12" value="" />
	   <input name="type_icon" id="type_icon" type="hidden" size="12" value="" />
       <input name="peso2" id="peso2" type="hidden" size="12" value="" />
       <input name="volume2" id="volume2" type="hidden" size="12" value=""/>
       <input name="valor2" id="valor2" type="hidden" size="12" value="" />   
    
       <input name="endereco_cliente" id="endereco_cliente" type="hidden" size="12" value=""/>
       
    </form>
 
 <div id="apDiv17_marker_disable"><img src="imgs/button_delete_marker_disable.png" width="43" height="40" alt=""/></div>
  
  <div id="apDiv17_marker"><a href="#" data-tooltip="Excluir visitas do veículo contidas no poligono"><img src="imgs/button_delete_marker.png" width="43" height="40" alt=""/></a></div>
  <div id="apDiv17_orange_volta">
	<a href="step3.php" data-tooltip="Escolher veículo livre"><input type="image" src="imgs/button_orange_volta.png" width="43" height="40" alt="Escolher veículo livre"></a>

</div>
<div id="apDiv17_orange">

<a href="javascript:mostraDIVa();"><input type="image" src="imgs/button_save_veiculo2.png" alt="Escolher veículo" ></a>

<form  method="post" name="salvala2" id="salvala2">


<input type="hidden" id="posX" name="posX" size="5" value="<?php echo $posx; ?>" hidden/>
<input type="hidden" id="posY" name="posY" size="5" value="<?php echo $posy; ?>" hidden/>

<input type="hidden" id="posX_tools" name="posX_tools" size="5" value="<?php echo $posx_tools; ?>"/>
<input type="hidden" id="posY_tools" name="posY_tools" size="5" value="<?php echo $posy_tools; ?>"/>

<input type="hidden" id="posX_layers" name="posX_layers" size="5" value="<?php echo $posx_layers; ?>"/>
<input type="hidden" id="posY_layers" name="posY_layers" size="5" value="<?php echo $posy_layers; ?>"/>

 	   <input  id="pesox" name="pesox" size="5" hidden/>
       <input  id="volumex" name="volumex" size="5" hidden/>
       <input  id="valorx" name="valorx" size="5" hidden/>       
       <input type="hidden" id="zoom2" name="zoom2" size="5" hidden/>
       <input type="hidden" id="zoom_x2" name="zoom_x2" size="5" hidden/>     
       <input name="equipe_poligonox" id="equipe_poligonox" type="hidden" size="12" hidden/>
       <input name="veiculo_tirax" size="12" id="veiculo_tirax" hidden >
       <input name="peso_veiculo_tirax"  id="peso_veiculo_tirax" value="" size="12" hidden/>
 	   <input name="volume_veiculo_tirax" id="volume_veiculo_tirax" value="" size="12" hidden/>    
	   <input name="valor_veiculo_tirax"  id="valor_veiculo_tirax" value="" size="12" hidden/>
	   <input name="id_veiculox" id="id_veiculox" size="12" value="<?php echo $id1; ?>" hidden/>
	   <input name="tipox" id="tipox" type="hidden" size="12" value="" hidden/>
	   <input name="type_iconx" id="type_iconx" type="hidden" size="12" value="" />
       <input name="peso2x" id="peso2x" size="12" value="" hidden />
       <input name="volume2x" id="volume2x" size="12" value="" hidden/>
       <input name="valor2x" id="valor2x"  size="12" value="" hidden/>       
       <input name="endereco_clientex" id="endereco_clientex" type="hidden" size="12" value=""/>
</form>
</div>
<div id="apDiv17_mao"><a href="#" data-tooltip="Mover Mapa"><input type="image" src="imgs/button_arrasta.png" alt="Arrastar Mapa" width="43" height="40" onclick="javascript:mao_aciona()"></a></div>
<div id="apDiv17a"><a href="#" data-tooltip="Excluir Poligono sem alteração no veículo"><input type="image" src="imgs/button_delete_poly.png" alt="Excluir Poligono" width="43" height="40" id="delete-button"></a></div> 
</div>
</div>
</div>




<div id="apDiv11">

<div id="map_canvas" style="width: 100%; height: 100%; margin: 0 0 0 0; top:-29px; left:0px;"></div>



  
  <script>
	  

function controla_nav() {
<?php
if($controle_nav==1){
?>
  document.getElementById("mySidenav").style.width = "1010px";
  <?php
}
?>

}

function openNav() {
  document.getElementById("mySidenav").style.width = "1010px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>



<script>

    function limpa() {

        localStorage.clear();

    }




document.addEventListener("DOMContentLoaded", function(){

   var checkbox = document.querySelectorAll("input[type='checkbox']");

   for(var item of checkbox){
      item.addEventListener("click", function(){
         localStorage.s_item ? // verifico se existe localStorage
            localStorage.s_item = localStorage.s_item.indexOf(this.id+",") == -1 // verifico de localStorage contém o id
            ? localStorage.s_item+this.id+"," // não existe. Adiciono a id no loaclStorage
            : localStorage.s_item.replace(this.id+",","") : // já existe, apago do localStorage
         localStorage.s_item = this.id+",";  // não existe. Crio com o id do checkbox
      });
   }

   if(localStorage.s_item){ // verifico se existe localStorage
      for(var item of checkbox){ // existe, percorro as checkbox
         item.checked = localStorage.s_item.indexOf(item.id+",") != -1 ? true : false; // marco true nas ids que existem no localStorage
      }
   }
   $("#botao").click(function() {
    localStorage.clear();
    window.location = window.location;	
  });
});
</script>
 

<script>
		$(".header").click(function () {
			$header = $(this);
			//getting the next element
			$content = $header.next();
			//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
			$content.slideToggle(10, function () {
			});
		});
	</script>

<div id="makeMeDraggable1" name="makeMeDraggable1"> 
  
  <div id='legendas_layer1'>
    <table width="43" border="0" cellspacing="0" cellpadding="0">
      <tbody>
    <tr height="30">
      <td height="30" align="center">
      <span style="text-align: center"><img src="imgs/drag&amp;drop.png" width="15" height="15" alt=""/></span>
      </td>
    </tr>
    <tr>
      <td height="42" background="imgs/button_arrasta_20.png">
   <a href="#" style="text-align: left" data-tooltip="MOVER MAPA" ><input type="image" src="imgs/button_arrasta.png" alt="MOVER MAPA" width="43" height="40" id="mao_tool" onclick="javascript:mao_aciona()"></a>
      </td>
    </tr>
    <tr>
      <td height="42" background="imgs/button_create_poly_20.png">
       <a href="#" style="text-align: left" data-tooltip="CRIAR POLIGONO"><input type="image" src="imgs/button_create_poly.png" alt="CRIAR POLIGONO" width="43" height="40" id="criar_poligono" onclick="javascript:poligono_aciona()"></a>
      </td>
    </tr>
    <tr height="42">
      <td background="imgs/button_delete_poly_20.png">
      <a href="" data-tooltip="EXCLUIR POLIGONO">
        <input type="image" src="imgs/button_delete_poly.png" alt="EXCLUIR POLIGONO" width="43" height="40" id="delete-button2"/>
      </a></td>
    </tr>
	
    <tr height="42">
      <td>
	  <a href="javascript:mostraDIVb();" data-tooltip="ESCOLHER VEÍCULO DA FROTA"> <input type="image" src="imgs/button_add_veiculo.png" alt="ESCOLHER VEÍCULO DA FROTA" width="43" height="40"></a>
	  
<form action="escolher_veiculo.php" method="post" name="salvala3" id="salvala3" target="_self">
  <input type="hidden" id="zoom" name="zoom" size="5" hidden/>
  <input type="hidden" id="zoom_x" name="zoom_x" size="5" hidden/>
  

<input type="hidden" id="posX_layers1" name="posX_layers1" size="5" hidden/>
<input type="hidden" id="posY_layers1" name="posY_layers1" size="5" hidden/>

<input type="hidden" id="posX_tools1" name="posX_tools1" size="5" hidden/>
<input type="hidden" id="posY_tools1" name="posY_tools1" size="5" hidden/>

<input type="hidden" id="posX_1" name="posX_1" size="5" hidden/>
<input type="hidden" id="posY_1" name="posY_1" size="5" hidden/>



  </form>
      
      </td>
    </tr>
    <tr height="42">
      <td background="imgs/button_orange_volta_20.png">
      <a href="step3.php" data-tooltip="ESCOLHER VEÍCULO LIVRE">
	
      <input type="image" src="imgs/button_orange_volta.png" width="43" height="40" id="volta_verde" alt="ESCOLHER VEÍCULO LIVRE" />
      </a></td>
    </tr>
    <tr>
      <td height="42" background="imgs/button_delete_now_disable.png"><span style="text-align: left"><a href="javascript:confirmaExclusao_soveiculo('scripts.php?acao=esvazia_visita_veiculo&id=<?php echo $id1;  ?>')" style="text-align: center" data-tooltip="QUEBRAR VISITAS DO VEÍCULO ESCOLHIDO"><img src="imgs/button_delete_now.png" width="43" height="40"  id="delete_now"/></a></span></td>
    </tr>
    <tr height="42">
      <td>
      <span style="text-align: center"><a href="javascript:confirmaExclusao1('scripts.php?acao=esvazia_veiculos_step')" data-tooltip="QUEBRAS TODAS VISITAS"><img src="imgs/button_delete_all.png" width="43" height="40"/></a></span>
      </td>
    </tr>
    <tr height="42">
      <td>
      <span style="text-align: center"><a href="javascript:block('scripts.php?acao=esvazia_veiculos_step')" data-tooltip="CONTROLE DE ROTAS"><img src="imgs/button_block.png" width="43" height="40"/></a></span>
      </td>
    </tr>

  </tbody>
</table>
</div>  
</div>

<div class="footer">
  
  <table border="0" style="width: 100%; height:100%"   cellpadding="0" cellspacing="0">
<tr >
  <td style="font-size: 11px;text-align: left;">
  <input type='submit' name='submit' value='VOLTAR' onclick="confirmavolta('step2.php')"/>
  </td>
  
  <td style="font-size: 11px;text-align: right;">
  <form name="go_step4" action="step4.php">
<input type='submit' value='AVANÇAR' onclick="return alerta(); "/>
</form>
    </td>
</tr>

  </table>

</div>

</div>


<div id="layers_todos" name="layers_todos">



<div id="block"  style="display: none;">
<iframe name="pag2_block" src="" frameborder=0 id="pag2_block" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_block" frameborder="0" id="pag1_block" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_block"><a href="step3.php"  onclick="window.location.reload();" trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  


<div id="editar"  style="display: none;">
<iframe name="pag2_editar" src="" frameborder=0 id="pag2_editar" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_editar" frameborder="0" id="pag1_editar" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_editar"><a href="#" onclick="document.getElementById('editar').style.display = 'none'"   trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  


<div id="geo"  style="display: none;">
<iframe name="pag2_geo" src="" frameborder=0 id="pag2_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_geo" frameborder="0" id="pag1_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_geo"><a href="#"  onclick="document.getElementById('geo').style.display = 'none'" trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  

<div id="Pagina" name="Pagina" style="display: none;"> 
   <p align="center"><iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe></p>
</div>

<div id="Paginaa" name="Paginaa"  style="display: none;"> 
<iframe name="pag2a" src="" frameborder=0 id="pag2a" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">

	</iframe>
	<div id="botao2"  name="botao2"><a href="" onclick="document.getElementById('Paginaa').style.display = 'none'" trusted="yes"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
</div>

<div id="Paginab" name="Paginab"  style="display: none;"> 

<iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag1y" frameborder="0" id="pag1y" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	</iframe>
	<div id="botao2"  name="botao2"><a href="#" onclick="document.getElementById('Paginab').style.display = 'none'" trusted="yes"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
</div>

</div>


<div id="Pagina_loc_novo" name="Pagina_loc_novo" style="display: none;" > 

<iframe name="pag2_loc_novo" src="" frameborder=0 id="pag2_loc_novo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag1_loc_novo" frameborder="0" id="pag1_loc_novo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	</iframe>
	<div id="botao"  name="botao"><a href="#" onclick="document.getElementById('Pagina_loc_novo').style.display = 'none'" trusted="yes"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
</div>

</div>

</body >
</html>