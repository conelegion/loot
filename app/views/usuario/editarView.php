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
 	$('.wrap-editar').hide();

	buscarUsuarios();

	function buscarUsuarios() {    
		$('.resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/usuario/getAll",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("tbody").append("<tr class='pure-table-odd resultados'>"
						+ "<td class='id'>" + v.id + "</td>"
						+ "<td class='nome'>" + v.nome + "</td>"
						+ "<td>" + v.nick + "</td>"
						+ "<td>" + v.mail + "</td>"
						+ "<td>" + (v.ativo == true ? 'Sim' : 'Não') + "</td>"
						+ "<td><img src='/loot/img/icons/edit.png' title='Editar' class='btn-edit'>&nbsp;&nbsp;<img title='Excluir' src='/loot/img/icons/delete.png' class='btn-delete'></td>"
					+ "</tr>");
				});
			}
		});
    };

    $("table").on('click', '.btn-edit', function() {
    	var idUser = $(this).parent().parent().find('.id').text();

    	$.ajax({
				type: "post",
				url: "/loot/usuario/getById",
				dataType: "json",
				data: {id : idUser},
				success: function(resposta) {
					$('.txt-idUser').val(resposta.id)
					$('.txt-nome').val(resposta.nome);
					$('.txt-email').val(resposta.mail);
					$('.txt-nick').val(resposta.nick);
					$('.txt-senha').val(resposta.senha);
					var combo = resposta.ativo == '1' ? 1 : -1;
					$('#txt-ativo').val(combo);
				}
			});

    	$('.wrap-lista').hide();
    	$('.wrap-editar').fadeIn();

    }); 

    $('#btn-edit').on('click', function() {
    	$.ajax({
			type: "post",
			url: "/loot/usuario/update",
			data: $("#form").serialize(),
			success: function(resposta) {	
				if(resposta != 'empty') {
					buscarUsuarios();
					$('.wrap-editar').hide();
					$('.wrap-lista').fadeIn();
				}
			}
		});
    });

    $('#btn-cancel').on('click', function() {
    	$('.wrap-editar').hide();
    	$('.wrap-lista').fadeIn();
    });

    $("table").on('click', '.btn-delete', function() {
    	var idUser = $(this).parent().parent().find('.id').text();
		var nome = $(this).parent().parent().find('.nome').text();
    	if(confirm("Deseja realmente excluir o usuário " + nome + "?")) {
	    	$.ajax({
				type: "post",
				url: "/loot/usuario/delete",
				data: {id : idUser},
				success: function(resposta) {
					buscarUsuarios();
				}
			});
		}
    }); 
   
 });
 </script>
</head>
<body>
	<div id="wrapper" class="pure-u-5-8">
		<div id="header"><?php include 'app/views/header.html';?></div>
		<div id="content">
			<div class="wrap-lista">
				<h1>Usuários cadastrados</h1>
				<table class="pure-table">
					<thead>
						<tr>
							<th width="4%">Id</th>
							<th>Nome</th>
							<th>Nick</th>
							<th>E-mail</th>
							<th width="8%">Ativo</th>
							<th width="8%"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="wrap-editar">
				<h1>Editar</h1>
				<br />
				<form class="pure-form pure-form-aligned align-center" id="form">
				    <fieldset>
				    	<div class="pure-control-group">
				    		<label>Nome</label>
				        	<input type="text" class="pure-input-1-3 txt-nome" name="txt-nome" placeholder="Nome">
				        </div>

				        <div class="pure-control-group">
				        	<label>E-mail</label>
				        	<input type="text" class="pure-input-1-3 txt-email" name="txt-email" placeholder="E-mail">
				        </div>

				        <div class="pure-control-group">
				        	<label>Nick</label>
				        	<input type="text" class="pure-input-1-3 txt-nick" name="txt-nick" placeholder="Bnet Name">
				        </div>			
					    <div class="pure-control-group">
							<label>Senha</label>
					        <input type="password" class="pure-input-1-3 txt-senha" name="txt-senha" placeholder="Senha">
					    </div>
						<div class="pure-control-group">
					        <label>Ativo</label>
					        <select name="txt-ativo" class="pure-input-1-3 txt-ativo" id="txt-ativo">
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
		</div>
			
		<div id="footer">
			<?php include 'app/views/footer.html';?>
		</div>
	</div>
</body>
</html>