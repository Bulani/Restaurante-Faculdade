<?php

namespace Lib;

use \PDO; // necessário para autoload da classe PDO

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
			echo 'Não foi possível realizar a conexão com o Banco de Dados!!!';
		}		
	} // construct

} // class Bd

?>