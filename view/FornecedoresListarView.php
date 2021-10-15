<script type="text/javascript">

// exclui um registro --------
function excluir(codigo)
{
	if( confirm('Deseja realmente excluir essa fornecedor ??') )
	{
		document.location='index.php?modulo=Fornecedores&acao=excluir&cod_fornecedor='+codigo;
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
			<h1>Fornecedores <small>Listagem</small></h1>
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
		echo ' <td><strong>Razão Social</strong></td>';
		echo ' <td><strong>Nome Fantasia</strong></td>';
		echo ' <td><strong>CNPJ</strong></td>';
		echo ' <td><strong>Celular</strong></td>';
		echo ' <td  class="text-center"><strong>Opções</strong></td>';
		echo '</tr>';

		// obtendo o próximo registro da consulta
		while( $dados = $lista_fornecedor->fetch(PDO::FETCH_ASSOC)  )
		{
			echo '<tr class="active">';
			echo ' <td>'.$dados['cod_fornecedor'].'</td>';
			echo ' <td>'.$dados['razao_social'] .'</td>';
			echo ' <td>'.$dados['nome_fantasia'] .'</td>';
			echo ' <td>'.$dados['cnpj'] .'</td>';
			echo ' <td>'.$dados['celular'] .'</td>';

			echo ' <td class="text-center">';
			
			echo '<a class="btn btn-warning btn-xs" href="index.php?modulo=Fornecedores&acao=alterando&cod_fornecedor='.$dados['cod_fornecedor'].'">Alterar</a>';
			
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';

			//echo '<a href="Fornecedores_gravar.php?acao=excluir&cod_fornecedor='.$dados['cod_fornecedor'].'">Excluir</a>';

			echo '<a class="btn btn-danger btn-xs" href="javascript:excluir('.$dados['cod_fornecedor'].');">Excluir</a>';

			echo '</td>';

			echo '</tr>';
		} // while

		echo '</table>';

		echo '<a href="index.php?modulo=Fornecedores&acao=incluindo"  class="btn btn-success">Incluir um Novo Registro</a>';


		?>

	</div>
</div>
