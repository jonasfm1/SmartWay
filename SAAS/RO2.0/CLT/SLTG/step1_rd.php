<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/step1_rd.css">
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

  if(document.id_novo.nome.value=="")

{

alert("Preencha o campo 'Nome'!");

document.id_novo.nome.focus();

return false;

}

if(document.id_novo.cnpj.value=="")

{

alert("Preencha o campo 'CNPJ'!");

document.id_novo.cnpj.focus();

return false;

}

if(document.id_novo.cidade.value=="")

{

alert("Preencha o campo 'Cidade'!");

document.id_novo.cidade.focus();

return false;

}

if(document.id_novo.uf.value=="")

{

alert("Preencha o campo 'UF'!");

document.id_novo.uf.focus();

return false;

}
if(document.id_novo.bairro.value=="")

{

alert("Preencha o campo 'Bairro'!");

document.id_novo.bairro.focus();

return false;

}

if(document.id_novo.cep.value=="")

{

alert("Preencha o campo 'CEP'!");

document.id_novo.cep.focus();

return false;

}

if((document.id_novo.new_lat_2.value=="") || (document.id_novo.new_lgn_2.value=="") || (document.id_novo.new_end_2.value=="")) {

alert("Erro na localização do endereço! Adicione um endereço válido!");

//document.adiciona.veiculo.focus();

document.id_novo.geocomplete.focus();

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
<style type="text/css"></style>

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
?>
</head>
<div class="jquery-waiting-base-container"></div>
<body>

<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">local_shipping</i><strong><font size="2px">&nbsp;ADICIONAR REDESPACHO</font></strong>  
      </td>
      <td align="left" valign="center" colspan="3" height="50px"><a href="javascript:parent.location.reload(true);"><i class="material-icons" style="font-size:22px;color:white;">&#xe5c9;</i></a>
      </td>
    </tr>
</table>
</div>


 <div id="total">
 <form name="id_novo" method="POST" action="scripts.php?acao=redespacho">
<div id="endereco_acha">
<table border="0" style="background-color: white;padding-left:20px">
<tr>
<td><input type="text" placeholder="Nome" size="66" name="nome"></td>

</tr>
<tr>
<td><input type="text" placeholder="Cnpj" size="66" name="cnpj"></td>

</tr>
<tr>
<td><input type="text" placeholder="Cidade" size="30" name="cidade"><input type="text" placeholder="UF" size="30" name="uf"></td>

</tr>
<tr>
<td><input type="text" placeholder="Bairro" size="30" name="bairro"><input type="text" placeholder="CEP" size="30" name="cep"></td>

</tr>

</table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: white;padding-left:20px">

    <tr>
      <td> <input id="geocomplete" name="geocomplete" type="text" placeholder="Digite o endereço aqui!" value=""size="53" style="margin-left: 2px;"/><input id="find" type="button" value="PROCURAR" onClick="MostraDiv();" /></td>
</tr>
<tr>
      <td></td>
    </tr>
  
 

    
</table>
</div>
<div id="aparecer"></div>
<div id="resposta">
<ul id="multiple"></ul>
    
<input type="hidden" id="new_lat_2" name="new_lat_2" size="14">
<input type="hidden" id="new_lgn_2" name="new_lgn_2" size="14"/>
 <input type="hidden" id="new_end_2" name="new_end_2" size="20"/>
</div>

<div class="map_canvas"></div>

<div id="submit_ponto"> 
<input type='submit' value='ADICIONAR' onClick="return enviardados();"/><br><br>

</form>



</div>


</div>
</div>
</div> 

   
</body>
</html>