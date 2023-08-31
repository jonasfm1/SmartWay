<?php

////////////////////////////INICIANDO VENDOR AUTO LOAD PARA FUNCIONAMENTO PHPEXEL/////////////////////////////////////
require 'vendor/autoload.php';
//====================================================================================================================


///////////////////////////INCLUIDO ARQUIVO DE CONEXAO E SESSAO////////////////////////////////////////////////////////
include('essence/conecta.php');
include('session.php');
ini_set('max_execution_time', 12000);
//====================================================================================================================


////////////////////////////INICIANDO CLASES PHPSPREEDSHEET////////////////////////////////////////////////////////////
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//====================================================================================================================


////////////////////////////CHAMANDO CLASS XLSX PARA CRIAR UM ARQUIVO XLSX ////////////////////////////////////////////
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//====================================================================================================================


////////////////////////////SELECT PARA AGRUPAR ROTAS POR NOME GERANDO APENAS UM VETOR POR ROTA ///////////////////////
$sql1 = "select * from rotas group by nome_rota";
$sql1 = mysql_query($sql1);
$xxx = mysql_num_rows($sql1);
//====================================================================================================================


////////////////////////////CRIANDO UMA PLANILHA //////////////////////////////////////////////////////////////////////

$objPHPExcel = new Spreadsheet();


//====================================================================================================================

$sheetIndex = $objPHPExcel->getIndex(
    $objPHPExcel->getSheetByName('Worksheet')
);
$objPHPExcel->removeSheetByIndex($sheetIndex);

require_once '/PHPExcel/IOFactory.php';

require_once '/PHPExcel/Style/Borders.php';


////////////////////////////WHILE PARA PEGAR NOME DA ROTAS E VEICULO =======================
$i = 0;
while ($row_data = mysql_fetch_assoc($sql1)) {
    $nome_rota = $row_data["nome_rota"];
    $nome_veiculo = $row_data["veiculo"];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////SELECT PARA PEGAR O CAMPO ID DA TABELA VEICULOS QUE BATE COM O CAMPO VEICULO DA TABELA ROTAS======
    $query = "SELECT * FROM veiculos where id='$nome_veiculo'";
    $query = mysql_query($query);
//====================================================================================================================


////////////////////////EXECUTANDO LISTA PARA PEGAR NOME DA TABELA VEICULOS=============
    $dados = mysql_fetch_array($query);
    $agoravai = $dados["transportadora"];
	$vel = $dados["nome"];
	
//====================================================================================================================


/////////////////////////CRIANDO PASTA DE TRABALHO EXCEL //////////////////////////////////////////////////////////////
	
    $objWorkSheet = $objPHPExcel->createSheet($i);
	
//====================================================================================================================
	

/////////////////////////   MESCLANDO CELULAS   ///////////////////////////////////////////////////////////////////////

	$objPHPExcel->getSheet($i)->mergeCells('A1:L1');


//====================================================================================================================


//////////////////////////////////CENTRALIZANDO AS CELULAS////////////////////////////////////////////////////////////
	
	$objPHPExcel->getSheet($i)->getStyle('A1')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	
//====================================================================================================================


/////////////////////////////////CENTRALIZANDO AS CELULAS/////////////////////////////////////////////////////////////
	
	$cell_cab = "A1:O2";
	$objPHPExcel->getSheet($i)->getStyle( $cell_cab )->getFont()->setBold( true );

    $objWorkSheet->getStyle('A1:L1')->getBorders()
    ->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
    ->getColor()->setRGB('000000');

	
//====================================================================================================================

/////////////////////////ESCREVENDO NAS CELULAS ///////////////////////////////////////////////////////////////////////
	
    $objWorkSheet->setCellValue('A1',' '.$agoravai.'       '.DATE('d-m-Y').'       '.$vel)
->setCellValue('A2', 'SEQ.')
->setCellValue('B2', 'NOTA')
->setCellValue('C2', 'RMT')
->setCellValue('D2', 'CLIENTE')
->setCellValue('E2', 'ENDERECO')
->setCellValue('F2', 'BAIRRO')
->setCellValue('G2', 'CIDADE')
->setCellValue('H2', 'PESO')
->setCellValue('I2', 'VLM')
->setCellValue('J2', 'VALOR')
->setCellValue('K2', 'DATA')
->setCellValue('L2', 'REDESPACHO')
->setCellValue('M2', 'END_REDESPACHO')
->setCellValue('N2', 'CIDADE_REDESPACHO')
->setCellValue('O2', 'UF_REDESPACHO');
        
$objWorkSheet->getStyle('A2:O2')->getBorders()
->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
->getColor()->setRGB('000000');

////////////////SELECIONANDO VALORES DAS TABELAS A SEREM ESCRITOS /////////////////////////////////////////////////////
    $sql2 = "select * from rotas where nome_rota='$nome_rota' order by ordem DESC";
    $resultado = mysql_query($sql2);
	
    $row = 3; // 1-based index

    $row_linhas = 3;
    $peso_total =0;
    $volume_total =0;
    $valor_total =0;

    $conta=0;


    while ($row_data1 = mysql_fetch_assoc($resultado)) {
        $col = 0;
		$especial =  $row_data1['redespacho'];
        $peso_total += $row_data1['peso'];
        $volume_total += $row_data1['volume'];
        $valor_total += $row_data1['valor'];

        foreach ($row_data1 as $key => $value) {

            if ($col <= 14) {
                $col++;
                if($col == 1){
                    $conta++;
                    $objWorkSheet->setCellValueByColumnAndRow($col, $row, $conta);
                } else {

                    $objWorkSheet->setCellValueByColumnAndRow($col, $row, $value);
                }
               
				if($especial!=''){
					
				$cell_name = 'A'.$row.':'.'O'.$row;
                $objPHPExcel->getSheet($i)->getStyle( $cell_name )->getFont()->setBold( true );
                

                
				}

                $cell_linhas = 'A'.$row_linhas.':'.'O'.$row_linhas;
                	
                $objWorkSheet->getStyle($cell_linhas)->getBorders()
                ->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                ->getColor()->setRGB('000000');
            }


        }
        $row++;
        $row_linhas++;
    }
    $objWorkSheet->setCellValueByColumnAndRow($col-7, $row, $peso_total);
    $objWorkSheet->setCellValueByColumnAndRow($col-6, $row, $volume_total);
    $objWorkSheet->setCellValueByColumnAndRow($col-5, $row, $valor_total);
    
              ///////DANDO NOME AS PLANILHAS DO EXCEL DE ACORDO COM O NOME DO VEICULO///////////
    $objWorkSheet->setTitle("$agoravai");

    $i++;
}
//=====================================================================================================================


////////////////////////// CRIANDO E SALVANDO O ARQUIVO XLSX NUMA /////////////////////////////////////////////////////
$writer = new Xlsx($objPHPExcel);

$data = "ROTAS_" . date("d-m-Y_H_i_s");
$exte = $data . '.xlsx';
$juntae = 'uploads/' . $exte;
//write the file in current directory
$writer->save($juntae);
//redirect to the file
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/xlsx');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename="' . basename($juntae) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($juntae));
readfile($juntae);
//=====================================================================================================================