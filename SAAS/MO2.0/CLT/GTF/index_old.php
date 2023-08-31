<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu_firstpage.css">
<link rel="shortcut icon" href="imgs/favicon.ico" >
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 
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
</SCRIPT>
<style type="text/css">

a:link {
	text-decoration: none;
    color: #2867b2;
}
/* visited link */
a:visited {
    color: #2867b2;
}


/* mouse over link */
a:hover {
    color: #FFF;
}

/* selected link */
a:active {
    color: #589bd4;
}

html
{
  position:fixed;
  width:100%;
  height:100%;
}

#apDiv1 {
	position: absolute;
	width: 100%;
	height: 100%;
	z-index: -1;
	left: 0px;
	top: 0px;
	background-color: #589bd4;
}
#apDiv2 {
	position: absolute;
	width: 100%;
	height: 310px;
	z-index: 2;
	left: 0px;
	top: 65px;
	background-image:url(imgs/bg_mapa_firstpage.png);
	background-color: #589bd4;
}
#apDiv3 {
	position: absolute;
	width: 139px;
	height: 48px;
	z-index: 3;
	top: 13px;
	left: 125px;
}
#apDiv4 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 22px;
	top: 184px;
}
#apDiv5 {
	position: absolute;
	width: 195px;
	height: 65px;
	z-index: 5;
	left: 0px;
	top: 102px;
}
#apDiv6 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 22px;
	top: 239px;
}

#apDiv7 {
	position: absolute;
	width: 316px;
	height: 275px;
	z-index: 4;
	left: 125px;
	top: 80px;
	border: 1px solid #d3d5d6;
	
	background-color: #FFFFFF;
}

#titulo {
	position: absolute;
	width: 295px;
	height: 18px;
	z-index: 4;
	left: 138px;
	top: 107px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: center;
	font-weight: bold;
}

#ou {
	position: absolute;
	width: 299px;
	height: 18px;
	z-index: 4;
	left: 135px;
	top: 270px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: center;
	font-weight: bold;
}

#apDiv8 {
	position: absolute;
	height: 46px;
	z-index: 4;
	left: 137px;
	top: 142px;
}
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px #eef2f6 inset;
}

input[type="text"], input[type="password"], textarea, select { 
    outline: none;
}


input[type="text"]
{
    background: transparent;
    border: none;
	border: 1px solid #d3d5d6;
	
	padding: 10px;
}
input[type="password"]
{
    background: transparent;
   
	border: 1px solid #d3d5d6;
	
	padding: 10px;
	
}

  #apDiv11 input[type=submit] {  
	color: #fff;
	border: 1px solid #5cbb69;
	background: #5cbb69;

	
	font-size:13px;
	
	height: 30px;
	width:298px;
font-weight:bold;
    }  
	
#apDiv11 input[type=submit]:hover{
	background: #249333;
	border: 1px solid #249333;
	cursor:pointer;
    }  
	
	
#apDiv12 input[type=submit] {  
	color: #fff;
	border: 1px solid #589bd4;
	background: #589bd4;

	font-size:13px;
	
	height: 30px;
	width:298px;
font-weight:bold;
    }  
	
#apDiv12 input[type=submit]:hover{
	background: #2867b1;
	border: 1px solid #2867b1;
	cursor:pointer;
    }  
#apDiv9 {
	position: absolute;
	width: 204px;
	height: 133px;
	z-index: 4;
	left: 143px;
	top: 387px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #1d71a5;
	line-height: 20px;
	text-transform: uppercase;
}
#apDiv5 table tr td {
	color: #FFF;
}
#apDiv10 {
	position: absolute;
	height: 48px;
	z-index: 5;
	left: 136px;
	top: 183px;
}
#apDiv11 {
	position: absolute;
	width: 296px;
	height: 34px;
	z-index: 5;
	top: 232px;
	left: 135px;
}
#apDiv12 {
	position: absolute;
	width: 296px;
	height: 37px;
	z-index: 6;
	left: 135px;
	top: 293px;
}
#apDiv13 {
	position: absolute;
	width: 115px;
	height: 21px;
	z-index: 7;
	left: 122px;
	top: 317px;
}
</style>
</head>

<body>

<?php
$logado = $_GET["l"];
$senha = $_GET["s"];
?>
<div class="menu"> </div>
<div id="apDiv1"></div>
<div id="apDiv2"><img src="imgs/bg_mapa_firstpage.png" width="2560" height="310" /></div>
<div id="apDiv3"><img src="imgs/logo_01.png" width="135" height="45" /></div>
<div id="apDiv7"></div>
<form method="POST" name="login" action="ope.php">

<div id="titulo">JÁ SOU CLIENTE!</div>
<div id="ou">OU</div>
<div id="apDiv8">
<?php
if ($logado!=''){
?>
  <input name="login" type="text" id="login" value='<?php echo $logado . "@" . $logado;?>' style="width:274px"/>
  <?php
} else {
?>
  <input name="login" type="text" id="login" value='Login' onclick="this.value=''" style="width:274px"/>
  <?php
}
  ?>
</div>  
<div id="apDiv9" hidden="hidden">
  <p><a href="#" >Informações gerais</a></p>
  <p><a href="#">Quem somos?</a></p>
  <p><a href="#">Como funciona?</a></p>
  <p><a href="#">Perguntas frequentes</a></p>
  <p><a href="#">Privacidade</a></p>
  <p><a href="#">Entre em contato</a></p>
</div>
<div id="apDiv10">
<?php
if ($senha!=''){
?>

  <input name="senha" type="password" style="width:274px" id="senha" value='<?php echo $senha;?>'/>
  
    <?php
} else {
?>
 <input name="senha" type="password" style="width:274px" id="senha" onclick="this.value=''" value='Senha'/>
  <?php
}
  ?>
  
  </div>
  <div id="apDiv11"><input type='submit' value='ENTRAR' onclick="return enviardados();"/></div>
</form>
<div id="apDiv12"> <input type='submit' value='Ainda não sou cliente? Cadastre-se já!'/></div>

</body>
</html>