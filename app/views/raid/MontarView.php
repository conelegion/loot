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
	$('#div-adicionar').hide();
	
	buscarCharsRaid();

	function buscarCharsRaid() {    
		$('.resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/character/getByRaid",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("tbody").append("<tr class='pure-table-odd resultados'>"
						+ "<td class='id'>" + v.id + "</td>"
						+ "<td class='nome'>" + v.nome + "</td>"
						+ "<td>" + v.usuario + "</td>"
						+ "<td>" + v.race + "</td>"
						+ "<td>" + v.classe + "</td>"
						+ "<td>" + v.spec + "</td>"
						+ "<td><img title='Excluir' src='/loot/img/icons/delete.png' class='btn-delete'></td>"
					+ "</tr>");
				});
			}
		});
    };

    function buscarCharsSemRaid() {    
		$('.resultados').remove();
    	$.ajax({
			type: "post",
			url: "/loot/character/getFreeChars",
			dataType: "json",
			success: function(resposta) {
				$.each(resposta, function(k, v) {
					$("#adicionar-core").append("<tr class='pure-table-odd resultados'>"
						+ "<td class='id'>" + v.id + "</td>"
						+ "<td class='nome'>" + v.nome + "</td>"
						+ "<td>" + v.usuario + "</td>"
						+ "<td>" + v.race + "</td>"
						+ "<td>" + v.classe + "</td>"
						+ "<td>" + v.spec + "</td>"
						+ "<td><img title='Adicionar ao core' src='/loot/img/icons/insert.png' class='btn-insert'></td>"
					+ "</tr>");
				});
			}
		});
    };
	
    $("table").on('click', '.btn-delete', function() {
    	var idChar = $(this).parent().parent().find('.id').text();
		var nome = $(this).parent().parent().find('.nome').text();
    	if(confirm("Deseja realmente remover o char " + nome + " do core?")) {
	    	$.ajax({
				type: "post",
				url: "/loot/character/deleteFromRaid",
				data: {id : idChar},
				success: function(resposta) {
					buscarCharsRaid();
				}
			});
		}
    }); 

    $("table").on('click', '.btn-insert', function() {
    	var idChar = $(this).parent().parent().find('.id').text();
		var nome = $(this).parent().parent().find('.nome').text();
    	if(confirm("Deseja realmente adicionar o char " + nome + " ao core?")) {
	    	$.ajax({
				type: "post",
				url: "/loot/character/insertOnRaid",
				data: {id : idChar},
				success: function(resposta) {
					buscarCharsRaid();

					$('#div-adicionar').hide();
					$('#div-lista').fadeIn();			    	
				}
			});
		}
    }); 

    $("#btn-addRaid").on('click', function() {
    	buscarCharsSemRaid()
    	$('#div-lista').hide();
    	$('#div-adicionar').fadeIn();
    });			 
});
</script>
</head>
<body>
<div id="wrapper" class="pure-u-5-8">
<div id="header"><?php include 'app/views/header.html';?></div>
		<div id="content">
			<h1>Montar Raid</h1>
			<br />
	    	<div class="pure-control-group div-lista" id="div-lista">
	    		<h2>Members</h2>
	    		<div class="wrap-lista">
					<table class="pure-table">
						<thead>
							<tr>
								<th width="4%">Id</th>
								<th>Nome</th>
								<th>User</th>
								<th>Raça</th>
								<th>Classe</th>
								<th>Spec</th>
								<th width="8%"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<br />
				<button type="button" id="btn-addRaid" class="pure-button pure-input-1-6 pure-button-primary">Adicionar</button>
	        </div>
	       
	       	<div class="wrap-adicionar" id="div-adicionar">
				<h1>Adicionar ao core</h1>
				<table class="pure-table">
					<thead>
						<tr>
							<th width="4%">Id</th>
							<th>Nome</th>
							<th>User</th>
							<th>Raça</th>
							<th>Classe</th>
							<th>Spec</th>
							<th width="8%"></th>
						</tr>
					</thead>
					<tbody id="adicionar-core"></tbody>
				</table>
			</div> 
	        
		</div>
			
		<div id="footer">
			<?php include 'app/views/footer.html';?>
		</div>
	</div>
</body>
</html>