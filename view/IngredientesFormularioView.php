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

	if( $.trim($("#descricao").val()) == "" )
	{
		$("#div_erro_descricao").html("O nome do ingrediente deve ser preenchido !!!");
		jQuery("#descricao").focus();
		erros++;
	}

	//if( !numReal($("#valor_unitario").val())  )
	//{
	//	$("#div_erro_valor_unitario").html("O Valor Unitario deve conter um valor válido !!!");
	//	$("#valor_unitario").focus();
	//	erros++;
	//}

	if( $.trim($("#cod_unidade").val()) == "0" )
	{
		$("#div_erro_unidade").html("A unidade deve ser selecionada !!!");
		jQuery("#cod_unidade").focus();
		erros++;
	}

	return erros == 0;

} // enviar()...	

</script>


<div class="page-header">
	<h2>Cadastro de Ingredientes <small>Ficha</small></h2>
	</div>	

<form name="fcad" id="fcad" method="POST" action="index.php?modulo=ingredientes&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_ingrediente" id="cod_ingrediente" value="<?php echo $cod_ingrediente; ?>">

	<div class="form-group">	
		<label for="descricao">Descrição:</label><br>
		<input type="text" name="descricao" id="descricao" value="<?php echo $descricao; ?>" maxlength="100" size="60" class="form-control"  placeholder="Descrição">
	</div>
	<div id="div_erro_descricao"></div>
	<p></p>

	<div class="form-group">	
		<label for="valor_unitario">Valor Unitario:</label><br>
		<input type="text" name="valor_unitario" id="valor_unitario" value="<?php echo $valor_unitario; ?>" size="20" class="form-control">
	</div>
	<div id="div_erro_valor_unitario"></div>
	<p></p>

	<div class="form-group">	
	<label for="cod_unidade">Unidade:</label><br>
	<select class="form-control"  name="cod_unidade" id="cod_unidade">
		<option value="0">Selecione</option>
		<?php
			while( $dados = $lista_unidade->fetch(PDO::FETCH_ASSOC) )
			{
				$s = '';
				if( $cod_unidade == $dados['cod_unidade'] ) $s = ' selected="selected" ';
				echo '<option value="'.$dados['cod_unidade'].'" '.$s.'>'.$dados['descricao'] .'</option>';
			}
		?>
	</select>
	</div>
	<div id="div_erro_unidade"></div>

	<p></p>
	<p></p>

	<input class="btn btn-success" type="submit" name="btenvio" id="btenvio" value=" Gravar ">
	&nbsp; &nbsp;
	<input class="btn btn-danger" type="button" name="btcancelar" id="btcancelar" value=" Cancelar " onclick="document.location='index.php?modulo=ingredientes';">

	<br></br>

</form>
