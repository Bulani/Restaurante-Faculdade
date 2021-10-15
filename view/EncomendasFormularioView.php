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

	if( !verificaData($("#data").val())  )
	{
		$("#div_erro_data").html("A Data deve ser uma data válida !!!");
		$("#data").focus();
		erros++;
	}

	if( !numReal($("#valor_total").val())  )
	{
		$("#div_erro_valor_total").html("O Valor Total deve conter um valor válido !!!");
		$("#valor_total").focus();
		erros++;
	}

	if( $.trim($("#cod_cliente").val()) == "0" )
	{
		$("#div_erro_cliente").html("O Cliente deve ser selecionado !!!");
		jQuery("#cod_cliente").focus();
		erros++;
	}

	return erros == 0;

} // enviar()...	

</script>


<div class="page-header">
	<h2>Cadastro de Encomendas <small>Ficha</small></h2>
	</div>	

<form name="fcad" id="fcad" method="POST" action="index.php?modulo=encomendas&acao=<?php echo $acao; ?>">

<input type="hidden" name="num_encomenda" id="num_encomenda" value="<?php echo $num_encomenda; ?>">

	<div class="form-group">	
	<label for="cod_cliente">Cliente:</label><br>
	<select class="form-control"  name="cod_cliente" id="cod_cliente">
		<option value="0">Selecione</option>
		<?php
			while( $dados = $lista_cliente->fetch(PDO::FETCH_ASSOC) )
			{
				$s = '';
				if( $cod_cliente == $dados['cod_cliente'] ) $s = ' selected="selected" ';
				echo '<option value="'.$dados['cod_cliente'].'" '.$s.'>'.$dados['nome'] .'</option>';
			}
		?>
	</select>
	</div>
	<div id="div_erro_cliente"></div>

	<p></p>

	<div class="form-group">	
		<label for="data">Data:</label><br>
		<input type="text" name="data" id="data" value="<?php echo $data; ?>" maxlength="100" size="60" class="form-control"  placeholder="00/00/0000">
	</div>
	<div id="div_erro_data"></div>
	<p></p>

	<div class="form-group">	
		<label for="valor_total">Valor Total:</label><br>
		<input type="text" name="valor_total" id="valor_total" value="<?php echo $valor_total; ?>" size="20" class="form-control">
	</div>
	<div id="div_erro_valor_total"></div>
	<p></p>

	<p></p>

	<input class="btn btn-success" type="submit" name="btenvio" id="btenvio" value=" Gravar ">
	&nbsp; &nbsp;
	<input class="btn btn-danger" type="button" name="btcancelar" id="btcancelar" value=" Cancelar " onclick="document.location='index.php?modulo=encomendas';">

	<br></br>

</form>
