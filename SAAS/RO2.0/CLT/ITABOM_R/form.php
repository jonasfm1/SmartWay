<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&language=pt-BR&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>

  <?php 
  $_v= $_GET["v"];
  $_h= $_GET["h"];
  $_reg= $_GET["reg"];
  $_endereco = $_GET["endereco"];
  $_codigo = $_GET["codigo"];
  //echo $_reg;
  ?>
<script type="text/javascript">

function enviardados(){

if(document.pinmove.new_lat.value=="")

{

alert("Preencha o campo 'Latitude'! Esse campo não pode ser vazio!");

document.pinmove.new_lat.focus();

return false;

}

if(document.pinmove.new_lgn.value=="")

{

alert("Preencha o campo 'Longitude'! Esse campo não pode ser vazio!");

document.pinmove.new_lgn.focus();

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
    zoom: 15,
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

			guarda_end = document.getElementById("new_end_2").value;
			
			if (guarda_end ==""){
			
				document.getElementById("new_end_2").value = document.getElementById("new_end").value;
				document.getElementById("new_lat_2").value = document.getElementById("new_lat").value;
				document.getElementById("new_lgn_2").value = document.getElementById("new_lgn").value;
				//alert(guarda_end);
			}
				
			
	}			
</script>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 363px;
	height: 176px;
	z-index: 1;
	left: 403px;
	top: 251px;
}
#apDiv2 {
	position: absolute;
	width: 370px;
	height: 257px;
	z-index: 2;
	left: 22px;
	top: 83px;
	z-index: 9999;
}
#apDiv3 {
	position: absolute;
	width: 181px;
	height: 24px;
	z-index: 3;
	left: 43px;
	top: 222px;
	color:#FFF;
}
#apDiv4 {
	position: absolute;
	width: 344px;
	height: 90px;
	z-index: 4;
	left: 402px;
	top: 141px;
	
}
#apDiv5 {
	position: absolute;
	width: 103px;
	height: 25px;
	z-index: 5;
	left: 442px;
	top: 435px;
}
#apDiv6 {
	position: absolute;
	width: 110px;
	height: 26px;
	z-index: 6;
	left: 568px;
	top: 435px;
}
#apDiv5 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
		background:transparent;
}
#apDiv6 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
		background:transparent;
}
#apDiv7 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}

#apDiv7 input[type=button] {  
	color: #fff;
	border: 1px solid #589bd4;
	background: #589bd4;


	font-size:13px;
	
	height: 30px;
	width:100px;

    }
#apDiv7 input[type=button]:hover{
	background: #2867b2;
	border: 1px solid #2867b2;
	cursor:pointer;
    }  
input[type=submit] {  
	color: #fff;
	border: 1px solid #5cbb69;
	background: #5cbb69;
	font-size:13px;
	
	height: 30px;
	width:100px;

    }
input[type=submit]:hover{
	background: #249333;
	border: 1px solid #249333;
	cursor:pointer;
    }  	
	
#apDiv11 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}



#apDiv7 {
	position: absolute;
	width: 352px;
	height: 26px;
	z-index: 7;
	left: 414px;
	top: 81px;
}
#apDiv8 {
	position: absolute;
	width: 98px;
	height: 38px;
	z-index: 8;
	left: 261px;
	top: 427px;
}
#apDiv9 {
	position: absolute;
	width: 369px;
	height: 14px;
	z-index: 1;
	left: 22px;
	top: 344px;
	color: #2867b2;
}
#apDiv10 {
	position: absolute;
	width: 187px;
	height: 17px;
	z-index: 10;
	left: 22px;
	top: 370px;
	color: #2867b2;
}
#apDiv11 {
	position: absolute;
	width: 352px;
	height: 28px;
	z-index: 11;
	left: 31px;
	top: 396px;
}
#apDiv12 {
	position: absolute;
	width: 200px;
	height: 25px;
	z-index: 12;
	left: 41px;
	top: 91px;
	color:#FFF;
}
#apDiv13 {
	position: absolute;
	width: 105px;
	height: 30px;
	z-index: 10000;
	left: 644px;
	top: 426px;
}
#apDiv14 {
	position: absolute;
	width: 167px;
	height: 15px;
	z-index: 1;
	left: 406px;
	top: 119px;
	color: #2867b2;
}
#apDiv15 {
	position: absolute;
	width: 354px;
	height: 19px;
	z-index: 10002;
	left: 22px;
	top: 61px;
	color: #2867b2;
}
#aparecer {
	position: absolute;
	width: 367px;
	height: 164px;
	z-index: 10003;
	left: 400px;
	top: 250px;
	background-color: #FFF;
}

	.jquery-waiting-base-container1 {
	position: absolute;
	left: -2px;
	top: -2px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 999999;
	opacity: 0.95;
	-moz-opacity: 0.95;
	filter: alpha(opacity = 95);
	background-color:#000;
	
	background-image: url("imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 250px;
}

#apDiv16 {
	position: absolute;
	width: 261px;
	height: 28px;
	z-index: 1;
	left: 406px;
	top: 61px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #2867b2;
}
#apDiv17 {
	position: absolute;
	width: 200px;
	height: 21px;
	z-index: 1;
	left: 397px;
	top: 436px;
	color: #2867b2;
}
#apDiv18 {
	position: absolute;
	width: 82px;
	height: 22px;
	z-index: 10005;
	left: 137px;
	top: 343px;
}
	
#apDiv18 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
}

#apDiv19 {
	position: absolute;
	width: 81px;
	height: 21px;
	z-index: 10006;
	left: 273px;
	top: 343px;
}

#apDiv19 input{
	border:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
}
#div_geral {
	background-color:#000;
	width:100%;
	height:100%;
	opacity: 0.95;
    filter: alpha(opacity=95); /* For IE8 and earlier */
}
#div_background {
	position: absolute;
	background-image: url(imgs/bg_box_step2_pop.png);
	width: 770px;
	height: 472px;
	left:400px;
	top:150px;
	background-repeat: no-repeat;
	z-index:10;
}

</style>
</head>
<body>

<div id="div_geral"></div>
<div id="div_background">

<div id="apDiv1">
  <div class="map_canvas"></div>
</div>
<div id="apDiv17"><b>&nbsp;Lat.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Long.:</b></div>
<div id="apDiv4"><div id="resposta">
    <ul id="multiple">
    </ul>
</div></div>
<div id="aparecer" name="aparecer"></div>
<div id="apDiv12"><div id="info"></div></div>
<div id="apDiv2">
  <div id="mapCanvas"></div>
</div>
<div id="apDiv3"><div id="markerStatus"><i>Clique e arraste até o ponto correto.</i></div></div>
<div id="apDiv16"><strong>Digite o endereço no campo abaixo!</strong></div>

<div id="apDiv9"><b>Posição Atual:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lat.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Long.:</b><br>
</div>
<div id="apDiv14"><strong>Lista de respostas multiplas!</strong></div>
<div id="apDiv10"><b>Endereço mais próximo do ponto.</b></div>
<div id="apDiv15"><strong>Clique e arraste o ponto no mapa abaixo.</strong></div>

<form name="pinmove" id="pinmove" onsubmit="return enviardados();" action="scripts.php?acao=atualiza_coordenada" method="POST" >
<div id="apDiv11"><div id="address"><input type="input" id="new_end" name="new_end" size="68"/></div></div>
<div id="apDiv18"><input type="text" id="new_lat" name="new_lat" size="14"></div>
<div id="apDiv19"><input type="text" id="new_lgn" name="new_lgn" size="14"/></div>
<input type="hidden" name="reg" id="reg" value="<?php echo $_reg;  ?>"/>
<input type="hidden" name="endereco_x" id="endereco_x" value="<?php echo $_endereco;  ?>"/>
<input type="hidden" name="codigo" id="codigo" value="<?php echo $_codigo;  ?>"/>
<div id="apDiv8"><input id="update" type="submit" value="ATUALIZAR" /></div>
</form>
  <form name="endereco" id="endereco" action="scripts.php?acao=atualiza_endereco" method="POST" onsubmit="return enviardados();">       
    <div id="apDiv5"><input type="text" id="new_lat_2" name="new_lat_2" size="14"></div>
    <div id="apDiv6"><input type="text" id="new_lgn_2" name="new_lgn_2" size="14"/></div>
    <div id="apDiv7">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td> <input id="geocomplete" name="geocomplete" type="text" placeholder="Procure o endereço" size="36" value="<?php echo $_endereco; ?>"/></td>
      <td><input id="find" type="button" value="PROCURAR" onClick="MostraDiv();" /></td>
    </tr>
  </tbody>
</table>
</div>
	  <input type="hidden" name="reg" id="reg" value="<?php echo $_reg;  ?>"/>
      <input type="hidden" name="endereco_x" id="endereco_x" value="<?php echo $_endereco;  ?>"/>
      <input type="hidden" id="new_end_2" name="new_end_2" size="20"/>
      <input type="hidden" name="codigo_2" id="codigo_2" value="<?php echo $_codigo;  ?>"/>
      <div id="apDiv13"><input id="update2" type="submit" value="ATUALIZAR" onClick="return VerificaDiv();" /></div>
</form>
</div>
</body>