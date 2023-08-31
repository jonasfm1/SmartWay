<?php include ('session.php');
      //require_once ("geocode.class.php");
  
      ini_set('max_execution_time',12000);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>::. ROTAS ONLINE .:: CADD</title>
                <link rel="stylesheet" type="text/css" href="css/menu.css">
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
		


		</style>
		<?php
		$nome_rota = $_GET["rota"];
	
		$veiculo = $_GET["veiculo"];

		$ordenou = $_GET["ordenou"];


    $retorna = $_GET["return"];
    $tempo_retorno = $_GET["time_return"];

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
                                                $.post("proc_alt_ordem_max.php", ordem_atual, function (retorno) {


												

                                                    $("#msg").html(retorno);
                                                    //Apresentar a mensagem leve
                                                    $("#msg").slideDown('slow');
                                                    retirarMsg();
												
													
													veiculo=document.getElementById("nome_veiculo").value;

											
                          w=document.getElementById("start").value;
													x=document.getElementById("end").value;
													var ordenou = "yes";
													
												
													window.location="altera_ordem.php?rota=<?php echo $nome_rota?>&ordenou=" + ordenou + "&veiculo=" + veiculo;
												
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
<br>
  <div id="apDiv12">
  
 

  <div id="total">

<?php

$query = "select * from rotas where nome_rota='$nome_rota' ORDER BY nome_rota, ordem ASC";
$rs = mysql_query($query);
$conta = 0;
//$lista_cores_tabela = ["#FFF000", "#edfddd", "#edfdff", "#FFF000"];
$array_id = array();
$array_lat = array();
$array_lgn = array();


  
$num_rows = mysql_num_rows($rs);
?>
      
			 <table border='0.5' cellpadding="0" cellspacing="0" height="40px" style=" border-color: #d3d5d6;background-color: #ECECEC;color: black;font-weight: bold;" class="bordasimples">
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
			   <td width="60px"nowrap     align="left">TEMPO</td>
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

$max = 22;
$max1 = 25;
$max2 = 7;
$max3 = 9;
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

        $dist =  $row_todos["distancia_total"];
        $tempo_t = $row_todos["tempo_total"];
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
        <td width="60px"nowrap  >
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
					$soma_dist = $soma_dist + $row['distancia'];
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


 
			
 
<form action="update_ordem_max.php" id="tempo_distancia" name='tempo_distancia' method="post">



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

<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
<tr>

<td valign="button" align="left" style="height: 34px; width:200px">
<font size="2"><strong>DISTÂNCIA RETORNO</strong></font>
       
</td>



</tr>
	
   <tr style="height: 25px;vertical-align: top">
   <td colspan="1"><hr style="border: none; width:140px;" color="#ECECEC"></td>
  
  
</tr>
<tr style="height: 25px;vertical-align: top;">
   <td colspan="1">   
   <?php
if ($ordenou==""){
  $soma_retorno = $dist - $soma_dist;
	?>
   <input type="text" id="distancia_retorno" name="distancia_retorno" value='<?php echo $soma_retorno . " Km"; ?>'>
	<?php
} else {

echo "Recalcular...";


?>
  <input type="text" id="distancia_retorno" name="distancia_retorno" value='' hidden>
<?php
}

?>	   
</td>

</tr>


</table>

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
   <input type="text" id="distancia_total" name="distancia_total" value='<?php echo $dist . " Km"; ?>'>
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
<input type="text" id="tempo_total" name="tempo_total" value='<?php echo $tempo_t; ?>'>
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
<input type="text" id="distancia" name="distancia" value='' hidden >
<input type="text" id="tempo" name="tempo" value='' hidden>
<input type="text" id="rota" name="rota" value='<?php echo  $nome_rota?>' hidden>
<input type="text" id="cliente" name="cliente" value="<?php echo implode('|', $id_cliente); ?>" hidden>
<input type="text" id="id_veiculo" name="id_veiculo" value='<?php echo $veiculo_qual?>' hidden>

<input type="text" id="nome_veiculo" name="nome_veiculo" value='<?php echo $queme?>' hidden>



<br><br>
<?php
if ($ordenou=="yes"){

	?>

<input name="enviar" type="submit" value="RECALCULAR ROTA" onclick="history.go(0)" />

<?php
} else {

?>

<div id="fechar" name="fechar">
<input name="FECHAR" type="submit" id="submit2" title="FECHAR" value="FECHAR" onclick="parent.location.reload();">
</div>

<?php
}


?>

</form>

<br><br>
</div>



</div>


</div>
                                        

</body>
</html>