<script type="text/javascript">

// exclui um registro --------
function excluir(codigo)
{
	if( confirm('Deseja realmente excluir essa compra ??') )
	{
		document.location='index.php?modulo=compras&acao=excluir&cod_compra='+codigo;
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
			<h1>Compras <small>Listagem</small></h1>
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
		echo ' <td><strong>Nota Fiscal</strong></td>';
		echo ' <td><strong>Valor Total</strong></td>';
		echo ' <td  class="text-center"><strong>Opções</strong></td>';
		echo '</tr>';

		// obtendo o próximo registro da consulta
		while( $dados = $lista_compra->fetch(PDO::FETCH_ASSOC)  )
		{
			echo '<tr class="active">';
			echo ' <td>'.$dados['cod_compra'].'</td>';
			echo ' <td>'.$dados['nota_fiscal'] .'</td>';
			echo ' <td>'.$dados['valor_total'] .'</td>';

			echo ' <td class="text-center">';
			
			echo '<a class="btn btn-warning btn-xs" href="index.php?modulo=compras&acao=alterando&cod_compra='.$dados['cod_compra'].'">Alterar</a>';
			
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';

			//echo '<a href="compras_gravar.php?acao=excluir&cod_compra='.$dados['cod_compra'].'">Excluir</a>';

			echo '<a class="btn btn-danger btn-xs" href="javascript:excluir('.$dados['cod_compra'].');">Excluir</a>';

			echo '</td>';

			echo '</tr>';
		} // while

		echo '</table>';

		echo '<a href="index.php?modulo=compras&acao=incluindo"  class="btn btn-success">Incluir um Novo Registro</a>';


		?>

	</div>
</div>
