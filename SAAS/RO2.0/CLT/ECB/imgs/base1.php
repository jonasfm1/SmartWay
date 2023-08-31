<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. ROTAS ONLINE .:: CADD</title>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<script type='text/javascript' src="control/timer.js"></script>
<?php include ('session.php'); 
?>
<style type="text/css">
html
{
  position:fixed;
  width:100%;
  height:100%;
}

#apDiv1 {
	position: absolute;
	width: 100%;
	height: 33px;
	z-index: -1;
	left: 0px;
	top: 0px;
	background-color: #589bd4;
}
#apDiv2 {
	position: absolute;
	width: 195px;
	height: 100%;
	z-index: 2;
	left: 0px;
	top: 33px;
	background-color: #589bd4;
}
#apDiv3 {
	position: absolute;
	width: 152px;
	height: 53px;
	z-index: 3;
	top: 26px;
	left: 24px;
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
			font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFF;
}
#apDiv6 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 22px;
	top: 289px;
}

#apDiv7 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 22px;
	top: 345px;
}
#apDiv8 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 21px;
	top: 401px;
}

#apDiv9 {
	position: absolute;
	width: 118px;
	height: 47px;
	z-index: 4;
	left: 21px;
	top: 457px;
}
#apDiv5 table tr td {
	color: #FFF;

	
}
#apDiv10 {
	position: absolute;
	width: 144px;
	height: 41px;
	z-index: 6;
	left: 27px;
	top: 236px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFF;
	}
</style>
</head>

<body onload="startClock();">
<div class="menu">
  <ul class="menu-list">
    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Ajuda</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/setinha_menu_superior.png" width="11" height="6" /></a>
           <ul class="sub-menu">                          
        <li><a href="#">Padronização de arquivos</a></li>         
        <li><a href="#">Geocodificação manual</a></li>       
        <li><a href="#">Agrupamento de clientes</a></li>       
        <li><a href="#">Rotas</a></li>       
        <li><a href="#">Imprimir ou Exportar</a></li>                      
      </ul>
    </li>
    <li>
      <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Olá <strong><?php echo $logado;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/setinha_menu_superior.png" width="11" height="6" /></a>
       <ul class="sub-menu">   
        <li><a href="#">Home</a></li>      
        <li><a href="#">Configurações da Conta</a></li>      
        <li><a href="#">Banco de Dados</a></li>
        <li><a href="#">Cadastro de veículos</a></li>      
        <li><a href="index.php">Sair</a></li>             
      </ul>
    </li>
  </ul>
</div>
<div id="apDiv1"></div>
<div id="apDiv2"></div>
<div id="apDiv3"><img src="imgs/logo_01.png" width="135" height="45" /></div>
<div id="apDiv4"><img src="imgs/1passo.png" width="107" height="44" /></div>
<div id="apDiv10">Importação do arquivo .csv para a nossa base. Para mais detalhes clique aqui.</div>
<div id="apDiv5">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="76"><img src="imgs/logo_client.png" width="76" height="61" /></td>
      <td bgcolor="#2867b2">&nbsp;&nbsp;&nbsp;<strong><?php echo $logado;?></strong></td>
    </tr>
  </table>
</div>
<div id="apDiv6"><img src="imgs/2passo.png" width="107" height="44" /></div>
<div id="apDiv7"><img src="imgs/3passo.png" width="107" height="44" /></div>
<div id="apDiv8"><img src="imgs/4passo.png" width="107" height="44" /></div>
<div id="apDiv9"><img src="imgs/5passo.png" width="107" height="44" /></div>
</body>
</html>