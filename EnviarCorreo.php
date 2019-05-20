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
	<form method="post" action="correo.php">

		<label for="to">Para:</label>
		<input type="text" name="to" id="to"><br><br>

		<label for="asunto">Asunto:</label>
		<input type="text" name="asunto" id="asunto"><br><br>

		<input type="submit" value="Enviar">
	</form>

</body>
</html>
