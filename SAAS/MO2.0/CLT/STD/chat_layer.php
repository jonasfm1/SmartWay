<?php 
include ('session.php');

include ('conecta.php');
ini_set('max_execution_time',12000);
  
  
$lg = $_GET['lg'];
$n= $_GET['n'];
$st= $_GET['st'];
$at= $_GET['at'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>

<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script LANGUAGE="JavaScript">


window.setInterval(function() {
  var elem = document.getElementById('tabela_dentro');
  elem.scrollTop = elem.scrollHeight;
}, 300);


(function($) {
$.fn.waiting = function(options) {
options = $.extend({modo: 'normal'}, options);
this.fadeOut(options.modo);
return this;
};
})(jQuery);;

	
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});

});


//Require jQuery
function scrollSmoothToBottom (id) {
   var div = document.getElementById(id);
   $('#' + id).animate({
      scrollTop: div.scrollHeight - div.clientHeight
   }, 500);
}

</script>
<style>

@charset "UTF-8";

textarea {
	resize: none;
	text-align:right;
	padding-right: 25px;
  }

.round-button {
	width:15px;
	
	
	font-size:7px;
	font-weight: bold;
	line-height:14px;
	text-align:center;

  }
  .round-button-circle {
	width: 100%;
	height:0px;
	padding-bottom: 100%;
	border-radius: 50%;

	overflow:hidden;
		  
	background: #cc0000; 
	
	box-shadow: 0 0 3px gray;
	color: #FFFFFF;
	
  }
  .round-button-circle:hover {
	background:#30588e;
  }
  .round-button a {
	display:block;
	float:left;
	width:100%;
	padding-top:50%;
	padding-bottom:50%;
	line-height:7px;
	margin-top:-0.5em;
		  
	text-align:center;


	text-decoration:none;
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

hr {
		
	
	height: 10px;
	background-color:#c7ced4;

	}
	
	
* {
	box-sizing: border-box;
	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	
}
body {
	background-color:#ffffff;
	overflow-x:hidden;
    overflow-y: auto;
}


#interna{
	width: 100%;
	background-color: #ffffff;


	
	text-transform: uppercase;
}
	

#apDiv9x {
	position: absolute;
	width: 50px;
	height: 47px;
	z-index: 4;
	left: 21px;
	top: 93%;
	visibility:hidden;
	
}

.apDiv9x{
	cursor:pointer;
}
/* unvisited link */
#apDiv12 a:link {
   text-decoration: none;
}

	.jquery-waiting-base-container {
		position: absolute;
	left: -2px;
	top: -2px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 999999;
	opacity: 1;
	-moz-opacity: 1;
	filter: alpha(opacity = 100);
	background-color:#ebf5ff;
	
	background-image: url("../imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top: 250px;
}


#apDiv11 {
	position: absolute;
	width: 98%;
	height: 85%;
	z-index: 0;
	left: 20px;
	top: 40px;
}


#sidebar {
    display: none;
	
	position: absolute;
	width: 470px;
	height: 70px;
	z-index: 99999;
	left: 0px;
	top: 50px;

	font-size: 11px;
	line-height: 10px;
	background-color:#FFFFFF;
	padding:30px;
	color:#000000;
	
	border: 1px solid #589bd4;
	


	
}

#tabela_fora {
	position: relative;
	z-index: 0;
	width: 100%;
	height: 262px;
    left: 0px;
    top: 0px;
	overflow-y: auto;
	overflow-x: hidden;
   
   

	
}
#tabela_fora a:link 
{ 
text-decoration:none; 
	color: #000000;
} 
	
	/* visited link */
#tabela_fora a:visited {
  color: #000000;
	text-decoration:none; 
}

/* mouse over link */
#tabela_fora a:hover {
  color: grey;
	text-decoration:none; 
}

/* selected link */
#tabela_fora a:active {
  color: grey;
	text-decoration:none; 
}
	

#tabela_dentro{
	position: relative;
	width: 100%;
	height: 100%;
	border-color: gray;
	
  
	
	
  }




table.bordasimples {
	border-collapse: collapse;
	border-color: #ECECEC;
	
	font-size: 11px;

	}

  table.bordasimples tr {
	  border-color: #CCC;

	  height: 40px;
	 
	}

table.bordasimples td {

font-size: 11px;


margin-top: 20px;
padding: 10px;





}

 #total{
	position: absolute;
	width: 100%;
	overflow: false;

	left: 1px;
	top: 5px;
  }

#apDiv12 {
	position: absolute;
	width: 100%;
	height: 77%;
	z-index: 1;
	left: 2px;
	top: 255px;
	
	font-size: 11px;
	line-height: 16px;
	overflow: auto;
	background-color: #FFFFFF;
}
	
	input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px #eef2f6 inset;
}

input[type="text"], input[type="password"], textarea, select { 
    outline: none;
}


input[type="text"]
{
     background: #FFFFFF;
  
	border: 1px solid gray;
	
	padding: 2px;
	height: 20px;
	font-size: 11px;
}
input[type="password"]
{
    background: #FFFFFF;
   
	border: 1px solid gray;
	
	padding: 2px;
	
}



   input[type=submit] {  
	color: #fff;
	border: 1px solid #589bd4;
	background: #589bd4;


	font-size:11px;
	
	height: 30px;
	width:100px;
font-weight:bold;
text-transform: uppercase;
    }  
	
	 input[type=submit]:hover{
	background: #2868c7;
	border: 1px solid #2868c7;
	cursor:pointer;
    }  

#div_titulo {
	position: absolute;
	width: 350px;
	height: 31px;
	z-index: 999999;
	top: 8px;
	color: #FFFFFF;
	left: 90px;
	
	
}


</style>
</head>

<body onload="scrollSmoothToBottom('tabela_fora');">

<?php
$chat = $_GET["chat"];
?>
<div class="jquery-waiting-base-container"></div>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px">
            <i class="material-icons" style="font-size:24px; vertical-align:bottom;padding-left: 15px;">account_box</i><strong><span style="color: #FFFFFF; font-size:16px">&nbsp;CHAT CADD - <?php echo $chat;  ?><?php echo $aviso_listatual; ?></span></strong>
      </td>
    </tr>
</table>
</div>



<div id="interna">



<div id="tabela_fora">

<div id="tabela_dentro">
  



<br>

<table border="0" style="width: 100%;" class="bordasimples">
<?php
$query1 = "select * from chat where chat='$chat' ORDER BY id ASC";													
$rs1 = mysql_query($query1);

// libera lido pelo site
$query2 = "UPDATE chat SET lido=1 WHERE de='$chat'";												
$rs2 = mysql_query($query2);

while($row1 = mysql_fetch_array($rs1)){	
?>
<tr >


<?php
$segura_de= $row1["de"];
if($row1["nivel"]==2){
?>
<td style="background-color:#F0F8FF ; width:50%;border: 12px solid #FFFFFF;" >

<table>
    <tr >
        <td style="width: 40px;vertical-align: top;" ><i class="material-icons" style="font-size:20px">stay_primary_portrait</i></td>

        <td>
            
<?php
echo $row1["msg"] ."<br><br>";
//echo $row1["data"];
$data = $row1["data"];
echo "<strong>" . date('d/m/Y H:i:s', strtotime($data)) . "</strong>"; 

?>

        </td>
    </tr>
</table>



</td>

<td>

</td>

<?php
} else {
?>
<td>

</td>
    <td align="right" style="padding-right: 5px; background-color: #f1f1f1; width:50%; border: 12px solid #FFFFFF;" wrap>

<table>
<tr>
<td style="width: 40px;vertical-align: top;"> <i class="material-icons" style="font-size:20px">desktop_mac</i></td>
<td> 
    <?php
    echo  $row1["msg"] ."<br><br>";
    $data = $row1["data"];
    echo  "<strong>" . date('d/m/Y H:i:s', strtotime($data)) . "</strong>"; 
    ?></td>
    
</td>

</tr>

</table>

  
    
   
<?php
}
?>






</tr>

<?php

}
?>
</table>



</div>

</div>
<br><br>
<div id="total2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px">
            
<form action="scripts.php?acao=inserir_chat" method="POST">
<table border="0" class="tabela_dentro">

<tr>
<td style="padding-left:10px">
  
<input type="text" size="85px" name="texto" style="height: 30px;">

<input type="text" name="usuario" value="<?php echo $chat; ?>" hidden>
<input type="text"name="site" value="<?php echo $user; ?>" hidden>
  
</td>
<td>
<input type="submit">

</td>
</tr>
</table>

</form>  
        </td>
    </tr>
</table>
</div>



</div>
</body>
</html>