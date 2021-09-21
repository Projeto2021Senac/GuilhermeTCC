<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';

use Classes\Entity\Consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;
use \Classes\Entity\Procedimento;


$objConsulta = consulta::getConsulta($_GET['id']);
echo '<pre>';print_r($objConsulta);echo'<pre>';exit;

$objClinica2 = clinica::getClinica($objConsulta->CFKClinica);
/* echo "<pre>"; print_r($objClinica2); echo "<pre>";exit; */
$objDentista2 = dentista::getDentista($objConsulta->CFKDentista);
/* echo "<pre>"; print_r($objDentista2); echo "<pre>";exit; */
$objPaciente2 = paciente::getPaciente($objConsulta->fkProntuario);
/* echo "<pre>"; print_r($objPaciente2); echo "<pre>";exit; */
$objFuncionario2 = funcionario::getFuncionario($objConsulta->fkFuncionario);
/* echo "<pre>"; print_r($objFuncionario2); echo "<pre>";exit; */
$objProcedimento = Procedimento::getProcedimentos();
/* echo "<pre>"; print_r($objProcedimento); echo "<pre>";exit; */
define('TITLE','Dados da consulta de '.$objPaciente2->nome);

//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header ('Location: pesquisarConsulta.php?status=error');
}


//Validação da Consulta
/* if (!$objConsulta instanceof consulta){
    header ('Location: index.php?status=error');
    exit;
} */
/* if (!$objClinica instanceof clinica){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objDentista instanceof dentista){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objPaciente instanceof paciente){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objFuncionario instanceof funcionario){
    header ('Location: index.php?status=error');
    exit;
} */

/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
if (isset($_POST['paciente'],$_POST['data'],$_POST['hora'],$_POST['dentista'],$_POST['clinica'],$_POST['status'])){
     /**
      * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
      * e a variável ID que são preenchidas automaticamente posteriormente.
      * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
      */
      echo "<pre>"; print_r($_POST['clinica']); echo "<pre>";exit;
    $objConsulta2 = new consulta;
    $objConsulta2->tipo = $_POST['paciente'];
    $objConsulta2->posicao = $_POST['dentista'];
    $objConsulta2->material = $_POST['clinica'];
    $objConsulta2->extensao = $_POST['data'];
    $objConsulta2->qtdDente = $_POST['hora'];
    $objConsulta2->dente = $_POST['status'];
    $objConsulta2->paciente = $_POST['relatorio'];
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objProtese->cadastrar();
    
    header ('Location: index.php?status=success');
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
/*     if ($objProtese->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/abrirConsulta.php';
include __DIR__.'/includes/footer.php';
