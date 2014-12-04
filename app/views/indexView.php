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
   

    $('#btn-logar').on('click', function() {
        var user = $('#txt-nome').val();
        var pass = $('#txt-senha').val();
        
    	$.ajax({
			type: "post",
			url: "/loot/usuario/logar",
			data: {pass: pass, user: user},
			success: function(resposta) {	
				if(resposta == 'sucesso') {
					setTimeout(function() {  
			        	window.location.href = "/loot/usuario";
				    }, 3000);
				} else {
					$('#resposta').text("Usuário e/ou senha inválido(s).").show();
					setTimeout(function() {  
						 $('#resposta').hide();
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
		<div id="header"><img src="/loot/img/cone-legion2.png"></div>
		<div id="content">
			<br />
			<br />
			<br />
			<br />
			<div class="tudo pure-g align-center">
				<div class="pure-u-1-3">
					<h1>Acessar o sistema</h1>
					<form class="pure-form form-login">
						<div class="pure-group pure-input-1">
							<input id="txt-nome" class="pure-input-1 align-center" type="text" placeholder="User" /> 
							<br />
							<input id="txt-senha" class="pure-input-1 align-center" type="password" placeholder="Password" />
						</div>
						<br />
						<button type="submit" id="btn-logar" class="pure-button pure-button-primary">Entrar</button>
						<br /> <br /> 
						<p id="resposta"></p>

					</form>
					<a href="/loot/usuario/cadastrar"><button class="pure-button new-user">Cadastrar novo usuário</button></a>
					<br />
					<br />
					<a href="/loot/status"><button class="pure-button new-user">Ver lista de prioridades</button></a>
				</div>
				
			</div>

		</div>
		<div id="footer">
			<?php include 'app/views/footer.html';?>
		</div>
	</div>
</body>
</html>