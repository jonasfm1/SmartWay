<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="shortcut icon" href="imgs/favicon.ico" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


<script LANGUAGE="JavaScript">

function enviardados(){
if(document.login.login.value=="" || document.login.login.value=="Login")

{

//alert( "Preencha o campo 'LOGIN'!" );

document.getElementById(verifica_login).style.display = "none";
document.login.login.focus();

return false;

}

if(document.login.senha.value=="" || document.login.senha.value=="Senha")

{

//alert( "Preencha o campo 'SENHA'!" );
document.getElementById(verifica_login).style.display = "none";
document.login.senha.focus();

return false;

}
}

$( "#olho" ).mousedown(function() {
  $("#senha").attr("type", "text");
 
});

$( "#olho" ).mouseup(function() {
  $("#senha").attr("type", "password");
});

</SCRIPT>

<style type="text/css">

.btn-primary, .btn-primary:active, .btn-primary:visited {
    background-color: #589bd4;
    border-radius: 0px;
    border-color: #589bd4;
    font-size: 14px;
    font-weight: bold;
    height: 50px;
    width: 100px;
}

.btn-primary:hover {

    background-color: #2868c7;
    border-radius: 0px;
    border-color: #2868c7;
    font-size: 14px;
    font-weight: bold;
    height: 50px;
    width: 100px;
}
.card {
border-radius: 0px;
border:1;
margin: 0px;
transition: 0.3s;
min-width: 200px;



}

.card:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    cursor:default;
    
}



html, body {
	position:fixed;
	width:100%;
  	height:100%;
    font-family: arial,sans-serif;
	
	background-color: #000000;
	background-image: url("../assets/img/bg_mapa_firstpage.png");
	background-repeat: no-repeat;
    background-size: cover;
}

/* COMPOPORTAMENTO DO CONTAINER */
.container-fluid {
    height: 100%;

}






* {
  	box-sizing: border-box;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}


.col h1 {
  	text-align: left;
  	color: #000000;
	  font-size: 22px;
  
	font-family: arial,sans-serif;
  	padding: 30px 0px 20px 26px;
  	border-bottom: 1px solid #dee0e4;
}
.col form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
	
  	
}
.col form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 100%;
  	height: 50px;
  	background-color: #FFF;
  	color: #000000;
	  border: 1px solid #d3d5d6;
}

.col form input[type="password"], .col form input[type="text"] {
  	width: 100%;
  	height: 50px;
  	border: 1px solid #d3d5d6;
	background: transparent;
	padding-left: 20px;
	font-size:12px;
}
	 
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active{
    -webkit-box-shadow: 0 0 0 30px white inset !important;
	font-size: 12px;
}


::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: red;
  opacity: 1; /* Firefox */
  background-color: #FFF;
  font-size: 12px;
}


.col form input[type="submit"] {
  	width: 100px;
  	
 	margin-bottom: 10px;
  	background-color: #589bd4;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
	height: 50px;
	transition: background-color 0.2s;
	font-size: 14px;
	
}
.col form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}




.cookieConsentContainer{
	z-index:999;
	width:350px;
	min-height:20px;
	box-sizing:border-box;
	padding:30px 30px 30px 30px;
	background:#FFF;
	overflow:hidden;
	position:fixed;
	bottom:30px;
	left:30px;
	display:none
}

.cookieConsentContainer .cookieTitle a{
	font-family:OpenSans,arial,sans-serif;
	color:#000000;
	font-size:22px;
	line-height:20px;
	display:block
}

.cookieConsentContainer .cookieDesc p{
	margin:0;padding:0;
	font-family:OpenSans,arial,sans-serif;
	color:#000000;
	font-size:13px;
	line-height:20px;
	display:block;
	margin-top:10px;
}

.cookieConsentContainer .cookieDesc a{
	font-family:OpenSans,arial,sans-serif;
	color:#fff;
	text-decoration:underline;
}

.cookieConsentContainer .cookieButton a{
	display:inline-block;
	font-family:OpenSans,arial,sans-serif;
	color:#fff;
	font-size:14px;
	font-weight:700;
	margin-top:14px;
	background:#589bd4;
	box-sizing:border-box;
	padding:15px 24px;
	text-align:center;
	transition:background .3s;
}

.cookieConsentContainer .cookieButton a:hover{
	cursor:pointer;
	background:#2868c7;
	color: #FFF;
}

@media (max-width:980px){
	
	.cookieConsentContainer{
		bottom:0!important;
		left:0!important;
		width:100%!important}
	}
	.float{
	cursor:pointer;
	position:fixed;
	width:60px;
	height:60px;
	bottom:20px;
	right:20px;
	background-color:#FFF;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  	font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:14px;
	color: #2868c7;

}

/* The alert message box */
.alert {
  padding: 10px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
  font-size: 12px;
  text-align: center;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
  
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}

</style>

</head>
	  


<body>

<?php
$logado = $_GET["l"];
$senha = $_GET["s"];
?>

<div id="verifica_login" class="alert" hidden="hidden">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
<div class="container-fluid d-flex align-items-center p-0">

        
<div class="row d-flex col-12 text-left m-0 justify-content-around">

	<div class="row row-cols-3 row-cols-md-3 g-3">

		<div class="col" style="width: 37%;">
		</div>
		<div class="col" style="width: 26%;">
		  <div class="card h-100">
			<img src="../assets/img/monitoramento5.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				
			  <form method="POST" name="login" action="ope.php">
<table style="width: 90%;">
	<tr>
		<td colspan="2" style="height: 50px;">
		<h5 class="card-title"><strong>MONITORAMENTO 2.0</strong></h5>
		</td>
	</tr>
<tr>
<td style="width: 20%;">
<label for="username">
<i class="material-icons">face</i>
</label>
</td>
<td style="width: 80%;">
<input type="text" name="login" placeholder="Usuário" id="login" value='<?php echo $logado ?>' required>
</td>
</tr>
<tr>
<td>
<label for="password">
<i class="material-icons">lock</i>
</label>
</td>
<td>		
<input type="password" name="senha" placeholder="Senha" id="senha" value='<?php echo $senha ?>'  required>			
</td>
</tr>
<tr>
	<td colspan="2" style="padding-top: 20px;">
	<input type="submit" value="Acessar" onclick="return enviardados();">
	</td>
</tr>
</table>
				
				
			
				
			</form>
	
			</div>
			<div class="card-footer">
			  <small class="text-muted">Atualizado 26/12/2021 - V. 2.0.5</small>
			</div>
		  </div>
		</div>
		<div class="col" style="width: 37%;">
		</div>
	

</div>

</div>




		<script>var purecookieTitle="Cookies",purecookieDesc="Este site usa cookies para garantir que você obtenha a melhor experiência em nosso site. Ao usar nosso site você consente cookies.",purecookieLink='',purecookieButton="Permitir";
		function pureFadeIn(e,o){
			var i=document.getElementById(e);i.style.opacity=0,i.style.display=o||"block",function e(){
				var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()
			}
			
			function pureFadeOut(e){
				var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var t="";if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3),t="; expires="+n.toUTCString()}document.cookie=e+"="+(o||"")+t+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(o))return n.substring(o.length,n.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){getCookie("purecookieDismiss")||(document.body.innerHTML+='<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>'+purecookieTitle+'</a></div><div class="cookieDesc"><p>'+purecookieDesc+" "+purecookieLink+'</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">'+purecookieButton+"</a></div></div>",pureFadeIn("cookieConsentContainer"))}function purecookieDismiss(){setCookie("purecookieDismiss","1",7),pureFadeOut("cookieConsentContainer")}window.onload=function(){cookieConsent()};</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=5511993030649&text=Olá! Tudo bem? Preciso da ajuda do Suporte CADD!" class="float" target="_blank">
<i class="fa fa-commenting my-float"></i>
</a>
</body>
</html>