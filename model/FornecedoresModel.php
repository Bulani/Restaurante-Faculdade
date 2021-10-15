<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;

include_once ("lib/funcoes.php");

class FornecedoresModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_fornecedor($cod_fornecedor)	{
		$sql = " select * 
				 from Fornecedores 
				 where cod_fornecedor = '$cod_fornecedor' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Fornecedores 
				 where nome_fantasia like '%$pesquisa%'
				 order by nome_fantasia ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Fornecedores (razao_social, nome_fantasia, cnpj, inscricao_estadual, endereco, bairro, cod_cidade, cep, telefone, celular, email) values (:razao_social, :nome_fantasia, :cnpj, :inscricao_estadual, :endereco, :bairro, :cod_cidade, :cep, :telefone, :celular, :email) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':razao_social',$dados['razao_social']);
		$cmd->bindValue(':nome_fantasia',$dados['nome_fantasia']);
		$cmd->bindValue(':cnpj',$dados['cnpj']);
		$cmd->bindValue(':inscricao_estadual',$dados['inscricao_estadual']);
		$cmd->bindValue(':endereco',$dados['endereco']);
		$cmd->bindValue(':bairro',$dados['bairro']);;
		$cmd->bindValue(':cod_cidade',$dados['cod_cidade']);
		$cmd->bindValue(':cep',$dados['cep']);
		$cmd->bindValue(':telefone',dataUSA($dados['telefone']));
		$cmd->bindValue(':celular',floatUSA($dados['celular']));
		$cmd->bindValue(':email',@$dados['email']);

		

		if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}



	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update Fornecedores set 
					razao_social = :razao_social,
					nome_fantasia = :nome_fantasia,
					cnpj = :cnpj,
					inscricao_estadual = :inscricao_estadual,
					endereco = :endereco,
					bairro = :bairro,
					cod_cidade = :cod_cidade,
					cep = :cep,
					telefone = :telefone,
					celular = :celular,
					email = :email
				 where cod_fornecedor = :cod_fornecedor
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':razao_social',$dados['razao_social']);
		$cmd->bindValue(':nome_fantasia',$dados['nome_fantasia']);
		$cmd->bindValue(':cnpj',$dados['cnpj']);
		$cmd->bindValue(':inscricao_estadual',$dados['inscricao_estadual']);
		$cmd->bindValue(':endereco',$dados['endereco']);
		$cmd->bindValue(':bairro',$dados['bairro']);
		$cmd->bindValue(':cod_cidade',$dados['cod_cidade']);
		$cmd->bindValue(':cep',$dados['cep']);
		$cmd->bindValue(':telefone',dataUSA($dados['telefone']));
		$cmd->bindValue(':celular',floatUSA($dados['celular']));
		$cmd->bindValue(':email',@$dados['email']);
		$cmd->bindValue(':cod_fornecedor',$dados['cod_fornecedor']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_fornecedor)	{			

		$sql = " delete from Fornecedores where cod_fornecedor = :cod_fornecedor ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_fornecedor',$cod_fornecedor);
		$cmd->execute();

	} // excluir
}