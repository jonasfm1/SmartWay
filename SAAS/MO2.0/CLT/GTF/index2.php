<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lightbox utilizando jQuery</title>
    <?php

    include('conecta.php');
    $pega_visita = $_GET['vs'];
    $query3 = "select * from images where id_visita = '$pega_visita'";
    $rs3 = mysql_query($query3);

    ?>

    <style type="text/css">
.galeria img{
	width: 10%;
	padding: 5px;
}

.galeria img:hover{
	cursor: pointer;
}

/*estilo do bg*/
.bg{
	position: absolute;
	background-color: #333;
	opacity: 0;
	top: 0px;
	left: 0px;
	display: none;
	height: 100%;
	width: 100%;
}

/*estilos do lightbox*/
.lb{
position: absolute;
top: 5%;
left: 5%;
display: none;
border:10px solid #fff;
box-shadow: 2px 2px 12px #333;
background:#fff;
}
.lb img{
	opacity: 0;
	width: 100%;
}


/*botão fechar*/

.close{
	color: #fff;
	background-color: #000;
	width: 20px;
	height: 15px;
	text-align: center;
	position: absolute;
	right: -5px;
	bottom: -20px;
	padding: 0 auto;
}

.close:hover{

	cursor: pointer;
}
</style>
<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.galeria img').click(function(){
		$('.bg').animate({'opacity':'0.60'}, 500, 'linear');
		$('.bg, .lb').css('display','block');

		var big = $(this).attr('src');

		$('.lb img').attr('src', big);
		$('.lb img').animate({'opacity':'1.00'},1500, 'linear');
	});

	$('.close').click(function(){
		$('.lb img').css('opacity','0');
		$('.bg, .lb').css('display','none');
	
	});


});
</script>
</head>
<body>

	<!--galeria de fotos-->
	<div class="galeria">
        <table style=" width:50% ">
            <?php
            while($row3 = mysql_fetch_array($rs3)){
                $img = $row3["image"];
                $nome= $row3['name'];
                ?>
                <tr>
                    <tb>
                        <?php
                        echo '<img src="data:image/gif;base64,' . $img . '" />';
                        ?>
                    </tb>
                </tr>
                <tr>
                    <tb>
                        <div>
                            <?php
                            echo $nome
                            ?>
                        </div>
                    </tb>
                </tr>
                <?php

            }
            ?>
        </table>

	<!--bg-->
	<div class = "bg"></div>

	<!--box de imagens-->
	<div class="lb">
		<img src=""/>
		<div class="close">X</div>
	</div>


</body>
</html>