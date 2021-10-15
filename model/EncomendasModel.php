<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;


include_once ("lib/funcoes.php");

class EncomendasModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_encomenda($num_encomenda)	{
		$sql = " select * 
				 from Encomendas 
				 where num_encomenda = '$num_encomenda' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Encomendas 
				 where num_encomenda like '%$pesquisa%'
				 order by num_encomenda ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Encomendas (cod_cliente, data, valor_total) values (:cod_cliente, :data, :valor_total) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_cliente',$dados['cod_cliente']);
		$cmd->bindValue(':data',dataUSA($dados['data']));
		$cmd->bindValue(':valor_total',floatUSA($dados['valor_total']));
		//$cmd->execute();

	if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}

	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update Encomendas set 
					cod_cliente = :cod_cliente,
					data = :data,
					valor_total   = :valor_total
				 where num_encomenda = :num_encomenda
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_cliente',$dados['cod_cliente']);
		$cmd->bindValue(':data',dataUSA($dados['data']));
		$cmd->bindValue(':valor_total',floatUSA($dados['valor_total']));
		$cmd->bindValue(':num_encomenda',$dados['num_encomenda']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($num_encomenda)	{			

		$sql = " delete from Encomendas where num_encomenda = :num_encomenda ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':num_encomenda',$num_encomenda);
		$cmd->execute();

	} // excluir
}