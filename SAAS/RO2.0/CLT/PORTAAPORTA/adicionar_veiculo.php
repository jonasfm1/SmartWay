<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.colorPicker.js"/></script>
<script LANGUAGE="JavaScript">

function enviardados(){

if(document.adiciona.veiculo.value=="")

{

alert("Preencha o campo 'Veículo'!");

document.adiciona.veiculo.focus();

return false;

}
	
if(document.adiciona.peso.value=="" || document.adiciona.peso.value==0)

{

alert("Preencha o campo 'Peso'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.peso.focus();

return false;

}


if(document.adiciona.volume.value=="" || document.adiciona.volume.value==0)

{

alert("Preencha o campo 'Volume'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.volume.focus();

return false;

}


if(document.adiciona.valor.value=="" || document.adiciona.valor.value==0)

{

alert("Preencha o campo 'Valor'! Esse campo não pode ter valor zero ou valor nulo!");

document.adiciona.valor.focus();

return false;

}

if(document.adiciona.type[0].checked == false && document.adiciona.type[1].checked == false && document.adiciona.type[2].checked == false && document.adiciona.type[3].checked == false && document.adiciona.type[4].checked == false && document.adiciona.type[5].checked == false)

{

alert("Preencha o campo 'Tipo de Veículo'!");

document.adiciona.type[0].focus();

return false;

}

}

</SCRIPT>
<?php

include ('session.php'); 
include ('essence/conecta.php');
ini_set('max_execution_time',3000);
?>
<link rel="stylesheet" href="css/colorPicker.css" type="text/css" />

 
 <script type="text/javascript">
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


  $(function() {     
   $('#color1').colorPicker({pickerDefault: "ff0000", colors: ["ff0000", "ff7800", "42ff00", "7200ff", "00f0ff", "003cff",  "9c5100", "00760b", "ffbc00", "900000",  "340058", "03fe85"], transparency: true});
  });

  
</script>
<style type="text/css">

div.controlset {display: block; float:left; width: 100%; padding: 0.25em 0;}

div.controlset label, 
div.controlset input,
div.controlset div { display: inline; float: left; }

div.controlset label { width: 200px;}


.select {
   width: 55px;
   height: 16px;
   overflow: hidden;
   border: 0;
   	background:transparent;
font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
   }
   
input[type="text"] {
    width: 150px;

	background:transparent;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	border: none;
	
}
#apDiv1 {
	position: absolute;
	width: 764px;
	height: 160px;
	z-index: 1;
	left: 6px;
	top: 54px;


}
#apDiv2 {
	position: relative;
	width: 93px;
	height: 35px;
	z-index: 2;
	left: 134px;
	top: 53px;
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight: bold;
	
}

#apDiv3 {
	position: relative;
	width: 93px;
	height: 35px;
	z-index: 2;
	left: 135px;
	top: 40px;
	color:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}

#apDiv4 {
	position: relative;
	width: 330px;
	height: 44px;
	z-index: 2;
	left: -105px;
	top: -12px;
	text-align:center;
}
#apDiv5 {
	position: relative;
	width: 484px;
	height: 289px;
	z-index: 2;
	left: 0px;
	top: 2px;
	margin-bottom:8px;
	background:url(imgs/bg_adiciona_veiculo.png);
	background-repeat:no-repeat;
	
}
#apDiv6 {
	position: relative;
	width: 20px;
	height: 21px;
	z-index: 2;
	left: 1px;
	top: -96px;
}
#apDiv7 {
	position: absolute;
	width: 53px;
	height: 15px;
	z-index: 2;
	left: 107px;
	top: 100px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
#apDiv7a {
	position: absolute;
	width: 157px;
	height: 16px;
	z-index: 2;
	left: 107px;
	top: 146px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
#apDiv7b {
	position: absolute;
	width: 156px;
	height: 16px;
	z-index: 2;
	left: 107px;
	top: 123px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}

#apDiv7c {
	position: absolute;
	width: 157px;
	height: 16px;
	z-index: 2;
	left: 107px;
	top: 169px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
#apDiv7d {
	position: absolute;
	width: 186px;
	height: 61px;
	z-index: 2;
	left: 106px;
	top: 188px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
#apDiv8x {
	position: absolute;
	width: 154px;
	height: 17px;
	z-index: 2;
	left: 92px;
	top: 13px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #FFF;
}
#apDiv8 {
	position: absolute;
	width: 154px;
	height: 17px;
	z-index: 2;
	left: 108px;
	top: 78px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
#apDiv8a {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -360px;
	top: 17px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	letter-spacing:-1px;
	text-align:center;
}
#apDiv8b {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -184px;
	top: 17px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	letter-spacing:-1px;
	text-align:center;
}

#apDiv8c {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: -11px;
	top: 17px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	letter-spacing:-1px;
	text-align:center;
}

#apDiv9 {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: 422px;
	top: 53px;
}
#apDiv10 {
	position: absolute;
	width: 70px;
	height: 56px;
	z-index: 2;
	left: 596px;
	top: 53px;
}


#apDiv13a {
	position: absolute;
	width: 126px;
	height: 32px;
	z-index: 1;
	left: 327px;
	top: 247px;
	z-index: 9999;
}

#apDiv13a input[type=submit] {  
	color: #fff;
	border: 1px solid #5cbb69;
	background: #5cbb69;
	/* Nice if your browser can do it */
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	font-size:13px;	
	height: 30px;
	width:120px;

    }  
	
#apDiv13a input[type=submit]:hover{
	background: #249333;
	border: 1px solid #249333;
	cursor:pointer;
    }  


#apDiv11 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 2;
	left: 1px;
}

#apDiv12 {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 276px;
	top: 150px;
}
#apDiv12a {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 338px;
	top: 150px;
}
#apDiv12b {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 397px;
	top: 150px;
}
#apDiv12c {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 276px;
	top: 215px;
}
#apDiv12d {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 339px;
	top: 214px;
}
#apDiv12e {
	position: absolute;
	width: 22px;
	height: 24px;
	z-index: 10000;
	left: 398px;
	top: 214px;
}

#div_geral {
	background-color:#000;
	width:100%;
	height:100%;
	-moz-opacity: 0.95;
	opacity: 0.95;
    filter: alpha(opacity=95); /* For IE8 and earlier */
}

#div_background {
	position: absolute;
	backface-visibility: hidden;
	width: 479px;
	height: 321px;
	left: 560px;
	top: 180px;
	z-index: 10;
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

    </style>
<body>
<div class="jquery-waiting-base-container1"></div>

<div id="div_geral"></div>
<div id="div_background">
<form name="adiciona" action="scripts.php?acao=cadastra_veiculo" method="post">

 
<div id="apDiv5">
    <div id="apDiv7"><select name="qto" id="qto" class="select">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
    </select></div>
    <div id="apDiv7a"><input name="volume" id="volume" type="text" size="15" maxlength="15" /></div>
    <div id="apDiv7b"><input name="peso" id="peso" type="text" size="15" maxlength="15" /></div>
    <div id="apDiv7c"><input name="valor" id="valor" type="text" size="15" maxlength="15" /></div>
    <div id="apDiv7d">
    <div class="controlset"><input id="color1" type="text" name="color1" value="" /></div>
    </div>
<div id="apDiv8"><input name="veiculo" id="veiculo" type="text" size="15" maxlength="7" value="" /></div>
    <div id="apDiv8x">Adicionar Veículo</div></div>
<div id="apDiv12"><input name="type" type="radio" value="Moto" /></div>
<div id="apDiv12a"><input name="type" type="radio" value="Vuc" /></div>
<div id="apDiv12b"><input name="type" type="radio" value="Van" /></div>
<div id="apDiv12c"><input name="type" type="radio" value="Toco" /></div>
<div id="apDiv12d"><input name="type" type="radio" value="Truck" /></div>
<div id="apDiv12e"><input name="type" type="radio" value="Carreta" /></div>

 
  <div id="apDiv13a">
  <input type='submit' value='Adicionar' onClick="return enviardados();"/>
</div>
</form>
</div>
</body>