<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cone Legion | Azralon</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
<link rel="stylesheet" href="/loot/include/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/loot/include/css/style.css">
<script src="/loot/include/js/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#resposta').hide();

    $('#btn-logar').on('click', function() {
        var user = $('#txt-nome').val();
        var pass = $('#txt-senha').val();
        
    	$.ajax({
			type: "post",
			url: "/loot/user/logar",
			data: {pass: pass, user: user},
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
	<div id="wrapper" class="pure-u-5-8">
		<div id="header"><?php include 'app/views/header.php';?></div>
		<div id="content">
			<br />
			<br />
			<h1>Página principal</h1>
			<br />
			<br />
			
		</div>
		<div id="footer">
			<?php include 'app/views/footer.php';?>
		</div>
	</div>
</body>
</html>