<?php
    // instrui o php a não exibir avisos, apenas erros fatais no código
    //ini_set('error_reporting',0);

	// informando ao browser o conjunto de caracteres através do php
	//header('Content-Type: text/html; charset=utf-8');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Gestão Comercial</title>

	<!-- INSERINDO O BOOTSTRAP -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link href="view/_bootstrap/css/bootstrap.min.css" rel="stylesheet">
    


	<!-- incluindo a biblioteca jQuery -->
	<script type="text/javascript" src="view/_js/jquery-3.3.1.min.js"></script>

	<!-- incluindo a biblioteca de funções gerais -->
	<script type="text/javascript" src="view/_js/funcoes.js"></script>

	<!-- incluindo a biblioteca do Bootstrap -->
	<script src="view/_bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container-fluid">
	
		<div class="row" style="background-color: #222;">
			<div class="col-md-12">
				<h1 style="color:#fff;">SISTEMA DE GESTÃO COMERCIAL</h1>
			</div>
		</div>

		<?php
			// verificando se o usário está autenticado
			if( isset($_SESSION['usuario']) )
			{
				include_once('view/MenuPrincipalView.php');
				
				if( file_exists($arquivo) )	
				{
					include_once($arquivo);
				}
			}
			else 
			{
				include_once('view/LoginView.php');
			}
        ?>

	</div>
</body>
</html>  