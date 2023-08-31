
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>::. MONITORAMENTO .:: CADD</title>


<link rel="shortcut icon" href="imgs/favicon.ico" >
<link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif" >
<script type='text/javascript' src="control/timer.js"></script>
<script src="js/logger.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

	<script>
$(document).ready(function(){
$(".jquery-waiting-base-container").waiting({modo:"slow"});
});
	

  </script>
<style>


.jquery-waiting-base-container {
	position: absolute;
	left: 0px;
	top: 0px;
	margin: 0px;
	width: 100%;
	height: 100%;
	display: block;
	z-index: 99997;
	opacity: 1;
	filter: alpha(opacity = 100);
	background-color:red;
	
	background-image: url("./imgs/loading.gif");
	background-repeat: no-repeat;
	background-position: 50% 35%;
	padding-top:0px;
}



body{
	font-family: Open Sans; 
	font-size: 11px;
    background-color: #579bd3;
}
	




 #total{
	position: absolute;
	width: 100%;
	height: 204px;

	left: 0px;
	top: 50px;
	overflow-x: hidden;
	 overflow-y: auto;
	
  }

 #total2{
	position: absolute;
	width: 100%;
	height: 50px;
	background-color: #ECECEC;
	left: 0px;
	top: 0px;
    z-index: 999999;
	
	
  }
  

</style>
</head>

<?php 
include ('session.php');
include ('conecta.php');
ini_set('max_execution_time',12000);



?>

<?php
 
require_once ('src/PHPMailer.php');
require_once ('src/SMTP.php');
require_once ('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail1 = new PHPMailer(true);

 $array_emails = [];
        $emails = $_GET['mail'];
        $nota = $_GET['nota'];
        $id = $_GET['id'];

        if (strpos($emails, ';') !== false) {

			$pieces = explode(";", $emails);
	
			$emails_conta = count($pieces);

			for ($x1 = 0; $x1 < $emails_conta; $x1++) {
				//echo $pieces[$x1];

				array_push($array_emails, $pieces[$x1]);
			}
			
		} else {

			//echo $emails ."<br>";
			array_push($array_emails, $emails);
					  
		}

       $size = count($array_emails);

      // echo "Enviando email(s)....";

?>

<div class="jquery-waiting-base-container"></div>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="10px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">mail</i><strong><font size="2px">&nbsp;EMAIL(S) ENVIADO(S) COM SUCESSO!</strong>  
      </td>
    </tr>
</table>

<?php

	for ($i = 0; $i < $size; $i++) {

		$value = $array_emails[$i];
	
		//echo $value . "<br>";
		

        try {
            $mail1->IsSMTP();                // Ativar SMTP
            $mail1->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail1->SMTPAuth = true;         // Autenticação ativada
            $mail1->SMTPSecure = 'ssl';      // SSL REQUERIDO pelo GMail
            $mail1->Host = 'email-ssl.com.br'; // SMTP utilizado
            $mail1->Port = 465; 
            $mail1->Username = 'superbrilho@rccaddesign.com';
            $mail1->Password = 'Fpc@1977';
        
            
            $mail1->setFrom('superbrilho@rccaddesign.com');
            $mail1->AddAddress($value);	
            
            $assunto = '=?UTF-8?B?'.base64_encode('SUPERBRILHO: Você recebeu seu pedido! Aproveite!').'?=';
           // echo "Enviando email(s)....";
            $mail1->isHTML(true);
            $mail1->Subject = $assunto . ' ' . $nota;
            $mail1->Body = "<body style='background-color: #ecf0f1'>
            <center><table border=0 style='height:200px; background-color: #FFF; align:center'>
            <tr><td align=right style='height:150px;padding-right:48px'><img src='http://191.252.59.75/saas/MO2.0/CLT/STD/src/imgs/image-4.png' ></td></tr>
            <tr><td align=center><img src='http://191.252.59.75/saas/MO2.0/CLT/STD/src/imgs/image-6.png'></td></tr>
            <tr><td align=center><span style='margin: 0px; text-align: center; font-family: Open Sans; font-size: 43px; font-weight: 400;'><strong>Seu pedido chegou!</strong></span></td></tr>
            <tr><td align=center style='padding-left:15px;padding-right:15px;color:#000;font-family: Open Sans; height:100px '>Seu pedido foi entregue com sucesso!<br>Obrigado por comprar com a Superbrilho!</td></tr>
            <tr><td  align=center style='height:50px'><img src='http://191.252.59.75/saas/MO2.0/CLT/STD/src/imgs/image-3.png'></td></tr>
            <tr><td align=center style='padding-left:15px;padding-right:15px; color:#000; background-color: #16689e;color:#fff;font-family: Open Sans; height:80px '><strong>As melhores cestas b&aacute;sicas para sua empresa e sua fam&iacute;lia!</strong></td></tr>
            <tr><td  align=center><a href='https://web.whatsapp.com/send?phone=5511910209020'><img src='http://191.252.59.75/saas/MO2.0/CLT/STD/src/imgs/image-2.png'></a>&nbsp;&nbsp;&nbsp;<a href='tel:+551121812050'><img src='http://191.252.59.75/saas/MO2.0/CLT/STD/src/imgs/image-5.png'></td></tr>
            </table></center></body>";
            $mail1->AltBody = 'SUPERBRILHO: Você recebeu seu pedido! Aproveite!';
        
            if($mail1->send()){
           // echo "<br><strong><span style='background-color:#579bd3; font-size: 11px; color: white'>" . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email(s) enviado(s) com sucesso!' . '</span></strong>';
            }else{
              //echo 'Email nao enviado';
            }
        
          }catch (Exception $e) {
           //echo "Error ao enviar mensagem: {$mail1->ErrorInfo}";
          }
	  $mail1->clearAddresses();
        }


        $query2 = "UPDATE rotas SET email_chegou=1 where id='$id'";
        $rs2 = mysql_query($query2);
        ?>


<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

setTimeout(parent.location.reload(), 100000);

</SCRIPT>

</body>
</html>