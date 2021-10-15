<script type="text/javascript">
	
//----------------------------------	
$(document).ready(function(){

	$('div[id*=div_erro]').css('color','#f00');

	// capturando o evento submit do formulário
	$('#fcad').submit(function(){
		
		$('div[id*=div_erro]').html('');

		erros=0;

		if( $.trim($('#descricao').val()) == '' )
		{
			$('#div_erro_descricao').html('A descricao deve ser preenchida!');
			erros++;
		}

		return erros == 0;

	}); // evendo submit do formulário fcad

}); // ready

</script>

<h2>CADASTRO DE UNIDADES : FICHA</h2>

<form  name="fcad" id="fcad" method="POST" action="index.php?modulo=unidades&acao=<?php echo $acao; ?>">

<input type="hidden" name="cod_unidade" id="cod_unidade" value="<?php echo $cod_unidade; ?>">

Descrição:<br>
<input type="text" name="descricao" id="descricao" maxlength="100" 
   size="60" value="<?php echo $descricao; ?>">
<div id="div_erro_descricao"></div>

<p></p>

<input type="submit" name="btenvio" id="btenvio" 
   value=" Gravar ">

<input type="button" name="btcancelar" id="btcancelar" 
   value=" Cancelar " onclick="document.location='index.php?modulo=unidades';">

</form>

