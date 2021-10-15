<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\FornecedoresModel;
use \Model\CidadesModel;

include_once ("lib/funcoes.php");

class FornecedoresController
{
    public function Listar()
    {
        $model = new FornecedoresModel();
        $lista_fornecedor = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/FornecedoresListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($cod_fornecedor)
    {
        $model = new FornecedoresModel();
        $model->Excluir($cod_fornecedor);

        $lista_fornecedor = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/FornecedoresListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($cod_fornecedor)
    {

        if( $cod_fornecedor != '')       
        {
            $model = new FornecedoresModel();
            $dados = $model->Get_fornecedor($cod_fornecedor);
            $cod_fornecedor = $dados['cod_fornecedor'];
            $razao_social = $dados['razao_social'];
            $nome_fantasia = $dados['nome_fantasia'];
            $cnpj = $dados['cnpj'];
            $inscricao_estadual = $dados['inscricao_estadual'];
            $endereco = $dados['endereco'];
            $bairro = $dados['bairro'];
            $cod_cidade = $dados['cod_cidade'];
            $cep = $dados['cep'];
            $telefone = $dados['telefone'];
            $celular = $dados['celular'];
            $email = $dados['email'];
            $acao = 'alterar';
        }
        else
        {
            $cod_fornecedor = '';
            $razao_social = '';
            $nome_fantasia = '';
            $cnpj = '';
            $inscricao_estadual = '';
            $endereco = '';
            $bairro = '';
            $cod_cidade = '';
            $cep = '';
            $telefone = '';
            $celular = '';
            $email = '';
            $acao = 'incluir';
        }

        $modelCid = new CidadesModel();
        $lista_cidade = $modelCid->Get_lista('');

        $arquivo = "view/FornecedoresFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new FornecedoresModel();
        $model->Incluir($_POST);

        $lista_fornecedor = $model->Get_lista('');
        
        $arquivo = "view/FornecedoresListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new FornecedoresModel();
        $model->Alterar($_POST);

        $lista_fornecedor = $model->Get_lista('');
        
        $arquivo = "view/FornecedoresListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}