<?php

namespace Controller;

use \Model\UsuariosModel;

class AutenticarController
{

    public function Autenticar()
    {
		// se NÃO estiver autenticado
		if( !isset($_SESSION['usuario']) )
		{
			$model = new UsuariosModel();

			$usuario = $model->Get_Usuario($_POST['login'],  md5($_POST['senha']) );

			if( $usuario )
			{
				$_SESSION['usuario']['autenticado']   = '1';
				$_SESSION['usuario']['login']	      = $usuario['login'];
				$_SESSION['usuario']['nome_completo'] = $usuario['nome_completo'];
				
				$msg_login = '';				
			}
			else
			{
				$msg_login = 'Usuário e/ou Senha Inválidos !';
			}


		} // não autenticado


		$arquivo = 'view/HomeView.php';        
        include_once("view/IndexView.php");

    } // Autenticar()

} // AutenticarController




