<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;

class UnidadesModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_unidade($cod_unidade)	{
		$sql = " select * 
				 from unidades 
				 where cod_unidade = '$cod_unidade' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from unidades 
				 where descricao like '%$pesquisa%'
				 order by descricao ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Unidades (descricao) values (:descricao) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->execute();

	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update unidades set 
					descricao = :descricao
				 where cod_unidade = :cod_unidade
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':descricao',$dados['descricao']);
		$cmd->bindValue(':cod_unidade',$dados['cod_unidade']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_unidade)	{			

		$sql = " delete from unidades where cod_unidade = :cod_unidade ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_unidade',$cod_unidade);
		$cmd->execute();

	} // excluir
}