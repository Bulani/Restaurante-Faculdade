<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\IngredientesModel;
use \Model\UnidadesModel;

include_once ("lib/funcoes.php");

class IngredientesController
{
    public function Listar()
    {
        $model = new IngredientesModel();
        $lista_ingredientes = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/IngredientesListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($cod_ingrediente)
    {
        $model = new IngredientesModel();
        $model->Excluir($cod_ingrediente);

        $lista_ingredientes = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/IngredientesListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($cod_ingrediente)
    {

        if( $cod_ingrediente != '')       
        {
            $model = new IngredientesModel();
            $dados = $model->Get_Ingrediente($cod_ingrediente);
            $descricao = $dados['descricao'];
            $valor_unitario = floatBR($dados['valor_unitario']);
            $cod_unidade = $dados['cod_unidade'];
            $acao='alterar';
        }
        else
        {
            $descricao = '';
            $valor_unitario = '';
            $cod_unidade = '';
            $acao='incluir';
        }


        $modelUn = new UnidadesModel();
        $lista_unidade = $modelUn->Get_lista('');


        $arquivo = "view/IngredientesFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new IngredientesModel();
        $model->Incluir($_POST);

        $lista_ingredientes = $model->Get_lista('');
        
        $arquivo = "view/IngredientesListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new IngredientesModel();
        $model->Alterar($_POST);

        $lista_ingredientes = $model->Get_lista('');
        
        $arquivo = "view/IngredientesListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}