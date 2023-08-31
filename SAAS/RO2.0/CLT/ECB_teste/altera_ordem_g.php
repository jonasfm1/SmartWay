<?php include ('session.php');
      //require_once ("geocode.class.php");
  
      ini_set('max_execution_time',12000);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>::. ROTAS ONLINE .:: CADD</title>
                <link rel="stylesheet" type="text/css" href="css/menu.css">
                <link rel="stylesheet" type="text/css" href="css/altera_ordem_g.css">
                <link rel="shortcut icon" href="imgs/favicon.ico" >
                <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

                    <style type="text/css"></style>
                    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script sync defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&callback=initMap">
    </script>
                    <script type='text/javascript' src="control/timer.js"></script>
                    <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                    <script src="js/flutuante.js"></script>
                    <script src="js/logger.js"></script>
			<style>
		


		</style>
		<?php
		$nome_rota = $_GET["rota"];
	
		$veiculo = $_GET["veiculo"];

		$ordenou = $_GET["ordenou"];

		?>
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

                        $(document).ready(function(){
                        $(".jquery-waiting-base-container").waiting({modo:"slow"});
                        });
						
                                $(document).ready(function () {
                                    $(function () {
                                        $("#lista").sortable({update: function () {

										
                                                var ordem_atual = $(this).sortable("serialize");
												//var dist=document.getElementById("distancia").value;
											////////////////////////////
                                                $.post("proc_alt_ordem.php", ordem_atual, function (retorno) {


												

                                                    $("#msg").html(retorno);
                                                    //Apresentar a mensagem leve
                                                    $("#msg").slideDown('slow');
                                                    retirarMsg();
												
													
													veiculo=document.getElementById("nome_veiculo").value;

											
                                                    w=document.getElementById("start").value;
													x=document.getElementById("end").value;
													var ordenou = "yes";
													
												
													window.location="altera_ordem_g.php?rota=<?php echo $nome_rota?>&ordenou=" + ordenou + "&veiculo=" + veiculo;
												
                                                });
												
												
												
											////////////////////////
                                            }
											
														
                                        });
										
                                    });

									//
									

                                    //Retirar a mensagem após 1700 milissegundos
                                    function retirarMsg(){
										
                                        setTimeout( function (){
											
                                            $("#msg").slideUp('slow', function(){
												
											});
                                        }, 3000);
										
									
									
                                    }
									
						
												
									

									
								
                                });
						
			
						
function Submit() {
	//div_recal.style.visibility='hidden';
	document.getElementById("submit").submit();



}
setTimeout("Submit()",1000) //Tempo em milisegundos ou seja 1000 é 1 segundo



var distancia_array = [];
var tempo_array = [];
						
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
			
          center: {lat: -23.7410243, lng: -46.68401018000},
			mapTypeControl: false,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              
          },
          zoomControl: false,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: false,
          streetViewControl: false,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
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

		
	
<?php
		if($saida==''){
		?>		
		var comeca = document.getElementById('start').value;
		
		  <?php
			}else{
			?>
		
		var comeca = "<?php echo $saida?>";
		  
		  <?php
			}
		  ?>	
		  
		  <?php
		  
		  	if($entrada==''){
		?>		
		var termina = document.getElementById('end').value;
		
		  <?php
			}else{
			?>
		
		var termina = "<?php echo $entrada?>";
		  
		  <?php
			}
		  ?>	
		//  alert(comeca);
		  
		  directionsService.route({
          origin: comeca,
          destination: termina,
          waypoints: waypts,
          optimizeWaypoints: false,
			
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
			  var conta_menosum = route.legs.length-1;
			 // alert(conta_menosum);
            // For each route, display summary information.
			  var distanciatotal=0;
			  var tempototal=0;
            for (var i = 0; i < route.legs.length; i++) {
            var routeSegment = i + 1;
				
			if(i < conta_menosum){
			 
			  summaryPanel.innerHTML += '<b>SEQUÊNCIA: ' + routeSegment +'</b> - Distância: ';
			  var distancia =route.legs[i].distance.value/1000;
              summaryPanel.innerHTML += distancia + ' Km´s'+' - Tempo: ';
			  distanciatotal += distancia;
			  var duracao = secondsToHms(route.legs[i].duration.value/60);
			  summaryPanel.innerHTML += duracao + '<br>';
			  tempototal+= route.legs[i].duration.value;
              summaryPanel.innerHTML += route.legs[i].start_address + ' até ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br><br>';
  
			distancia_array.push(distancia);
			tempo_array.push(duracao);			

				} else {

				
			  summaryPanel.innerHTML += '<b>RETORNO: ' + routeSegment + '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' até ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
			  var distancia =route.legs[i].distance.value/1000;
			  summaryPanel.innerHTML += distancia + '<br><br>';	
			  distanciatotal += distancia;

              summaryPanel.innerHTML += distanciatotal + '<br><br>';
					
			  var duracao = secondsToHms(route.legs[i].duration.value/60);
			  summaryPanel.innerHTML += duracao + '<br><br>';
					
			  tempototal+= route.legs[i].duration.value;
			  
			  summaryPanel.innerHTML += tempototal + '<br><br>';
				}
             
		
			
            }
			  
          } else {
            window.alert('Erro na formação das rotas: ' + status);
          }
			
			document.getElementById('distancia').value = distancia_array;
			document.getElementById('tempo').value =tempo_array;
			
			document.getElementById('distancia_total').value =Math.round(distanciatotal) + ' Km´s';
			document.getElementById('tempo_total').value=secondsToHms(tempototal/60) + ' min.';

			
			
        });
		
		
		
      }
    	
		</script>

<?php
         include ('essence/conecta.php');

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
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<body>
     
<div id="apDiv11">
	
</br>
	<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px; width:250px">
       <font size="4"><strong>ALTERAR ORDEM DE VISITA</strong></font>
       
       </td>

	   <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong> - ROTA - </strong> <?php echo $nome_rota; ?></font>
       
       </td>
	   <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong> - VEÍCULO - </strong> <?php echo $veiculo; ?></font>
       
       </td>

   </tr>
	
   <tr style="height: 25px;vertical-align: top">
   <td colspan="1"><hr style="border: none; width:100%;" color="#ECECEC"></td>
   <td colspan="1"><hr style="border: none; width:100%;" color="#ECECEC"></td>
   <td colspan="1"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
</tr>
</table>


  <div id="apDiv12">
	  


	  </br>

    <div id="msg" ></div>
	<div id="map" hidden></div>

        <div id="total">

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
?>
      
			 <table border=0.5 cellpadding="0" cellspacing="0" height="40px" style=" border-color: #d3d5d6;background-color: #ECECEC;color: black;font-weight: bold;" class="bordasimples">
                <tr>      
               <td width="30px" nowrap      align="left"></td>		
			   <td width="70px" nowrap     align="left">PEDIDO</td>
			   <td width="60px" nowrap     align="left">COD.CLI</td>	 
			   <td width="180px" nowrap    >CLIENTE</td>
			   <td width="170px" nowrap    >ENDEREÇO</td>
			   <td width="60px" nowrap     align="left">CEP</td>
			   <td width="80px" nowrap    >CIDADE</td> 	
			   <td width="70px"nowrap     align="left">PESO</td>
			   <td width="70px"nowrap     align="left">VOLUME</td> 	
			   <td width="70px" nowrap     align="left">VALOR</td>	  
			   <td width="70px"nowrap     align="left">TEMPO</td>
			   <td width="60px" nowrap     align="left">DIST.</td>  
				</tr>
             </table>
                
			
	
<ul id="lista">
        <?php
$id_cliente= array();
while($row = mysql_fetch_array($rs)){
	$conta = $conta + 1;
	$ordemvazia = $row["ordem"];
	$nome_carro = $row["nome_rota"];
	$veiculo_qual = $row["veiculo"];
	$center_lat1 = $row["lat"];
	$center_lng1 = $row["lgn"];
	$id_primary =  $row["id"];

$max = 25;
$max1 = 25;
$max2 = 7;
$max3 = 8;
$max4 = 17;
$max5 = 5;
$max6 = 4;
//  echo substr_replace($str, (strlen($str) > $max ? '...' : ''), $max);

	
				$query_todos = "select * from veiculos where id='$veiculo_qual'";														
				$rs_todos = mysql_query($query_todos);


				while($row_todos = mysql_fetch_array($rs_todos)){
				$queme = $row_todos["nome"];
				$queme_transp = $row_todos["transportadora"];
				$inicio =$row_todos["local_inicio"];
				$final = $row_todos["local_final"];
				}
	
?>
		

    <li id="arrayordem_<?php echo $row['id']; ?>">
              
                <table border=0.5 cellpadding="0" cellspacing="0" class="bordasimples">
                <tr>
					
				<td width="30px" nowrap ><strong><?php echo  substr_replace($row['ordem'], (strlen($row['ordem']) > $max6 ? '' : ''), $max6);  ?></strong></td>						
				<td width="70px" nowrap ><?php echo substr_replace($row['codigo_pedido'], (strlen($row['codigo_pedido']) > $max2 ? '...' : ''), $max2); ?></td>	
				<td width="60px" nowrap><?php echo  substr_replace($row['codigo_cliente'], (strlen($row['codigo_cliente']) > $max3 ? '...' : ''), $max3);  ?></td>
				<td width="180px" nowrap> <?php echo  substr_replace($row['nome_cliente'], (strlen($row['nome_cliente']) > $max ? '...' : ''), $max);  ?></td>
				<td width="170px" nowrap> <?php echo substr_replace($row['endereco'], (strlen($row['endereco']) > $max ? '...' : ''), $max); ?></td>
				<td width="60px" nowrap ><?php echo substr_replace($row['cep'], (strlen($row['cep']) > $max3 ? '' : ''), $max3); ?></td>
                <td width="80px"nowrap><?php echo substr_replace($row['cidade'], (strlen($row['cidade']) > $max3 ? '...' : ''), $max3); ?></td>
				<td width="70px"nowrap ><?php echo substr_replace($row['peso'], (strlen($row['peso']) > $max2 ? '...' : ''), $max2); ?></td>
				<td width="70px"nowrap ><?php echo substr_replace($row['volume'], (strlen($row['volume']) > $max2 ? '...' : ''), $max2); ?></td>  
				<td width="70px" nowrap><?php echo substr_replace($row['valor'], (strlen($row['valor']) > $max2 ? '...' : ''), $max2); ?></td>        
                <td width="70px"nowrap  >
				<?php 

if($ordenou=="yes"){
echo "Recalcular...";

} else {
	echo substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max);

}
?>
				</td>
				<td width="60px" nowrap >
					<?php 

					if($ordenou=="yes"){
					echo "Recalcular...";

					} else {
					echo substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2); 
					
				}
					?>
				
				</td>

				
				</tr>
                </table>
                
                

		<?php //echo $row['lat'];
			// ID DO PEDIDO // IMPORTANTE ///////////

			$cod_cli = $row['id'];
			array_push($id_cliente, $cod_cli);

		

		?>
	
            </li>


<?php

  }

?>
      </ul>

	  <br><br>



	  <table>


	  <tr>

		<td><select id="start" name="start" hidden>
   
      <option value="<?php echo $inicio;?>"><?php echo $inicio;?></option>
	
    </select>
		  </td>

		  <td><select id="end" name='end' hidden>
	 
      <option value="<?php echo $final ;?>"><?php echo $final;?></option>
	
    </select>
		  </td>
	  </tr>
	  
	  </table>
	  	  
 
			
<form action="update_ordem_new.php" id="tempo_distancia" name='tempo_distancia' method="post">
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
<tr>

<td valign="button" align="left" style="height: 34px; width:200px">
<font size="4"><strong>DISTÂNCIA TOTAL</strong></font>
       
</td>

<td valign="button" align="left" style="height: 34px; width:200px">
<font size="4"><strong>TEMPO TOTAL</strong></font>
       
</td>


</tr>
	
   <tr style="height: 25px;vertical-align: top">
   <td colspan="1"><hr style="border: none; width:170px;" color="#ECECEC"></td>
   <td colspan="1"><hr style="border: none; width:140px;" color="#ECECEC"></td>
  
</tr>
<tr style="height: 25px;vertical-align: top;">
   <td colspan="1">   
   <?php
if ($ordenou==""){

	?>
   <input type="text" id="distancia_total" name="distancia_total" value=''>
	<?php
} else {

echo "Recalcular...";
?>
  <input type="text" id="distancia_total" name="distancia_total" value='' hidden>
<?php
}

?>	   
</td>
<td colspan="1">  
<?php
if ($ordenou==""){

	?>
<input type="text" id="tempo_total" name="tempo_total" value=''>
	<?php
} else {

echo "Recalcular...";
?>
  <input type="text" id="tempo_total" name="tempo_total" value='' hidden>
<?php
}

?>
</td>	
</tr>


</table>
<input type="text" id="distancia" name="distancia" value='' hidden>
<input type="text" id="tempo" name="tempo" value='' hidden>
<input type="text" id="rota" name="rota" value='<?php echo  $nome_rota?>' hidden>
<input type="text" id="cliente" name="cliente" value="<?php echo implode('|', $id_cliente); ?>" hidden>
<input type="text" id="vai" name="vai" value='<?php echo $saida?>' hidden>
<input type="text" id="volta" name="volta" value='<?php echo $entrada?>' hidden>	  
<input type="text" id="id_veiculo" name="id_veiculo" value='<?php echo $veiculo_qual?>' hidden>

<input type="text" id="nome_veiculo" name="nome_veiculo" value='<?php echo $queme?>' hidden>

</form>

</div>


</div>
<br><br>

<?php
if ($ordenou=="yes"){

	?>

  <input name="RECALCULAR ROTA" type="submit" id="submit2" title="CALCULAR ROTA" value="RECALCULAR ROTA" onclick="document.getElementById('tempo_distancia').submit();">
	<?php
} else {

?>

<div id="fechar" name="fechar">
<input name="FECHAR" type="submit" id="submit2" title="FECHAR" value="FECHAR" onclick="parent.location.reload();">
</div>

<?php
}


?>


<select multiple id="waypoints" hidden="hidden">
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

<input type="submit" id="submit" hidden="hidden"> 
<div id="directions-panel" hidden></div>
</div>
                                        



</body>
</html>