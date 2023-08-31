<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>::. ROTAS ONLINE .:: CADD</title>
                <link rel="stylesheet" type="text/css" href="css/menu_altera.css">
                <link rel="stylesheet" type="text/css" href="css/altera_ordem.css">
                <link rel="shortcut icon" href="imgs/favicon.ico" >
                <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >

                    <style type="text/css"></style>
                    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

                    <script type='text/javascript' src="control/timer.js"></script>
                    <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                    <script src="js/flutuante.js"></script>
                    <script src="js/logger.js"></script>
			<style>
		
.td{

			border-right:1px solid black;
			border-top: 1px solid black;
			border-bottom: 1px solid black;		
			height: 16px;
			text-align: center;
			
}
.tabela{
border-left: 1px solid black;
						
}
		</style>
		<?php
		$nome_rota = $_GET["rota"];
		$saida= $_GET["saida"];
		$entrada= $_GET["entrada"];
		?>
<script LANGUAGE="JavaScript">
						
function Enviar() {
	document.tempo_distancia.submit();

}	//setTimeout("Enviar()",3000)
						
						
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
										
										//	 var username =  $('#dist').$(this).val();
											//	alert(username);
										//	var distancia =1;
											////////////////////////////
                                                $.post("proc_alt_ordem.php", ordem_atual, function (retorno) {
                                                    //Imprimir retorno do arquivo proc_alt_ordem.php
                                                    $("#msg").html(retorno);
                                                    //Apresentar a mensagem leve
                                                    $("#msg").slideDown('slow');
                                                    retirarMsg();
												
                                                    w=document.getElementById("start").value;
													x=document.getElementById("end").value;
													window.location="altera_ordem_ro.php?rota=<?php echo $nome_rota?>&saida="+w+"&entrada="+x;
												//	div_recal.style.visibility='visible';
													//window.location.href=window.location.href
 													//OnSelectionChange(start);
													
													 //window.location = "altera_ordem_novo2.php?id=" + selectedOption.value;
													//window.location.href=window.location.href;
                                                });
											
											////////////////////////
                                            }
														
                                        });
									
                                    });
                                    //Retirar a mensagem após 1700 milissegundos
                                    function retirarMsg(){
										
                                        setTimeout( function (){
                                            $("#msg").slideUp('slow', function(){});
                                        }, 1700);
										
									//	Enviar();
                                    }
										
                                });
						

function OnSelectionChange(select) {
            var selectedOption = select.options[select.selectedIndex];
	
			var inicio = document.getElementById('inicio');
            inicio.value = selectedOption.value;
            alert ("The selected option is " + selectedOption.value);
}
						
						
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
			mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
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
			 
			  summaryPanel.innerHTML += '<b>ROTA: ' + routeSegment +'</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' até ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
			  var distancia =route.legs[i].distance.value/1000;
              summaryPanel.innerHTML += distancia + '<br><br>';
			  distanciatotal += distancia;
			  var duracao = secondsToHms(route.legs[i].duration.value/60);
			  summaryPanel.innerHTML += duracao + '<br><br>';
			  tempototal+= route.legs[i].duration.value;
				   
				   
			distancia_array.push(distancia);
			tempo_array.push(duracao);			

				} else {

					
			  summaryPanel.innerHTML += '<b>VOLTA: ' + routeSegment + '</b><br>';
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
			
			document.getElementById('distancia_total').value =distanciatotal;
			document.getElementById('tempo_total').value=secondsToHms(tempototal/60);
			
        });
		
		  
      }
    	
		</script>
    <?php include ('session.php');
      //require_once ("geocode.class.php");
      include ('essence/conecta.php');
      ini_set('max_execution_time',12000);

     

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
        <?php include ('base5.php'); ?>
<div id="apDiv11">
	
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
            <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;ALTERAR ORDEM DE VISITA - ROTA <?php echo $nome_rota; ?></font></strong></td>
          <td width="50"></td>
        </tr>
    </table>

  <div id="apDiv12">
	  <table>
	  <tr>
		<td width="85px"><strong>PONTO INCIAL:</strong></td>	  
		<td><select id="start" name="start">
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
		  </td>
		  <td width="90px" align="right"><strong>PONTO FINAL:</strong></td>
		  <td><select id="end" name='end'>
	  <?php
		$query3 = "select * from pontos";																
		$rs3 = mysql_query($query3);
	
	 
	while($row3 = mysql_fetch_array($rs3)){
	
	?>
   
      <option value="<?php echo $row3["latitude"] . ", ". $row3["longitude"] ;?>"><?php echo $row3["nome"];?></option>
		
			<?php
	}
		?>
    </select>
		  </td>
	  </tr>
	  
	  </table>
	  	  
 

    
	   

  </br>

	  </br>

    <div id="msg"></div>
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
           <div id="linha_table_01_x">
			
			 <table border=0.5 cellpadding="0" cellspacing="0" class="tabela" height="25px" style="  border-color: black;background-color: #589bd4;color: white;font-weight: bold;"  width="2367px">
                <tr>
               
               <td width="29px" nowrap class="td">N</td>
			   <td width="70px" nowrap class="td">PEDIDO</td>
			   <td width="70px" nowrap class="td">LOTE</td>
			   <td width="70px" nowrap class="td">VENDEDOR</td>
			   <td width="70px" nowrap class="td">PRAÇA</td>
			   <td width="299px" nowrap class="td">CLIENTE</td>
			   <td width="300px" nowrap class="td">ENDR</td>
			   <td width="249px" nowrap class="td">BAIRRO</td>
			   <td width="99px" nowrap class="td">CIDADE</td> 	
			   <td width="69px"nowrap class="td">PESO</td>
			   <td width="69px" nowrap class="td">VALOR</td>
			   <td width="80px" nowrap class="td">CANAL</td>
			   <td width="77px" nowrap class="td">ROTA</td>
			   <td width="69px"nowrap class="td">VOLUME</td> 	
			   <td width="70px"nowrap class="td">TEMPO</td>
			   <td width="60px" nowrap class="td">DIST.</td>
			   <td width="80px" nowrap class="td">CEP</td>
			   <td width="61px" nowrap class="td">SETOR</td>
			   <td width="99px" nowrap class="td">VEICULO</td>	
               <td width="199px" nowrap class="td">TRANSP.</td>
               <td width="98px" nowrap class="td">CODIGO</td>   
               <td width="80px" nowrap class="td">ESPECIAL</td>             
				</tr>
                </table>
                
			
			</div>
            <br>  <br>

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

$max = 40;
$max1 = 25;
$max2 = 7;
$max3 = 11;
$max4 = 17;
$max5 = 5;
$max6 = 4;
//  echo substr_replace($str, (strlen($str) > $max ? '...' : ''), $max);


?>

    <li id="arrayordem_<?php echo $row['id']; ?>">
                <div  id="linha_table_01">
                <table border=0.5 cellpadding="0" cellspacing="0" class="tabela" width="2367px">
                <tr>
				<td width="29px" nowrap class="td"><?php echo  substr_replace($row['ordem'], (strlen($row['ordem']) > $max6 ? '' : ''), $max6);  ?></td>
				<td width="70px" nowrap class="td"><?php echo substr_replace($row['codigo_pedido'], (strlen($row['codigo_pedido']) > $max2 ? '...' : ''), $max2); ?></td>	
				<td width="70px" nowrap class="td"><?php echo substr_replace($row['lote'], (strlen($row['lote']) > $max2 ? '...' : ''), $max2); ?></td>
				<td width="70px" nowrap class="td"><?php echo substr_replace($row['vendedor'], (strlen($row['vendedor']) > $max2 ? '...' : ''), $max2); ?></td>
				<td width="70px" nowrap class="td"><?php echo substr_replace($row['praca'], (strlen($row['praca']) > $max2 ? '...' : ''), $max2); ?></td>	
				<td width="299px" nowrap class="td"> <?php echo  substr_replace($row['nome_cliente'], (strlen($row['nome_cliente']) > $max ? '...' : ''), $max);  ?></td>
				<td width="300px" nowrap class="td"> <?php echo substr_replace($row['endereco'], (strlen($row['endereco']) > $max ? '...' : ''), $max); ?></td>
				<td width="249px" nowrap class="td"><?php echo substr_replace($row['bairro'], (strlen($row['bairro']) > $max1 ? '...' : ''), $max1); ?></td>
                <td width="99px" nowrap class="td"><?php echo substr_replace($row['cidade'], (strlen($row['cidade']) > $max3 ? '...' : ''), $max3); ?></td>
				<td width="69px"nowrap class="td"><?php echo substr_replace($row['peso'], (strlen($row['peso']) > $max2 ? '...' : ''), $max2); ?></td>
				<td width="69px" nowrap class="td"><?php echo substr_replace($row['valor'], (strlen($row['valor']) > $max2 ? '...' : ''), $max2); ?></td>
			    <td width="80px" nowrap class="td"><?php echo substr_replace($row['obs_pedido'], (strlen($row['obs_pedido']) > $max2 ? '...' : ''), $max2); ?></td>	
                <td width="77px" nowrap class="td"><?php echo  substr_replace($row['nome_rota'], (strlen($row['nome_rota']) > $max2 ? '...' : ''), $max2);  ?></td>
                <td width="69px"nowrap class="td"><?php echo substr_replace($row['volume'], (strlen($row['volume']) > $max2 ? '...' : ''), $max2); ?></td>  
                <td width="70px"nowrap class="td"><?php echo substr_replace($row['tempo'], (strlen($row['tempo']) > $max ? '...' : ''), $max); ?></td>
				<td width="60px" nowrap class="td"><?php echo substr_replace($row['distancia'], (strlen($row['distancia']) > $max2 ? '' : ''), $max2); ?></td>
				<td width="80px" nowrap class="td"><?php echo substr_replace($row['cep'], (strlen($row['cep']) > $max3 ? '' : ''), $max3); ?></td>
				<td width="61px" nowrap class="td"><?php echo substr_replace($row['setor'], (strlen($row['setor']) > $max5 ? '...' : ''), $max5); ?></td>
				
<?php
	
				$query_todos = "select * from veiculos where id='$veiculo_qual'";														
				$rs_todos = mysql_query($query_todos);


				while($row_todos = mysql_fetch_array($rs_todos)){
				$queme = $row_todos["nome"];
				$queme_transp = $row_todos["transportadora"];
				}
	
?>
				 <td width="99px" nowrap class="td"><?php echo  substr_replace($queme, (strlen($queme) > $max2 ? '...' : ''), $max2);  ?></td>
                 <td width="199px" nowrap class="td"><?php echo  substr_replace($queme_transp, (strlen($queme_transp) > $max1? '...' : ''), $max1);  ?></td>
               	 <td width="98px" nowrap class="td"><?php echo  substr_replace($row['codigo_cliente'], (strlen($row['codigo_cliente']) > $max3 ? '...' : ''), $max3);  ?></td>
				 <td width="80px" nowrap class="td"><?php echo  substr_replace($row['especial'], (strlen($row['especial']) > $max2 ? '...' : ''), $max2);  ?></td>
					
				<input type="text" id="dist" value="<?php echo $row['distancia']; ?>" hidden="hidden">
                                
                               
				</tr>
                </table>
                
                
 </div>
		<?php //echo $row['lat'];

			$cod_cli = $row['codigo_cliente'];
			array_push($id_cliente, $cod_cli);

			//$id_cliente = $id_cliente . $row['codigo_cliente'] . ", ";
		?>
			<?php //echo $row['lgn'];  ?>

            </li>



<?php

  }

?>
      </ul>
      
			
<form action="update_ordem_ro.php" id="tempo_distancia" name='tempo_distancia' method="post">
	  <input type="text" id="distancia" name="distancia" value='' hidden="hidden"><input type="text" id="tempo" name="tempo" value='' hidden="hidden">
		  <input type="text" id="rota" name="rota" value='<?php echo  $nome_rota?>' hidden="hidden">
		    <input type="text" id="cliente" name="cliente" value="<?php echo implode('|', $id_cliente); ?>" hidden="hidden">
		   <input type="text" id="vai" name="vai" value='<?php echo $saida?>' hidden="hidden">
		   <input type="text" id="volta" name="volta" value='<?php echo $entrada?>' hidden="hidden">
			   <input type="text" id="tempo_total" name="tempo_total" value='' hidden="hidden">
			   <input type="text" id="distancia_total" name="distancia_total" value='' hidden="hidden">
			  
			    <input type="text" id="id_veiculo" name="id_veiculo" value='<?php echo $veiculo_qual?>' hidden="hidden">
	  </form>

</div>


</div>
<div id="apDiv13_todos">
<div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="location.href='step5.php';"/></div>
</div>


</div>
                                        

</body>
</html>