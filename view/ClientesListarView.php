<script type="text/javascript">

// exclui um registro --------
function excluir(codigo)
{
	if( confirm('Deseja realmente excluir essa cliente ??') )
	{
		document.location='index.php?modulo=Clientes&acao=excluir&cod_cliente='+codigo;
	}
}


//-Quando a página estiver totalmente carregada --------
$(document).ready( function(){ 

	// colocando o foco na caixa de edição da pesquisa 
	$('#pesq').focus();
	$('#pesq').select();
    
}); // ready

</script>

		<div class="page-header">
			<h1>Clientes <small>Listagem</small></h1>
		</div>	

<div class="row">
	<div class="col-md-12">

		<form name="fpesq" id="fpesq" method="post" action=""> <!--class="form-inline" -->

			<?php
			$pesquisa = @$_POST['pesq'];
			?>

			<div class="form-group">
				<label for="pesq">Pesquisa:</label>
				<input type="text" class="form-control" placeholder="Digite sua pesquisa" name="pesq" id="pesq" size="40" value="<?php echo $pesquisa; ?>">
			</div>

			<input type="submit" name="btenviar" id="btenviar" value="Pesquisar" class="btn btn-primary">

		</form>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">


		<?php

		// se a variável $_GET['msg'] existir
		if( isset($_GET['msg']) )
		{
			echo '<p style="color:#f00;">' . $_GET['msg'] . '</p>';
		}

		echo '<table class="table table-hover">';
		echo '<tr>';
		echo ' <td><strong>Código</strong></td>';
		echo ' <td><strong>Nome</strong></td>';
		echo ' <td><strong>CPF</strong></td>';
		echo ' <td><strong>Telefone</strong></td>';
		echo ' <td><strong>Celular</strong></td>';
		echo ' <td  class="text-center"><strong>Opções</strong></td>';
		echo '</tr>';

		// obtendo o próximo registro da consulta
		while( $dados = $lista_cliente->fetch(PDO::FETCH_ASSOC)  )
		{
			echo '<tr class="active">';
			echo ' <td>'.$dados['cod_cliente'].'</td>';
			echo ' <td>'.$dados['nome'] .'</td>';
			echo ' <td>'.$dados['cpf'] .'</td>';
			echo ' <td>'.$dados['telefone'] .'</td>';
			echo ' <td>'.$dados['celular'] .'</td>';

			echo ' <td class="text-center">';
			
			echo '<a class="btn btn-warning btn-xs" href="index.php?modulo=Clientes&acao=alterando&cod_cliente='.$dados['cod_cliente'].'">Alterar</a>';
			
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';

			//echo '<a href="Clientes_gravar.php?acao=excluir&cod_cliente='.$dados['cod_cliente'].'">Excluir</a>';

			echo '<a class="btn btn-danger btn-xs" href="javascript:excluir('.$dados['cod_cliente'].');">Excluir</a>';

			echo '</td>';

			echo '</tr>';
		} // while

		echo '</table>';

		echo '<a href="index.php?modulo=Clientes&acao=incluindo"  class="btn btn-success">Incluir um Novo Registro</a>';


		?>

	</div>
</div>
