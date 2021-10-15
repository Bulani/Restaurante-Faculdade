<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\EncomendasModel;
use \Model\ClientesModel;

include_once ("lib/funcoes.php");

class EncomendasController
{
    public function Listar()
    {
        $model = new EncomendasModel();
        $lista_encomenda = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/EncomendasListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($num_encomenda)
    {
        $model = new EncomendasModel();
        $model->Excluir($num_encomenda);

        $lista_encomenda = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/EncomendasListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($num_encomenda)
    {

        if( $num_encomenda != '')       
        {
            $model = new EncomendasModel();
            $dados = $model->Get_encomenda($num_encomenda);
            $cod_cliente = $dados['cod_cliente'];
            $data = dataBR($dados['data']);
            $valor_total = floatBR($dados['valor_total']);
            $acao='alterar';
        }
        else
        {
            $cod_cliente = '';
            $data = '';
            $valor_total = '';
            $acao='incluir';
        }


        $modelCli = new ClientesModel();
        $lista_cliente = $modelCli->Get_lista('');


        $arquivo = "view/EncomendasFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new EncomendasModel();
        $model->Incluir($_POST);

        $lista_encomenda = $model->Get_lista('');
        
        $arquivo = "view/EncomendasListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new EncomendasModel();
        $model->Alterar($_POST);

        $lista_encomenda = $model->Get_lista('');
        
        $arquivo = "view/EncomendasListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}