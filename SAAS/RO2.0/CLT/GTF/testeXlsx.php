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
$sql1 = "select * from rotas";
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
$objWorkSheet = $objPHPExcel->createSheet($sheetIndex);


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
//$objWorkSheet = $objPHPExcel->createSheet('mesma');
    
//$objWorkSheet = $objPHPExcel->createSheet($nome_rota);
//====================================================================================================================




/////////////////////////////////CENTRALIZANDO AS CELULAS/////////////////////////////////////////////////////////////
	
	$cell_cab = "A1:R1";
	$objPHPExcel->getSheet($sheetIndex)->getStyle( $cell_cab )->getFont()->setBold( true );
	
//====================================================================================================================

/////////////////////////ESCREVENDO NAS CELULAS ///////////////////////////////////////////////////////////////////////
	
    $objWorkSheet->setCellValue('A1', 'Lj Embarque')
        ->setCellValue('B1', 'Pedido')
        ->setCellValue('C1', 'Placa')
        ->setCellValue('D1', 'Tipo Veículo')
        ->setCellValue('E1', 'Dt Entrega')
        ->setCellValue('F1', 'Cod. Vendedor')
        ->setCellValue('G1', 'Vendedor')
        ->setCellValue('H1', 'Cliente')
        ->setCellValue('I1', 'Razão Social')
		->setCellValue('J1', 'Bairro')
		->setCellValue('K1', 'Cep')
        ->setCellValue('L1', 'Cidade')
        ->setCellValue('M1', 'UF')
        ->setCellValue('N1', 'Cod.Canção')
        ->setCellValue('O1', 'Cod.Produto')
        ->setCellValue('P1', 'Produto')
        ->setCellValue('Q1', 'Peso')
        ->setCellValue('R1', 'Peso Pedido');
        
	
////////////////SELECIONANDO VALORES DAS TABELAS A SEREM ESCRITOS /////////////////////////////////////////////////////
    $sql2 = "select * from rotas order by nome_veiculo asc, ordem asc";
    $resultado = mysql_query($sql2);
	
    $row = 0; // 1-based index

    $guarda_rota = "";


    while ($row_data1 = mysql_fetch_assoc($resultado)) {
        $col = 0;
        //$especial =  $row_data1['especial'];
        $nome_da_rota = $row_data1['nome_rota'];
    
        

        foreach ($row_data1 as $key => $value) {

            if ($col <= 16) {
                $col++;

                
                if($nome_da_rota==$guarda_rota){
                    
                } else {
                  
                   
                    $row++;
                   
                  
                   
                    $row++;
                  
                   
                }
                
                $objWorkSheet->setCellValueByColumnAndRow($col, $row, $value);
                
		
				
           
            }
            
            $guarda_rota =  $nome_da_rota;
        }

        
        $row++;
    }
              ///////DANDO NOME AS PLANILHAS DO EXCEL DE ACORDO COM O NOME DO VEICULO///////////
   // $objWorkSheet->setTitle("$vel");

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