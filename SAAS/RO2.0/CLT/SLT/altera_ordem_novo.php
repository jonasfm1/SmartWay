<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/altera_ordem.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
<style type="text/css">

</style>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script sync defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHCFflT4mZvEypc40sfiImbXdtOmD4pFw&callback=initMap">
    </script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
<script type='text/javascript' src="control/timer.js"></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script src="js/flutuante.js"></script>
<script src="js/logger.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  
<script LANGUAGE="JavaScript">

$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     alert(data);
    }
   });
  }
 });

});


 document.getElementById('submit').addEventListener('load', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });	
	
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
function Submit() {
	document.getElementById("submit").submit();
}setTimeout("Submit()",1000) //Tempo em milisegundos ou seja 1000 é 1 segundo


      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: -23.7410243, lng: -46.68401018000}
        });
        directionsDisplay.setMap(map);

      //  document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        //}
														  
	//	);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
       //   if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
      //    }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: false,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>ROTA: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' até ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
<style>
  
  

      #right-panel {
        
        line-height: 12px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }

      #map {
        height: 50%;
        float: left;
        width: 2000px;
		
        
      }
    
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
		
      }
    </style>

<?php include ('session.php'); 
//  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);

  $nome_rota = $_GET["rota"];
 
function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
?>
</head>

<body>

  <?php include ('base5.php'); 
	

	?>
<div id="apDiv11">

	
	
    
	
	
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
      <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;ALTERAR ORDEM DE VISITA</font></strong>
    
      </td>
      <td width="50">
      </td>
    </tr>
</table>
	
    
  <div id="apDiv12">
  
 
  
<div id="total"> 
<table width="2000px" border="1" id="tabela" name="tabela" class="bordasimples" cellpadding="0" cellspacing="0">
<tr>
<td height="25px" bgcolor="#2867b2" colspan="5" align="center"><font color="#FFFFFF" size="1">ROTA <?php echo $nome_rota;?></font></td>
</tr>
<tr bgcolor="#DADADA">
<td bgcolor="#589bd4" height="25px" width="30px"> 
<div align="center"><font color="#FFFFFF">SOBE</font></div>
</td>  
<td bgcolor="#589bd4" width="30px"> 
<div align="center"><font color="#FFFFFF">DESCE</font></div>
</td>  
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">ROTA</font></div>
</td>    
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">ORDEM DE VISITA</font></div>
</td>                                                                   
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">NOME DO VEÍCULO</font></div>
</td>  
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">TRANSP.</font></div>
</td>                                                                  
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">COD. CLIENTE</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">NOME DO CLIENTE</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">ENDEREÇO</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">CIDADE</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">COD. PEDIDO</font></div>
</td>
<td bgcolor="#589bd4" > 
<div align="center"><font color="#FFFFFF">OBS. PEDIDO</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">TEMPO PERC.</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">TEMPO SERVIÇO</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">DISTÂNCIA</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">PESO</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">VOLUME</font></div>
</td>
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">VALOR</font></div>
</td>   	  
<td bgcolor="#589bd4"> 
<div align="center"><font color="#FFFFFF">SETOR</font></div>
</td>  

                                                  
</tr>

<?php
	
$query = "select * from rotas where nome_rota='$nome_rota' ORDER BY nome_rota, ordem ASC";																
$rs = mysql_query($query);
$conta = 0;
//$lista_cores_tabela = ["#FFF000", "#edfddd", "#edfdff", "#FFF000"];
$array_id = array();
$array_lat = array();
$array_lgn = array();

///ARRAY PRIMEIRO LOCAL DE SAIDA/// ITAPUI
array_push($array_id, "INICIO" );
array_push($array_lat, "-22.2301572" );
array_push($array_lgn, "-48.7093516" );
///ARRAY PRIMEIRO LOCAL DE SAIDA///


$num_rows = mysql_num_rows($rs);		
							
while($row = mysql_fetch_array($rs)){
	
	$conta = $conta + 1;	

	
	$ordemvazia = $row["ordem"];
	$nome_carro = $row["nome_rota"];
	$veiculo_qual = $row["veiculo"];
	$center_lat1 = $row["lat"];
	$center_lng1 = $row["lgn"];
	
	$id_primary =  $row["id"];
	
array_push($array_id, $id_primary );
array_push($array_lat, $center_lat1 );
array_push($array_lgn, $center_lng1 );


//$center_lat = "-47.5550";
//$center_lng =  "-21.70";

//echo $array_lat[0];


//$distance =( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($center_lat1))) * (cos(deg2rad($center_lng1) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($center_lat1))))) );
 
 

?>
<tr bgcolor="#FFF""> 

<?php


if ($conta==1){
?>
<td align="center"></td>
<?php
} else {
?>
<td align="center" bgcolor="#16ef24"><a href="scripts.php?acao=altera_rota_up&rota=<?php echo $nome_rota ?>&ordem=<?php echo $ordemvazia?>&id=<?php echo $row["id"] ?>"><img src="imgs/icon-up.png" alt="Sobe 1" width="10" height="10"/></a></td>    
<?php
}
?>

<?php


if ($conta==$num_rows){
?>

<td align="center" ></td> 
<?php
} else {
	?>
 <td align="center" bgcolor="#ed1c24"><a href="scripts.php?acao=altera_rota_down&rota=<?php echo $nome_rota ?>&ordem=<?php echo $ordemvazia?>&id=<?php echo $row["id"] ?>"><img src="imgs/icon-down.png" alt="Desce 1" width="10" height="10"/></a></td>    
<?php
}
?>   
 
<td nowrap="nowrap" align="center">
<?php 
if($ordemvazia ==0){
	echo "<strong>" . $nome_carro ."</strong>";
	
}else{
	echo $nome_carro;
}

$query_todos = "select * from veiculos where id='$veiculo_qual'";														
$rs_todos = mysql_query($query_todos);

while($row_todos = mysql_fetch_array($rs_todos)){
	
	$queme = $row_todos["nome"];
	$queme_transp = $row_todos["transportadora"];
}


?>
</td>

<td align="center" ><?php echo $row["ordem"];?></td>

<td align="center"><?php echo $queme?></td>
<td align="center"><?php echo $queme_transp?></td>
<td align="center"><?php echo $row["codigo_cliente"];?></td>
<td align="center" nowrap="nowrap"><?php echo $row["nome_cliente"];?></td>  
<td align="center" nowrap="nowrap"><?= $row["endereco"] ?></td>
<td align="center"><?= $row["cidade"] ?></td>
<td align="center" ><?= $row["codigo_pedido"] ?></td>
<td align="center" ><?= $row["obs_pedido"] ?></td>
<td align="center">
<?php
if($row["tempo"]== null){
    echo "Não calculado!"; 
} else {
	echo $row["tempo"];
	}
 ?>
 </td>
 <td align="center"><?php
 
//$minutos = $row["tempo_servico"];
 
//echo $row["tempo_servico"];
 
$minutos = $row["tempo_servico"];


//print $minutos;



//echo convertToHoursMins($minutos, '%02d:%02d:00');
echo $distance;
 ?>
 </td>
<td nowrap="nowrap" align="center">
<?php 
if($row["distancia"]== null){
echo "Não calculado!"; 	
	} else {
echo $row["distancia"] . " Km"; 
	}
	
?>
</td>

<td align="center" > <?= $row["peso"] ?></td>
<td align="center" > <?= $row["volume"] ?></td>
<td align="center" > <?= $row["valor"] ?></td>  
<td align="center" > <?= $row["setor"] ?></td> 
<?php 
$pega_co_cli = $row["codigo_cliente"];
$query_segmento = "select * from clientes where codigo_cliente='$pega_co_cli'";														
$rs_segmento = mysql_query($query_segmento);
// Tirando o while
$dados = mysql_fetch_array($rs_segmento);

// Exibição
?>

	<?php
}

$contaae= 0 ;
foreach ($array_id as $value) {
	//echo $array_lat[$contaae] . "<br />";
//	echo $array_lgn[$contaae] . "<br />";
	
//	echo $array_lat[$contaae+1] . "<br />";
//	echo $array_lgn[$contaae+1] . "<br />";
	
	if($array_lat[$contaae+1]== ''){
		
	} else {
		
	$distance =( 6371 * acos((cos(deg2rad($array_lat[$contaae])) ) * (cos(deg2rad($array_lat[$contaae+1]))) * (cos(deg2rad($array_lgn[$contaae+1]) - deg2rad($array_lgn[$contaae])) )+ ((sin(deg2rad($array_lat[$contaae]))) * (sin(deg2rad($array_lat[$contaae+1]))))) );
	$distance2 = $distance + ($distance * 0.3);
	
	if ($disctance2 > 150){
		$tempo = $distance2*60;
	} else {
		$tempo = $distance2*60;
	}
	
	
	
	
$horas = floor($tempo / 3600);
$minutos = floor(($tempo - ($horas * 3600)) / 60);
$segundos = floor($tempo % 60);
$tempo_gasto=  $horas . ":" . $minutos . ":" . $segundos;
//echo $horas . ":" . $minutos . ":" . $segundos;

	//echo "distancia: " . $distance2 . "<br />";
	//echo "tempo: " . $tempo . "<br />";
	$proximo = $array_id[$contaae+1];
	
	$query1 = "UPDATE rotas SET distancia='$distance2', tempo='$tempo_gasto' WHERE id='$proximo'";
	$rs1= mysql_query($query1);
	



	}
	
	
	$contaae = $contaae+ 1;
  //  echo $value . "<br />";
	
  }

//echo $logado;
?>                                                                                                             
</table>

</div>
<input name="enviar" type="submit" value="RECALCULAR ROTA" onclick="history.go(0)" />
<div id="map"></div>
 <select multiple id="waypoints">
<?php
$query1 = "select * from rotas where nome_rota='$nome_rota' ORDER BY nome_rota, ordem ASC";																
$rs1 = mysql_query($query1);
	
	 
	while($row1 = mysql_fetch_array($rs1)){
		
		$lat_lista = $row1["lat"];
		$lgn_lista = $row1["lgn"];
		?>
	 
      <option value="<?php echo $lat_lista; ?>, <?php echo $lgn_lista; ?>"><?php echo $lat_lista; ?>, <?php echo $lgn_lista; ?></option>
     
  
	<?php
	}
?>
</select>
  

    <select id="start">
     <?php
		$query2 = "select * from pontos";																
		$rs2 = mysql_query($query2);
	
	 
	while($row2 = mysql_fetch_array($rs2)){
	
	?>
      <option value="<?php echo $row2["latitude"] . ", ". $row2["longitude"] ;?>"><?php echo $row2["nome"];?></option>
		
	<?php
	}
		?>
    </select>
	  
	  <?php
		$query3 = "select * from pontos";																
		$rs3 = mysql_query($query3);
	
	 
	while($row3 = mysql_fetch_array($rs3)){
	
	?> 
    <select id="end">
      <option value="<?php echo $row3["latitude"] . ", ". $row3["longitude"] ;?>"><?php echo $row3["nome"];?></option>
		
			<?php
	}
		?>
    </select>
      <input type="submit" id="submit">

    <div id="directions-panel"></div>

	 

<div id="apDiv13_todos">
<div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="location.href='step5.php';"/></div>
</div>

</div>
                                        

</body>
</html>