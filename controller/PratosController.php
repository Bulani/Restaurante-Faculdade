<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\PratosModel;
use \Model\CategoriasModel;

include_once ("lib/funcoes.php");

class PratosController
{
    public function Listar()
    {
        $model = new PratosModel();
        $lista_pratos = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/PratosListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($cod_prato)
    {
        $model = new PratosModel();
        $model->Excluir($cod_prato);

        $lista_pratos = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/PratosListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($cod_prato)
    {

        if( $cod_prato != '')       
        {
            $model = new PratosModel();
            $dados = $model->Get_prato($cod_prato);
            $descricao = $dados['descricao'];
            $valor_unitario = floatBR($dados['valor_unitario']);
            $cod_categoria = $dados['cod_categoria'];
            $acao='alterar';
        }
        else
        {
            $descricao = '';
            $valor_unitario = '';
            $cod_unidade = '';
            $acao='incluir';
        }


        $modelCat = new CategoriasModel();
        $lista_categoria = $modelCat->Get_lista('');


        $arquivo = "view/PratosFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new PratosModel();
        $model->Incluir($_POST);

        $lista_pratos = $model->Get_lista('');
        
        $arquivo = "view/PratosListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new PratosModel();
        $model->Alterar($_POST);

        $lista_pratos = $model->Get_lista('');
        
        $arquivo = "view/PratosListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}