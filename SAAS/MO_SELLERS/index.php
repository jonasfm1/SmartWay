<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. CADD MO SELLERS .:: CADD</title>
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

}




* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #fff;
}
.login {
  	width: 100%;
  	background-color: #ffffff;
	
	
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
	
  	padding: 20px 0 20px 0;
  
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
  	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 150px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  
	  padding: 0 15px;
	  font-size: 20px;
	 
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
	 margin-top: 20px;
	 margin-bottom: 20px;
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


.myButton {
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
	background-color:#3d94f6;
	border-radius:0px;
	border:1px solid #337fed;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:15px 36px;
	text-decoration:none;
    text-shadow:0px 1px 0px #1570cd;
    margin-bottom: 10px;
    width: 100%;
    line-height: 20px; /* <- changed this */
    /* <- added this */

    
}
.myButton:hover {
	background:linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
	background-color:#1e62d0;
}
.myButton:active {
	position:relative;
	top:1px;
}
        

</style>

</head>
	  


<body>

<?php
$logado = $_GET["l"];
$senha = $_GET["s"];
?>


<div class="login">
			<h1>LOGIN</h1>
			<hr style="width:100%;text-align:center;margin-left:0;height:1px">
			<form method="POST" name="login" action="ope.php">

			<table border="0">
<tr>
	<td>
	<label for="username">
				<i class="material-icons">face</i>
				</label>
	</td>
	<td>
	<input type="text" name="login" placeholder="Usuário" id="login" required>		
	</td>

</tr>
<tr>
	<td>
	<label for="password">
				<i class="material-icons">lock</i>
				</label>
	</td>
	<td>
	<input type="password" name="senha" placeholder="Senha" id="senha" required>		
	</td>

</tr>
<tr>
	<td colspan="2">
	
	<input type="submit" value="ENTRAR" onclick="return enviardados();" class="myButton">		
	</td>

</tr>



			</table>
			
			
				
				
			
			</form>
		</div>

</body>
</html>