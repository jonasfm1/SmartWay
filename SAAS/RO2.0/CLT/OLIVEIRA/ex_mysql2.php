<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf/fpdf.php');

include ('session.php'); 

  include ('essence/conecta.php');
  ini_set('max_execution_time',12000);


  $quem= $_GET["check_list"];

for ($ix=0;$ix<count($quem);$ix++)
{
 

//Create new pdf file
//$pdf=new FPDF();
$pdf = new FPDF('L','pt','A3');



//Disable automatic page break
$pdf->SetAutoPageBreak(true);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 15;

$i = 0;


$cell_width = 86;  //define cell width
$cell_height=10;    //define cell height

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',4);
$pdf->SetY($y_axis_initial);
$pdf->SetX(15);
$pdf->Cell(376,20,'VEICUL0:',1,0,'L',1);
$pdf->Cell(376,20,'VISITAS:',1,0,'L',1);
$pdf->Cell(376,20,'PESOS TOTAL:',1,0,'L',1);	


//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',4);
$pdf->SetY(30);
$pdf->SetX(15);
$pdf->Cell(100,$cell_height,'DESTINO',1,0,'L',1);
$pdf->Cell(100,$cell_height,'ENDERECO',1,0,'L',1);
$pdf->Cell(24,$cell_height,'CEP',1,0,'L',1);
$pdf->Cell(70,$cell_height,'CIDADE',1,0,'L',1);
$pdf->Cell(25,$cell_height,'C.PED.',1,0,'L',1);
$pdf->Cell(25,$cell_height,'C.CANCAO',1,0,'L',1);
$pdf->Cell(45,$cell_height,'C.PRODUTO',1,0,'L',1);
$pdf->Cell(250,$cell_height,'PRODUTO',1,0,'L',1);
$pdf->Cell(250,$cell_height,'OBS.',1,0,'L',1);
$pdf->Cell(30,$cell_height,'PESO',1,0,'L',1);
$pdf->Cell(30,$cell_height,'VOLUME',1,0,'L',1);
$pdf->Cell(30,$cell_height,'VALOR',1,0,'L',1);
$pdf->Cell(30,$cell_height,'C.VEND.',1,0,'L',1);
$pdf->Cell(120,$cell_height,'VEND.',1,0,'L',1);



//Select the Products you want to show in your PDF file
$result="select * from rotas where nome_rota='$quem[$ix]'";
$result=mysql_query($result);

date_default_timezone_set('America/Sao_Paulo');
//initialize counter
$today = "ROTAS_" . date("d-m-Y_H_i");

//Set maximum rows per page
$max = 60;

//Set Row Height
$row_height = 10;
$y_axis= 40;

while($row = mysql_fetch_array($result)) {
//If the current row is the last one, create new page and print column title
if ($i == $max)
{
	$pdf->AddPage();

	//print column titles for the current page
	$pdf->SetY($y_axis_initial);
	$pdf->SetX(15);
	$pdf->Cell(100,$cell_height,'DESTINO',1);
	$pdf->Cell(100,$cell_height,'ENDERECO',1,0,'L',1);
	$pdf->Cell(24,$cell_height,'CEP',1,0,'L',1);
	$pdf->Cell(70,$cell_height,'CIDADE',1,0,'L',1);
	$pdf->Cell(25,$cell_height,'C.PED.',1,0,'L',1);
	$pdf->Cell(25,$cell_height,'C.CANCAO',1,0,'L',1);
	$pdf->Cell(45,$cell_height,'C.PRODUTO',1,0,'L',1);
	$pdf->Cell(250,$cell_height,'PRODUTO',1,0,'L',1);
	$pdf->Cell(250,$cell_height,'OBS.',1,0,'L',1);
	$pdf->Cell(30,$cell_height,'PESO)',1,0,'L',1);
	$pdf->Cell(30,$cell_height,'VOLUME',1,0,'L',1);
	$pdf->Cell(30,$cell_height,'VALOR',1,0,'L',1);
	$pdf->Cell(30,$cell_height,'C.VEND.',1,0,'L',1);
	$pdf->Cell(120,$cell_height,'VEND.',1,0,'L',1);
	
	//Go to next row
	$y_axis = 25;
	
	//Set $i variable to 0 (first row)
	$i = 0;
	
}
	$code = $row['codigo_cliente'] . "-" . $row['nome_cliente'];
	

	$endereco = $row['endereco'];
	$endereco = mb_strimwidth($endereco, 0, 40, "...");

	$cep =  $row['cep'];
	$cep = mb_strimwidth($cep, 0, 9, "...");

	$cidade =  $row['cidade'];
	$cidade = mb_strimwidth($cidade, 0, 25, "...");

	$codigo_pedido =  $row['codigo_pedido'];
	$codigo_cancao =  $row['cod_cancao'];
	$codigo_produto =  $row['cod_produto'];
	$produto =  $row['produto'];
	$produto = mb_strimwidth($produto, 0, 100, "...");

	$obs =  $row['obs_pedido'];
	$obs = mb_strimwidth($obs, 0, 90, "...");

	$peso = $row['peso'];
	$volume = $row['volume'];
	$valor = $row['valor'];
	$cod_vendedor = $row['cod_vendedor'];
	$vendedor = $row['vendedor'];
//	$vendedor = mb_strimwidth($vendedor, 0, 44, "...");

	$nome_veiculo = $row['nome_veiculo'];

	$pdf->SetY($y_axis);
	$pdf->SetX(15);
	$pdf->Cell(100,$cell_height,$code,1);
	$pdf->Cell(100,$cell_height,$endereco,1);
	$pdf->Cell(24,$cell_height,$cep,1);
	$pdf->Cell(70,$cell_height,$cidade,1);
	$pdf->Cell(25,$cell_height,$codigo_pedido,1);
	$pdf->Cell(25,$cell_height,$codigo_cancao,1);
	$pdf->Cell(45,$cell_height,$codigo_produto,1);
	$pdf->Cell(250,$cell_height,$produto,1);
	$pdf->Cell(250,$cell_height,$obs,1);
	$pdf->Cell(30,$cell_height,$peso,1);
	$pdf->Cell(30,$cell_height,$volume,1);
	$pdf->Cell(30,$cell_height,$valor,1);
	$pdf->Cell(30,$cell_height,$cod_vendedor,1);



$cellWidth = $pdf->GetStringWidth($vendedor);
$pdf->Cell($cellWidth + 5, 0, $vendedor, 0, 0, 'C', true);

$pdf->Multicell($width,$height,$vendedor,1,1);



//aecho $y_axis;
	//Go to next row

	mkdir("pdfs/" . $today, 0777, true);

	$nome_arquivo = "pdfs/" .$today . "/" . $nome_veiculo . ".pdf";
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

//echo $nome_arquivo;
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
