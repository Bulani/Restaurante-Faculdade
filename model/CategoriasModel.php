<?php 

namespace Model;

use \PDO; // necessário para utilizar recursos da classe PDO

use \lib\bd;

class CategoriasModel
{
	private $pdo;

	//-----------------------------------------------------
	function __construct()	{
		//include_once("lib/bd.php");
		$this->pdo = new BD();	
		$this->pdo = $this->pdo->conexao;
	}
	
	
	//-----------------------------------------------------
	public function Get_categoria($cod_categoria)	{
		$sql = " select * 
				 from Categorias 
				 where cod_categoria = '$cod_categoria' ";				  

		$r = $this->pdo->query($sql);
		return $r->fetch(PDO::FETCH_ASSOC);

	} // alterar

	//-----------------------------------------------------
	public function Get_lista($pesquisa)	{
		$sql = " select * 
				 from Categorias 
				 where descricao like '%$pesquisa%'
				 order by descricao ";				  

		return $this->pdo->query($sql);

	} 

}