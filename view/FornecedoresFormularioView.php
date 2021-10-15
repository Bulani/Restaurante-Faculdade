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

	if( $.trim($("#razao_social").val()) == "" )
	{
		$("#div_erro_razao_social").html("A Razão Social do fornecedor deve ser preenchida !!!");
		jQuery("#razao_social").focus();
		erros++;
	}

	if( $.trim($("#nome_fantasia").val()) == "" )
	{
		$("#div_erro_nome_fantasia").html("O Nome Fantasia do fornecedor deve ser preenchido !!!");
		jQuery("#nome_fantasia").focus();
		erros++;
	}


	return erros == 0;

} // enviar()...	

</script>


<div class="page-header">
	<h2>Cadastro de fornecedores <small>Ficha</small></h2>
	</div>	

<form name="fcad" id="fcad" method="POST" action="index.php?modulo=fornecedores&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_fornecedor" id="cod_fornecedor" value="<?php echo $cod_fornecedor; ?>">

	<div class="form-group">	
		<label for="razao_social">Razão Social:</label><br>
		<input type="text" name="razao_social" id="razao_social" value="<?php echo $razao_social; ?>" maxlength="100" size="60" class="form-control"  placeholder="">
	</div>
	<div id="div_erro_razao_social"></div>
	<p></p>

	<div class="form-group">	
		<label for="nome_fantasia">Nome Fantasia:</label><br>
		<input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo $nome_fantasia; ?>" maxlength="100" size="60" class="form-control"  placeholder="">
	</div>
	<div id="div_erro_nome_fantasia"></div>
	<p></p>

	<div class="form-group">	
		<label for="cnpj">CNPJ:</label><br>
		<input type="text" name="cnpj" id="cnpj" value="<?php echo $cnpj; ?>" maxlength="16" size="20" class="form-control" >
	</div>
	<div id="div_erro_cnpj"></div>
	<p></p>

	<div class="form-group">	
		<label for="inscricao_estadual">Inscrição Estadual:</label><br>
		<input type="text" name="inscricao_estadual" id="inscricao_estadual" value="<?php echo $inscricao_estadual; ?>" maxlength="20" size="20" class="form-control">
	</div>
	<div id="div_erro_inscricao_estadual"></div>
	<p></p>

	

	<div class="form-group">	
		<label for="endereco">Endereço:</label><br>
		<input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>" maxlength="200" size="100" class="form-control"  placeholder="(endereco, avenida, alameda)">
	</div>
	<p></p>

	<div class="form-group">	
		<label for="bairro">Bairro:</label><br>
		<input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" maxlength="100" size="20" class="form-control"  placeholder="">
</div>
	<p></p>

	<div class="form-group">	
	<label for="cidade">Cidade:</label><br>
	<select class="form-control"  name="cod_cidade" id="cod_cidade">
		<option value="0">Selecione</option>
		<?php
			while( $dados = $lista_cidade->fetch(PDO::FETCH_ASSOC) )
			{
				$s = '';
				if( $cod_cidade == $dados['cod_cidade'] ) $s = ' selected="selected" ';
				echo '<option value="'.$dados['cod_cidade'].'" '.$s.'>'.$dados['nome'] .'-'.$dados['uf'] .'</option>';
			}
		?>
	</select>
	</div>
	
	<p></p>

	<div class="form-group">	
		<label for="cep">CEP:</label><br>
		<input type="text" name="cep" id="cep" value="<?php echo $cep; ?>" maxlength="8" size="20" class="form-control"  placeholder="">
</div>

<div class="form-group">	
		<label for="telefone">Telefone:</label><br>
		<input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>" maxlength="20" size="20" class="form-control"  >
	</div>
	<p></p>

	<div class="form-group">	
		<label for="celular">Celular:</label><br>
		<input type="text" name="celular" id="celular" value="<?php echo $celular; ?>" maxlength="20" size="20" class="form-control"  >
	</div>
	<p></p>

	<div class="form-group">	
		<label for="email">E-mail:</label><br>
		<input type="text" name="email" id="email" value="<?php echo $email; ?>" maxlength="150" size="20" class="form-control"  placeholder="email@email.com.br">
	</div>

	<p></p>
	<p></p>

	<input class="btn btn-success" type="submit" name="btenvio" id="btenvio" value=" Gravar ">
	&nbsp; &nbsp;
	<input class="btn btn-danger" type="button" name="btcancelar" id="btcancelar" value=" Cancelar " onclick="document.location='index.php?modulo=fornecedores';">

	<br></br>

</form>
