<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;


include_once ("lib/funcoes.php");

class PratosModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_prato($cod_prato)	{
		$sql = " select * 
				 from Pratos 
				 where cod_prato = '$cod_prato' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Pratos 
				 where descricao like '%$pesquisa%'
				 order by descricao ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Pratos (descricao, valor_unitario, cod_categoria) values (:descricao, :valor_unitario, :cod_categoria) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->bindValue(':valor_unitario',floatUSA($dados['valor_unitario']));
		$cmd->bindValue(':cod_categoria',$dados['cod_categoria']);
		//$cmd->execute();

	if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}

	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update Pratos set 
					descricao = :descricao,
					valor_unitario = :valor_unitario,
					cod_categoria   = :cod_categoria
				 where cod_prato = :cod_prato
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->bindValue(':valor_unitario',floatUSA($dados['valor_unitario']));
		$cmd->bindValue(':cod_categoria',$dados['cod_categoria']);
		$cmd->bindValue(':cod_prato',$dados['cod_prato']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_prato)	{			

		$sql = " delete from Pratos where cod_prato = :cod_prato ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_prato',$cod_prato);
		$cmd->execute();

	} // excluir
}