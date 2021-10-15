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

	if( $.trim($("#nome").val()) == "" )
	{
		$("#div_erro_nome").html("O nome do cliente deve ser preenchido !!!");
		jQuery("#nome").focus();
		erros++;
	}

	if( !numReal($("#renda_familiar").val())  )
	{
		$("#div_erro_renda_familiar").html("A renda familiar deve conter um valor válido !!!");
		$("#renda_familiar").focus();
		erros++;
	}

	if( $("#renda_familiar").val() < 500  )
	{
		$("#div_erro_renda_familiar").html("A renda familiar deve ser superior a R$ 500,00 !!!");
		$("#renda_familiar").focus();
		erros++;
	}


	if( !verificaData($("#data_nascimento").val())  )
	{
		$("#div_erro_data_nascimento").html("A data de Nascimento deve ser uma data válida !!!");
		$("#data_nascimento").focus();
		erros++;
	}


	return erros == 0;

} // enviar()...	

</script>


<div class="page-header">
	<h2>Cadastro de Clientes <small>Ficha</small></h2>
	</div>	

<form name="fcad" id="fcad" method="POST" action="index.php?modulo=clientes&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_cliente" id="cod_cliente" value="<?php echo $cod_cliente; ?>">

	<div class="form-group">	
		<label for="nome">Nome:</label><br>
		<input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" maxlength="100" size="60" class="form-control"  placeholder="Nome">
	</div>
	<div id="div_erro_nome"></div>
	<p></p>

	<div class="form-group">	
		<label for="cpf">CPF:</label><br>
		<input type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>" maxlength="11" size="20" class="form-control"  placeholder="000.000.000-00">
	</div>
	<div id="div_erro_cpf"></div>
	<p></p>

	<div class="form-group">	
		<label for="rg">RG:</label><br>
		<input type="text" name="rg" id="rg" value="<?php echo $rg; ?>" maxlength="11" size="20" class="form-control"  placeholder="00.000.000-0">
	</div>
	<p></p>

	Sexo: <br>		
	<label>
		<input type="radio" name="sexo" id="sexoM" value="M" 
			<?php if($sexo == 'M') echo ' checked="checked" '; ?> > Masculino			
	</label>
	<br>
	<label>
		<input type="radio" name="sexo" id="sexoF" value="F" 
			<?php if($sexo == 'F') echo ' checked="checked" '; ?> > Feminino			
	</label>
	<p></p>

	<div class="form-group">	
		<label for="data_nascimento">Nascimento:</label><br>
		<input type="text" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento; ?>" maxlength="11" size="10" class="form-control"  placeholder="00/00/0000">
	</div>
	<div id="div_erro_data_nascimento"></div>
	<p></p>

	<div class="form-group">	
		<label for="renda_familiar">Renda Familiar:</label><br>
		<input type="text" name="renda_familiar" id="renda_familiar" value="<?php echo $renda_familiar; ?>" maxlength="11" size="20" class="form-control">
	</div>
	<div id="div_erro_renda_familiar"></div>
	<p></p>

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

	<div class="form-group">	
		<label for="rua">Logradouro:</label><br>
		<input type="text" name="rua" id="rua" value="<?php echo $rua; ?>" maxlength="200" size="100" class="form-control"  placeholder="(rua, avenida, alameda)">
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
	<p></p>


	Como conheceu nossa empresa ? <br>

	<label>
		<input type="checkbox" name="conheceu_por_jornais" id="conheceu_por_jornais" value="S" 
			<?php if($conheceu_por_jornais == 'S') echo ' checked="checked" '; ?> > 
			Conhceceu por Jornais			
	</label> <br>

	<label>
		<input type="checkbox" name="conheceu_por_internet" id="conheceu_por_internet" value="S" 
			<?php if($conheceu_por_internet == 'S') echo ' checked="checked" '; ?> > 
			Conhceceu por Internet			
	</label> <br>

	<label>
		<input type="checkbox" name="conheceu_por_outro" id="conheceu_por_outro" value="S" 
			<?php if($conheceu_por_outro == 'S') echo ' checked="checked" '; ?> > 
			Conhceceu por Outros Meios			
	</label> <br>


	<p></p>
	<p></p>

	<input class="btn btn-success" type="submit" name="btenvio" id="btenvio" value=" Gravar ">
	&nbsp; &nbsp;
	<input class="btn btn-danger" type="button" name="btcancelar" id="btcancelar" value=" Cancelar " onclick="document.location='index.php?modulo=clientes';">

	<br></br>

</form>
