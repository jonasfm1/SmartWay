<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. CADD MO SELLERS .:: CADD</title>
<link rel="shortcut icon" href="imgs/favicon.ico" >


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

 <?php 
include ('session.php');
include ('control/conecta.php');
ini_set('max_execution_time',12000);
  
?>

<script LANGUAGE="JavaScript">

function fecha_foto() {
        
        document.getElementById("Pagina1").style.display = "none";

            };


function acao_volta(valor, x, y) {
	
    document.getElementById("Pagina1").style.display = "block";
    
    var teste = "step2_gallery.php" + valor;
   // alert(valor);
    
   var x_ok = document.Form1.posx.value - 460;
   var y_ok = document.Form1.posy.value - 300;

   var x_ok_b = document.Form1.posx.value - 70;
   var y_ok_b = document.Form1.posy.value - 20;

   var d = document.getElementById('pag2x');
	d.style.position = "absolute";
	d.style.left = x_ok+'px';
	d.style.top = y_ok+'px';

	var dx = document.getElementById('botao1');
	dx.style.position = "absolute";
	dx.style.left = x_ok_b+'px';
	dx.style.top = y_ok_b+'px';

    document.getElementById("pag2x").src = teste; 
    }

function enviardados(){



if(document.login.login.value=="" || document.login.login.value=="Login")

{

alert( "Preencha o campo 'LOGIN'!" );

document.login.login.focus();

return false;

}


}
$("body").mousemove(function(e) {
    document.Form1.posx.value = e.pageX;
    document.Form1.posy.value = e.pageY;
})


</SCRIPT>

<style type="text/css">
    	#botao1{
		width: 30px;
		height: 30px;
		top: 150px;
		left: 39%;
	
		position: absolute;
	
			z-index:9999999;
			color: #000;
			
			
		}

	#pag1x{
	position: absolute;
	width: 100%;
	left: 0px;
	top: 0px;
	height:1500px;

z-index:9997;
background-color: white;
opacity: 0.65;

		
}

#pag2x{
	max-width: 1200px;
	max-height: 600px;
	min-width: 400px;
	min-height: 300px;

	top: auto;
	

	position: absolute;
	border: 1px solid silver;
	
	background-color: white;
		z-index:999999;
		
	}
		

	
html
{
  position:absolute;
  width:100%;
  height:100%;
  

}






* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
      
}
body {
  	background-color: #fff;
      overflow-y: auto;
      overflow-x: hidden;
	  position: relative;
    
}

 
table.bordasimples {
				border-collapse: collapse;
				border: 1px solid #cccccc;
				background-color: #FFFFFF;
			
				}
			
			table.bordasimples tr td {
				
				font-size: auto;
				border: 1px solid #cccccc;
                padding: 3px;
			
			
		
			margin-left: 2px;
		
			
			}


.login   {
  	text-align: center;
  	color: #5b6574;
  
    width: 100%;
    position: absolute;
	
 
  
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
	  


<body onload="mouse_position()">

<form name="Form1">
<input type="text" name="posx" hidden>
<input type="text" name="posy" hidden>
</form>
<?php

$quem = $_GET["cliente"];
?>

<div class="login">

<table border="0" align="center">
    <tr>
        <td><h1>PROCURAR PEDIDOS</h1></td>
        <td style="text-transform:uppercase;"><h1><?php echo " - " . $logado ?></h1></td>
    </tr>
</table>
			
<hr style="width:100%;text-align:center;margin-left:0;height:1px">


			<form method="GET" name="login" action="home.php">

			<table border="0">
<tr>
	<td>
	<label for="username">
				<i class="material-icons">face</i>
				</label>
	</td>
	<td>
	<input type="text" name="cliente" placeholder="Cód. Cliente" id="cliente" value="<?php echo $quem ?>" required>		
	</td>

</tr>

<tr>
	<td colspan="2">
	
	<input type="submit" value="PROCURAR" onclick="return enviardados();" class="myButton">		
	</td>

</tr>
</table>
</form>
	

<?php 




if ($quem!="") {

    $result = mysql_query("SELECT id, idcliente, codigo_pedido, rota, dth_ocorrencia, endereco from rotas where idcliente like '%$quem%' order by id DESC limit 30");


	$result1 = mysql_query("SELECT nome from rotas where idcliente='$quem'");

    $dados = mysql_fetch_array($result1);
	$nome =$dados['nome'];

	

	
?>
 
    <table align="center" border="1" class="bordasimples" style="width: 98%;">

    <tr style="text-align:center ;">
        <td colspan="5" style="height: 50px;text-align: center">

		<h1> <strong><?php echo $nome;?></font> </strong></h1>
        </td>
    </tr>

    <tr style="background-color:#3d94f6 ;height:50px; color:#FFF;">
	<td style="text-align: center;"><strong>CLIENTE</strong></td>
        <td style="text-align: center;"><strong>PEDIDO</strong></td>
        <td style="text-align: left;"><strong>&nbsp;DATA DA ROTEIRIZAÇÃO</strong></td>
        <td style="text-align: center;"><strong>DATA ENTREGA</strong></td>
		<td style="text-align: left;"><strong>&nbsp;ENDEREÇO</strong></td>
  
        <td style="text-align: center;"><strong>CHK</strong></td>
    </tr>
    <?php
    while ($row = mysql_fetch_array($result)) {

		$id_visita = $row['id'];
		
		$query_img = "select id from images where id_visita='$id_visita'";
		$query_img = mysql_query($query_img);	


		$total = mysql_num_rows($query_img);
		//echo $total;
    ?>
    <tr>
	<td style="text-align: center;"><?php echo $row["idcliente"];?></td>
        <td style="text-align: center;"><?php echo $row["codigo_pedido"];?></td>
        <td style="text-align: left;" title="<?php echo $row['rota'] ?>"><?php echo mb_strimwidth($row["rota"], 0, 50, "...");?></td>
        <td style="text-align: center;"><?php 
        
       
        if($row["dth_ocorrencia"]=="0000-00-00 00:00:00"){

        } else {
			$portuga = strtotime($row["dth_ocorrencia"]);
			$portuga= date('d/m/Y H:i:s', $portuga);

      echo $portuga;

        }

        ?></td>
<td style="text-align: left;" title="<?php echo $row['endereco'] ?>"><?php echo mb_strimwidth($row["endereco"], 0, 50, "...")  ;?></td>
        
<?php
  if($row["dth_ocorrencia"]=="0000-00-00 00:00:00"){

?>

<td style="text-align: center; background-color:orange">

</td> 
<?php 
      
} else {

?>

<td style="text-align: center; background-color:green">

</td> 
		<?php
}
		?>
    </tr>
    <?php
    }
    ?>
    </table>
<?php

} else {

echo "Nenhum resultado obtido!";	
}

?>
<br><br>
</div>




<div id="Pagina1" style="display: none;">
	  
   <div id="botao1"><a href="#" onclick="document.getElementById('Pagina1').style.display = 'none'" ><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></a></div>
    <iframe name="pag1x" frameborder="0" id="pag1x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
   <iframe name="pag2x" src="" frameborder=0 id="pag2x" scrolling="no" marginheight="0" marginwidth="0" trusted="yes"></iframe>
</div>          

</body>
</html>