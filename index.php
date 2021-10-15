<?php
session_start();

$modulo = isset($_GET["modulo"]) ? $_GET["modulo"] : "home";
$acao = isset($_GET["acao"]) ? $_GET["acao"] : "index";

// AUTOLOAD  -------------------------------------------------------
include_once("autoload.php");

use \Controller\HomeController;
use \Controller\CidadesController;
use \Controller\EncomendasController;
use \Controller\ComprasController;
use \Controller\PratosController;
use \Controller\CategoriasController;
use \Controller\FornecedoresController;
use \Controller\UnidadesController;
use \Controller\IngredientesController;
use \Controller\ClientesController;
use \Controller\AutenticarController;
use \Controller\LogoutController;


// ROTEADOR -------------------------------------------------------
if( strtolower($modulo) == 'home' ) {

	$ctrl = new HomeController();

	switch(strtolower($acao) ) {
	    case "index" : 
	    $ctrl->Index();
	    break;
	}

} // if modulo Home

//----------------------------------------------------------------
elseif( strtolower($modulo) == 'autenticar' ) {

	$ctrl = new AutenticarController();
	$ctrl->Autenticar();

}

//----------------------------------------------------------------
elseif( strtolower($modulo) == 'logout' ) {

	$ctrl = new LogoutController();
	$ctrl->Logout();

}

//----------------------------------------------------------------
elseif( strtolower($modulo) == 'cidades' ) {

	$ctrl = new CidadesController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_cidade']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_cidade']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo cidades

//----------------------------------------------------------------
elseif( strtolower($modulo) == 'clientes' ) {

	$ctrl = new ClientesController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_cliente']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_cliente']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo clientes


//----------------------------------------------------------------
elseif( strtolower($modulo) == 'unidades' ) {

	$ctrl = new UnidadesController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_unidade']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_unidade']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo Unidades


//----------------------------------------------------------------
elseif( strtolower($modulo) == 'ingredientes' ) {

	$ctrl = new IngredientesController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_ingrediente']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_ingrediente']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo Ingredientes


//----------------------------------------------------------------
elseif( strtolower($modulo) == 'fornecedores' ) {

	$ctrl = new FornecedoresController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_fornecedor']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_fornecedor']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo Fornecedores


//----------------------------------------------------------------
elseif( strtolower($modulo) == 'pratos' ) {

	$ctrl = new PratosController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_prato']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_prato']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo pratos


//----------------------------------------------------------------
elseif( strtolower($modulo) == 'compras' ) {

	$ctrl = new ComprasController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_compra']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_compra']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo compras



//----------------------------------------------------------------
elseif( strtolower($modulo) == 'encomendas' ) {

	$ctrl = new EncomendasController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['num_encomenda']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['num_encomenda']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo encomendas

//----------------------------------------------------------------
else {

	$ctrl = new HomeController();
	$ctrl->Index();

}


/*
else
if( strtolower($modulo) == 'cidades' ) {

	$ctrl = new CidadesController();

	switch( strtolower($acao) )  {
	    case "listar" : 
	    	$ctrl->Listar();
	    break;

	    case "excluir" : 
	    	$ctrl->Excluir(@$_GET['cod_cidade']);
	    break;

	    case "incluindo" : 
	    	$ctrl->Formulario('');
	    break;

	    case "incluir" : 
	    	$ctrl->Incluir();
	    break;

	    case "alterando" : 
	    	$ctrl->Formulario(@$_GET['cod_cidade']);
	    break;

	    case "alterar" : 
	    	$ctrl->Alterar();
	    break;

	    default: 
	    	$ctrl->Listar();
	    break;
	}

} // if modulo cidades
*/



