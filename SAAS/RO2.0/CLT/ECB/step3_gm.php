<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>
 <?php include ('session.php'); 
  require_once ("geocode.class.php");
  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $chave; ?>&sensor=false&language=pt-BR&amp;libraries=places"></script>

  <?php 
$id = $_GET["id"];



    $query = "select * from clientes where codigo_cliente='$id'";		
    $query = mysql_query($query);

    $dados = mysql_fetch_array($query);

    // Exibição
    $_v=  $dados['latitude_cad'];
    $_h=  $dados['longitude_cad'];
    $_reg=  $dados['codigo_cliente'];
    $_endereco=  $dados['endereco'];
    $_codigo=  $dados['codigo'];
    $_codigo_cli=  $dados['codigo_cliente'];
    $_nome_cli=  $dados['nome'];
    $_cidade=  $dados['cidade'];
    $_uf=  $dados['estado'];
    $_cep1=  $dados['cep'];
    $_peso=  $dados['peso'];
    $_volume=  $dados['volume'];
    $_valor=  $dados['valor'];

echo $id;
    
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
<style>
	
	
    input[type=text]{
border: 1px solid #d3d5d6;
	
	height: 30px;
	padding-left:2px;
	width:450px;
	font-size: 11px;
	}

  
body{
  
	font-family: Open Sans; 
	font-size: 11px;
}
	
.jquery-waiting-base-container {
	position: absolute;
	left: 0px;
	top: 0px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 99997;
	opacity: 1;
	filter: alpha(opacity = 100);
	background-color:#FFF;
	
	background-image: url("./imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 70px;
}


table.bordasimples {
	border-collapse: collapse;
	}

table.bordasimples tr td {
	font-family: Open Sans; 
	font-size: 10px;
	border:1px solid #ECECEC;
	padding: 2px 2px 2px 2px;

}

table.bordasimples1 {
	border-collapse: collapse;
	border:1px solid #589bd4;
	}

table.bordasimples1 tr td {
	
	font-size: 10px;
	padding: 2px 2px 2px 2px;

}



 #total{
	position: absolute;
	width: 100%;
	height: 320px;

	left: 0px;
    top: 45px;
    padding-left: 40px;
	
	
  }

 #total2{
	position: absolute;
	width: 100%;
	height: 50px;
	background-color: #ECECEC;
	left: 0px;
	top: 0px;
  font-family: Open Sans; 
	font-size: 11px;
	
  }
  

 #total3{
	position: relative;
	width: 100%;
	 height: 50px;
	
	
	background-color: #579bd3;
	left: 0px;
	top: 334px;

font-size: 11px;
	
  }
  input[type=button] {  
	color: #000;

		background: #ECECEC;
	border: 1px solid #ECECEC;
	font-size:11px;	
	height: 29px;
	width:100%;
	font-weight:bold;
	text-transform: uppercase;
	  
     font-family: Open Sans; 
     cursor: pointer;
     width: 150px;
     
  } 

input[type=submit] {  
	color: #000;

		background: #ECECEC;
	border: 1px solid #ECECEC;
	font-size:11px;	
	height: 40px;
	width:100%;
	font-weight:bold;
	text-transform: uppercase;
	  
	   font-family: Open Sans; 
	   
    }  
	
	input[type=submit]:hover{
		
	border: 1px solid #CCCCCC;
	background: #CCCCCC;
	
	color: #000;
	cursor:pointer;
		font-weight:bold;
    }  
	


::-webkit-scrollbar-track {
    background-color: #F4F4F4;
}
::-webkit-scrollbar {
    width: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb {
    background: #d3d5d6;
}


::-webkit-scrollbar-track:horizontal {
    background-color: #F4F4F4;
 }

 ::-webkit-scrollbar:horizontal {
  
    height: 6px;
    background: #000000;
}
::-webkit-scrollbar-thumb:horizontal {
    background: #d3d5d6;
}

</style>
<body>
<?php
$max = 35;
$nome_menor = mb_strimwidth($_nome_cli, 0, $max, "...");
?>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">edit_location_alt</i><strong><font size="2px">&nbsp;LOCALIZAR CLIENTE - <?php echo $nome_menor  . " - " . $_reg; ?></font></strong>  
      </td>
    </tr>
</table>
       <table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0">
        <form name="endereco" id="endereco" action="scripts.php?acao=atualiza_endereco" method="POST" onsubmit="return enviardados();">
  
     <tr >
      <td height="20px" style="color: #000000;font-size:14px; font-weight:bold;">
   <input id="geocomplete" name="geocomplete" type="text" placeholder="Procure o endereço" size="61" style="height:25px; padding-left:10px; width:100%;" value="<?php echo $_endereco . ', ' . $_cidade . ', CEP: ' .   $_cep1;?>"/> </td>
   <td colspan="2" style="text-align:right"><div id="apDiv7x"><input id="find" type="button" value="PROCURAR" onClick="MostraDiv();" /></div>
   </td>

    </tr>
   
      <tr  hidden>
      <td colspan="2" height="30" style=" background-color:#FFF"><div id="resposta" style="color:#000000; font-size:11px;">
    <ul id="multiple">
    </ul>
</div></td>
    </tr>
    
    <tr>
      <td colspan="2" height="270;" style=" background-color:#FFFFFF;"><div id="map_canvas" class="map_canvas" style="width: 100%; height: 100%; margin: 0 0 0 0; visibility:hidden"></div></td>
    </tr>
 

 <tr style="background-color:#FFF; height:70px" hidden>
      <td align="left"><span style="color:#2867b2; font-size:11px; width:150px; padding-left:10px; font-weight:bold">LATITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lat_2" readonly="readonly" name="new_lat_2" size="14" style="height:25px; padding-left:10px;">&nbsp;&nbsp;&nbsp;&nbsp;
      </span><span style="color:#2867b2; font-size:11px; font-weight:bold">LONGITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lgn_2" readonly="readonly" name="new_lgn_2" size="14" style="height:25px; padding-left:10px;"/>
      </span></td>
      <td align="right" valign="bottom"><input id="update2" type="submit" value="ATUALIZAR" onClick="return VerificaDiv();" /></td>
      </tr>
</table>
      <input type="hidden" name="reg" id="reg" value="<?php echo $_reg;  ?>"/>
      <input type="hidden" name="endereco_x" id="endereco_x" value="<?php echo $_endereco;  ?>"/>
      <input type="hidden" id="new_end_2" name="new_end_2" size="20"/>
      <input type="hidden" name="codigo_2" id="codigo_2" value="<?php echo $_codigo;  ?>"/>
     
      
      </td>
    </tr>

 </table>
      
  </td>
</tr>

   
  </tbody>
</table>

</div>
<div id="total3">

<input id="update2" type="submit" value="ATUALIZAR" onClick="return VerificaDiv();"/>



</form>
	  
</div>


                                                         

</body>
</html>