<?php

namespace Controller;

use \PDO; // necessário para utilizar recursos da classe PDO
use \Model\ClientesModel;
use \Model\CidadesModel;

include_once ("lib/funcoes.php");

class ClientesController
{
    public function Listar()
    {
        $model = new ClientesModel();
        $lista_cliente = $model->Get_lista(@$_POST['pesq']);

        $arquivo = "view/ClientesListarView.php";
        include_once("view/IndexView.php");
    }

    public function Excluir($cod_cliente)
    {
        $model = new ClientesModel();
        $model->Excluir($cod_cliente);

        $lista_cliente = $model->Get_lista(@$_POST['pesq']);
        
        $arquivo = "view/ClientesListarView.php";
        include_once("view/IndexView.php");
    }

    public function Formulario($cod_cliente)
    {

        if( $cod_cliente != '')       
        {
            $model = new ClientesModel();
            $dados = $model->Get_cliente($cod_cliente);
            $cod_cliente = $dados['cod_cliente'];
            $nome = $dados['nome'];
            $cpf = $dados['cpf'];
            $rg = $dados['rg'];
            $telefone = $dados['telefone'];
            $celular = $dados['celular'];
            $email = $dados['email'];
            $rua = $dados['rua'];
            $bairro = $dados['bairro'];
            $cod_cidade = $dados['cod_cidade'];
            $cep = $dados['cep'];
            $data_nascimento = dataBR($dados['data_nascimento']);
            $renda_familiar = floatBR($dados['renda_familiar']);
            $conheceu_por_jornais = $dados['conheceu_por_jornais'];
            $conheceu_por_internet = $dados['conheceu_por_internet'];
            $conheceu_por_outro = $dados['conheceu_por_outro'];
            $sexo = $dados['sexo'];
            $acao = 'alterar';
        }
        else
        {
            $cod_cliente = '';
            $nome = '';
            $cpf = '';
            $rg = '';
            $telefone = '';
            $celular = '';
            $email = '';
            $rua = '';
            $bairro = '';
            $cod_cidade = '';
            $cep = '';
            $data_nascimento = '';
            $renda_familiar = '';
            $conheceu_por_jornais = '';
            $conheceu_por_internet = '';
            $conheceu_por_outro = '';
            $sexo = '';
            $acao = 'incluir';
        }

        $modelCid = new CidadesModel();
        $lista_cidade = $modelCid->Get_lista('');

        $arquivo = "view/ClientesFormularioView.php";
        include_once("view/IndexView.php");
        
    } // Formulario

    public function Incluir()
    {
        $model = new ClientesModel();
        $model->Incluir($_POST);

        $lista_cliente = $model->Get_lista('');
        
        $arquivo = "view/ClientesListarView.php";
        include_once("view/IndexView.php");

    } // Incluir

    public function Alterar()
    {
        $model = new ClientesModel();
        $model->Alterar($_POST);

        $lista_cliente = $model->Get_lista('');
        
        $arquivo = "view/ClientesListarView.php";
        include_once("view/IndexView.php");

    } // Incluir


}