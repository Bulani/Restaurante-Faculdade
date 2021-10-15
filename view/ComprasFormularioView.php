<script type="text/javascript">

//------------------------------------------------------------------
$(document).ready( function(){

	$('div[id*=div_erro]').css('color','#f00');

	$("#fcad").submit( enviar ); // Evento Submit do formulário


}); // Evento ready do html

//------------------------------------------------------------------
function enviar()
{
	var erros=0;
	
	$('div[id*=div_erro]').html("");

	if( !numReal($("#valor_total").val())  )
	{
		$("#div_erro_valor_total").html("O Valor Total deve conter um valor válido !!!");
		$("#valor_total").focus();
		erros++;
	}

		if( !verificaData($("#data").val())  )
	{
		$("#div_erro_data").html("A Data deve ser uma data válida !!!");
		$("#data").focus();
		erros++;
	}

	if( $.trim($("#cod_fornecedor").val()) == "0" )
	{
		$("#div_erro_fornecedor").html("O Fornecedor deve ser selecionado !!!");
		jQuery("#cod_fornecedor").focus();
		erros++;
	}

	return erros == 0;

} // enviar()...	

</script>


<div class="page-header">
	<h2>Cadastro de Compras <small>Ficha</small></h2>
	</div>	

<form name="fcad" id="fcad" method="POST" action="index.php?modulo=compras&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_compra" id="cod_compra" value="<?php echo $cod_compra; ?>">

			<div class="form-group">	
				<label for="nota_fiscal">Nota Fiscal:</label><br>
				<input type="text" name="nota_fiscal" id="nota_fiscal" maxlength="100" size="60" value="<?php echo $nota_fiscal; ?>" class="form-control"  placeholder="Informe a nota fiscal da compra">
				<div id="div_erro_nota_fiscal"></div>
			</div>

			<p></p>

			<div class="form-group">	
				<label for="nota_serie">Nota Serie:</label><br>
				<input type="text" name="nota_serie" id="nota_serie" maxlength="100" size="60" value="<?php echo $nota_serie; ?>" class="form-control"  placeholder="Informe a Serie">
				<div id="div_erro_nota_fiscal"></div>
			</div>

			<p></p>

			<div class="form-group">	
				<label for="data">Data:</label><br>
				<input type="text" name="data" id="data" maxlength="100" size="60" value="<?php echo $data; ?>" class="form-control"  placeholder="Informe a data da compra">
				<div id="div_erro_data"></div>
			</div>

			<p></p>

	<div class="form-group">	
	<label for="cod_fornecedor">Fornecedor:</label><br>
	<select class="form-control"  name="cod_fornecedor" id="cod_fornecedor">
		<option value="0">Selecione</option>
		<?php
			while( $dados = $lista_fornecedor->fetch(PDO::FETCH_ASSOC) )
			{
				$s = '';
				if( $cod_fornecedor == $dados['cod_fornecedor'] ) $s = ' selected="selected" ';
				echo '<option value="'.$dados['cod_fornecedor'].'" '.$s.'>'.$dados['nome_fantasia'] .'</option>';
			}
		?>
	</select>
	</div>
	<div id="div_erro_fornecedor"></div>


			<div class="form-group">	
				<label for="valor_total">Valor Total:</label><br>
				<input type="text" name="valor_total" id="valor_total" size="20" value="<?php echo $valor_total; ?>" class="form-control"  placeholder="Valor Total da compra">
				<div id="div_erro_valor_total"></div>   
			</div>

			<p></p>

	<p></p>
	<p></p>

	<input class="btn btn-success" type="submit" name="btenvio" id="btenvio" value=" Gravar ">
	&nbsp; &nbsp;
	<input class="btn btn-danger" type="button" name="btcancelar" id="btcancelar" value=" Cancelar " onclick="document.location='index.php?modulo=compras';">

	<br></br>

</form>
