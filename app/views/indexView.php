<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SAE :: Inicial</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
<link rel="stylesheet" href="/loot/include/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/loot/include/css/style.css">
<script src="/loot/include/js/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#resposta').hide();

    $('#btn-logar').on('click', function() {

    	$.ajax({
			type: "post",
			url: "/loot/user/logar",
			data: {teste: 'teste'},
			success: function(resposta) {	
				alert(resposta);	
			}
		});
   
        return false;
    });
 });
 </script>
</head>
<body>
	<div id="wrapper" class="pure-u-3-4">
		<div id="header"><img src="/loot/img/cone-legion2.png"></div>
		<div id="content">
			
			<div class="tudo pure-g align-center">
				<div class="pure-u-1-3">
					<h1>Acessar o sistema</h1>
					<form class="pure-form form-login">
						<div class="pure-group pure-input-1">
							<input id="txt-nome" class="pure-input-1 align-center"
								type="text" placeholder="Usuário" /> <input id="txt-senha"
								class="pure-input-1 align-center" type="password"
								placeholder="Senha">
						</div>
						<br />
						<button type="submit" id="btn-logar" class="pure-button pure-button-primary">Entrar</button>
						<br /> <br /> <label id="resposta"></label>

					</form>
				</div>
			</div>

		</div>
		<div id="footer">footer</div>
	</div>
</body>
</html>