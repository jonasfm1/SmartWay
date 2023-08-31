<?php
require('mc_table.php');

include ('session.php'); 

  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);


  $quem= $_GET["check_list"];
  date_default_timezone_set('America/Sao_Paulo');
  $today = "ROTAS_" . date("d-m-Y_H_i");





for ($ix=0;$ix<count($quem);$ix++)
{

    $result="select * from rotas where nome_rota='$quem[$ix]'";
    $result=mysql_query($result);

    $total = mysql_num_rows($result);


    $somas="select SUM(peso) AS peso_total, nome_veiculo from rotas where nome_rota='$quem[$ix]'";
    $somas=mysql_query($somas);


//$pdf=new PDF_MC_Table();
$pdf = new PDF_MC_Table('L','pt','A3');
$pdf->AddPage();

//$pdf->SetFont('Arial','',4);

$cell_height = 10;
$pdf->SetWidths(array(110,150,24,60,25,25,45,250,210,30,30,30,30,120));
    (microtime()*1000000);

    $pdf->SetFont('Arial','B',4);
    
    
    $pdf->Row(array('VEICULO','PESO TOTAL','VISITAS'));
    while($row1 = mysql_fetch_array($somas)) {
    $pdf->Row(array($row1['nome_veiculo'], $row1['peso_total'], $total));
    }
    $pdf->Ln(14);

    $pdf->Row(array('DESTINO','ENDERECO','CEP','CIDADE','C.PED.','CANCAO','C.PRODUTO','PRODUTO','OBS.','PESO','VOLUME','VALOR','C.VED.','VENDEDOR'));

    while($row = mysql_fetch_array($result)) {
        
    $code = $row['codigo_cliente'] . "-" . $row['nome_cliente'];
	$endereco = $row['endereco'];
	$cep =  $row['cep'];
	$cidade =  $row['cidade'];
	$codigo_pedido =  $row['codigo_pedido'];
	$codigo_cancao =  $row['cod_cancao'];
	$codigo_produto =  $row['cod_produto'];
	$produto =  $row['produto'];
	$obs =  $row['obs_pedido'];
	$peso = $row['peso'];
	$volume = $row['volume'];
	$valor = $row['valor'];
	$cod_vendedor = $row['cod_vendedor'];
	$vendedor = $row['vendedor'];
//	$vendedor = mb_strimwidth($vendedor, 0, 44, "...");
	$nome_veiculo = $row['nome_veiculo'];

    $pdf->SetFont('Arial','',4);

	$pdf->Row(array($code, $endereco, $cep, $cidade, $codigo_pedido, $codigo_cancao, $codigo_produto, $produto, $obs, $peso, $volume, $valor, $cod_vendedor, $vendedor));

    mkdir("pdfs/" . $today, 0777, true);
    $nome_arquivo = "pdfs/" .$today . "/" . $nome_veiculo . ".pdf";
    

    }

    $pdf->Output($nome_arquivo,'F');
  

    
$dir_arquivos = 'pdfs/'  . $today . '/' . 'arquivo.zip';
$dir_pdf =  'pdfs/'  . $today . '/' . $nome_veiculo . '.pdf';
$nome_pdf = $nome_veiculo . '.pdf';

$zip = new ZipArchive();

if( $zip->open($dir_arquivos , ZipArchive::CREATE  )  === true){
	  

  

    $zip->addFile($dir_pdf , $nome_pdf);
      
    $zip->close();
  
    header('Content-type: application/zip');
    header('Content-disposition: attachment; filename="arquivo.zip"');
    readfile($dir_arquivos);
	 // unlink($dir_arquivos);
	 
}

}

?>
