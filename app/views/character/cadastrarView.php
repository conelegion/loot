<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cone Legion | Azralon</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
<link rel="stylesheet" href="/loot/include/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/loot/include/css/style3.css">
<script src="/loot/include/js/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
	buscarUsuarios();

	function buscarUsuarios() {    
		$('.resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/usuario/getAll",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#txt-user").append("<option class='resultados' value=" + v.id + ">" + v.nome + "</option>");
				});
			}
		});
    };



	 $('#btn-cad').on('click', function() {
		 $('#btn-cad').hide();    
	    	$.ajax({
				type: "post",
				url: "/loot/usuario/insert",
				data: $("#form").serialize(),
				success: function(resposta) {	
					if(resposta == 'empty') {
						$('#resposta').text("É necessário preencher todos os campos!").show();
						$('#btn-cad').show(); 
						setTimeout(function() {  
							 $('#resposta').hide();
					    }, 2000);	
					} else if(resposta == "") {
						$('#resposta').text("Usuário cadastrado com sucesso!").show();
						setTimeout(function() {  
							window.location.href = "/loot/usuario/";
					    }, 2000);	
					}
				}
			});
	        return false;
	    });
   
 });
 </script>
</head>
<body>
	<div id="wrapper" class="pure-u-5-8">
		<div id="header"><?php include 'app/views/header.html';?></div>
		<div id="content">
			<h1>Cadastrar char</h1>
			<br />
			<form class="pure-form pure-form-aligned align-center" id="form">
				    <fieldset>
				    	<div class="pure-control-group">
				    		<label>Usuário</label>
				    		<select id="txt-user"></select>
				    	</div>
				    	
				    	<div class="pure-control-group">
				    		<label>Nome</label>
				        	<input type="text" class="pure-input-1-2 txt-nome" name="txt-nome" placeholder="Nome">
				        </div>

				        <div class="pure-control-group">
				        	<label>E-mail</label>
				        	<input type="text" class="pure-input-1-2 txt-email" name="txt-email" placeholder="E-mail">
				        </div>

				        <div class="pure-control-group">
				        	<label>Senha</label>
				        	<input type="text" class="pure-input-1-2 txt-nick" name="txt-nick" placeholder="Bnet Name">
				        </div>			
					    <div class="pure-control-group">
							<label>Senha</label>
					        <input type="password" class="pure-input-1-2 txt-senha" name="txt-senha" placeholder="Senha">
					    </div>
						<div class="pure-control-group">
					        <label>Ativo</label>
					        <select name="txt-ativo" class="pure-input-1-12 txt-ativo" id="txt-ativo">
								<option value="1">Sim</option>
								<option value="-1">Não</option>
					        </select>
					    </div>

				    </fieldset>
					<br />
					<input type="hidden" class="pure-input-1-2 txt-idUser" name="txt-id">
				    <button type="button" id="btn-edit" class="pure-button pure-input-1-6 pure-button-primary">Editar</button>&nbsp;&nbsp;<button type="button" id="btn-cancel" class="pure-button pure-input-1-6 pure-button-primary">Voltar</button>
				    <br /> <br /> 
					<p id="resposta"></p>
				</form>
		</div>
			
		<div id="footer">
			<?php include 'app/views/footer.html';?>
		</div>
	</div>
</body>
</html>