<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Document</title>

	<style>
	label{
		width: 70px;
		display: inline-block;

	}	
	align-items: center;
	</style>
</head>
<body>
	<div style="text-align:center;">
		<a href="index.php" ><img src="images/logo_1.png" alt="" /></a>
		<h1>Correo</h1>
		<form method="post" action="correo.php">
			<p><label for="to">Para:</label>
			<input type="email" multiple autofocus required name="to" id="to" placeholder="ejemplo@email.com"></p>

			<p><label for="asunto">Asunto:</label>
			<input type="text" required name="asunto" id="asunto"></p>

			<p><input type="submit" value="Cancelar" onclick="window.close();">
			<input type="submit" value="Enviar"></p>
		</form>
	</div>
</body>
</html>
