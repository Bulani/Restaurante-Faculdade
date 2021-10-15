<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;


include_once ("lib/funcoes.php");

class IngredientesModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_ingrediente($cod_ingrediente)	{
		$sql = " select * 
				 from Ingredientes 
				 where cod_ingrediente = '$cod_ingrediente' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Ingredientes 
				 where descricao like '%$pesquisa%'
				 order by descricao ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Ingredientes (descricao, valor_unitario, cod_unidade) values (:descricao, :valor_unitario, :cod_unidade) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->bindValue(':valor_unitario',floatUSA($dados['valor_unitario']));
		$cmd->bindValue(':cod_unidade',$dados['cod_unidade']);
		//$cmd->execute();

	if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}

	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update Ingredientes set 
					descricao = :descricao,
					valor_unitario = :valor_unitario,
					cod_unidade   = :cod_unidade
				 where cod_ingrediente = :cod_ingrediente
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->bindValue(':valor_unitario',floatUSA($dados['valor_unitario']));
		$cmd->bindValue(':cod_unidade',$dados['cod_unidade']);
		$cmd->bindValue(':cod_ingrediente',$dados['cod_ingrediente']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_ingrediente)	{			

		$sql = " delete from Ingredientes where cod_ingrediente = :cod_ingrediente ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_ingrediente',$cod_ingrediente);
		$cmd->execute();

	} // excluir
}