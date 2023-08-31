<?php 

include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);


?>
<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='300;URL=#'>";
?>
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step3.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="js/chartphp.js"></script>
<link rel="stylesheet" href="js/chartphp.css">

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnCp4LFE-63TwLNXxE_mrYJXRpA3LLKvg&sensor=false&language=pt-BR&amp;libraries=places"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.geocomplete.js"></script>
<script src="js/logger.js"></script>
<script src="js/flutuante.js"></script>
<script LANGUAGE="JavaScript">

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
				"hue": "#4a2702"
			},
			
			
			
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"hue": "#5f3b02"
			},
		
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"hue": "#004f8a"
			},
			
		]
	},
	{
		"featureType": "water",
		"stylers": [
			{
				"hue": "#004f8a"
			},
			
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

function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este cliente?')) {

location.href = aURL;

//target=ver;

}
}


	function mostraDIV(){
		document.getElementById("Pagina").style.display = "block";
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

function autoSubmit() {
    var formObject = document.forms['theForm'];
    formObject.submit();
}


</SCRIPT>
</head>
<div class="jquery-waiting-base-container">
<body>

 
</div>
<div id="div_titulo">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

     	   <td align="left" valign="middle"><font size="3">MAPA DE MONITORAMENTO</font></td>
     
		
    </tr>
</table>

	</div>
<?php include ('base_cad.php'); ?>
<div id="apDiv11">
  <div id="help" class="help"><img src="imgs/help.png" width="45" height="45" alt=""/><div id="sidebar">
  <p>• <strong>FILTRO:</strong> Filtre a lista para uma visualização desejada.</p><br />
  <p>• <strong>MAPA:</strong> Visualize no mapa os pontos selecionados.</p><br />
  <p>• <strong>CLICAR:</strong> Clique no cliente para identifica-lo.</p><br />
    
    </div>

</div>
  <?php
$pega_listagem = "";
$pega_listagem = $_GET["lista"];
$pega_login = "";
$pega_login = $_GET["id_login"];
$pega_rota = "";
$pega_rota = $_GET["id_rota"];



if($user==$logado){
$user = '%%';
}


if($_GET["id_lista"]!=''){
$pega_lista = $_GET["id_lista"];
}
else{
$pega_lista = '%%';
}


if($_GET["id_login"]!=''){
$pega_login = $_GET["id_login"];
}
else{
$pega_login = '%%';
}


if($_GET["id_rota"]!=''){
$pega_rota = $_GET["id_rota"];
}
else{
$pega_rota = '%%';
}


$query_oia1 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");


$query_oia2 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia3 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia4 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

$query_oia5 = mysql_query("select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.rota ASC, rotas.sequencia");

	
$total_0k1 = mysql_num_rows($query_oia1);
$total_0k2 = mysql_num_rows($query_oia2);
$total_0k3 = mysql_num_rows($query_oia3);
$total_0k4 = mysql_num_rows($query_oia4);
$total_0k5 = mysql_num_rows($query_oia5);
	

if ($pega_listagem == ""){
	
 }
//echo "lista:".$pega_listagem." Login:".$pega_login."  (".$total.") registros";
if($pega_listagem == "red"){
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "NEGATIVADOS";
	}
	
if($pega_listagem == "orange"){
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "PENDENTES";
	}
	
if($pega_listagem == "green"){
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "POSITIVADOS";
	}		

if($pega_listagem == "blue"){
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "TODOS";
	}
	
if($pega_listagem == "black"){
	$query = "select rotas.*, usuario.coordenador,usuario.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.rota LIKE '$pega_rota' AND rotas.lista LIKE '$pega_lista' ORDER BY rotas.login, rotas.rota ASC, rotas.sequencia";
	$rs = mysql_query($query);
	$total = mysql_num_rows($rs);
	$guarda_nome = "ALERTAS";
	}		



//////////PESQUISA PIZZA /////////////
 
$query_pizza_todos = "select rotas.*, usuario.coordenador, usuario.login from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'";														
$rs_pizza_todos = mysql_query($query_pizza_todos);
$num_rows_pizza_todos = mysql_num_rows($rs_pizza_todos);


$query_pizza1 = "select rotas.*, usuario.coordenador, usuario.login from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.status=1 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'";													
$rs_pizza1 = mysql_query($query_pizza1);
$num_rows_pizza1 = mysql_num_rows($rs_pizza1);
$num_rows_pizza1_conta = "Positivados - " . $num_rows_pizza1 . " visitas - (" . number_format(($num_rows_pizza1/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza2 = "select rotas.*, usuario.coordenador, usuario.login from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.status=2 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'";															
$rs_pizza2 = mysql_query($query_pizza2);
$num_rows_pizza2 = mysql_num_rows($rs_pizza2);
$num_rows_pizza2_conta = "Negativados - " . $num_rows_pizza2 . " visitas - (" . number_format(($num_rows_pizza2/$num_rows_pizza_todos)*100, 1) . "%)";


$query_pizza3 = "select rotas.*, usuario.coordenador, usuario.login from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.status=0 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'";															
$rs_pizza3 = mysql_query($query_pizza3);
$num_rows_pizza3 = mysql_num_rows($rs_pizza3);
$num_rows_pizza3_conta = "Pendentes - " . $num_rows_pizza3 . " visitas - (" . number_format(($num_rows_pizza3/$num_rows_pizza_todos)*100, 1) . "%)";

$query_pizza4 = "select rotas.*, usuario.coordenador, usuario.login from rotas INNER JOIN usuario ON rotas.login=usuario.login where usuario.coordenador!='' AND usuario.coordenador LIKE '$user' AND rotas.status=3 AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' AND rotas.rota LIKE '$pega_rota' AND rotas.classificacao!='I'";														
$rs_pizza4 = mysql_query($query_pizza4);
$num_rows_pizza4 = mysql_num_rows($rs_pizza4);
$num_rows_pizza4_conta = "Alertas - " . $num_rows_pizza4 . " visitas - (" . number_format(($num_rows_pizza4/$num_rows_pizza_todos)*100, 1) . "%)";


?>



  <div id="apDiv12a">
   
 <form name='theForm' id='theForm'>  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr height="35px" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">
 

 
      
<td height="45" colspan="6" bgcolor="#579bd3" >

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
      <tr height="35px">
        <td width="2%">&nbsp;&nbsp;</td>
        <td width="30%">
       
    <select name="id_login" style="width:98%">
      <option value="">LOGIN</option>
      <?php 
	$query3 = "select login from usuario where coordenador LIKE '$user' AND nivel!=1 order by login";															
	$rs3 = mysql_query($query3);		
	
								
	while($row3 = mysql_fetch_array($rs3)){
	$id_login = strtoupper($row3["login"]);
	?>
      
      <?php 
	if ($pega_login== $id_login){
	?>
      <option selected value="<?= $id_login ?>"><?= $id_login ?></option>
      <?php }
	
	else {
		?>
      <option value="<?= $id_login ?>"><?= $id_login ?></option>
      <?php
		}
    ?>
      <?php
	}
  ?>
      </select>      
        </td>
       
        <td width="30%">
          <select name="id_lista" style="width:98%">
            <option value="">LISTA</option>
            <?php 
$query_lista = "select rotas.lista, usuario.coordenador from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' GROUP BY rotas.lista order by rotas.id DESC";														
	$rs_lista = mysql_query($query_lista);									
	while($row_lista = mysql_fetch_array($rs_lista)){
		$id_rota_lista = $row_lista["lista"];
?>
            <?php 
	if ($pega_lista== $id_rota_lista){
	?>
            <option selected value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota_lista ?>"><?= $id_rota_lista ?></option>
            <?php
		}
	 }
?>
            </select>
        </td>
        <td width="30%">
          
          <select name="id_rota" style="width:98%">
            <option value="">ROTA</option>
            <?php 
	$query3 = "select rotas.rota, usuario.coordenador, rotas.login from rotas INNER JOIN usuario ON usuario.login=rotas.login where usuario.coordenador LIKE '$user' AND rotas.login LIKE '$pega_login' AND rotas.lista LIKE '$pega_lista' GROUP BY rotas.rota order by rotas.statusrota, rotas.rota ASC";															
	$rs3 = mysql_query($query3);									
	while($row3 = mysql_fetch_array($rs3)){
	$id_rota = $row3["rota"];
	?>
            <?php 
	if ($pega_rota== $id_rota){
	?>
            <option selected value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php } else {
		?>
            <option value="<?= $id_rota ?>"><?= $id_rota ?></option>
            <?php
		}
	}
  ?>
            </select>
          
        </td>
        <td width="6%"><input type="submit" value="FILTRAR"></td>
      <td width="2%">&nbsp;&nbsp;</td>
      </tr>
    </tbody>
</table>
</td>
      

    </tr>
  
    </tr>
         <tr height="3px" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">
     
     </tr>
      <tr style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; width:450px;">

      
      <td width="20%" height="30px" align="left" bgcolor="#C00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="red" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'red') { ?>checked='checked' <?php } ?> />
NEG.
<?php 
echo "(" . $total_0k1 . ")";?>
      </td>
      <td width="20%" height="30px" align="left" bgcolor="#F90">&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="orange" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'orange') { ?>checked='checked' <?php } ?>/>
PEND.
<?php 
echo "(" . $total_0k2 . ")";?>
      </td>
      <td width="20%" height="30px" align="left" bgcolor="#5cbc69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="green" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'green') { ?>checked='checked' <?php } ?>/>
POS.
<?php 
echo "(" . $total_0k3 . ")";?>
      </td>
        <td width="20%" height="30px" align="left" bgcolor="#000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="black" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'black') { ?>checked='checked' <?php } ?>/>
ALERTA
<?php 
echo "(" . $total_0k5 . ")";?>
      </td>
      <td width="20%" height="30" align="left" bgcolor="#589bd4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="blue" name="lista" onchange="autoSubmit();" <?php if ($pega_listagem == 'blue') { ?>checked='checked' <?php } ?>/>
TODOS
<?php 
echo "(" . $total_0k4 . ")";?>
      </td>
    </tr>
  
  
  
  </tbody>
</table>
</form>
</div> 
      
<div id="apDiv12">
<?php


///// LOCALIZACAO DA EMPRESA///
$query_cli = "select * from usuario where login='$logado'";
$rs_cli = mysql_query($query_cli);

$dados = mysql_fetch_array($rs_cli);

$lat = $dados['lat'];
$lgn = $dados['lgn'];
//echo $lat;

///// LOCALIZACAO DO COLABORADOR///
$query_cli1 = "select * from usuario where login='$pega_login'";
$rs_cli1 = mysql_query($query_cli1);

$dados1 = mysql_fetch_array($rs_cli1);

$lat1 = $dados1['lat'];
$lgn1 = $dados1['lgn'];

//echo $lat1;

/////////////BLUE (TODOS)//////////////////////////////////////////////
if ($total==0){
echo "<div id='filtragem_vazia'><font size='2' style='line-height:70px;'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILTRAGEM VAZIA! </strong>" . $guarda_nome . "</font></div>";
	
} else {



	$i = 0;
	$lat_cad[]=null;
	$lng_cad[]=null;
	$ocorrencia[]=null;
	$nome[]=null;
	$status[]=null;
	$ocorrencia[]=null;
	$lista[]=null;
	$rota[]=null;
	$sequencia[]=null;
	$endereco[]=null;
	$cidade[]=null;
	$tempo[]=null;
	$dth_ocorrencia[]=null;
	$classe[]=null;
	$obs[]=null;
	
	////////////ALEATORIO////////////
	while($row = mysql_fetch_array($rs)){
			$lat_cad[$i] = $row["y"];
			$lng_cad[$i] = $row["x"];
		
		$oco = $row["ocorrencia"];
		$query_qual = "select * from ocorrencia where id=$oco";														
		$query_qual = mysql_query($query_qual);	
		$dados = mysql_fetch_array($query_qual);

		$ocorrencia[$i] = $dados['ocorrencia'];
		$nome[$i] = $row["nome"];
		$lista[$i] = $row["lista"];
		$rota[$i] = $row["rota"];
		$sequencia[$i] = $row["sequencia"];
		$endereco[$i] = $row["endereco"];
		$cidade[$i]=$row["cidade"];
		$tempo[$i]=$row["tempo"];
		$portuga=strtotime($row["dth_ocorrencia"]);
		$dth_ocorrencia[$i] = date('d/m/Y H:i:s', $portuga);
		
		$classe[$i]=$row["classificacao"];
		$obs[$i]=$row["obs"];
		
		$dth=null;
		if ($row["status"]!=0){
		$timestamp = strtotime($row["dth_ocorrencia"]);
		$dth = date('d/m/Y H:i:s', $timestamp);
		}
		
	
		$status[$i] = $row["status"];
		
			if ($row["status"]=='0'){ 
			$icone[$i]="imgs/icon_orange.png"; 
	
			$color_box[$i] = "F90";
			}
			if ($row["status"]=='1'){ 
			$icone[$i]="imgs/icon_green.png"; 
		
			$color_box[$i] = "5cbc69";
			}
			if ($row["status"]=='2'){ 
			$icone[$i]="imgs/icon_red.png"; 
	
			$color_box[$i] = "C00";
			}
			if ($row["status"]=='3'){ 
			$icone[$i]="imgs/icon_black.png"; 
			
			$color_box[$i] = "000000";
			}
			
			
		$i++; 

	}

}


?>

</div>
</div>
                                                  

<script type="text/javascript">
<?php 


if($pega_listagem !='blue')	{
$i--; 
?>
	var locations = [ 
	  <?php 
	  while($i > 0){
	   ?>['<?php echo $nome[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrencia[$i]?>','<?php echo $color_box[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>'], 
	   <?php $i--; ?>
	   <?php }?>
	   ['<?php echo $nome[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrencia[$i]?>','<?php echo $color_box[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>']
    ];
	
	
    var map = new google.maps.Map(document.getElementById('apDiv12'), {
       zoom: 9,
	   styles: styles,
       center: new google.maps.LatLng(<?php echo $lat_cad[$i]?>, <?php echo $lng_cad[$i]?>),
       //mapTypeId: google.maps.MapTypeId.ROADMAP
	      mapTypeControl: true,
          mapTypeControlOptions: {
			
              style: google.maps.MapTypeControlStyle.DEFAULT,
              position: google.maps.ControlPosition.BOTTOM_CENTER
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
          scaleControl: true,
		   fullscreenControl: false,
          streetViewControl: true,
          streetViewControlOptions: {
          position: google.maps.ControlPosition.BOTTOM_CENTER
	
          },
    });

 			   map.get('streetView').setOptions({
               addressControlOptions: { 
                 position: google.maps.ControlPosition.BOTTOM_CENTER,
               },
               zoomControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_CENTER
               },
               panControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_BOTTOM
               },
			  	fullscreenControl: false
            })
			
  

    var infowindow = new google.maps.InfoWindow();

	var bounds = new google.maps.LatLngBounds();
    var marker, marker1, marker2, i;

 	 ///ICONE CASA
	  <?php
 	if ($pega_login!="%%"){
 	  ?>
  
	 	marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat1;?>, <?php echo $lgn1;?>),
        map: map,
		icon: 'imgs/icon_casa.png'
      });

   var content_rastro2 = '<div id="iw_container2"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "RESIDÊNCIA: " . $pega_login; ?></td></tr></table></div></div>';
 
    var infoWindow2 = new google.maps.InfoWindow({
        content: content_rastro2
    });	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow2.close();});
	  	google.maps.event.addListener(infoWindow2, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
   google.maps.event.addListener(marker2, 'click', function() {
        infoWindow2.open(map, marker2);
    });
	 <?php
	}
 	  ?>

	  
    for (i = 0; i < locations.length; i++) { 
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: 'imgs/icon_<?php echo $pega_listagem.".png"?>'
      });
  
  ///ICONE EMPRESA
  
	    marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lgn;?>),
        map: map,
		icon: 'imgs/icon_job.png'
      });
	   var content_rastro3 = '<div id="iw_container2" style="background-color:#2867b1"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "SEDE: " . strtoupper($logado); ?></td></tr></table></div></div>';
		 
	  
	     var infoWindow1 = new google.maps.InfoWindow({
        content: content_rastro3
    });	
	
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});
	  	google.maps.event.addListener(infoWindow1, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		
		
   google.maps.event.addListener(marker1, 'click', function() {
        infoWindow1.open(map, marker1);
    });
	
	
	  
	  bounds.extend(marker.getPosition());
		
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		  
	if(locations[i][13] == "F90"){

	var content = '<div id="iw_container">' +'<div class="iw_title" style="background-color:#'+locations[i][13]+'"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_realizado.png" width="22" height="22"/></td><td align="left">'+locations[i][0]+'</td></tr></table></div><div class="iw_content"><strong>Lista: </strong>'+locations[i][4]+'<br><strong>Rota: </strong>'+locations[i][6]+'<br><strong>Sequência: </strong>'+locations[i][7]+'<br><strong>Endereço: </strong>'+locations[i][9]+'<br><strong>Cidade: </strong>'+locations[i][10]+'<br><strong>Classe: </strong>'+locations[i][14]+'<br><strong>T. estimado:: </strong>'+locations[i][11]+' min.<br><strong>Obs: </strong>'+locations[i][15]+'</div></div>';

}  else {

	var content = '<div id="iw_container">' +'<div class="iw_title" style="background-color:#'+locations[i][13]+'"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_realizado.png" width="22" height="22"/></td><td align="left">'+locations[i][0]+'</td></tr></table></div><div class="iw_content"><strong>Lista: </strong>'+locations[i][4]+'<br><strong>Rota: </strong>'+locations[i][6]+'<br><strong>Sequência: </strong>'+locations[i][7]+'<br><strong>Endereço: </strong>'+locations[i][9]+'<br><strong>Cidade: </strong>'+locations[i][10]+'<br><strong>Ocorrência: </strong>'+locations[i][5]+'<br><strong>Data da ocorrência: </strong>'+locations[i][12]+'<br><strong>T. estimado:: </strong>'+locations[i][11]+' min.</div></div>';
 
}
	 
	 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infowindow.close();});
	  	google.maps.event.addListener(infowindow, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

        return function() {
          infowindow.setContent(content);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  
	
	  map.fitBounds(bounds);
	  
	  
	}
	
	
	  
	
<?php
}
?>


<?php 





if($pega_listagem =='blue')	{

////////////  BLUE ///////////////////////
$query_blue = "select * from rotas where login LIKE '".$pega_login."' AND lista LIKE '".$pega_lista."' AND rota LIKE '".$pega_rota."' ORDER BY rota ASC, sequencia";
$rs_blue = mysql_query($query_blue);

$i = 0;
$i2 = 0;
$lat_cad[]=null;
$lng_cad[]=null;
$nome[]=null;
$ocorrencia[]=null;
$lista[]=null;
$rota[]=null;
$sequencia[]=null;
$endereco[]=null;
$cidade[]=null;
$tempo[]=null;
$dth_ocorrencia[]=null;
$classe[]=null;
$obs[]=null;
	
//////////////////////////////////
while($row_blue = mysql_fetch_array($rs_blue)){
		$lat_cad[$i] = $row_blue["y"];
		$lng_cad[$i] = $row_blue["x"];
		
		$oco = $row_blue["ocorrencia"];
		$query_qual = "select * from ocorrencia where id=$oco";														
		$query_qual = mysql_query($query_qual);	
		$dados = mysql_fetch_array($query_qual);

		$ocorrencia[$i] = $dados['ocorrencia'];
		$nome[$i] = $row_blue["nome"];
	//tira aspas simples
	    $nome[$i] = str_replace("'", ' ', $nome[$i]); 
	
		$lista[$i] = $row_blue["lista"];
		$rota[$i] = $row_blue["rota"];
		$sequencia[$i] = $row_blue["sequencia"];
		$endereco[$i] = $row_blue["endereco"];
		$cidade[$i]=$row_blue["cidade"];
		$tempo[$i]=$row_blue["tempo"];
		$portuga=strtotime($row_blue["dth_ocorrencia"]);
		$dth_ocorrencia[$i] = date('d/m/Y H:i:s', $portuga);
		
		$classe[$i]=$row_blue["classificacao"];
		$obs[$i]=$row_blue["obs"];
		
		
		$dth=null;
		if ($row_blue["status"]!=0){
		$timestamp = strtotime($row_blue["dth_ocorrencia"]);
		$dth = date('d/m/Y H:i:s', $timestamp);
		}
		
		//$mrktx[$i] = "<div id='box_map'><h1><p id='legenda1'>" . $row_blue["rota"] . "</p></h1><p id='legenda2'><strong>Sequencia:</strong>" . $row_blue["sequencia"] . "<br /><strong>Nome:</strong> " . $row_blue["nome"]. "<br /><strong>ID:</strong>" . $row_blue["idcliente"] . "</p><br /><p id='legenda3'><strong>Data:</strong>" . $dth. "</p></div>";
		
		//echo $mrktx[$i];
		
		
		
		//$nome[$i] = $mrktx;
		
		//$classificacao = $row_blue["classificacao"];
	
			if ($row_blue["status"]=='0'){ 
			$icone[$i]="imgs/icon_orange.png"; 
	
			$color_box[$i] = "F90";
			}
			if ($row_blue["status"]=='1'){ 
			$icone[$i]="imgs/icon_green.png"; 
		
			$color_box[$i] = "5cbc69";
			}
			if ($row_blue["status"]=='2'){ 
			$icone[$i]="imgs/icon_red.png"; 
	
			$color_box[$i] = "C00";
			}
			if ($row_blue["status"]=='3'){ 
			$icone[$i]="imgs/icon_black.png"; 
			
			$color_box[$i] = "000000";
			}
	
		
		
		$i2++;
		$i++; 
   }
   $i--;
   $i2--; 
	
?>
	
		
var locations = [ 
	  <?php 
	  while($i > 0){
	   ?>['<?php echo $nome[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrencia[$i]?>','<?php echo $color_box[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>'], 
	   <?php $i--; ?>
	   <?php }?>
	   ['<?php echo $nome[$i]?>',<?php echo $lat_cad[$i]?>,<?php echo $lng_cad[$i]?>,'<?php echo $i?>','<?php echo $lista[$i]?>','<?php echo $ocorrencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $sequencia[$i]?>','<?php echo $rota[$i]?>','<?php echo $endereco[$i]?>','<?php echo $cidade[$i]?>','<?php echo $tempo[$i]?>','<?php echo $dth_ocorrencia[$i]?>','<?php echo $color_box[$i]?>','<?php echo $classe[$i]?>','<?php echo $obs[$i]?>']
    ];
	
var end_icon = [ 
	  <?php 
	  while($i2 > 0){
	   ?>'<?php echo $icone[$i2]?>', 
	   <?php $i2--; ?>
	   <?php }?>
	   '<?php echo $icone[$i2]?>'];


    var map = new google.maps.Map(document.getElementById('apDiv12'), {
      zoom: 9,
	      mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.DEFAULT,
              position: google.maps.ControlPosition.BOTTOM_CENTER
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
          position: google.maps.ControlPosition.BOTTOM_CENTER
	
          },
	  styles: styles,
      center: new google.maps.LatLng(<?php echo $lat_cad[$i]?>, <?php echo $lng_cad[$i]?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

	   map.get('streetView').setOptions({
               addressControlOptions: { 
                 position: google.maps.ControlPosition.BOTTOM_CENTER,
               },
               zoomControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_CENTER
               },
               panControlOptions: {
                 position: google.maps.ControlPosition.RIGHT_BOTTOM
               },
			  	fullscreenControl: false
            })
	
	 
    var infowindow = new google.maps.InfoWindow();
	
	
	var bounds = new google.maps.LatLngBounds();
     var marker, marker1, marker2, i;
	
	 
  	 ///ICONE CASA
	
	 <?php
	
 	if ($pega_login!="%%"){
		
	
 	  ?>
  
	 	marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat1;?>, <?php echo $lgn1;?>),
        map: map,
		icon: 'imgs/icon_casa.png'
      });


		  var content_rastro2 = '<div id="iw_container2"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "RESIDÊNCIA: " . $pega_login; ?></td></tr></table></div></div>';
 
    var infoWindow2 = new google.maps.InfoWindow({
        content: content_rastro2
    });	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow2.close();});
	  	google.maps.event.addListener(infoWindow2, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
   google.maps.event.addListener(marker2, 'click', function() {
        infoWindow2.open(map, marker2);
    });
	 <?php
		
	}
 	  ?>
	
	  
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: end_icon[i]
      });
	   ///ICONE EMPRESA
	   marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lgn;?>),
        map: map,
		icon: 'imgs/icon_job.png'
      });
	  
	     var content_rastro3 = '<div id="iw_container2"><div class="iw_title2" style="background-color:#2867b1"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30px"><img src="imgs/ico_home.png" width="22" height="22"/></td><td align="left"><?php echo "SEDE: " . strtoupper($logado); ?></td></tr></table></div>' + '</div>';
		 
	  
	     var infoWindow1 = new google.maps.InfoWindow({
        content: content_rastro3
    });	
	
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infoWindow1.close();});
	  	google.maps.event.addListener(infoWindow1, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		
   google.maps.event.addListener(marker1, 'click', function() {
        infoWindow1.open(map, marker1);
    });
	
	///////////////////
	  
	  bounds.extend(marker.getPosition());

      google.maps.event.addListener(marker, 'click', (function(marker, i) {


	var content = '<div id="iw_container"><div class="iw_title"></div></div>';

	 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		google.maps.event.addListener(map, 'click', function() {infowindow.close();});
	  	google.maps.event.addListener(infowindow, 'domready', function() {;
		var iwOuter = $('.gm-style-iw');
		var iwBackground = iwOuter.prev();
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});
   		iwBackground.children(':nth-child(4)').css({'display' : 'none'});
		});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	
        return function() {
          infowindow.setContent(content);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  
	  
	  ///SETA///////////////////////////////////////////////////////////////////
		var iconsetngs = {
   		 path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
		};
		
	  <?php
 	if ($pega_login!="%%"){
 	  ?>
  
  
	if (i == locations.length -1){
		////////////////////////////////////////////////////////////////////

	   	var line_novaordemX = new google.maps.Polyline({
   					path: [new google.maps.LatLng(<?php echo $lat1;?>, <?php echo $lgn1;?>), new google.maps.LatLng(locations[i][1], locations[i][2])],
   					strokeColor: '#686158',
   					strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	     			icons: [{
         			icon: iconsetngs,
        			offset: '0',
					repeat: '50px'}]
					});	
	  ////////////////////////////////////////////////////////////////////
	}
	   <?php
	}
 	  ?>
  
	  	var line_novaordem2 = new google.maps.Polyline({
   					path: [new google.maps.LatLng(locations[i+1][1], locations[i+1][2]), new google.maps.LatLng(locations[i][1], locations[i][2])],
   					strokeColor: '#686158',
   					strokeOpacity: 3.0,
    	 			strokeWeight: 1,
   	     			map: map,
	     			icons: [{
         			icon: iconsetngs,
        			offset: '0',
					repeat: '50px'}]
					});	
	  
	   map.fitBounds(bounds);
	   
	  // alert (locations.length);
	}

<?php
}
?>

  </script>
   <div id="checkin1">
  <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
         <?php 
		 $todos = $num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza3 + $num_rows_pizza4;
		 $media_realizados = ($num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza4)/$todos * 100;
		 $media_realizados = round( $media_realizados , 1 );
		 
	//	 $media_pendentes = ($num_rows_pizza3)/$todos * 100;
		 
		 echo "['REALIZADOS(%)', " .  $media_realizados . "],"

?>
      
        ]);

        var options = {
         
		  greenFrom:0, greenTo:100,
          minorTicks: 30,
    
	chartArea: { width: '80%', height: '100%', left: '60', right: '60'},
	
	};

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_rage'));
        chart.draw(data, options);

    
      }
	  
	  
       google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
         <?php 
		 $todos = $num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza3 + $num_rows_pizza4;
		 $media_realizados = ($num_rows_pizza1 + $num_rows_pizza2 + $num_rows_pizza4)/$todos * 100;
		 $media_pendentes = ($num_rows_pizza3)/$todos * 100;
		 $media_pendentes = round( $media_pendentes , 1 );
		 echo "['PENDENTES(%)', " .  $media_pendentes . "],"

?>
      
        ]);

        var options = {
         
		  yellowFrom:0, yellowTo:100,
          minorTicks: 30,
    
	chartArea: { width: '80%', height: '100%', left: '60', right: '60'},
	
	};

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_rage1'));
        chart.draw(data, options);

    
      }
    </script>
   
    
 <table width="100%" height="300px" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="80%" style="text-align: center; padding-top:20px;"><span style="text-align: center; vertical-align:central"></span><div id="chart_div_rage" style="width: 100%; height: 140px;"></div></td>
    <td width="20%">&nbsp;</td>
    </tr>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="60%" style="text-align: center; padding-bottom:20px;"><span style="text-align: center; vertical-align:central"></span><div id="chart_div_rage1" style="width: 100%; height: 140px;"></div></td>
      <td  width="20%">&nbsp;</td>
    </tr>
  
  </tbody>
</table>

</div>

</body>
</html>