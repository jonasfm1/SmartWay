<?php
include('session.php');
include('control/conecta.php');
ini_set('max_execution_time', 12000);

$id = $_GET['id'];


$rs3 = mysql_query("SELECT end_img AS imagem_link, id AS id_img from images where id_visita = '$id'");
// $rs3 = mysql_query($query3);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//BR"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>::. MONITORAMENTO .:: CADD</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <style type="text/css">

		

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


body{
	font-family: Open Sans; 
	font-size: 11px;
}
         



#total{
	
    position: absolute;
	width: 100%;
	height: 50px;
	background-color: #ECECEC;
	left: 0px;
	top: 0px;
	
  }

#apDiv12 {
	position: absolute;
	width: 500px;
	height: 93px;
	z-index: 1;
    left: 0px;
    padding-left: 9px;
    top: 60px;
    
   
   

            overflow-x: hidden;
            overflow-y: auto;

}




        .exclui {
			   position: absolute;
			left: 0px;
            top: 0px;
            background-color: white;
            border:1px solid silver;

        }
        .galeria {
         
         width: 531px;
         height: auto;
      
      
    
     }

     .galeria img {
         max-height: 88px;
      
         border:1px solid silver;

     }

     .galeria img:hover {
         cursor: pointer;
     }

     /*estilo do bg*/
     .bg {
         position: absolute;
         background-color: #FFFFFF;

         top: 0px;
         display: none;
         height: 100%;
         width: 100%;
         z-index: 9999999;
        
        
     }

     /*estilos do lightbox*/
     .lb {
         position: absolute;
         height: 100%;
         width: 100%;
         display: none;
         z-index: 99999999;


     }

     .lb img {
         opacity: 0;
         max-width: 500px;
         max-height: 376px;
       
         position: absolute;
         top: 200px;
         left: 10px;
         border:1px solid silver;

     }

        /*botão fechar*/

        .close {
          
           
            width: 20px;
            height: 18px;
            text-align: center;
            position: absolute;
            top: 166px;
            left: 250px;
        }

        .close:hover {

            cursor: pointer;
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
	width: 100%;
	height: 100%;
	z-index: 0;
	left: 0px;
	top: 0px;	
	
}




.img {
    opacity: 0.2;
    filter: alpha(opacity=20); /* For IE8 and earlier */
}


    </style>


    <link rel="shortcut icon" href="imgs/favicon.ico">
    <link rel="icon" type="image/gif" href="imgs/animated_favicon1.gif">

    <script type="text/javascript" src="jquery-1.12.1.min.js"></script>
    <script type='text/javascript' src="control/timer.js"></script>
    <script src="js/logger.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script LANGUAGE="JavaScript">

		
		function confirmaExclusao(aURL) {

if(confirm('ALERTA: EQUIPE CADDESIGN\nVocê tem certeza que deseja excluir essa foto?\nEla será apagada do sistema sem backup algum!')) {

location.href = aURL;

//target=ver;

}
}
		
		$(document).ready(function () {
            $('.galeria img').click(function () {
                $('.bg').animate({'opacity': '0.90'}, 300, 'linear');
                $('.bg, .lb').css('display', 'block');

                var big = $(this).attr('src');

                $('.lb img').attr('src', big);
                $('.lb img').animate({'opacity': '1.00'}, 300, 'linear');
            });

            $('.close').click(function () {
                $('.lb img').css('opacity', '0');
                $('.bg, .lb').css('display', 'none');

            });


        });

        function toggleFullScreen() {
            if (!document.fullscreenElement && !document.msFullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
                if (document.body.requestFullscreen) {
                    document.body.requestFullscreen();
                } else if (document.body.msRequestFullscreen) {
                    document.body.msRequestFullscreen();
                } else if (document.body.mozRequestFullScreen) {
                    document.body.mozRequestFullScreen();
                } else if (document.body.webkitRequestFullscreen) {
                    document.body.webkitRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        }


        this.fullScreenMode = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen; // This will return true or false depending on if it's full screen or not.

        $(document).on('mozfullscreenchange webkitfullscreenchange fullscreenchange', function () {
            this.fullScreenMode = !this.fullScreenMode;

            //-Check for full screen mode and do something..
            simulateFullScreen();
        });


        var simulateFullScreen = function () {
            if (this.fullScreenMode) {
                docElm = document.documentElement
                if (docElm.requestFullscreen)
                    docElm.requestFullscreen()
                else {
                    if (docElm.mozRequestFullScreen)
                        docElm.mozRequestFullScreen()
                    else {
                        if (docElm.webkitRequestFullScreen)
                            docElm.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
                    }
                }

            }

            this.fullScreenMode = !this.fullScreenMode

        }


        function rollover(my_image, qual) {
            my_image.src = qual;
        }

        function AbreFechaDiv(qualdiv) {

            var objeto = document.getElementById(qualdiv);


            if (objeto.style.display == 'none') {
                objeto.style.display = 'block';

            } else {
                objeto.style.display = 'none';
            }
        }


        (function ($) {
            $.fn.waiting = function (options) {
                options = $.extend({modo: 'normal'}, options);
                this.fadeOut(options.modo);
                return this;
            };
        })(jQuery);
        ;


        $(document).ready(function () {
            $(".jquery-waiting-base-container").waiting({modo: "slow"});
        });
    </script>

</head>
<?php


?>
<body>

<!--bg-->
<div class="bg"></div>

<!--box de imagens-->
<div class="lb">
    <img src=""/>
    <div class="close"><i class="material-icons" style="font-size:30px;color:black;">&#xe5c9;</i></div>
</div>
<div id="apDiv11">


    <div id="total">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#579bd3; font-size: 11px; color: white" >
    <tr>
		<td align="left" valign="center" colspan="3" height="50px"><i class="material-icons" style="font-size:22px; vertical-align:bottom;padding-left: 15px;">&#xe3b0;</i><strong><font size="2px">&nbsp;GALERIA DE FOTOS</font></strong>  
      </td>
    </tr>
</table>
        <div id="apDiv12">

        
            <!--galeria de fotos-->
            <div class="galeria">
 
                <?php
                while ($row3 = mysql_fetch_array($rs3)) {
                    $img_link = $row3["imagem_link"];
                    $id_link = $row3["id_img"];
                    ?>
                   <tr>
                        <tb>
							
                            <?php
                            $filepath = '../../../../mo_app/app/imgs_app/mo_' . $logado . "/" . $img_link;
                            echo ' <a href="' . $filepath . '" target="_blank"><img src="' . $filepath . '" ></a>';
					?>
						
					
                        </tb>
               
                  </tr>
               

                    <?php
                }
                mysqli_query($rs3);


                ?>
 
            </div>



        </div>
            </div>

</body>
</html>