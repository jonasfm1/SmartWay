<?php
require('mc_table.php');

include ('session.php'); 

  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);


  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/" ),explode(" ","a A e E i I o O u U n N c"),$string);
}

	

  $string0= $_GET["exp1"];
  $string1= $_GET["exp2"];
  $string3= $_GET["exp3"];

  $repre= $_GET["repre"];

  $quem=  explode(";", $repre);


 

  if($string0=="''"){
    $completax0 = "";
} else {
    $completax0 = " AND login in($string0) ";
}

if($string1=="''"){
    $completax1 = "";
} else {
    $completax1 = " AND lista in($string1) ";
}

if($string3=="''"){
    $completax3 = "";
} else {
    $completax3 = " AND status in($string3) ";
}




  date_default_timezone_set('America/Sao_Paulo');
  $today = "ROTAS_" . date("d-m-Y_H_i");





for ($ix=0;$ix<count($quem);$ix++){


 
    $result="select * from rotas where representante='$quem[$ix]'" . $completax0 . $completax1 . $completax3;
    $result=mysql_query($result);

  //  $total = mysql_num_rows($result);


  
//$pdf=new PDF_MC_Table();
$pdf = new PDF_MC_Table('P','pt','A4');
$pdf->AddPage();

$pdf->SetWidths(array(40,20,20,90,90,45,45,30,55,40,50,15));
    (microtime()*1000000);

    $pdf->SetFont('Arial','B',2.4);
    

    $pdf->Row(array('ROTA','STATUS','CODIGO','CLIENTE','ENDERECO','BAIRRO','CIDADE','DT. VISITA.','OCORRENCIA','PEDIDO','NR_NF','PESO'));

    while($row = mysql_fetch_array($result)) {
        

    $rota = $row['rota'];
    $seq = $row['sequencia'];
    $status = $row['status'];  
    if($status=='0'){
    $nome_status = "PENDENTE";
    }
    if($status=='1'){
    $nome_status = "POSITIVADO";
    }
    if($status=='2'){
    $nome_status = "NEGATICADO";
    }
    if($status=='3'){
    $nome_status = "ALERTA";
    }
    $idcliente = $row['idcliente'];
    $nome = $row['nome'];
    $cliente = $row['nome'];
    $endereco = $row['endereco'];
    $bairro = $row['bairro'];
    $cidade = $row['cidade'];
    $dth_ocorrencia = $row['dth_ocorrencia'];
    $ocorrencia = $row['ocorrencia'];
    $query_oco =  mysql_query("Select ocorrencia from ocorrencia where id='$ocorrencia'");
    $dados = mysql_fetch_array($query_oco);
    $oco = $dados['ocorrencia'];
    $subnatureza = $row['subnatureza'];

    $pedido = $row['pedido'];

    $divide_pedido = explode("/", $pedido);
    $sem_igual_pedido = array_unique($divide_pedido);
    $sem_igual_pedido = implode("/", $sem_igual_pedido);



$entra = $row["dth_chegada"];
$sai = $row["dth_saida"];

$data_login = strtotime($entra);
$data_logout = strtotime($sai);

$tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));

$calcula_tempo =  date('H:i:s', $tempo_con);

    $subnatureza = tirarAcentos($subnatureza);

    $tempo_est = $row['tempo_est'];
  //  $tempo = $row['tempo'];
    $raio = $row['raio'];
    $nr_nf = $row['nr_nf'];

    $divide_nr = explode("/", $nr_nf);
    $sem_igual_nr = array_unique($divide_nr);
    $sem_igual_nr = implode("/", $sem_igual_nr);

    $motorista = $row['ds_motorista'];
    $tel_motorista = $row['tel_motorista'];
    $representantes = $row['representante'];

    $peso_liquido = $row['peso_liquido_item'];
    $divide_peso = explode("/", $peso_liquido);
    $soma_peso = array_sum($divide_peso);

    $pdf->SetFont('Arial','',2.4);


	$pdf->Row(array($rota, $nome_status, $idcliente, $cliente, $endereco, $bairro, $cidade, $dth_ocorrencia, $oco, $sem_igual_pedido, $sem_igual_nr, $soma_peso));


    mkdir("pdfs/" . $today . "_" . $logado, 0777, true);

  
    $nome_arquivo = "pdfs/" .$today  . "_" . $logado . "/" .$representantes . ".pdf";
    

    }

    $pdf->Output($nome_arquivo,'F');
  

    
$dir_arquivos = 'pdfs/'  . $today  . "_" . $logado . '/' . 'MONITORAMENTO.zip';
$dir_pdf =  'pdfs/'  . $today  . "_" . $logado . '/' . $representantes . '.pdf';
$nome_pdf = $representantes . '.pdf';

$zip = new ZipArchive();

if( $zip->open($dir_arquivos , ZipArchive::CREATE  )  === true){
	  

  

    $zip->addFile($dir_pdf , $nome_pdf);
      
   
  
    header('Content-type: application/zip');
    header('Content-disposition: attachment; filename="MONITORAMENTO.zip"');
    readfile($dir_arquivos);
	 // unlink($dir_arquivos);

   $zip->close();
	 
}

}

?>
