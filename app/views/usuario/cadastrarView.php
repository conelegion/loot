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
	 $('#btn-cad').on('click', function() {
		 $('#btn-cad').hide();    
	    	$.ajax({
				type: "post",
				url: "/loot/usuario/insert",
				data: $("#form").serialize(),
				success: function(resposta) {	
					if(resposta == 'empty') {
						$('#resposta').text("� necess�rio preencher todos os campos!").show();
						$('#btn-cad').show(); 
						setTimeout(function() {  
							 $('#resposta').hide();
					    }, 2000);	
					} else if(resposta == "") {
						$('#resposta').text("Usu�rio cadastrado com sucesso!").show();
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
			<h1>Cadastrar usuario</h1>
			<br />
			<form class="pure-form align-center" id="form">
			    <fieldset class="pure-group">
			        <input type="text" class="pure-input-1-2 txt-nome" name="txt-nome" placeholder="Nome">
			        <input type="text" class="pure-input-1-2 txt-email" name="txt-email" placeholder="E-mail">
			        <input type="text" class="pure-input-1-2 txt-nick" name="txt-nick" placeholder="Bnet Name">
			    </fieldset>
			
			    <fieldset class="pure-group">
			        <input type="password" class="pure-input-1-2 txt-senha" name="txt-senha" placeholder="Senha">
			    </fieldset>
				<br />
			    <button type="button" id="btn-cad" class="pure-button pure-input-1-6 pure-button-primary">Cadastrar</button>
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