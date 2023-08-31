<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_nv.css">
<link rel="stylesheet" type="text/css" href="css/cad_if.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete1.js"></script>
    <script src="js/logger.js"></script>
    <?php
include ('session.php');
include ('essence/conecta.php');
ini_set('max_execution_time',3000);
	
	?>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&amp;libraries=places"></script>
	
<script type="text/javascript">

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



function confirmaExclusao(aURL) {

if(confirm('Você tem certeza que deseja excluir este ponto?')) {

location.href = aURL;

//target=ver;

}
}

function enviardados(){


if((document.id_novo.new_lat_2.value=="") || (document.id_novo.new_lgn_2.value=="") || (document.id_novo.new_end_2.value=="")) {

alert("Erro na localização do endereço!");

//document.adiciona.veiculo.focus();

return false;

}
	


if(document.id_novo.nome.value=="")

{

alert("Preencha o campo 'Nome do ponto'!");

document.id_novo.nome.focus();

return false;

}



}



 $(function(){     
        var $geocomplete = $("#geocomplete"),
        $multiple = $("#multiple");
        $geocomplete
          .geocomplete({ map: ".map_canvas" })
          .bind("geocode:multiple", function(event, results){
            $.each(results, function(){
              var result = this;
              $("<li>")
                .html(result.formatted_address)
                .appendTo($multiple)
                .click(function(){
                  $geocomplete.geocomplete("update", result)
				 // document.getElementById("geocomplete").value= result.formatted_address;
				  //alert(result.geometry.location.lng());
				  document.getElementById("new_end_2").value = result.formatted_address; 
				  
				  document.getElementById("new_lgn_2").value = result.geometry.location.lng().toFixed(7); 
				  document.getElementById("new_lat_2").value = result.geometry.location.lat().toFixed(7); 
				  
                });
            });
          });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");

        });
        
      });

var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Endereço não definido para essa localização!');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
	
  //document.getElementById('info').innerHTML = [latLng.lat(),latLng.lng()].join(', '); 
    //document.getElementById("new_end").value = str; 
  document.getElementById("new_lat").value = latLng.lat().toFixed(7); 
  document.getElementById("new_lgn").value = latLng.lng().toFixed(7); 


}

function updateMarkerAddress(str) {
  //document.getElementById('address').value = str;  
  document.getElementById("new_end").value = str; 
  
 //document.getElementById("geocomplete").value = str;
  document.getElementById("new_lat").value = latLng.lat().toFixed(7); 
  document.getElementById("new_lgn").value = latLng.lng().toFixed(7); 



}




// Onload handler to fire off the app.
//google.maps.event.addDomListener(window, 'load', initialize);

function MostraDiv(){
	//document.getElementById('aparecer').slideToggle(300);
			document.getElementById('aparecer').style.display = 'none';
	}
	
	
	function VerificaDiv(){
	
	
			if(document.endereco.new_lat_2.value=="")

{

alert("Preencha o campo 'Latitude'! Esse campo não pode ser vazio!");

document.endereco.new_lat_2.focus();

return false;

}

if(document.endereco.new_lgn_2.value=="")

{

alert("Preencha o campo 'Longitude'! Esse campo não pode ser vazio!");

document.endereco.new_lgn_2.focus();

return false;

}

		
				
			
	}			
</script>
<?php 



$_seleciona = $_GET['select'];
//echo $_seleciona;

$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;ßs

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";

exit;
}


//cria sessão
$_Session['pagina'] = "CONTROLE DE PONTOS (INICIAL/FINAL)";


?>
</head>
<div class="jquery-waiting-base-container"></div>
<body>
<?php include ('base3.php'); ?>

<div id="apDiv11">


   
<table border="0" color:#000000;"  cellpadding="0" cellspacing="0">
   <tr>

       <td valign="button" align="left" style="height: 34px;">
       <font size="4"><strong>&nbsp;CONTROLE DE PONTOS</strong></font>
       
       </td>
       <td >

</td>

   </tr>
   <tr style="height: 25px;vertical-align: top">
   <td colspan="4"><hr style="border: none; width:100%;" color="#ECECEC"></td>
  
   
   <tr style="height: 15px;font-size: 12px;">
   <td colspan="4">
   
   </td>
   
   </tr>
   
   </table>

<div id="apDiv12x">
<div id="total1">
<table width="100%" border="1" id="tabela" name="tabela" class="bordasimples1" cellpadding="0" cellspacing="0">
<tr  bgcolor="#ECECEC" >
<td height="35px" width="200px"> 
<div align="left"><strong>NOME</strong></div>
</td>  
<td width="450px"> 
<div align="left"><strong>ENDEREÇO</strong></div>
</td>     
<td width="25px"> 
<div align="center"><strong>EXCLUIR</strong></div>
</td>
</tr>
<?php

$dbname_cliente="ro_".$logado; // Indique o nome do banco de dados que será aberto
//echo $dbname_cliente;

if(!($con=mysql_select_db($dbname_cliente,$id))) {
echo "</br>Não foi possível estabelecer uma conexão com o gerenciador MySQL.</br>";
echo "Favor contactar o Administrador no telefone (11) 5505 6542.</br></br>";
echo "PRODUTO REGISTRADO CADDESIGN";
exit;
}

					
$query = "select * from pontos ORDER BY id DESC";		

if ($_seleciona!=null){
	
	$query = "select * from pontos ORDER by $_seleciona DESC";		
	
} else {
		
	$query = "select * from pontos ORDER BY id DESC";	
	
}	

														
$rs = mysql_query($query);

//$row= 0;	

$conta = 0;	

?>

<?php													
while($row = mysql_fetch_array($rs)){
		$conta = $conta + 1;	
		
?>
<tr>

<td><?php
 echo mb_strimwidth($row["nome"], 0, 22, "..."); 
 ?></td>

<td><?php 
echo mb_strimwidth($row["endereco"], 0, 50, "..."); 

?></td>


<td align="center"><a href="javascript:confirmaExclusao('scripts.php?acao=exclui_ponto&id=<?php echo $row["id"] ?>')">
<i class="material-icons" style="font-size:14px;color:red">remove_circle</i>
</a></td>
</tr>
<?php		
}
?>
</table>

</div>

</div>

<br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">


<tr style="height: 35px;vertical-align: button">
<td><strong><font size="4">CADASTRAR NOVO PONTO</font></strong></td>
</tr>
<tr style="height: 15px;vertical-align: top">
<td><hr style="border: none; width:245px;" ></td>
</tr>

</table>
<br>
 <div id="total">
 <form name="id_novo" method="post" action="scripts.php?acao=adiciona_ponto">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="bordasimples">
  <tr style="height: 30px; ">
    <td><strong>ENDEREÇO DO PONTO</strong></td>
    <td> </td>
    </tr>
    <tr>
      <td> <input id="geocomplete" name="geocomplete" type="text" placeholder="Digite aqui o endereço do ponto!" style="width:100%" value=""/></td>
      <td  style="width: 100px"><input id="find" type="button" value="PROCURAR" onClick="MostraDiv();" /></td>
    </tr>
    <tr  style="height: 30px; ">
    <td ><strong>NOME DO PONTO</strong></td>
    <td> </td>
    </tr>
    <tr>
    <td ><input type="text" id="nome" name="nome" size="14" style="width:100%" placeholder="Digita aqui o nome do ponto!"></td>
    <td>

</td>
    </tr>
    <tr style="height: 10px;">
    <td ></td>
    <td>

</td>
    </tr>
 

    <tr  style="height: 30px; ">
    <td ><strong>RESPOSTAS MULTIPLAS</strong></td>
    <td> </td>
    </tr>
    <tr>
    <td colspan="2">

<div id="resposta">
<ul id="multiple"></ul>
    
<input type="hidden" id="new_lat_2" name="new_lat_2" size="14">
<input type="hidden" id="new_lgn_2" name="new_lgn_2" size="14"/>
 <input type="hidden" id="new_end_2" name="new_end_2" size="20"/>
</div>

    </td>
    
    </tr>
    <tr  style="height: 30px; ">
    <td ><strong></strong></td>
    <td> </td>
    </tr>

    <tr style="height: 30px;">
    <td colspan="2">



<div class="map_canvas"></div>

    </td>
    
    </tr>
    </tr>
    <tr  style="height: 30px; ">
    <td ><strong></strong></td>
    <td> </td>
    </tr>
    <tr>
    <td ><input type='submit' value='ADICIONAR PONTO' onClick="return enviardados();"/></td>
    <td>

</td>
    </tr>

</table>




</form>


</div>



</div> 

</body>
</html>