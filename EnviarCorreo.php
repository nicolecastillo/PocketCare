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
	<form style="align-items: center;" method="post" action="pagina2.php">

		<label for="to">Para:</label>
		<input type="text" name="to" id="to"><br><br>

		<label for="asunto">Asunto:</label>
		<input type="text" name="asunto" id="asunto"><br><br>

		<label for="mensaje">Mensaje:</label><br>
		<textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea><br><br>

		<input type="submit">
	</form>

</body>
</html>