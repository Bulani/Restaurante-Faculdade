<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\ComprasModel;
use \Model\FornecedoresModel;

include_once ("lib/funcoes.php");

class ComprasController
{
    public function Listar()
    {
        $model = new ComprasModel();
        $lista_compra = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/ComprasListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($cod_compra)
    {
        $model = new ComprasModel();
        $model->Excluir($cod_compra);

        $lista_compra = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/ComprasListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($cod_compra)
    {

        if( $cod_compra != '')       
        {
            $model = new ComprasModel();
            $dados = $model->Get_compra($cod_compra);
            $nota_fiscal = $dados['nota_fiscal'];
            $data = dataBR($dados['data']);
            $cod_fornecedor = $dados['cod_fornecedor'];
            $valor_total = floatBR($dados['valor_total']);
            $nota_serie = $dados['nota_serie'];
            $acao='alterar';
        }
        else
        {
            $nota_fiscal = '';
            $data = '';
            $cod_fornecedor = '';
            $valor_total = '';
            $nota_serie = '';
            $acao='incluir';
        }


        $modelFor = new FornecedoresModel();
        $lista_fornecedor = $modelFor->Get_lista('');


        $arquivo = "view/ComprasFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new ComprasModel();
        $model->Incluir($_POST);

        $lista_compra = $model->Get_lista('');
        
        $arquivo = "view/ComprasListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new ComprasModel();
        $model->Alterar($_POST);

        $lista_compra = $model->Get_lista('');
        
        $arquivo = "view/ComprasListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}