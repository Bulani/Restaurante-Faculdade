<?php

namespace Lib;

use \PDO; // necess�rio para autoload da classe PDO

class BD
{
	public $conexao;

	function __construct()
	{
		try 
		{
			$this->conexao = new PDO("mysql:host=localhost;dbname=restaurante_tads","root","");
		
		} catch(PDOException $e)
		{
			echo 'N�o foi poss�vel realizar a conex�o com o Banco de Dados!!!';
		}		
	} // construct

} // class Bd

?>