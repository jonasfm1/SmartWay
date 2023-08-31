
<style>

#mouse {
position:absolute;
 width:76px;
 height:33px;
 fonte-size:16px;

 top: 0px;
 left:0px;
 color:#2867b2;
 line-height:50px;
 background-color:#2867b2;
 cursor:pointer;
}
#comentario {
 position:relative; 
 top:-33px;
 left:0px;
 padding:2px;
 padding-top:15px;
 background:#2867b2;
 color:#fff;
 display: block;
 width:180px;
 opacity: 0;
 height:55px;
 text-align:center;


 -webkit-transition: all 300ms ease;
 -moz-transition: all 300ms ease;
 -ms-transition: all 300ms ease;
 -o-transition: all 300ms ease;
 transition: all 300ms ease;
}
 #mouse:hover  #comentario{
      opacity: 1;
}
}
</style>
<div class="menu">
  <ul class="menu-list">
    <li><a href="../../index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>SAIR</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/setinha_menu_superior_sair.png" width="11" height="6" /></a>

    </li>
    <li>
      <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Olá <strong><?php echo $logado;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/setinha_menu_superior.png" width="11" height="6" /></a>
       <ul class="sub-menu">  
       <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>MENU</strong></li>
        <li><a href="home.php">Dashboard</a></li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PASSOS</strong></li> 
        <?php
		$query = "select * from passo";																
		$rs = mysql_query($query);
		$conta = 0;
	  while($row = mysql_fetch_array($rs)){
		$conta++;
		
		$passo = $row["id"];
		$ok = $row["ok"];
		//echo $passo;
		
		
		if ($passo==$conta and $ok=='yes'){
		
		
		?>
        
        
		<li><a href="step<?php echo $conta;?>.php">Passo <?php echo $conta;?></a></li>
         <?php
		
		} else {
		?>
		<li style="background-color: #2867b2; color: #154B8B">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Passo <?php echo $conta;?></li>
         <?php	
		}
	
		
	
	}
		?>
    
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CONFIGURAÇÕES</strong></li>      
        <li><a href="cad_if.php">Controle de Pontos (Inicial/Final)</a></li>   
        <li><a href="cad_veiculos.php">Controle de veículos</a></li>
        <li><a href="rotas_control.php">Controle de rotas</a></li>           
        <li><a href="cad_bd.php">Controle do Banco de Dados</a></li>
          
      </ul>
    </li>
  </ul>
</div>
<div id="apDiv1"></div>
<div id="apDiv2"></div>
<div id="apDiv3">
<div id="mouse"><a href="http://www.rccaddesign.com" target="_blank"><img src="imgs/logo_min.png" width="76" height="33" alt=""/>
</a></div>
   </div>

</div>
<div id="apDiv4"><img src="imgs/1passo.png" width="44" height="44" /></div>
<div id="apDiv5">
<img src="logos_clientes/<?php echo $logado;?>.png" width="76" height="61" />
</div>
<div id="apDiv6"><img src="imgs/2passo.png" width="44" height="44" /></div>
<div id="apDiv7"><img src="imgs/3passo.png" width="44" height="44" /></div>
<div id="apDiv8"><img src="imgs/4passo.png" width="44" height="44" /></div>
<div id="apDiv9"><img src="imgs/5passo.png" width="44" height="44" /></div> 