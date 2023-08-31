<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="shortcut icon" href="imgs/favicon.ico" >


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script LANGUAGE="JavaScript">

function enviardados(){



if(document.login.login.value=="" || document.login.login.value=="Login")

{

alert( "Preencha o campo 'LOGIN'!" );

document.login.login.focus();

return false;

}

if(document.login.senha.value=="" || document.login.senha.value=="Senha")

{

alert( "Preencha o campo 'SENHA'!" );

document.login.senha.focus();

return false;

}


}

$( "#olho" ).mousedown(function() {
  $("#senha").attr("type", "text");
  alert("cliquei");
});

$( "#olho" ).mouseup(function() {
  $("#senha").attr("type", "password");
});
  
 

</SCRIPT>

<style type="text/css">

html
{
  position:fixed;
  width:100%;
  height:100%;

}


#apDiv2 {
	position: absolute;
	width: 100%;
	height: 100%;
	z-index: -5;
	left: 0px;
	top: 0px;
	background-image:url(imgs/bg_mapa_firstpage.png);

}




* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #c7ced4;
}
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 200px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 22px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #589bd4;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
	  padding: 0 15px;
	 
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #589bd4;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
	  transition: background-color 0.2s;
	
}
.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}

</style>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-64aa0c61-230a-4e14-9c02-7ed80b6acb69"></div>
</head>
	  


<body>

<?php
$logado = $_GET["l"];
$senha = $_GET["s"];
?>

<div id="apDiv2"></div>


<div class="login">
			<h1>MONITORAMENTO 1.6</h1>
			<form method="POST" name="login" action="ope.php">
				<label for="username">
				<i class="material-icons">face</i>
				</label>
				<input type="text" name="login" placeholder="Usuário" id="login" required>
				<label for="password">
				<i class="material-icons">lock</i>
				</label>
				<input type="password" name="senha" placeholder="Senha" id="senha" required>
			
				<input type="submit" value="ENTRAR" onclick="return enviardados();">
			</form>
		</div>

</body>
</html>