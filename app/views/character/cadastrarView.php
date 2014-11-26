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
	buscarRacas();
	buscarClasses();

	function buscarUsuarios() {    
		$('.user-resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/usuario/getAll",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#txt-user").append("<option class='user-resultados' value=" + v.id + ">" + v.nome + "</option>");
				});
			}
		});
    };

    function buscarRacas() {    
		$('.race-resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/race/getAll",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#txt-race").append("<option class='race-resultados' value=" + v.id + ">" + v.nome + "</option>");
				});
			}
		});
    };

    function buscarClasses() {    
		$('.class-resultados').remove();
    	$.ajax({
    		assync: true,
			type: "post",
			url: "/loot/classe/getAll",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#txt-classe").append("<option class='class-resultados' value=" + v.id + ">" + v.nome + "</option>");
				});
				buscarSpecs();
			}
		});
    };

    function buscarSpecs() {  
    	var classe = $('#txt-classe').val();  
		$('.spec-resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/spec/getByClasse",
			dataType: "json",
			data: {txt_classe : classe},
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#txt-spec").append("<option class='spec-resultados' value=" + v.id + ">" + v.nome + "</option>");
				});
			}
		});
    };

    $('#txt-classe').on('change', function() {
    	buscarSpecs();
    });

	$('#btn-cad').on('click', function() {
		$('#btn-cad').hide();    
    	
    	$.ajax({
			type: "post",
			url: "/loot/character/insert",
			data: $("#form").serialize(),
			success: function(resposta) {	
				if(resposta == 'empty') {
					$('#resposta').text("É necessário preencher todos os campos!").show();
					$('#btn-cad').show(); 
					setTimeout(function() {  
						 $('#resposta').hide();
				    }, 2000);	
				} else if(resposta == "") {
					$('#resposta').text("Char cadastrado com sucesso!").show();
					setTimeout(function() {  
						window.location.href = "/loot/character/editar";
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
				    		<label>Nome</label>
				        	<input type="text" class="pure-input-1-3 txt-nome" name="txt-nome" placeholder="Nome">
				        </div>
				    	<div class="pure-control-group">
				    		<label>Usuário</label>
				    		<select class="pure-input-1-3" name="txt-user" id="txt-user"></select>
				    	</div>
				    	<div class="pure-control-group">
				    		<label>Raça</label>
				    		<select id="txt-race" name="txt-race" class="pure-input-1-3"></select>
				    	</div>
				    	<div class="pure-control-group">
				    		<label>Classe</label>
				    		<select id="txt-classe" class="pure-input-1-3"></select>
				    	</div>
				    	<div class="pure-control-group">
				    		<label>Spec</label>
				    		<select id="txt-spec" name="txt-spec" class="pure-input-1-3"></select>
				    	</div>

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