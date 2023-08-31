<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>


<style>
 #mouse {
position:absolute;
 width:76px;
 height:38px;

 top: -1px;
 left:0px;
 color:#2867b2;
 line-height:50px;
 background-color:#2867b2;

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
</style>
<div class="menu">
  <ul class="menu-list">
   
    <li>
      <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Olá <?php echo $user; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs/setinha_menu_superior.png" width="11" height="6" /></a>
      <ul class="sub-menu">
      <li style="background-color: white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="logos_clientes/<?php echo $logado;?>.png" width="76" height="61" /></li>
        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTROLE</li>
        <li><a href="home.php">DASHBOARD</a></li>

        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MENU</li>



        <?php
        $query = "select * from passo";
        $rs = mysql_query($query);
        $conta = 0;
        while ($row = mysql_fetch_array($rs)) {
          $conta++;

          $passo = $row["id"];
          $ok = $row["ok"];
          $cod = $row["cod"];
          //echo $passo;


         // HABILITADO NA TABELA PASSO     
        if ($ok == 'yes') {

            //SE FOR USUARIO CLIENTE

            if($cod==4 AND $nivel_acesso==3 or $cod==4 AND $nivel_acesso==4 or $cod==7 AND $nivel_acesso==3 or $cod==7 AND $nivel_acesso==4){

                } else {
                  ?>
                  <li><a href="step<?php echo $cod; ?>.php" target="_self"><?php echo $passo; ?></a></li>
                <?php          
                }  
                  
           
          } 

        }

        if($nivel_acesso==3 OR $nivel_acesso==4){
          //echo "eita";
          ?>
           <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOFF</li>  
          <?php
          
          } else {
          ?>
             <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONFIGURAÇÕES</li>      
                  <li style="background-color: #2867b2; color: #154B8B"><a href="controle_usuario.php" target="_self">Controle de usuários</a></li>   
                  <li style="background-color: #2867b2; color: #154B8B"><a href="controle_ocorrencia.php" target="_self">Controle de ocorrência</a></li>
                 
          
                  
          <?php
          }
              ?>
                
                <li>
                    <a href="../../index.php"><i class="material-icons" style="font-size: 8">power_settings_new</i><span style="vertical-align: top">&nbsp;&nbsp;SAIR</span></a>
                  </li>
                    
      </ul>
    </li>
  </ul>
</div>
<div id="apDiv1"></div>

<div id="apDiv3">
  <div id="mouse"><img src="imgs/logo_min.png" width="76" height="33" alt="" /></div>
</div>
