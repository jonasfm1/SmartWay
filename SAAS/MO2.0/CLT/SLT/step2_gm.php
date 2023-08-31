<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_gm.css">
<link rel="stylesheet" type="text/css" href="css/step2_gm.css">

<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
 
 <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHCFflT4mZvEypc40sfiImbXdtOmD4pFw&sensor=false&language=pt-BR&amp;libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.geocomplete.js"></script>
    <script src="js/logger.js"></script>
 <?php
  //include ('session.php'); 
  require_once ("geocode.class.php");
  include ('conecta.php');
  ini_set('max_execution_time',12000);
?>
  <?php
  //$_id= $_GET["id"];
  $_x= $_GET["x"];
  $_y= $_GET["y"];
  $_cli= $_GET["cli"];
  $_end = $_GET["end"];
  $_cid = $_GET["cid"];
  $_id = $_GET["id"];;
  //echo $_reg;
  
  
  $query = "select * from rotas where id=$_id";
  $rs = mysql_query($query);
	
  $dados = mysql_fetch_array($rs);
 
 
 $status = $dados['status'];

 if($status ==0){
	$pega_listagem = "orange"; 	 
 }
  if($status ==1){
	$pega_listagem = "green"; 	 
 }
  if($status ==2){
	$pega_listagem = "red"; 	 
 }
 
 // echo $pega_listagem;
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
	if ($_x=="ERRO" or $_y=="ERRO" or $_x=="" or $_y==""){
	?>	
	var latLng = new google.maps.LatLng(-15.793841, -47.875806);
	var map = new google.maps.Map(document.getElementById('mapCanvas'), { zoom: 3, center: latLng, mapTypeId: google.maps.MapTypeId.ROADMAP});

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
    var latLng = new google.maps.LatLng(<?php echo $_y; ?>, <?php echo $_x; ?>);
	var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 15,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
 
    var marker = new google.maps.Marker({
    position: latLng,
    title: 'Geocodificação Manual',
    map: map,
	icon: 'imgs/icon_<?php echo $pega_listagem.".png"?>',
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
<div id="apDiv11"><img src="imgs/bg_box_step2.png" width="447" height="82" />
<div id="apDiv13_todos">
  <div id="apDiv13b"><input type='submit' name='submit' value='VOLTAR' onclick="location.href='step2.php';"/></div>
  </div>
  <div id="apDiv12">
  
    <div id="total">
    
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tbody>
    
     <tr>
      <td colspan="2" height="430;"><div id="markerStatus" hidden="hidden"><i>Clique e arraste até o ponto correto.</i></div><div id="mapCanvas" style="width: 100%; height: 100%; margin: 0 0 0 0;"></div><div id="info" hidden="hidden"></div></td>
    </tr>
     <tr style="background-color:#eef2f6; height:70px">
      <td align="left"><span style="color:#2867b2; font-size:11px; width:150px; padding-left:10px; font-weight:bold">LATITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lat" readonly="readonly" name="new_lat" size="14" style="height:25px; padding-left:10px;">&nbsp;&nbsp;&nbsp;&nbsp;
      </span><span style="color:#2867b2; font-size:11px; font-weight:bold">LONGITUDE:&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="new_lgn" readonly="readonly" name="new_lgn" size="14" style="height:25px; padding-left:10px;"/>
      </span></td>
      <td align="right" valign="bottom" ></td>
      </tr>
      <tr>
  
      <td align="right" valign="bottom" style="color:#FFFFFF; font-size:11px; padding-left:10px; background-color:#2867b2; line-height:80px; font-weight:bold" ></td>
    </tr>
   
  </tbody></form> 
</table>

</td>
</tr>
</table>
</div>
</div>
</div>



                                                         

</body>
</html>