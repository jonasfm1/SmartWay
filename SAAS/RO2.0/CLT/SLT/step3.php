<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv_3.css">
<link rel="stylesheet" type="text/css" href="css/step3_novao.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

<?php
include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',12000);
?>

<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&libraries=drawing&v=3.22"></script>

<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/flutuante.js"></script>
<?php

$posx = $_GET["posx1"];
$posy = $_GET["posy1"];

$posx_tools = $_GET["posx_tools"];
$posy_tools = $_GET["posy_tools"];

$posx_layers = $_GET["posx_layers"];
$posy_layers = $_GET["posy_layers"];

$posx_filtro = $_GET["posx_layers"];
$posy_filtro = $_GET["posy_layers"];


if($posx==0 AND $posy==0){
	$posx= 5;
	$posy= 40;	
}

if($posx_tools==0 AND $posy_tools==0){
	
	
	$posx_tools= 0;
	$posy_tools= 0;	
}

if($posx_layers==0 AND $posy_layers==0){
	$posx_layers= 210;
	$posy_layers= 40;	
}


if($posx_filtro==0 AND $posy_filtro==0){

}

$posx_filtro= 413;
$posy_filtro= 40;	


?>

<script LANGUAGE="JavaScript">


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
});

$(document).ready(function(){
  var elementOffset = $('#makeMeDraggable2').offset({top:<?php echo $posy_filtro ?>,left:<?php echo $posx_filtro ?>});
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






// LAYERS/////////////////////////////////
$(init);

function init() {
	$('#makeMeDraggable').draggable( {
		   drag: function(){
            var offset = $(this).offset();
            var xPos_layers = offset.left;
            var yPos_layers = offset.top;			
			document.getElementById("posX_layers").value = xPos_layers;
			document.getElementById("posY_layers").value = yPos_layers;
			
		
			document.getElementById("posX_layers2").value = xPos_layers;
			document.getElementById("posY_layers2").value = yPos_layers;
			
        },
    	containment: '#content',
    	cursor: 'move',
		scroll: false,
    	snap: '#content'
  	});
	

}



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




$(init2);

function init2() {
	
	
  $('#apDiv14c').draggable( {
	  
	   drag: function(){
            var offset = $(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;			
			document.getElementById("posX").value = xPos;
			document.getElementById("posY").value = yPos;
		
			document.getElementById("posX2").value = xPos;
			document.getElementById("posY2").value = yPos;
			
        },
    containment: '#content',
    cursor: 'move',
	scroll: false,
    snap: '#content'
  });	
}

$(init3);

function init3() {

  $('#makeMeDraggable2').draggable( {
	  
	   drag: function(){
            var offset = $(this).offset();
            var xPos = offset.left;
            var yPos = offset.top;			
			document.getElementById("posX").value = xPos;
			document.getElementById("posY").value = yPos;
		
			document.getElementById("posX2").value = xPos;
			document.getElementById("posY2").value = yPos;
			
        },
    containment: '#content',
    cursor: 'move',
	scroll: false,
    snap: '#content'
  });	
}








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

function confirmaExclusao(aURL) {

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
$query_where = "UPDATE passo SET ok='yes' WHERE id='3'";
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
$_SESSION["urlred"] = $_SERVER["REQUEST_URI"];

if(!empty($_POST['classificacao'])){
	$_SESSION['classificacao'] = $_POST['classificacao'];
}


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
//$query = "SELECT * FROM clientes INNER JOIN veiculos ON clientes.veiculo = veiculos.id WHERE veiculos.roteirizado !='sim'";	
$query ="SELECT * FROM clientes WHERE roteirizado!='sim' AND ativo=0" . $completa0;
//echo $query;
//SELECT * FROM clientes AS C INNER JOIN veiculos AS V ON C.veiculo = V.id WHERE V.roteirizado!='sim';													
$rs = mysql_query($query);
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
	$setor[$mrk_cnt] = $row["setor"];
	
	$endereco_cli[$mrk_cnt] = $row["codigo"];
	$endereco_cli_mesmo[$mrk_cnt] = $row["endereco"];	
	$bairro[$mrk_cnt] = $row["bairro"];
	$cidade[$mrk_cnt] = $row["cidade"];
	$premium[$mrk_cnt] = $row["premium"];
	
	$codigo_pedido[$mrk_cnt] = $row["codigo_pedido"];
	
	$obs_pedido[$mrk_cnt] = $row["obs_pedido"];
	
	$ocupado[$mrk_cnt] = $row["veiculo"];
	
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

codigo_pedido_js = <?php echo json_encode($codigo_pedido) ?>;

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
		zoom_js_x = 7;
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
   		 url: 'http://www.caddsaas.com.br/SAAS/RO2.0/KMZ/grandesp_ok.kmz',
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
	$query_agrupar = "select *, COUNT(codigo_cliente) AS Qtd, SUM(peso) AS Qtd_peso, SUM(volume) AS Qtd_volume, SUM(valor) AS Qtd_valor from clientes where roteirizado!='sim' AND ativo=0 " . $completa0 . "group by codigo_cliente having count(codigo_cliente)>1";
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
    	echo "marker$ie = new google.maps.Marker({position: pointX$ie, map: map, title: '$nome_cad_pontos[$ie]', icon: 'imgs/icon_start_step3.png',});\n";
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
		
		
		
		
    	echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VOLUME:</strong> $volume[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$endereco_cli_mesmo[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>OBS.: </strong>$obs_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(id_cliente_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
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
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map, title: '$nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i]• VALOR: $valor[$i]', icon: 'imgs/$premium[$i].png',});\n";
		
		echo "google.maps.event.addListener(marker[$i],
         'click',  function() {
   		     infowindow$i.open(map,marker[$i]);
          });\n";
			
		} else {
			
		echo "point$i = new google.maps.LatLng($lat_cad[$i],$lng_cad[$i]);\n";
		
    	
		echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VOLUME:</strong> $volume[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$endereco_cli_mesmo[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>OBS.: </strong>$obs_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(id_cliente_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
	
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
		
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map, title: '$nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i] • VALOR: $valor[$i]', icon: 'imgs/pickup_camper_pin.png',});\n";
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
		
   		echo "mrktx$i = \"<div id='iw_container'><div class='iw_title' style='background-color:#589bd4'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='30px'><img src='imgs/ico_realizado.png' width='22' height='22'/></td><td style='text-wrap:normal;width:400'>$string_menor[$i] ($id_cliente[$i])</td></tr></table></div><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='40px'></td><td style='padding-top:20px; padding-bottom:5px; font-size:11px'><strong>PEDIDO:</strong> $codigo_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>PESO:</strong> $peso[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VOLUME:</strong> $volume[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>VALOR:</strong> $valor[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>END.:</strong>$endereco_cli_mesmo[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>BAIRRO/CIDADE: </strong>$bairro[$i], $cidade[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><strong>OBS.: </strong>$obs_pedido[$i]</td></tr><tr><td width='40px'></td><td style='padding-top:5px; padding-bottom:5px; font-size:11px'><a href='javascript:geo(id_cliente_js[$i])';> <i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit_location_alt</i>&nbsp;LOCALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:editar(id_cliente_js[$i])';><i class='material-icons' style='font-size:20px; vertical-align:bottom'>edit</i>&nbsp;EDITAR</a></td></tr></table></div>\";";
		
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
		
    	echo "marker[$i] = new google.maps.Marker({position: point$i, map: map, title: '$nome_veiculo - $nome[$i]($codigo_pedido[$i]) • PESO: $peso[$i] • VOL.: $volume[$i] • VALOR: $valor[$i]', icon: 'imgs/$imagem_mapa',});\n";
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
	premium=[];
	
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
				var junta_title = nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i];
				
			
				
				if ((id_icon == null) || (id_icon == "")) {
					
		
				marker[i] = new google.maps.Marker({position: point, map: map, title: junta_title, icon: 'imgs/pickup_camper_on.png',});	
					
					
				}else {
					marker[i] = new google.maps.Marker({position: point, map: map, title: junta_title, icon: junta_veiculo});			
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
						
							
							var junta_title = nomes_veiculos[g] + '-' + nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • SETOR: ' + guarda_setor[i];
							marker[i] = new google.maps.Marker({position: point, map: map, title:  junta_title, icon: junta_veiculo1});	
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
							
							var junta_title = nomes_veiculos[s] + '-' + nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i];
							
							marker[i] = new google.maps.Marker({position: point, map: map, title:  junta_title, icon: junta_veiculo2});	
							//alert("O PONTO ESTA FORA DO POLIGONO CRIADO E PERTENCE A OUTRO GRUPO");
							
							}
						}
								
				}
							 
						
////////////////////////////////////////////////////////////////////////////////////					
//O PONTO NAO FOI USADO AINDA	
//////////////////////////////////////////////////////////////////////////////////// 
				} else {
					
					var junta_title = nome_js[i] + '(' + guarda_codigo_pedido[i] + ')' + ' • PESO: ' + guarda_peso[i] + ' • VOLUME: ' + guarda_volume[i] + ' • VALOR: ' + guarda_valor[i];
					
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

if(confirm('Você tem certeza que deseja excluir este cliente do veículo?')) {

location.href = aURL;

//target=ver;

}
}


$(document).ready(function(){
	$("#capaefectos").show();
	$("#ocultar").hide();
	
	
	
	$("#ocultar").click(function(event){
	  event.preventDefault();
	  $("#capaefectos").show();
	  $("#capaefectos").animate({top: "90%"});
	  $("#ocultar").hide();
	   $("#mostrar").show();
	});
 
	$("#mostrar").click(function(event){
	  event.preventDefault();
	   $("#capaefectos").show();
	  $("#capaefectos").animate({top: "40%"});
	   $("#ocultar").show();
	   $("#mostrar").hide();
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
<body onload='load();'>





<style>
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
</style>
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
  <table border="0" cellpadding="0" cellspacing="0" align="left" style="padding-top: 25px; padding-bottom: 30px; width:500px" >
		<tr>
			
		
            <td align="left" valign="middle" nowrap="nowrap" width ='370px' style="color:#000000;">
            <strong><font size="4">&nbsp;LISTA DE VISITAS/PEDIDOS - <?php echo $veiculo1 ?></font></strong>
			</td>
		
	   </tr>
		<tr>
			<td>
			<hr size = 1 width ='100%' color="#ECECEC">
			</td>
		</tr>
	

		</table>
        <br> <br>   <br> 

		<?php
if ($veiculo1!=''){
?>


<?php
	
$query = "select * from clientes WHERE veiculo='$id1' group by codigo_cliente HAVING COUNT(*) <= 1 order by codigo_cliente";																
$rs = mysql_query($query);

$totalderegistros = mysql_num_rows($rs);

?>

<table width="1136px" border="0" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">

<tr bgcolor="#ECECEC" height="34px" style="color: #000000;font-weight: bold;" nowrap='nowrap'>                                                          
<td> 
<div align="left" nowrap='nowrap'>CÓDIGO</div></td>
<td> 
<div align="left" nowrap='nowrap'>NOME</div>
</td>
<td> 
<div align="left" nowrap='nowrap'>ENDEREÇO</div>
</td>
<td> 
<div align="left" nowrap='nowrap'>CIDADE</div>
</td>
<td nowrap='nowrap'> 
<div align="left">UF</div>
</td>
<td  nowrap='nowrap'> 
<div align="left">CEP</div>
</td>
<td> 
<div align="center" nowrap='nowrap'>PESO</div>
</td>
<td> 
<div align="center" nowrap='nowrap'>VOLUME</div>
</td>
<td> 
<div align="center" nowrap='nowrap'>VALOR</div>
</td>
<td> 
<div align="left" nowrap='nowrap'>C.PEDIDO</div>
</td>  
<td> 
<div align="left" nowrap='nowrap'>OBS.</div>
</td>

<td style="width: 10px;">
<div align="center" nowrap='nowrap' ></div>
</td>
<td style="width: 10px;"> 
<div align="center" nowrap='nowrap'></div>
</td>
</tr>
<?php


$query_crazy = "SELECT * FROM clientes WHERE veiculo='$id1' AND codigo_cliente IN (SELECT codigo_cliente FROM clientes WHERE veiculo='$id1' GROUP BY codigo_cliente HAVING COUNT(*) > 1) ORDER BY codigo_cliente";																
$rs_crazy = mysql_query($query_crazy);




$last_heading = null;
$totalderegistros1 = mysql_num_rows($rs_crazy);
//echo $totalderegistros1;
while($row1 = mysql_fetch_array($rs_crazy)){
	//echo $id1;
		$endereco = $row1["endereco"];
		$cidade = $row1["cidade"];
		$estado = $row1["estado"];
		$cep = $row1["cep"];
		$cod_cli =  $row1["codigo_cliente"];
		$confianca = $row1["confianca_cad"];
		$lat = $row1["latitude_cad"];
		$lgn = $row1["longitude_cad"];
		$end = $row1["endereco_cad"];
		$nome_cliente_ei = $row1["nome"];
	
		$query_soma = "SELECT SUM(peso) AS peso, SUM(volume) AS volume, SUM(valor) AS valor FROM clientes WHERE veiculo='$id1' AND codigo_cliente='$cod_cli'";
		$query_soma = mysql_query($query_soma);
		$dados = mysql_fetch_array($query_soma);
		//echo $dados['clientes'];
		
		
	if($last_heading != $row1["codigo_cliente"]){
		
		
		if($last_heading != null){
		?>
        
        <?php
		}
		
		?>        
        <tr bgcolor="#ECECEC" style="color:#000000" nowrap='nowrap'>
		<td align="left" id="id" nowrap="nowrap"><?php echo $row1["codigo_cliente"]; ?></td>
        <td align="left" nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>
        <td align="center" nowrap='nowrap'><?php echo $dados['peso']; ?></td>
        <td align="center" nowrap='nowrap' ><?php echo $dados['volume']; ?></td>
        <td align="center" nowrap='nowrap'><?php echo $dados['valor']; ?></td>
        <td nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>
        <td nowrap='nowrap'></td>

        <td nowrap='nowrap'></td>
		</tr>
        <?php
		$last_heading = $row1["codigo_cliente"];
		
	}

		?>

        
             
<tr bgcolor="#ffffff" >
<td align="left" id="id" nowrap="nowrap" bgcolor="#FFFFFF"></td>  
<td align="left" nowrap='nowrap'  title="<?php echo $row1["nome"]; ?>"> <?php 
echo mb_strimwidth($row1["nome"], 0, 40, "..."); 
//$row1["nome"] ?></td>
<td align="left" id="endereco" nowrap='nowrap'  title="<?php echo $row1["endereco"]; ?>"> <?php
 //$row1["endereco"] 
 echo mb_strimwidth($row1["endereco"], 0, 40, "..."); 
 ?> </td>
<td align="left" nowrap='nowrap' title="<?php echo $row1["cidade"] ?>"> <?php
 //$row1["cidade"] 
 echo mb_strimwidth($row1["cidade"], 0, 20, "..."); 
 ?></td>
<td align="left"  nowrap='nowrap'> <?= $row1["estado"] ?></td>
<td align="left" nowrap='nowrap'> <?= $row1["cep"] ?></td>
<td align="center" nowrap='nowrap'><?= $row1["peso"] ?></td>
<td align="center" nowrap='nowrap'><?= $row1["volume"] ?></td>
<td align="center" nowrap='nowrap'> <?= $row1["valor"] ?></td>  
<td align="left" nowrap='nowrap'> <?= $row1["codigo_pedido"] ?></td>
<td align="left" nowrap='nowrap' title="<?php echo  $row1['obs_pedido']?>">
<?php
 
 echo mb_strimwidth($row1["obs_pedido"], 0, 15, "...");
 ?></td>


<td align="center"  nowrap='nowrap' > 


<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lgn; ?>));map.setZoom(18);infobox(<?php echo $lat; ?>, <?php echo $lgn; ?>, '<?php echo $nome_cliente_ei; ?>');tempofora();"><i class="material-icons" style="font-size:14px">search</i></a>
</td>
<td align="center"  nowrap='nowrap'> 
<a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_veiculo&id=<?php echo $row1["codigo"] . "&veiculo=" . $id1 . "&p=" . $row1["peso"] . "&v=" . $row1["volume"] . "&va=" . $row1["valor"]; ?>')"><i class="material-icons" style="font-size:14px">close</i></a>
</td>
</tr> 

<?php
}

?>


<?php 

//////////////////////////////
$conta_clie = 0;
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
?>
<tr bgcolor="#FFFFFF" nowrap='nowrap'>
<td align="left" id="id" nowrap="nowrap">
<span><font color="#FF0000"></font></span> 
<?= $row["codigo_cliente"] ?> </td>  
<td align="left" nowrap='nowrap' title="<?php echo $row["nome"]; ?>"> 

<?php 
//$row["nome"] 
echo mb_strimwidth($row["nome"], 0, 40, "...");
?></td>
<td align="left" id="endereco" title="<?php echo $row["endereco"]; ?>" nowrap='nowrap'> 
<?php
echo mb_strimwidth($row["endereco"], 0, 40, "..."); 
//$row["endereco"] 
?> </td>
<td align="left" nowrap='nowrap' title="<?php echo $row["cidade"] ?>"> 
<?php
 //$row["cidade"] 
 echo mb_strimwidth($row["cidade"], 0, 40, "..."); 
 ?>
 
</td>
<td align="left" nowrap='nowrap' > 
<?= $row["estado"] ?>
</td>
<td align="left" nowrap='nowrap' > 
<?= $row["cep"] ?>
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
<td align="left" nowrap='nowrap' > 
<?= $row["codigo_pedido"] ?>
</td>
<td align="left" nowrap='nowrap' title="<?php echo $row["obs_pedido"] ?>" >
<?php
 //$row["obs_pedido"]
 echo mb_strimwidth($row["obs_pedido"], 0, 15, "..."); 
 ?>
</td>


<td align="center" nowrap='nowrap'> 


<a href="javascript:map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lgn; ?>));map.setZoom(18);infobox(<?php echo $lat; ?>, <?php echo $lgn; ?>, '<?php echo $nome_cliente_ei; ?>');tempofora();"><i class="material-icons" style="font-size:14px">search</i></a>
</td>
<td align="center" nowrap='nowrap'> 
<a href="javascript:confirmaExclusao('scripts.php?acao=exclui_cliente_veiculo&id=<?php echo $row["codigo"] . "&veiculo=" . $id1 . "&p=" . $row["peso"] . "&v=" . $row["volume"] . "&va=" . $row["valor"]; ?>')"><i class="material-icons" style="font-size:14px">close</i></a>
</td>
</tr> 
 <?php
 
 $conta_clie++;
 ?>
 <script>
	if(numero_resgate==0 || numero_resgate==null){
		
	//	alert(numero_resgate);		
		} else {
//		alert(numero_resgate);		
		}
</script>
<?php
}
?>


</table>
<br><br><br>

<?php	
} 
?>
  </div>
  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>


	</div>



<div id="apDiv11">



<div id="makeMeDraggable1" name="makeMeDraggable1"> 
  
  <div id='legendas_layer1'>
    <table width="43" border="0" cellspacing="0" cellpadding="0">
      <tbody>
    <tr height="30">
      <td height="30" align="center">
      <span style="text-align: center"><img src="imgs/drag&amp;drop.png
		  
		  
		  " width="15" height="15" alt=""/></span>
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
      <span style="text-align: center"><a href="javascript:confirmaExclusao('scripts.php?acao=esvazia_veiculos_step')" data-tooltip="QUEBRAS TODAS VISITAS"><img src="imgs/button_delete_all.png" width="43" height="40"/></a></span>
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
<div id="map_canvas" style="width: 100%; height: 100%; margin: 0 0 0 0; top:-29px; left:0px;"></div>



  
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "1200px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>



<div class="container" id="makeMeDraggable2">
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:4px">
			<tbody>
				<tr>
					<td align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;" height="35">&nbsp;</td>
					<td width="59%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold; color: white;">CLASSIFICAÇÃO</td>
					<td width="21%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;"><img src="imgs/drag&amp;drop.png" width="15" height="15" alt=""/></td>
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

								$query_n = "select * from clientes where classificacao='$result[$i]' and roteirizado!='sim' and ativo=0";																
								$rs_n = mysql_query($query_n);	
								$cont = mysql_num_rows($rs_n);


								
								?>
								<tr>
								<?php
								if($cont>0){
								?>
					
								<td align="right" style="text-align: center"><input type="checkbox" id="<?php echo $result[$i];?>" name="classificacao[]" value="<?php echo $result[$i];?>"/></td>
								<td colspan="2" valign="middle" style="text-align: left"><?php 
							//	echo $result[$i] . '(' . $cont . ')';
								echo mb_strimwidth($result[$i], 0, 10, "...") . '(' . $cont . ')';
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
		
		<input name="limpar" id="limpar" type="submit" value="LIMPAR" form="zzz" onclick="toggle(checked)"/>
		</form>
		
	</div>
</div>
<script>


function toggle(checked) {
  var elm = document.getElementById('classificacao');
  if (checked != elm.checked) {
    elm.click();
  }
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
 
<div class="container" id="apDiv14c">
<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:4px">
			<tbody>
				<tr>
					<td align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;" height="35">&nbsp;</td>
					<td width="59%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold; color: white;">VEÍCULO</td>
					<td width="21%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;"><img src="imgs/drag&amp;drop.png" width="15" height="15" alt=""/></td>
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
	alert('Rotas finalizadas! Escolha outra classficação ou insira mais pedidos no Passo 1! Verifique se existem pedidos desabilitados no Passo 2!');
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




<div class ="container" id="makeMeDraggable" name="makeMeDraggable" onmouseout="return false"> 
	<div class="header">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding:4px">
			<tbody>
				<tr>
					<td align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;" height="35">&nbsp;</td>
					<td width="59%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold; color: white;">LAYERS</td>
					<td width="21%" align="right" bgcolor="#2867b2" style="text-align: center; font-weight: bold;"><img src="imgs/drag&amp;drop.png" width="15" height="15" alt=""/></td>
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
			<td align="right" style="text-align: center"><input type="checkbox" id="<?php echo $pega_id; ?>" onclick="Applealert(<?php echo $row20['id']; ?>, document.yyy1.<?php echo $pega_id; ?>, 'http://www.caddsaas.com.br/SAAS/RO2.0/KMZ/<?php echo $pega_arquivo; ?>');"/></td>
			<td colspan="2" valign="middle" style="text-align: left">&nbsp;&nbsp;<?php 
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


</form>
</div>
</div>

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


<div id="block"  style="display: none;">
<iframe name="pag2_block" src="" frameborder=0 id="pag2_block" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_block" frameborder="0" id="pag1_block" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_block"><a href="javascript:void(0); "  onclick="window.location.reload();" trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  


<div id="editar"  style="display: none;">
<iframe name="pag2_editar" src="" frameborder=0 id="pag2_editar" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_editar" frameborder="0" id="pag1_editar" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_editar"><a href="javascript:void(0); "  onclick="window.location.reload();" trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  


<div id="geo"  style="display: none;">
<iframe name="pag2_geo" src="" frameborder=0 id="pag2_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">  </iframe>
	
	   <iframe name="pag1_geo" frameborder="0" id="pag1_geo" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	  
	  </iframe>
	  <div id="botao_geo"><a href="javascript:void(0);"  onclick="window.location.reload();" trusted="yes" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
   </div>  

<div id="Pagina" name="Pagina" style="display: none;"> 
   <p align="center"><iframe name="pag1" frameborder="0" id="pag1" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe></p>
</div>

<div id="Paginaa" name="Paginaa"  style="display: none;"> 

<iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">

	</iframe>
	<div id="botao2"  name="botao2"><a href="javascript:void(0); " onclick="window.location.reload();" trusted="yes"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
</div>

<div id="Paginab" name="Paginab"  style="display: none;"> 

<iframe name="pag2" src="" frameborder=0 id="pag2" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
    <iframe name="pag1y" frameborder="0" id="pag1y" scrolling="no" marginheight="0" marginwidth="0" trusted="yes">
	</iframe>
	<div id="botao"  name="botao"><a href="javascript:void(0); " onclick="window.location.reload();" trusted="yes"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
</div>
</body >
</html>