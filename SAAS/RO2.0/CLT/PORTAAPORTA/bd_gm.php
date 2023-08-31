<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_gm.css">
<link rel="stylesheet" type="text/css" href="css/step2_gm.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>
 <?php include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&amp;libraries=places"></script>

  <?php 
  $_v= $_GET["v"];
  $_h= $_GET["h"];
  $_reg= $_GET["reg"];
  $_endereco = $_GET["endereco"];
  $_codigo = $_GET["codigo"];
  //echo $_reg;
  
   $_codigo_cli = $_GET["cod_cli"];
   $_nome_cli = $_GET["nome"];
   $_cidade = $_GET["cidade"];	
   $_uf = $_GET["uf"];
   $_cep1 = $_GET["cep"];
   
    $_peso = $_GET["peso"];
	$_volume = $_GET["volume"];
	$_valor = $_GET["valor"];
  ?>
<script type="text/javascript">



function enviardados(){

if(document.pinmove.new_lat.value=="")

{

alert("Por favor, procure o endereço!");

document.endereco.geocomplete.focus();

return false;

}

if(document.pinmove.new_lgn.value=="")

{

alert("Por favor, procure o endereço!");

document.endereco.geocomplete.focus();

return false;

}



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

function initialize() {
	
	<?php 
	if ($_h=="ERRO" or $_v=="ERRO" or $_h=="" or $_v==""){
	?>
		
	var latLng = new google.maps.LatLng(-15.793841, -47.875806);
	 
	var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 3,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
	
	
	
  });
  
    
 
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  document.getElementById("new_lat").value = latLng.lat().toFixed(7);
  document.getElementById("new_lgn").value = latLng.lng().toFixed(7);
  
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");

        });

 
 
  }


  
  
<?php
	} else {
	
	?>
	
    var latLng = new google.maps.LatLng(<?php echo $_h; ?>, <?php echo $_v; ?>);
	  
	var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 17,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
 
    var marker = new google.maps.Marker({
    position: latLng,
    title: 'Geocodificação Manual',
    map: map,
	icon: 'imgs/pickup_camper_on.png',
    draggable: true
  });
  

 
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  document.getElementById("new_lat").value = latLng.lat().toFixed(7);
  document.getElementById("new_lgn").value = latLng.lng().toFixed(7);
  
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");

        });

 
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Arrastando...');
  });
 
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Arrastando...');
    updateMarkerPosition(marker.getPosition());
  });
 
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Ponto definido!');
    geocodePosition(marker.getPosition());
  });
  }


	<?php
}
	?>
  


// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);


////////////////////////////////////
function MostraDiv(){
	document.getElementById('map_canvas').style.visibility = "visible";
}
	
////////////////////////////////////



////////////////////////////////////
function VerificaDiv(){
	
	
if(document.endereco.new_lat_2.value=="")

{

alert("Por favor, procure o endereço!");

document.endereco.geocomplete.focus();

return false;

}

if(document.endereco.new_lgn_2.value=="")

{

alert("Por favor, procure o endereço!");

document.endereco.geocomplete.focus();

return false;

}

			guarda_end = document.getElementById("new_end_2").value;
			
			if (guarda_end ==""){
			
				document.getElementById("new_end_2").value = document.getElementById("new_end").value;
				document.getElementById("new_lat_2").value = document.getElementById("new_lat").value;
				document.getElementById("new_lgn_2").value = document.getElementById("new_lgn").value;
				//alert(guarda_end);
			}
				
			
	}			

////////////////////////////////////
       
	
</SCRIPT>

</head>

<body>

<?php include ('base2.php'); ?>
<div id="apDiv11">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" height="50"><strong><font size="+1"><img src="imgs/icon_config.png" width="50" height="50" /></font></strong></td>
      <td align="left" valign="middle"><strong><font size="+1">&nbsp;&nbsp;BANCO DE DADOS GERAL - GEOCODIFICAÇÃO MANUAL DO PONTO DO CLIENTE</font></strong>
      </td>
      <td width="50">
      </td>
    </tr>
</table>
  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="window.history.go(-1); return false;"/></div>
  
 <div id="apDiv12">
 <div id="total">
 <table width="100%" border="0" class="bordasimples" >
  <tr bgcolor="#2867b2" align="center" style="color:#FFFFFF">
    <td nowrap="nowrap"><strong>Código</strong></td>
    <td nowrap="nowrap"><strong>Nome</strong></td>
    <td nowrap="nowrap"><strong>Endereço original</strong></td>
    <td nowrap="nowrap"><strong>Cidade</strong></td>
    <td nowrap="nowrap"><strong>UF</strong></td>
    <td nowrap="nowrap"><strong>CEP</strong></td>
  </tr>
   <tr align="center">
    <td nowrap="nowrap"><?php echo $_reg; ?></strong></td>
    <td nowrap="nowrap"><?php echo $_nome_cli ;?></td>
    <td nowrap="nowrap"><?php echo $_endereco;?></td>
    <td nowrap="nowrap"><?php echo $_cidade ;?></td>
    <td nowrap="nowrap"><?php echo $_uf ;?></td>
    <td nowrap="nowrap"><?php echo $_cep1 ;?></td>
  </tr>
</table>
<br /><br />

  <form name="endereco" id="endereco" action="scripts.php?acao=atualiza_endereco_bdgeral" method="POST" onsubmit="return enviardados();">
       <table height="800" width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #579bd3;">
 <input type="hidden" name="reg" id="reg" value="<?php echo $_reg;  ?>"/>
      <input type="hidden" name="endereco_x" id="endereco_x" value="<?php echo $_endereco;  ?>"/>
      <input type="hidden" id="new_end_2" name="new_end_2"/>
      <input type="hidden" name="codigo_2" id="codigo_2" value="<?php echo $_codigo;  ?>"/>

    <tr>
      <td height="65" colspan="2"  bgcolor="#589bd4" style="color: #FFFFFF; padding-left:10px; font-size:14px; font-weight:bold ">PROCURA POR ENDEREÇO</td>
    </tr>
     <tr>
      <td height="50px">
   <input id="geocomplete" name="geocomplete" type="text" placeholder="Procure o endereço" size="100%" style="height:25px; padding-left:10px;" value="<?php echo $_endereco . ', ' .   $_cidade;?>"/> </td>
   <td colspan="2" style="text-align:right"><div id="apDiv7x"><input id="find" type="button" value="PROCURAR" onClick="MostraDiv();" /></div>
   </td>

    </tr>
    <tr>
    <td colspan="2" height="35" style=" background-color:#2867b2; padding-left:10px; color:#FFFFFF ;font-size:14px; font-weight:bold ">RESPOSTAS MÚLTIPLAS</td>
    </tr>
      <tr>
      <td colspan="2" height="120" style=" background-color:#eef2f6"><div id="resposta" style="color:#000000; font-size:11px;">
    <ul id="multiple">
    </ul>
</div></td>
    </tr>
    <tr>
      <td colspan="2" height="450;" style=" background-color:#eef2f6"><div id="map_canvas" class="map_canvas" style="width: 100%; height: 100%; margin: 0 0 0 0; visibility:hidden"></div></td>
    </tr>


 <tr style="background-color:#eef2f6; height:70px">
      <td align="left"><span style="color:#2867b2; font-size:11px; width:150px; padding-left:10px; font-weight:bold">LATITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lat_2" readonly="readonly" name="new_lat_2" size="14" style="height:25px; padding-left:10px;">&nbsp;&nbsp;&nbsp;&nbsp;
      </span><span style="color:#2867b2; font-size:11px; font-weight:bold">LONGITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lgn_2" readonly="readonly" name="new_lgn_2" size="14" style="height:25px; padding-left:10px;"/>
      </span></td>
      <td align="right" valign="bottom"><input id="update2" type="submit" value="ATUALIZAR" onClick="return VerificaDiv();" /></td>
      </tr>
</table>
     
      
      </td>
    </tr>

 </table>
     </form>  
  </td>
</tr>
<br />
    <tr>
      <td>
      <table width="100%" height="600;" cellspacing="0" cellpadding="0" style="border: 1px solid #579bd3;">
 <form name="pinmove" id="pinmove" onsubmit="return enviardados();" action="scripts.php?acao=atualiza_coordenada_dbgeral" method="POST" >
  
<input type="hidden" name="reg" id="reg" value="<?php echo $_reg;  ?>"/>
<input type="hidden" name="endereco_x" id="endereco_x" value="<?php echo $_endereco;  ?>"/>
<input type="hidden" name="codigo" id="codigo" value="<?php echo $_codigo;  ?>"/>
  <tbody>
    <tr>
      <td colspan="2" height="65px;" bgcolor="#589bd4" style="color: #FFFFFF; padding-left:10px; font-size:14px; font-weight:bold ">PROCURA POR ARRASTO</td>
    </tr>
       <tr style="background-color:#eef2f6; height:30px">
   <td align="left" style="color:#00000; font-size:14px;  font-weight:bold"><div id="address"><input type="input" id="new_end" name="new_end" size="100%" readonly="readonly" style="height:25px; padding-left:10px;"/></div></td>
  <td align="right" valign="bottom" style="color:#FFFFFF; font-size:11px; padding-left:10px; line-height:80px; font-weight:bold" ></td>
    </tr>
     <tr>
      <td colspan="2" height="450;"><div id="markerStatus" hidden="hidden"><i>Clique e arraste até o ponto correto.</i></div><div id="mapCanvas" style="width: 100%; height: 100%; margin: 0 0 0 0;"></div><div id="info" hidden="hidden"></div></td>
    </tr>
     <tr style="background-color:#eef2f6; height:70px">
      <td align="left"><span style="color:#2867b2; font-size:11px; width:150px; padding-left:10px; font-weight:bold">LATITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lat" readonly="readonly" name="new_lat" size="14" style="height:25px; padding-left:10px;">&nbsp;&nbsp;&nbsp;&nbsp;
      </span><span style="color:#2867b2; font-size:11px; font-weight:bold">LONGITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lgn" readonly="readonly" name="new_lgn" size="14" style="height:25px; padding-left:10px;"/>
      </span></td>
        <td align="right" valign="bottom" style="color:#FFFFFF; font-size:11px; padding-left:10px; line-height:80px; font-weight:bold" ><input id="update" type="submit" value="ATUALIZAR" /></td>
      </tr>
    
   
  </tbody></form> 
</table>

</div>
</div>
</div>



                                                         

</body>
</html>