<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;

include_once ("lib/funcoes.php");

class ComprasModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_compra($cod_compra)	{
		$sql = " select * 
				 from Compras 
				 where cod_compra = '$cod_compra' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Compras 
				 where nota_fiscal like '%$pesquisa%'
				 order by nota_fiscal ";				  

		return $this->pdo->query($sql);

	} // alterar
	
	//-----------------------------------------------------	
	public function Incluir($dados)	{	

		$sql = "insert into Compras (nota_fiscal, data, cod_fornecedor, valor_total, nota_serie) values (:nota_fiscal, :data, :cod_fornecedor, :valor_total, :nota_serie) ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':nota_fiscal',$dados['nota_fiscal']);
		$cmd->bindValue(':data',dataUSA($dados['data']));
		$cmd->bindValue(':cod_fornecedor',$dados['cod_fornecedor']);
		$cmd->bindValue(':valor_total',floatUSA($dados['valor_total']));
		$cmd->bindValue(':nota_serie',$dados['nota_serie']);
		//$cmd->execute();

	if( !$cmd->execute() )
		{
			print_r($cmd->errorInfo());
			die("<p>Não foi possivel salvar as informações</p>");
		}

	} // incluir

	//-----------------------------------------------------
	public function Alterar($dados)	{			

		$sql = " update Compras set 
					nota_fiscal = :nota_fiscal,
					data = :data,
					cod_fornecedor   = :cod_fornecedor,
					valor_total   = :valor_total,
					nota_serie   = :nota_serie
				 where cod_compra = :cod_compra
			   ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':nota_fiscal',$dados['nota_fiscal']);
		$cmd->bindValue(':data',dataUSA($dados['data']));
		$cmd->bindValue(':cod_fornecedor',$dados['cod_fornecedor']);
		$cmd->bindValue(':valor_total',floatUSA($dados['valor_total']));
		$cmd->bindValue(':nota_serie',$dados['nota_serie']);
		$cmd->bindValue(':cod_compra',$dados['cod_compra']);
		$cmd->execute();


	} // alterar

	//-----------------------------------------------------
	public function Excluir($cod_compra)	{			

		$sql = " delete from Compras where cod_compra = :cod_compra ";

		$cmd = $this->pdo->prepare($sql);
		$cmd->bindValue(':cod_compra',$cod_compra);
		$cmd->execute();

	} // excluir
}