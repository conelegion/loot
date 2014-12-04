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
						+ "<td class='id' style='display:none'>" + v.id + "</td>"
						+ "<td class='nome'>" + v.nome + "</td>"
						+ "<td>" + v.usuario + "</td>"
						+ "<td>" + v.classe + "</td>"
						+ "<td>" + v.spec + "</td>"
						+ "<td>" + v.role + "</td>"
						+ "<td>" + v.loots + "</td>"
					+ "</tr>");
				});
			}
		});
    };
});
</script>
</head>
<body>
<div id="wrapper" class="pure-u-5-8">
<div id="header"><img src="/loot/img/cone-legion2.png"></div>
		<div id="content">
			<h1>Prioridades de loot</h1>
	    	<div class="pure-control-group div-lista" id="div-lista">
	    		<div class="wrap-lista">
					<table class="pure-table">
						<thead>
							<tr>
								<th width="4%" style="display:none">Id</th>
								<th>Nome</th>
								<th>User</th>
								<th>Classe</th>
								<th>Spec</th>
								<th>Role</th>
								<th>Loots</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<br />
				<br />
				<a href="/loot" class="new-user"><button class="pure-button">Voltar</button></a>
	        </div>        
		</div>
			
		<div id="footer">
			<?php include 'app/views/footer.html';?>
		</div>
	</div>
</body>
</html>