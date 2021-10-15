<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;

include_once ("lib/funcoes.php");

class ClientesModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_cliente($cod_cliente)	{
		$sql = " select * 
				 from clientes 
				 where cod_cliente = '$cod_cliente' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from clientes 
				 where nome like '%$pesquisa%'
				 order by nome ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into clientes (nome, cpf, rg, telefone, celular, email, rua, bairro, cod_cidade, cep, data_nascimento, renda_familiar, conheceu_por_jornais, conheceu_por_internet, conheceu_por_outro, sexo) values (:nome, :cpf, :rg, :telefone, :celular, :email, :rua, :bairro, :cod_cidade, :cep, :data_nascimento, :renda_familiar, :conheceu_por_jornais, :conheceu_por_internet, :conheceu_por_outro, :sexo) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':nome',$dados['nome']);
		$cmd->bindValue(':cpf',$dados['cpf']);
		$cmd->bindValue(':rg',$dados['rg']);
		$cmd->bindValue(':telefone',$dados['telefone']);
		$cmd->bindValue(':celular',$dados['celular']);
		$cmd->bindValue(':email',$dados['email']);
		$cmd->bindValue(':rua',$dados['rua']);
		$cmd->bindValue(':bairro',$dados['bairro']);
		$cmd->bindValue(':cod_cidade',$dados['cod_cidade'] == '0' ? : $_dados['cod_cidade']);
		$cmd->bindValue(':cep',$dados['cep']);
		$cmd->bindValue(':data_nascimento',dataUSA($dados['data_nascimento']));
		$cmd->bindValue(':renda_familiar',floatUSA($dados['renda_familiar']));
		$cmd->bindValue(':conheceu_por_jornais',@$dados['conheceu_por_jornais']);
		$cmd->bindValue(':conheceu_por_internet',@$dados['conheceu_por_internet']);
		$cmd->bindValue(':conheceu_por_outro',@$dados['conheceu_por_outro']);
		$cmd->bindValue(':sexo',@$dados['sexo']);
		

		if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}



	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update clientes set 
					nome = :nome,
					cpf = :cpf,
					rg = :rg,
					telefone = :telefone,
					celular = :celular,
					email = :email,
					rua = :rua,
					bairro = :bairro,
					cod_cidade = :cod_cidade,
					cep = :cep,
					data_nascimento = :data_nascimento,
					renda_familiar = :renda_familiar,
					conheceu_por_jornais = :conheceu_por_jornais,
					conheceu_por_internet = :conheceu_por_internet,
					conheceu_por_outro = :conheceu_por_outro,
					sexo = :sexo
				 where cod_cliente = :cod_cliente
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':nome',$dados['nome']);
		$cmd->bindValue(':cpf',$dados['cpf']);
		$cmd->bindValue(':rg',$dados['rg']);
		$cmd->bindValue(':telefone',$dados['telefone']);
		$cmd->bindValue(':celular',$dados['celular']);
		$cmd->bindValue(':email',$dados['email']);
		$cmd->bindValue(':rua',$dados['rua']);
		$cmd->bindValue(':bairro',$dados['bairro']);
		$cmd->bindValue(':cod_cidade',$dados['cod_cidade'] == '0' ? 'null' : $_dados['cod_cidade']);
		$cmd->bindValue(':cep',$dados['cep']);
		$cmd->bindValue(':data_nascimento',dataUSA($dados['data_nascimento']));
		$cmd->bindValue(':renda_familiar',floatUSA($dados['renda_familiar']));
		$cmd->bindValue(':conheceu_por_jornais',@$dados['conheceu_por_jornais']);
		$cmd->bindValue(':conheceu_por_internet',@$dados['conheceu_por_internet']);
		$cmd->bindValue(':conheceu_por_outro',@$dados['conheceu_por_outro']);
		$cmd->bindValue(':sexo',@$dados['sexo']);
		$cmd->bindValue(':cod_cliente',$dados['cod_cliente']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_cliente)	{			

		$sql = " delete from clientes where cod_cliente = :cod_cliente ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_cliente',$cod_cliente);
		$cmd->execute();

	} // excluir
}