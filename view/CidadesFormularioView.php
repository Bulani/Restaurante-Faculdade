<script type="text/javascript">
	
//----------------------------------	
$(document).ready(function(){

	$('div[id*=div_erro]').css('color','#f00');

	// capturando o evento submit do formulário
	$('#fcad').submit(function(){
		
		$('div[id*=div_erro]').html('');

		erros=0;

		if( $.trim($('#nome').val()) == '' )
		{
			$('#div_erro_nome').html('O nome deve ser preenchido!');
			erros++;
		}

		if( $.trim($('#uf').val()) == '' )
		{
			$('#div_erro_uf').html('A uf deve ser preenchida!');
			erros++;
		}

		return erros == 0;

	}); // evendo submit do formulário fcad

}); // ready

</script>

<h2>CADASTRO DE CIDADES : FICHA</h2>

<form  name="fcad" id="fcad" method="POST" action="index.php?modulo=cidades&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_cidade" id="cod_cidade" value="<?php echo $cod_cidade; ?>">

Nome:<br>
<input type="text" name="nome" id="nome" maxlength="100" 
   size="60" value="<?php echo $nome; ?>">
<div id="div_erro_nome"></div>

<p></p>

Unidade Federal:<br>
<input type="text" name="uf" id="uf" maxlength="2" 
   size="10" value="<?php echo $uf; ?>">
<div id="div_erro_uf"></div>

<p></p>

<input type="submit" name="btenvio" id="btenvio" 
   value=" Gravar ">

<input type="button" name="btcancelar" id="btcancelar" 
   value=" Cancelar " onclick="document.location='index.php?modulo=cidades';">

</form>

